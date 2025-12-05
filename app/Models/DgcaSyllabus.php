<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class DgcaSyllabus extends Model
{
    use HasFactory;
    protected $table = 'dgca_syllabus';

    protected $fillable = [
        'subject_name',
        'slug',
        'icon',
        'description',
        'benefit',
        'detail',
        'is_active',
        'sort_order',
        'topics' // Make sure topics is in fillable
    ];

    protected $casts = [
        'is_active' => 'boolean',
        // Remove 'topics' from casts since we're using accessor
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope active subjects
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope ordered by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('subject_name');
    }

    /**
     * Accessor for topics with default empty array
     */
    protected function topics(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (is_null($value) || $value === '') {
                    return [];
                }
                
                // Handle both JSON string and already decoded array
                if (is_string($value)) {
                    $decoded = json_decode($value, true);
                    return is_array($decoded) ? $decoded : [];
                }
                
                return is_array($value) ? $value : [];
            },
            set: function ($value) {
                if (is_null($value) || $value === '') {
                    return json_encode([]);
                }
                
                // Ensure we're encoding an array
                if (is_array($value)) {
                    return json_encode($value);
                }
                
                // If it's already JSON string, return as is
                if (is_string($value) && json_decode($value) !== null) {
                    return $value;
                }
                
                return json_encode([]);
            }
        );
    }

    /**
     * Get active topics only
     */
    public function getActiveTopicsAttribute()
    {
        return collect($this->topics)->filter(function ($topic) {
            return $topic['is_active'] ?? true;
        })->values()->toArray();
    }

    /**
     * Get total topics count
     */
    public function getTotalTopicsAttribute()
    {
        return count($this->topics);
    }

    /**
     * Get active topics count
     */
    public function getActiveTopicsCountAttribute()
    {
        return count($this->active_topics);
    }
}