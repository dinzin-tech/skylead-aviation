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
        $validated = $request->validate([
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
            'published' => 'boolean'
        ]);

        // Handle file upload
        if ($request->hasFile('hero_image')) {
            $imagePath = $request->file('hero_image')->store('courses/hero-images', 'public');
            $validated['hero_image'] = 'storage/' . $imagePath;
        }
        
        // Handle array fields (they come as arrays from the form)
        $arrayFields = ['requirements', 'selection_process', 'training_stages', 'outline'];
        foreach ($arrayFields as $field) {
            if ($request->has($field)) {
                $validated[$field] = $request->$field;
            }
        }

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
        $validated = $request->validate([
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
            'published' => 'boolean'
        ]);

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
        $arrayFields = ['requirements', 'selection_process', 'training_stages', 'outline'];
        foreach ($arrayFields as $field) {
            if ($request->has($field)) {
                $validated[$field] = $request->$field;
            }
        }

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
}