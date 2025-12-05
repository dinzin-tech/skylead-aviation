<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalDestination extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_name',
        'slug',
        'title',
        'introduction',
        'regulatory_body',
        'total_hours_required',
        'training_steps',
        'flying_hours_breakdown',
        'advantages',
        'images',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'training_steps' => 'array',
        'flying_hours_breakdown' => 'array',
        'advantages' => 'array',
        'images' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('country_name');
    }

    // Accessor for formatted data
    public function getFormattedTrainingStepsAttribute()
    {
        return $this->training_steps ?? [];
    }

    public function getFormattedHoursBreakdownAttribute()
    {
        return $this->flying_hours_breakdown ?? [];
    }

    public function getFormattedAdvantagesAttribute()
    {
        return $this->advantages ?? [];
    }
}