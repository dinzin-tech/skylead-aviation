<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        // Base validation rules - all fields are optional except the basics
        $validationRules = [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:courses,slug',
            'type' => 'required|in:regular_course,cadet_program',
            'hero_description' => 'required|string',
            'video_url' => 'nullable|url',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'objectives' => 'nullable|string',
            'eligibility' => 'nullable|string',
            'fee' => 'nullable|numeric',
            'available_seats' => 'nullable|integer',
            'schedule' => 'nullable|string',
            'published' => 'boolean',
            // Cadet program fields - all optional
            'program_tag' => 'nullable|string|max:255',
            'program_level' => 'nullable|string|max:255',
            'hero_description_1' => 'nullable|string',
            'hero_description_2' => 'nullable|string',
            'duration' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'number_of_students' => 'nullable|integer|min:0'
        ];

        $validated = $request->validate($validationRules);

        // Handle file upload
        if ($request->hasFile('hero_image')) {
            $imagePath = $request->file('hero_image')->store('courses/hero-images', 'public');
            $validated['hero_image'] = 'storage/' . $imagePath;
        }
        
        // Handle array fields
        $arrayFields = ['requirements', 'selection_process', 'training_stages', 'outline', 'benefits'];
        foreach ($arrayFields as $field) {
            if ($request->has($field)) {
                $validated[$field] = $this->processArrayField($request->$field);
            }
        }

        // Set default values
        $validated['fee'] = $validated['fee'] ?? 0;
        $validated['available_seats'] = $validated['available_seats'] ?? 0;
        $validated['rating'] = $validated['rating'] ?? 0;
        $validated['number_of_students'] = $validated['number_of_students'] ?? 0;
        $validated['published'] = $request->has('published') ? true : false;

        Course::create($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course created successfully!');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        // Base validation rules
        $validationRules = [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:courses,slug,' . $course->id,
            'type' => 'required|in:regular_course,cadet_program',
            'hero_description' => 'required|string',
            'video_url' => 'nullable|url',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'objectives' => 'nullable|string',
            'eligibility' => 'nullable|string',
            'fee' => 'nullable|numeric',
            'available_seats' => 'nullable|integer',
            'schedule' => 'nullable|string',
            'published' => 'boolean',
            // Cadet program fields - all optional
            'program_tag' => 'nullable|string|max:255',
            'program_level' => 'nullable|string|max:255',
            'hero_description_1' => 'nullable|string',
            'hero_description_2' => 'nullable|string',
            'duration' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'number_of_students' => 'nullable|integer|min:0'
        ];

        $validated = $request->validate($validationRules);

        // Handle file upload
        if ($request->hasFile('hero_image')) {
            // Delete old image if exists
            if ($course->hero_image && file_exists(public_path($course->hero_image))) {
                unlink(public_path($course->hero_image));
            }
            
            $imagePath = $request->file('hero_image')->store('courses/hero-images', 'public');
            $validated['hero_image'] = 'storage/' . $imagePath;
        }
        
        // Handle array fields
        $arrayFields = ['requirements', 'selection_process', 'training_stages', 'outline', 'benefits'];
        foreach ($arrayFields as $field) {
            if ($request->has($field)) {
                $validated[$field] = $this->processArrayField($request->$field);
            }
        }

        // Set default values
        $validated['fee'] = $validated['fee'] ?? 0;
        $validated['available_seats'] = $validated['available_seats'] ?? 0;
        $validated['rating'] = $validated['rating'] ?? $course->rating;
        $validated['number_of_students'] = $validated['number_of_students'] ?? $course->number_of_students;
        $validated['published'] = $request->has('published') ? true : false;

        $course->update($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        // Delete associated image
        if ($course->hero_image && file_exists(public_path($course->hero_image))) {
            unlink(public_path($course->hero_image));
        }

        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course deleted successfully!');
    }

    /**
     * Process array fields to ensure proper format
     */
    private function processArrayField($fieldData)
    {
        if (is_string($fieldData)) {
            $fieldData = json_decode($fieldData, true) ?? [];
        }

        if (is_array($fieldData)) {
            // Filter out empty entries
            return array_filter($fieldData, function($item) {
                if (is_array($item)) {
                    // For requirements, selection_process, training_stages - check if title is not empty
                    if (isset($item['title']) && !empty(trim($item['title']))) {
                        return true;
                    }
                    // For benefits - check if title is not empty
                    if (isset($item['title']) && !empty(trim($item['title']))) {
                        return true;
                    }
                    // For outline - check if title is not empty
                    if (isset($item['title']) && !empty(trim($item['title']))) {
                        return true;
                    }
                    return false;
                }
                return !empty(trim($item));
            });
        }

        return [];
    }
}