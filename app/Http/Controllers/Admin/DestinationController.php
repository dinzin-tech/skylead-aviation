<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Destination;
// use App\Models\FlyingSchool;
// use App\Models\Country;
// use Illuminate\Support\Str;

// class DestinationController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $destinations = Destination::with(['flyingSchools', 'flyingSchools.country'])
//             ->ordered()
//             ->paginate(10);
            
//         return view('admin.destinations.index', compact('destinations'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         $flyingSchools = FlyingSchool::with('country')->active()->ordered()->get();
//         $countries = Country::active()->orderBy('name')->get();
        
//         return view('admin.destinations.create', compact('flyingSchools', 'countries'));
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'slug' => 'required|string|max:255|unique:destinations',
//             'country_name' => 'required|string|max:255',
//             'country_title' => 'required|string|max:255',
//             'country_description' => 'required|string',
//             'no_of_schools' => 'required|integer|min:0',
//             'location' => 'required|string|max:255',
//             'flying_schools' => 'nullable|array',
//             'flying_schools.*' => 'exists:flying_schools,id',
//             'is_active' => 'boolean',
//             'sort_order' => 'nullable|integer'
//         ]);

//         // Handle JSON fields
//         $validated['images'] = $this->processImages($request);
//         $validated['guide'] = $this->processGuide($request);
//         $validated['gallery'] = $this->processGallery($request);
//         $validated['advantages'] = $this->processAdvantages($request);
//         $validated['courses_offered'] = $this->processCourses($request);

//         $destination = Destination::create($validated);

//         // Sync flying schools
//         if ($request->has('flying_schools')) {
//             $destination->flyingSchools()->sync($request->flying_schools);
//         }

//         return redirect()->route('admin.destinations.index')
//             ->with('success', 'Destination created successfully.');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Destination $destination)
//     {
//         $flyingSchools = FlyingSchool::with('country')->active()->ordered()->get();
//         $countries = Country::active()->orderBy('name')->get();
//         $destination->load('flyingSchools');

//         return view('admin.destinations.edit', compact('destination', 'flyingSchools', 'countries'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Destination $destination)
//     {
//         $validated = $request->validate([
//             'slug' => 'required|string|max:255|unique:destinations,slug,' . $destination->id,
//             'country_name' => 'required|string|max:255',
//             'country_title' => 'required|string|max:255',
//             'country_description' => 'required|string',
//             'no_of_schools' => 'required|integer|min:0',
//             'location' => 'required|string|max:255',
//             'flying_schools' => 'nullable|array',
//             'flying_schools.*' => 'exists:flying_schools,id',
//             'is_active' => 'boolean',
//             'sort_order' => 'nullable|integer'
//         ]);

//         // Handle JSON fields
//         $validated['images'] = $this->processImages($request, $destination->images);
//         $validated['guide'] = $this->processGuide($request, $destination->guide);
//         $validated['gallery'] = $this->processGallery($request, $destination->gallery);
//         $validated['advantages'] = $this->processAdvantages($request, $destination->advantages);
//         $validated['courses_offered'] = $this->processCourses($request, $destination->courses_offered);

//         $destination->update($validated);

//         // Sync flying schools
//         $destination->flyingSchools()->sync($request->flying_schools ?? []);

//         return redirect()->route('admin.destinations.index')
//             ->with('success', 'Destination updated successfully.');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Destination $destination)
//     {
//         $destination->delete();

//         return redirect()->route('admin.destinations.index')
//             ->with('success', 'Destination deleted successfully.');
//     }

//     /**
//      * Process images array
//      */
//     private function processImages(Request $request, $existing = null)
//     {
//         $images = $existing ?? [];
        
//         if ($request->filled('images')) {
//             $newImages = array_filter($request->input('images', []));
//             $images = array_merge($images, $newImages);
//         }
        
//         return array_values(array_unique($images));
//     }

//     /**
//      * Process guide array
//      */
//     private function processGuide(Request $request, $existing = null)
//     {
//         $guides = [];
        
//         if ($request->filled('guide_titles') && $request->filled('guide_values')) {
//             $titles = $request->input('guide_titles', []);
//             $values = $request->input('guide_values', []);
            
