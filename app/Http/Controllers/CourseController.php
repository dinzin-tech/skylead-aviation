<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function show($slug)
    {
        
        $course = Course::where('slug', $slug)
        // ->where('published', true)
        ->firstOrFail();
        // Prepare the data in the expected format
        $courseData = [
            'title' => $course->title,
            'type' => $course->type,
            'hero_description' => $course->hero_description,
            'video_url' => $course->video_url,
            'hero_image' => $course->hero_image,
            'requirements' => $course->requirements ?? [],
            'selection_process' => $course->selection_process ?? [],
            'training_stages' => $course->training_stages ?? [],
            'objectives' => $course->objectives, 
            'eligibility' => $course->eligibility,
            'outline' => $course->outline ?? [],
            'fee' => $course->fee,
            'available_seats' => $course->available_seats,
            'schedule' => $course->schedule,
            'rating_categories' => $course->rating_categories ?? []
        ];
        
        return view('courses.details', compact('courseData'));
    }
}