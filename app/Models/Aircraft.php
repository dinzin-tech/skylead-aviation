<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FlyingSchool;

class Aircraft extends Model
{
    use HasFactory;

    protected $table = 'aircraft';

    protected $fillable = [
        'name',
        'model',
        'registration_number',
        'description',
        'image',
        'capacity',
        'range',
        'cruise_speed',
        'manufacturer',
        'year_manufactured',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'capacity' => 'integer',
        'range' => 'integer',
        'cruise_speed' => 'integer',
        'year_manufactured' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function flyingSchools()
    {
        return $this->belongsToMany(FlyingSchool::class, 'flying_school_aircraft', 'aircraft_id', 'flying_school_id');
    }
}