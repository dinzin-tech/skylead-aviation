<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type')->default('regular_course');
            $table->text('hero_description')->nullable();
            $table->string('video_url')->nullable();
            $table->string('hero_image')->nullable();
            $table->json('requirements')->nullable();
            $table->json('selection_process')->nullable();
            $table->json('training_stages')->nullable();
            $table->text('objectives')->nullable();
            $table->text('eligibility')->nullable();
            $table->json('outline')->nullable();
            $table->decimal('fee', 10, 2)->default(0);
            $table->integer('available_seats')->default(0);
            $table->string('schedule')->nullable();
            $table->json('rating_categories')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};