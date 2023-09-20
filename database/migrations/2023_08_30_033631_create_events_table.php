<?php

use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->integer('attendees');
            $table->string('speaker');
            $table->text('content');
            $table->string('date');
            $table->string('location');
            $table->float('price');
            $table->integer('quantity')->nullable();
            $table->foreignId('subcategory_id')->index()->constrained()->onDelete('cascade');
            $table->enum('status', [Event::DRAFT, Event::PUBLISHED])->default(Event::DRAFT);
            $table->text('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
