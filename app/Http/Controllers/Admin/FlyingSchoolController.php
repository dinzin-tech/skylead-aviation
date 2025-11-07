<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FlyingSchool;
use App\Models\Country;
use App\Models\Aircraft;

class FlyingSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flyingSchools = FlyingSchool::with(['country', 'aircrafts'])
            ->ordered()
            ->paginate(10);
            
        return view('admin.flying-schools.index', compact('flyingSchools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::active()->orderBy('name')->get();
        $aircrafts = Aircraft::active()->ordered()->get();
        
        return view('admin.flying-schools.create', compact('countries', 'aircrafts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'course_duration' => 'required|string|max:255',
            'fleet_size' => 'nullable|integer|min:0',
            'flying_hours' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'aircrafts' => 'nullable|array',
            'aircrafts.*' => 'exists:aircraft,id',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $flyingSchool = FlyingSchool::create($validated);

        // Sync aircrafts (many-to-many relationship)
        if ($request->has('aircrafts')) {
            $flyingSchool->aircrafts()->sync($request->aircrafts);
        }

        return redirect()->route('admin.flying-schools.index')
            ->with('success', 'Flying school created successfully.');
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
    public function edit(FlyingSchool $flyingSchool)
    {
        $countries = Country::active()->orderBy('name')->get();
        $aircrafts = Aircraft::active()->ordered()->get();
        $flyingSchool->load('aircrafts');

        return view('admin.flying-schools.edit', compact('flyingSchool', 'countries', 'aircrafts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FlyingSchool $flyingSchool)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'course_duration' => 'required|string|max:255',
            'fleet_size' => 'nullable|integer|min:0',
            'flying_hours' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'aircrafts' => 'nullable|array',
            'aircrafts.*' => 'exists:aircrafts,id',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $flyingSchool->update($validated);

        // Sync aircrafts
        $flyingSchool->aircrafts()->sync($request->aircrafts ?? []);

        return redirect()->route('admin.flying-schools.index')
            ->with('success', 'Flying school updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlyingSchool $flyingSchool)
    {
        $flyingSchool->delete();

        return redirect()->route('admin.flying-schools.index')
            ->with('success', 'Flying school deleted successfully.');
    }
}
