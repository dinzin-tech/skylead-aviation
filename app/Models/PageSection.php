<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use App\Models\SectionElement;

// class PageSection extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'page_name',
//         'section_name',
//         'section_header',
//         'section_description',
//         'sort_order',
//         'is_active',
//         'background_color',
//         'text_color',
//         'layout_type'
//     ];

//     protected $casts = [
//         'is_active' => 'boolean',
//         'custom_styles' => 'array'
//     ];

//     // Relationship with elements
//     public function elements()
//     {
//         return $this->hasMany(SectionElement::class)->orderBy('sort_order');
//     }

//     public function scopeActive($query)
//     {
//         return $query->where('is_active', true);
//     }

//     public function scopeForPage($query, $pageName)
//     {
//         return $query->where('page_name', $pageName);
//     }

//     public function scopeOrdered($query)
//     {
//         return $query->orderBy('sort_order')->orderBy('id');
//     }

//     // Get active elements only
//     public function activeElements()
//     {
//         return $this->elements()->where('is_active', true)->orderBy('sort_order');
//     }
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name', // This will now store the page slug
        'section_name',
        'section_header',
        'section_description',
        'sort_order',
        'is_active',
        'background_color',
        'text_color',
        'layout_type'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'custom_styles' => 'array'
    ];

    // Relationship with page
    public function page()
    {
        return $this->belongsTo(Page::class, 'page_name', 'slug');
    }

    // Relationship with elements
    public function elements()
    {
        return $this->hasMany(SectionElement::class)->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForPage($query, $pageSlug)
    {
        return $query->where('page_name', $pageSlug);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    // Get active elements only
    public function activeElements()
    {
        return $this->elements()->where('is_active', true)->orderBy('sort_order');
    }
}