<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class PaymentOrder extends Component
{
    use AuthorizesRequests;
    public $order;
    public $paymentMethodId;

    public function getDefaultPaymentMethodProperty() {
        return auth()->user()->defaultPaymentMethod();
    }

    public function mount(Order $order){
        $this->order = $order;

        if (auth()->user()->hasDefaultPaymentMethod()) {
            $this->paymentMethodId = $this->defaultPaymentMethod->id;
        }
    }

    public function purchase() {

        try {
            auth()->user()->charge($this->order->total * 100, $this->paymentMethodId);
            $this->order->status = Order::PAID;
            $this->order->save();

            $this->sendConfirmationMail($this->order);

            $this->sendNotificationMail($this->order);

            return redirect()->route('orders.show', $this->order);

        } catch (\Exception $e) {
            $this->addError('paymentMethodId', $e->getMessage());

            return;
        }

    }

    public function sendConfirmationMail($order) {

        $user = User::find($this->order->user_id);

        // Mail::to($user->email)->send(new NoreplyMailable($order));
    }

    public function sendNotificationMail($order) {
        // Mail::to('gabriel@houdle.com')->send(new NotificationMailable($order));
    }

    public function addPaymentMethod($paymentMethod) {

        if (!auth()->user()->hasStripeId()) {
            auth()->user()->createAsStripeCustomer();
        }
        
        auth()->user()->addPaymentMethod($paymentMethod);

        if (!auth()->user()->hasDefaultPaymentMethod()) {
            auth()->user()->updateDefaultPaymentMethod($paymentMethod);
        }

        $this->paymentMethodId = $paymentMethod;

        $this->purchase();
    }

    public function render()
    {

        // $this->authorize('author', $this->order);
        // $this->authorize('payment', $this->order);

        $items = json_decode($this->order->content);

        return view('livewire.payment-order', [
            'items' => $items,
            'paymentMethods' => auth()->user()->paymentMethods(),
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }
}
