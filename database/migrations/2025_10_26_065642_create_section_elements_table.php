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
        Schema::create('section_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_section_id')->constrained()->onDelete('cascade');
            $table->string('element_type'); // text, image, icon, button, etc.
            $table->text('content')->nullable(); // For text content
            $table->string('image_path')->nullable(); // For images
            $table->string('icon_class')->nullable(); // For icons (Bootstrap classes)
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('button_color')->default('primary');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->json('custom_styles')->nullable(); // For custom CSS styles
            $table->timestamps();

            $table->index(['page_section_id', 'sort_order']);
            $table->index('element_type');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_elements');
    }
};
