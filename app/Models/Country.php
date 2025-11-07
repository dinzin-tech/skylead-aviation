<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FlyingSchool;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'flag_image',
        'is_active'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_active' => 'boolean'
    ];

    public function flyingSchools()
    {
        return $this->hasMany(FlyingSchool::class);
    }

    // Scope for active countries
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}