<?php

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
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignId('user_id')->index()->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->index()->constrained()->onDelete('cascade');
            $table->string('event_name');
            $table->string('event_date');
            $table->string('event_description');
            $table->string('event_price');
            $table->boolean('isActive')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
