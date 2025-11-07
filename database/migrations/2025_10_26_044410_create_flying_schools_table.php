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
        Schema::create('flying_schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('location');
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->string('course_duration');
            $table->integer('fleet_size')->nullable();
            $table->integer('flying_hours')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('country_id');
            $table->index('is_active');
            $table->index('sort_order');
        });

        // Pivot table for many-to-many relationship with aircrafts
        Schema::create('flying_school_aircraft', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flying_school_id')->constrained()->onDelete('cascade');
            $table->foreignId('aircraft_id')->constrained('aircraft')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['flying_school_id', 'aircraft_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('flying_schools');
        Schema::dropIfExists('flying_school_aircraft');
        Schema::dropIfExists('flying_schools');
    }
};
