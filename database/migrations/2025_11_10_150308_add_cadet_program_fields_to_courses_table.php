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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('program_tag')->nullable()->after('type');
            $table->string('program_level')->nullable()->after('program_tag');
            $table->text('hero_description_1')->nullable()->after('hero_description');
            $table->text('hero_description_2')->nullable()->after('hero_description_1');
            $table->json('benefits')->nullable()->after('hero_description_2');
            $table->string('duration')->nullable()->after('benefits');
            $table->decimal('rating', 3, 1)->default(0)->after('duration');
            $table->integer('number_of_students')->default(0)->after('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
        
            $table->dropColumn([
                'program_tag',
                'program_level',
                'hero_description_1',
                'hero_description_2',
                'benefits',
                'duration',
                'rating',
                'number_of_students'
            ]);
        });
    }
};
