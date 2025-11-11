<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        // Regular course fields
        'hero_description',
        // Cadet program fields
        'program_tag',
        'program_level',
        'hero_description_1',
        'hero_description_2',
        'benefits',
        'duration',
        'rating',
        'number_of_students',
        // Common fields
        'video_url',
        'hero_image',
        'requirements',
        'selection_process',
        'training_stages',
        'objectives',
        'eligibility',
        'outline',
        'fee',
        'available_seats',
        'schedule',
        'rating_categories',
        'published'
    ];

    protected $casts = [
        'requirements' => 'array',
        'selection_process' => 'array',
        'training_stages' => 'array',
        'outline' => 'array',
        'rating_categories' => 'array',
        'benefits' => 'array',
        'fee' => 'decimal:2',
        'rating' => 'decimal:1',
        'number_of_students' => 'integer',
        'published' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->title);
                
                // Ensure slug is unique
                $originalSlug = $course->slug;
                $count = 1;
                while (static::where('slug', $course->slug)->exists()) {
                    $course->slug = $originalSlug . '-' . $count++;
                }
            }
        });

        static::updating(function ($course) {
            if ($course->isDirty('title') && empty($course->getOriginal('slug'))) {
                $course->slug = Str::slug($course->title);
                
                // Ensure slug is unique
                $originalSlug = $course->slug;
                $count = 1;
                while (static::where('slug', $course->slug)->where('id', '!=', $course->id)->exists()) {
                    $course->slug = $originalSlug . '-' . $count++;
                }
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Helper method to check if it's a cadet program
    public function isCadetProgram()
    {
        return $this->type === 'cadet_program';
    }

    // Helper method to check if it's a regular course
    public function isRegularCourse()
    {
        return $this->type === 'regular_course';
    }
}