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
        Schema::create('dgca_syllabus', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name');
            $table->string('slug')->unique();
            $table->string('icon');
            $table->text('description');
            $table->string('benefit');
            $table->text('detail')->nullable();
            $table->json('topics')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dgca_syllabus');
    }
};
