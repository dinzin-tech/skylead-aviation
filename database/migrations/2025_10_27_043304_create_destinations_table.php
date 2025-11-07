<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('country_name');
            $table->string('country_title');
            $table->text('country_description');
            $table->integer('no_of_schools')->default(0);
            $table->string('location');
            $table->json('images')->nullable();
            $table->json('guide')->nullable();
            $table->json('gallery')->nullable();
            $table->json('advantages')->nullable();
            $table->json('courses_offered')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->index('slug');
            $table->index('is_active');
            $table->index('sort_order');
        });

        // Pivot table for destinations and flying schools
        Schema::create('destination_flying_school', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained()->onDelete('cascade');
            $table->foreignId('flying_school_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['destination_id', 'flying_school_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('destination_flying_school');
        Schema::dropIfExists('destinations');
    }
};