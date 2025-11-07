<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aircraft;
use Illuminate\Support\Facades\Storage;

class AircraftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aircrafts = Aircraft::ordered()->paginate(10);
        return view('admin.aircrafts.index', compact('aircrafts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.aircrafts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'nullable|string|max:255',
            'registration_number' => 'nullable|string|max:50|unique:aircrafts',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'capacity' => 'nullable|integer|min:1',
            'range' => 'nullable|integer|min:0',
            'cruise_speed' => 'nullable|integer|min:0',
            'manufacturer' => 'nullable|string|max:255',
            'year_manufactured' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('aircrafts', 'public');
        }

        Aircraft::create($validated);

        return redirect()->route('admin.aircrafts.index')
            ->with('success', 'Aircraft added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aircraft $aircraft)
    {
        return view('admin.aircrafts.edit', compact('aircraft'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aircraft $aircraft)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'nullable|string|max:255',
            'registration_number' => 'nullable|string|max:50|unique:aircrafts,registration_number,' . $aircraft->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'capacity' => 'nullable|integer|min:1',
            'range' => 'nullable|integer|min:0',
            'cruise_speed' => 'nullable|integer|min:0',
            'manufacturer' => 'nullable|string|max:255',
            'year_manufactured' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aircraft->image) {
                Storage::disk('public')->delete($aircraft->image);
            }
            $validated['image'] = $request->file('image')->store('aircrafts', 'public');
        }

        $aircraft->update($validated);

        return redirect()->route('admin.aircrafts.index')
            ->with('success', 'Aircraft updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aircraft $aircraft)
    {
        // Delete image if exists
        if ($aircraft->image) {
            Storage::disk('public')->delete($aircraft->image);
        }

        $aircraft->delete();

        return redirect()->route('admin.aircrafts.index')
            ->with('success', 'Aircraft deleted successfully.');
    }
}
