<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlyingSchool extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'country_id',
        'course_duration',
        'fleet_size',
        'flying_hours',
        'description',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'fleet_size' => 'integer',
        'flying_hours' => 'integer'
    ];

    // Relationship with Country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Many-to-many relationship with Aircrafts
    public function aircrafts()
    {
        // return $this->belongsToMany(Aircraft::class, 'flying_school_aircraft');
        return $this->belongsToMany(Aircraft::class, 'flying_school_aircraft', 'flying_school_id', 'aircraft_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    // Helper method to get aircraft IDs
    public function getAircraftIdsAttribute()
    {
        return $this->aircrafts->pluck('id')->toArray();
    }

    // Add destinations relationship
    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'destination_flying_school');
    }
}