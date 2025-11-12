<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        // Fetch all published courses (both regular and cadet programs)
        $courses = Course::where('published', true)
            ->latest()
            ->get();

        // Transform the data to match your frontend structure
        $programsData = [
            'title' => 'All Aviation Programs & Courses',
            'description' => 'Explore our complete range of aviation training programs, from beginner courses to advanced cadet programs',
            'programs' => $courses->map(function($course) {
                return [
                    'image' => $course->hero_image ? asset($course->hero_image) : $this->getDefaultImage(),
                    'price' => $course->fee ? '₹' . number_format($course->fee) : 'Contact for Price',
                    'category' => $course->type === 'cadet_program' ? 'Cadet Program' : 'Regular Course',
                    'title' => $course->title,
                    'description' => $course->hero_description,
                    'instructor' => [
                        'image' => 'instructors/default-instructor.jpg',
                        'name' => 'Expert Instructor'
                    ],
                    'students' => $course->number_of_students ?? 0,
                    'rating' => $course->rating ?? 4.5,
                    'duration' => $course->duration ?? 'Flexible',
                    'level' => $course->program_level ?? 'Intermediate',
                    'features' => $this->getFeaturesFromCourse($course),
                    'slug' => $course->slug,
                    'type' => $course->type
                ];
            })->toArray()
        ];

        return view('programs.index', compact('programsData'));
    }

    /**
     * Get default image
     */
    private function getDefaultImage()
    {
        return 'https://static.wixstatic.com/media/cf4588_adb298153bb84eb2999b633084ec33d4~mv2.png/v1/crop/x_52,y_0,w_546,h_534/fill/w_440,h_426,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/PngItem_2943178_edited.png';
    }

    /**
     * Extract features from course data
     */
    private function getFeaturesFromCourse($course)
    {
        $features = [];
        
        // Add features based on course type and content
        if ($course->benefits && is_array($course->benefits)) {
            foreach ($course->benefits as $benefit) {
                if (isset($benefit['title'])) {
                    $features[] = $benefit['title'];
                }
            }
        }
        
        // If no benefits, add some default features based on course type
        if (empty($features)) {
            if ($course->type === 'cadet_program') {
                $features = ['Airline Partnership', 'Guaranteed Interview', 'Advanced Training', 'Career Support'];
            } else {
                $features = ['Expert Faculty', 'Quality Training', 'Flexible Schedule', 'Certification'];
            }
        }
        
        return array_slice($features, 0, 4); // Limit to 4 features
    }
}