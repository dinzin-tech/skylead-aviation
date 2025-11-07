<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionElement;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionElementController extends Controller
{
    public function create(PageSection $pageSection)
    {
        $elementTypes = SectionElement::getElementTypes();
        $colorOptions = SectionElement::getColorOptions();
        
        return view('admin.page-builder.elements.create', compact('pageSection', 'elementTypes', 'colorOptions'));
    }

    public function store(Request $request, PageSection $pageSection)
    {
        $validated = $request->validate([
            'element_type' => 'required|string|max:50',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon_class' => 'nullable|string|max:100',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'button_color' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('section-elements', 'public');
        }

        $pageSection->elements()->create($validated);

        return redirect()->route('admin.page-builder.edit', $pageSection)
            ->with('success', 'Element added successfully.');
    }

    public function edit(PageSection $pageSection, SectionElement $element)
    {
        $elementTypes = SectionElement::getElementTypes();
        $colorOptions = SectionElement::getColorOptions();
        
        return view('admin.page-builder.elements.edit', compact('pageSection', 'element', 'elementTypes', 'colorOptions'));
    }

    public function update(Request $request, PageSection $pageSection, SectionElement $element)
    {
        $validated = $request->validate([
            'element_type' => 'required|string|max:50',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon_class' => 'nullable|string|max:100',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'button_color' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($element->image_path) {
                Storage::disk('public')->delete($element->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('section-elements', 'public');
        }

        $element->update($validated);

        return redirect()->route('admin.page-builder.edit', $pageSection)
            ->with('success', 'Element updated successfully.');
    }

    public function destroy(PageSection $pageSection, SectionElement $element)
    {
        if ($element->image_path) {
            Storage::disk('public')->delete($element->image_path);
        }

        $element->delete();

        return redirect()->route('admin.page-builder.edit', $pageSection)
            ->with('success', 'Element deleted successfully.');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'elements' => 'required|array',
            'elements.*.id' => 'required|exists:section_elements,id',
            'elements.*.sort_order' => 'required|integer'
        ]);

        foreach ($request->elements as $element) {
            SectionElement::where('id', $element['id'])->update(['sort_order' => $element['sort_order']]);
        }

        return response()->json(['success' => true]);
    }
}