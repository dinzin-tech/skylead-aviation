<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'title',
        'meta_description',
        'is_active',
        'show_in_menu',
        'menu_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_in_menu' => 'boolean'
    ];

    // Relationship with sections
    public function sections()
    {
        return $this->hasMany(PageSection::class, 'page_name', 'slug')->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeMenu($query)
    {
        return $query->where('show_in_menu', true)->orderBy('menu_order');
    }

    public function getUrlAttribute()
    {
        return route('page.show', $this->slug);
    }
}