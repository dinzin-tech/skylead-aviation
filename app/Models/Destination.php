<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'country_name',
        'country_title',
        'country_description',
        'no_of_schools',
        'location',
        'images',
        'guide',
        'gallery',
        'advantages',
        'courses_offered',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'images' => 'array',
        'guide' => 'array',
        'gallery' => 'array',
        'advantages' => 'array',
        'courses_offered' => 'array',
        'is_active' => 'boolean'
    ];

    // Many-to-many relationship with flying schools
    public function flyingSchools()
    {
        return $this->belongsToMany(FlyingSchool::class, 'destination_flying_school');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('country_name');
    }

    // Helper to get flying school IDs
    public function getFlyingSchoolIdsAttribute()
    {
        return $this->flyingSchools->pluck('id')->toArray();
    }

    // Accessor for formatted data
    public function getFormattedGuideAttribute()
    {
        return $this->guide ?? [];
    }

    public function getFormattedAdvantagesAttribute()
    {
        return $this->advantages ?? [];
    }

    public function getFormattedCoursesAttribute()
    {
        return $this->courses_offered ?? [];
    }
}