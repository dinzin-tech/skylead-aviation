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
        Schema::create('aircraft', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('registration_number')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('range')->nullable(); // in km
            $table->integer('cruise_speed')->nullable(); // in km/h
            $table->string('manufacturer')->nullable();
            $table->integer('year_manufactured')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->index('is_active');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aircraft');
    }
};
