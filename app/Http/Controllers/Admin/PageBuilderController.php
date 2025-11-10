<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use App\Models\SectionElement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Page;

class PageBuilderController extends Controller
{
    public function index()
    {
        // $sections = PageSection::with('elements')
        // $sections = PageSection::with(['page', 'elements'])
        // $sections = PageSection::active()
        //     ->ordered()
        //     ->paginate(10);

        // $sections = PageSection::paginate(10);

        // dump(PageSection::count());
        // dump(PageSection::active()->count());
        // dump(PageSection::paginate(10)->items());
        
        $sections = PageSection::orderBy('sort_order')->get();

        return view('admin.page-builder.index', compact('sections'));
    }

    public function create()
    {
        // $pages = $this->getAvailablePages();
        $pages = Page::active()->orderBy('name')->pluck('name', 'slug');
        $layoutTypes = $this->getLayoutTypes();
        
        return view('admin.page-builder.create', compact('pages', 'layoutTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255',
            'section_name' => 'required|string|max:255',
            'section_header' => 'nullable|string|max:255',
            'section_description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
            'background_color' => 'nullable|string|max:50',
            'text_color' => 'nullable|string|max:50',
            'layout_type' => 'required|string|max:50'
        ]);

        PageSection::create($validated);

        return redirect()->route('admin.page-builder.index')
            ->with('success', 'Page section created successfully.');
    }

    public function edit(PageSection $pageSection)
    {
        $pages = $this->getAvailablePages();
        $layoutTypes = $this->getLayoutTypes();
        $pageSection->load('elements');

        return view('admin.page-builder.edit', compact('pageSection', 'pages', 'layoutTypes'));
    }

    public function update(Request $request, PageSection $pageSection)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255',
            'section_name' => 'required|string|max:255',
            'section_header' => 'nullable|string|max:255',
            'section_description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
            'background_color' => 'nullable|string|max:50',
            'text_color' => 'nullable|string|max:50',
            'layout_type' => 'required|string|max:50'
        ]);

        $pageSection->update($validated);

        return redirect()->route('admin.page-builder.index')
            ->with('success', 'Page section updated successfully.');
    }

    public function destroy(PageSection $pageSection)
    {
        // Delete associated elements' images
        foreach ($pageSection->elements as $element) {
            if ($element->image_path) {
                Storage::disk('public')->delete($element->image_path);
            }
        }

        $pageSection->delete();

        return redirect()->route('admin.page-builder.index')
            ->with('success', 'Page section deleted successfully.');
    }

    private function getAvailablePages()
    {
        // return [
        //     'home' => 'Home Page',
        //     'about' => 'About Page',
        //     'services' => 'Services Page',
        //     'fleet' => 'Fleet Page',
        //     'training' => 'Training Page',
        //     'contact' => 'Contact Page',
        //     'blog' => 'Blog Page'
        // ];

        return Page::active()->orderBy('name')->pluck('name', 'slug')->toArray();
    }

    private function getLayoutTypes()
    {
        return [
            'default' => 'Default',
            'grid' => 'Grid Layout',
            'carousel' => 'Carousel',
            'cards' => 'Cards Layout',
            'split' => 'Split Screen',
            'hero' => 'Hero Section'
        ];
    }
}