//             foreach ($titles as $index => $title) {
//                 if (!empty($title) && !empty($values[$index])) {
//                     $guides[] = [
//                         'title' => $title,
//                         'value' => $values[$index]
//                     ];
//                 }
//             }
//         }
        
//         return !empty($guides) ? $guides : $existing;
//     }

//     /**
//      * Process gallery array
//      */
//     private function processGallery(Request $request, $existing = null)
//     {
//         $gallery = $existing ?? [];
        
//         if ($request->filled('gallery')) {
//             $newGallery = array_filter($request->input('gallery', []));
//             $gallery = array_merge($gallery, $newGallery);
//         }
        
//         return array_values(array_unique($gallery));
//     }

//     /**
//      * Process advantages array
//      */
//     private function processAdvantages(Request $request, $existing = null)
//     {
//         $advantages = [];
        
//         if ($request->filled('advantages')) {
//             $advantages = array_filter($request->input('advantages', []));
//         }
        
//         return !empty($advantages) ? $advantages : $existing;
//     }

//     /**
//      * Process courses offered array
//      */
//     private function processCourses(Request $request, $existing = null)
//     {
//         $courses = [];
        
//         if ($request->filled('course_titles') && $request->filled('course_descriptions')) {
//             $titles = $request->input('course_titles', []);
//             $descriptions = $request->input('course_descriptions', []);
//             $subtitles = $request->input('course_subtitles', []);
//             $logos = $request->input('course_logos', []);
//             $icons = $request->input('course_icons', []);
            
//             foreach ($titles as $index => $title) {
//                 if (!empty($title) && !empty($descriptions[$index])) {
//                     $courses[] = [
//                         'title' => $title,
//                         'subtitle' => $subtitles[$index] ?? '',
//                         'description' => $descriptions[$index],
//                         'logo' => $logos[$index] ?? '',
//                         'icon' => $icons[$index] ?? 'fas fa-plane'
//                     ];
//                 }
//             }
//         }
        
//         return !empty($courses) ? $courses : $existing;
//     }
// }


