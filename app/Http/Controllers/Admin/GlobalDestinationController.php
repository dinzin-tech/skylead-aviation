<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GlobalDestinationController extends Controller
{
    public function index()
    {
        $destinations = GlobalDestination::ordered()->paginate(10);
        return view('admin.global-destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('admin.global-destinations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'country_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:global_destinations',
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'regulatory_body' => 'required|string|max:255',
            'total_hours_required' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Process structured data
        $validated['training_steps'] = $this->processTrainingSteps($request);
        $validated['flying_hours_breakdown'] = $this->processHoursBreakdown($request);
        $validated['advantages'] = $this->processAdvantages($request);
        $validated['images'] = $this->processImageUploads($request);

        GlobalDestination::create($validated);

        return redirect()->route('admin.global-destinations.index')
            ->with('success', 'Global destination created successfully.');
    }

    public function edit(GlobalDestination $globalDestination)
    {
        return view('admin.global-destinations.edit', compact('globalDestination'));
    }

    public function update(Request $request, GlobalDestination $globalDestination)
    {
        $validated = $request->validate([
            'country_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:global_destinations,slug,' . $globalDestination->id,
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'regulatory_body' => 'required|string|max:255',
            'total_hours_required' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Process structured data
        $validated['training_steps'] = $this->processTrainingSteps($request, $globalDestination->training_steps);
        $validated['flying_hours_breakdown'] = $this->processHoursBreakdown($request, $globalDestination->flying_hours_breakdown);
        $validated['advantages'] = $this->processAdvantages($request, $globalDestination->advantages);
        
        // Handle image uploads
        $newImages = $this->processImageUploads($request);
        if (!empty($newImages)) {
            $validated['images'] = array_merge($globalDestination->images ?? [], $newImages);
        } else {
            $validated['images'] = $globalDestination->images;
        }

        $globalDestination->update($validated);

        return redirect()->route('admin.global-destinations.index')
            ->with('success', 'Global destination updated successfully.');
    }

    public function destroy(GlobalDestination $globalDestination)
    {
        // Delete uploaded images
        if ($globalDestination->images) {
            foreach ($globalDestination->images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $globalDestination->delete();

        return redirect()->route('admin.global-destinations.index')
            ->with('success', 'Global destination deleted successfully.');
    }

    /**
     * Process training steps
     */
    private function processTrainingSteps(Request $request, $existing = [])
    {
        $steps = [];
        
        if ($request->filled('step_titles') && $request->filled('step_descriptions')) {
            $titles = $request->input('step_titles', []);
            $descriptions = $request->input('step_descriptions', []);
            $hours = $request->input('step_hours', []);
            
            foreach ($titles as $index => $title) {
                if (!empty($title) && !empty($descriptions[$index])) {
                    $steps[] = [
                        'title' => $title,
                        'description' => $descriptions[$index],
                        'hours' => $hours[$index] ?? null
                    ];
                }
            }
        }
        
        return !empty($steps) ? $steps : $existing;
    }

    /**
     * Process flying hours breakdown
     */
    private function processHoursBreakdown(Request $request, $existing = [])
    {
        $breakdown = [];
        
        if ($request->filled('breakdown_stages') && $request->filled('breakdown_hours')) {
            $stages = $request->input('breakdown_stages', []);
            $hours = $request->input('breakdown_hours', []);
            $notes = $request->input('breakdown_notes', []);
            
            foreach ($stages as $index => $stage) {
                if (!empty($stage)) {
                    $breakdown[] = [
                        'stage' => $stage,
                        'hours' => $hours[$index] ?? '',
                        'notes' => $notes[$index] ?? ''
                    ];
                }
            }
        }
        
        return !empty($breakdown) ? $breakdown : $existing;
    }

    /**
     * Process advantages
     */
    private function processAdvantages(Request $request, $existing = [])
    {
        $advantages = [];
        
        if ($request->filled('advantages')) {
            $advantages = array_filter($request->input('advantages', []));
        }
        
        return !empty($advantages) ? $advantages : $existing;
    }

    /**
     * Process image uploads
     */
    private function processImageUploads(Request $request)
    {
        $filePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if ($file->isValid()) {
                    $filePaths[] = $file->store('global-destinations', 'public');
                }
            }
        }

        return $filePaths;
    }
}