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
        Schema::create('global_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('country_name');
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('introduction');
            $table->string('regulatory_body');
            $table->integer('total_hours_required');
            $table->json('training_steps');
            $table->json('flying_hours_breakdown');
            $table->json('advantages');
            $table->json('images')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('slug');
            $table->index('is_active');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_destinations');
    }
};
