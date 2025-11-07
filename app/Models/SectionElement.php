<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionElement extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_section_id',
        'element_type',
        'content',
        'image_path',
        'icon_class',
        'title',
        'description',
        'button_text',
        'button_url',
        'button_color',
        'sort_order',
        'is_active',
        'custom_styles'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'custom_styles' => 'array'
    ];

    // Relationship with section
    public function section()
    {
        return $this->belongsTo(PageSection::class, 'page_section_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    // Element type options
    public static function getElementTypes()
    {
        return [
            'text' => 'Text Content',
            'image' => 'Image',
            'icon' => 'Icon',
            'button' => 'Button',
            'heading' => 'Heading',
            'divider' => 'Divider',
            'card' => 'Card',
            'testimonial' => 'Testimonial',
            'feature' => 'Feature Item'
        ];
    }

    // Bootstrap color options
    public static function getColorOptions()
    {
        return [
            'primary' => 'Primary (Blue)',
            'secondary' => 'Secondary (Gray)',
            'success' => 'Success (Green)',
            'danger' => 'Danger (Red)',
            'warning' => 'Warning (Yellow)',
            'info' => 'Info (Cyan)',
            'light' => 'Light',
            'dark' => 'Dark'
        ];
    }
}