// ////////////////////////////////// new code

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\FlyingSchool;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::with(['flyingSchools', 'flyingSchools.country'])
            ->ordered()
            ->paginate(10);
            
        return view('admin.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flyingSchools = FlyingSchool::with('country')->active()->ordered()->get();
        $countries = Country::active()->orderBy('name')->get();
        
        return view('admin.destinations.create', compact('flyingSchools', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:destinations',
            'country_name' => 'required|string|max:255',
            'country_title' => 'required|string|max:255',
            'country_description' => 'required|string',
            'no_of_schools' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'flying_schools' => 'nullable|array',
            'flying_schools.*' => 'exists:flying_schools,id',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
            // File validation
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'course_logos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        // Handle file uploads
        $validated['images'] = $this->processImageUploads($request, 'images', 'destinations/images');
        $validated['gallery'] = $this->processImageUploads($request, 'gallery', 'destinations/gallery');
        $courseLogos = $this->processCourseLogos($request);

        $validated['guide'] = $this->processGuide($request);
        $validated['advantages'] = $this->processAdvantages($request);
        $validated['courses_offered'] = $this->processCourses($request, $courseLogos);

        $destination = Destination::create($validated);

        // Sync flying schools
        if ($request->has('flying_schools')) {
            $destination->flyingSchools()->sync($request->flying_schools);
        }

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        $flyingSchools = FlyingSchool::with('country')->active()->ordered()->get();
        $countries = Country::active()->orderBy('name')->get();
        $destination->load('flyingSchools');

        return view('admin.destinations.edit', compact('destination', 'flyingSchools', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:destinations,slug,' . $destination->id,
            'country_name' => 'required|string|max:255',
            'country_title' => 'required|string|max:255',
            'country_description' => 'required|string',
            'no_of_schools' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'flying_schools' => 'nullable|array',
            'flying_schools.*' => 'exists:flying_schools,id',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
            // File validation
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'course_logos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        // Handle file uploads
        $validated['images'] = $this->processImageUploads($request, 'images', 'destinations/images', $destination->images);
        $validated['gallery'] = $this->processImageUploads($request, 'gallery', 'destinations/gallery', $destination->gallery);
        $courseLogos = $this->processCourseLogos($request, $destination->courses_offered);

        $validated['guide'] = $this->processGuide($request, $destination->guide);
        $validated['advantages'] = $this->processAdvantages($request, $destination->advantages);
        $validated['courses_offered'] = $this->processCourses($request, $courseLogos, $destination->courses_offered);

        $destination->update($validated);

        // Sync flying schools
        $destination->flyingSchools()->sync($request->flying_schools ?? []);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        // Delete uploaded files
        $this->deleteUploadedFiles($destination->images);
        $this->deleteUploadedFiles($destination->gallery);
        
        // Delete course logos
        if ($destination->courses_offered) {
            foreach ($destination->courses_offered as $course) {
                if (!empty($course['logo']) && Storage::disk('public')->exists($course['logo'])) {
                    Storage::disk('public')->delete($course['logo']);
                }
            }
        }

        $destination->delete();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination deleted successfully.');
    }

    /**
     * Process image uploads for images and gallery
     */
    private function processImageUploads(Request $request, $fieldName, $storagePath, $existing = [])
    {
        $filePaths = $existing ?? [];

        if ($request->hasFile($fieldName)) {
            foreach ($request->file($fieldName) as $file) {
                if ($file->isValid()) {
                    $filePaths[] = $file->store($storagePath, 'public');
                }
            }
        }

        return $filePaths;
    }

    /**
     * Process course logo uploads
     */
    private function processCourseLogos(Request $request, $existingCourses = [])
    {
        $logos = [];

        if ($request->hasFile('course_logos')) {
            $logoFiles = $request->file('course_logos');
            $logoIndexes = $request->input('course_logo_indexes', []);

            foreach ($logoIndexes as $index) {
                if (isset($logoFiles[$index]) && $logoFiles[$index]->isValid()) {
                    $logos[$index] = $logoFiles[$index]->store('destinations/course-logos', 'public');
                }
            }
        }

        // Preserve existing logos for courses that don't have new uploads
        if ($existingCourses) {
            foreach ($existingCourses as $index => $course) {
                if (!empty($course['logo']) && !isset($logos[$index])) {
                    $logos[$index] = $course['logo'];
                }
            }
        }

        return $logos;
    }

    /**
     * Process guide array
     */
    private function processGuide(Request $request, $existing = null)
    {
        $guides = [];
        
        if ($request->filled('guide_titles') && $request->filled('guide_values')) {
            $titles = $request->input('guide_titles', []);
            $values = $request->input('guide_values', []);
            
            foreach ($titles as $index => $title) {
                if (!empty($title) && !empty($values[$index])) {
                    $guides[] = [
                        'title' => $title,
                        'value' => $values[$index]
                    ];
                }
            }
        }
        
        return !empty($guides) ? $guides : $existing;
    }

    /**
     * Process advantages array
     */
    private function processAdvantages(Request $request, $existing = null)
    {
        $advantages = [];
        
        if ($request->filled('advantages')) {
            $advantages = array_filter($request->input('advantages', []));
        }
        
        return !empty($advantages) ? $advantages : $existing;
    }

    /**
     * Process courses offered array
     */
    private function processCourses(Request $request, $courseLogos = [], $existing = null)
    {
        $courses = [];
        
        if ($request->filled('course_titles') && $request->filled('course_descriptions')) {
            $titles = $request->input('course_titles', []);
            $descriptions = $request->input('course_descriptions', []);
            $subtitles = $request->input('course_subtitles', []);
            $icons = $request->input('course_icons', []);
            
            foreach ($titles as $index => $title) {
                if (!empty($title) && !empty($descriptions[$index])) {
                    $courses[] = [
                        'title' => $title,
                        'subtitle' => $subtitles[$index] ?? '',
                        'description' => $descriptions[$index],
                        'logo' => $courseLogos[$index] ?? '',
                        'icon' => $icons[$index] ?? 'fas fa-plane'
                    ];
                }
            }
        }
        
        return !empty($courses) ? $courses : $existing;
    }

    /**
     * Delete uploaded files
     */
    private function deleteUploadedFiles($filePaths)
    {
        if ($filePaths) {
            foreach ($filePaths as $filePath) {
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }
        }
    }
}