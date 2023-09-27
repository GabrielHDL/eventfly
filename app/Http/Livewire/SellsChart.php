<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Livewire\Component;

class SellsChart extends Component
{
    public function render()
    {
        $totalSells = Order::sum('total');

        $chartModel = (new LineChartModel())->singleLine()->addPoint('Ventas', $totalSells);

        return view('livewire.sells-chart', compact('chartModel'));
    }
}
