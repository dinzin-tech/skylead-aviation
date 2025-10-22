<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show($name)
    {
        // Check if it's the Air Asia Cadet Program
        if ($name === 'air-asia-cadet-pilot-program') {
            return $this->airAsiaCadetProgram();
        }

        // Default course data (your existing code)
        $courseData = [
            'title' => 'Web Development Fundamentals',
            'type' => 'regular_course',
            'image' => 'img/courses/course-details.jpg',
            'objectives' => 'When you enter into any new area of science, you almost always find yourself with a baffling new language of technical terms to learn before you can converse with the experts...',
            'eligibility' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...',
            'outline' => [
                ['title' => 'Introduction Lesson', 'link' => '#'],
                ['title' => 'Basics of HTML', 'link' => '#'],
                ['title' => 'Getting Know about HTML', 'link' => '#'],
            ],
            'fee' => 230,
            'available_seats' => 15,
            'schedule' => '2.00 pm to 4.00 pm',
            'rating_categories' => [
                ['name' => 'Quality', 'rating' => 3, 'label' => 'Outstanding'],
                ['name' => 'Punctuality', 'rating' => 3, 'label' => 'Outstanding'],
                ['name' => 'Quality', 'rating' => 3, 'label' => 'Outstanding'],
            ]
        ];

        $instructor = [
            'name' => 'George Mathews'
        ];

        $reviews = [
            [
                'name' => 'Emilly Blunt',
                'avatar' => 'img/blog/c1.jpg',
                'rating' => 3,
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.'
            ],
            [
                'name' => 'Elsie Cunningham',
                'avatar' => 'img/blog/c2.jpg',
                'rating' => 3,
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.'
            ],
        ];

        return view('courses.details', compact('courseData', 'instructor', 'reviews'));
    }

    private function airAsiaCadetProgram()
    {
        $courseData = [
            'title' => 'Air Asia Cadet Pilot Program',
            'type' => 'cadet_program',
            'hero_description' => 'Air Asia India launched its Cadet Pilot Program in June 2019. At its core, it is one of the most Quality and cost conscious cadet pilot programs currently running in India. Let us cover the Minimum requirements, selection process and brief outline of the program.',
            'video_url' => '#',
            'hero_image' => 'img/courses/hero.webp',
            
            // Cadet Program Specific Data
            'requirements' => [
                [
                    'icon' => 'ti-file',
                    'title' => 'Nationality',
                    'description' => 'Must be of Indian Nationality or hold an overseas citizenship of India'
                ],
                [
                    'icon' => 'ti-user',
                    'title' => 'Age',
                    'description' => '17 years - Should have completed 10+2 upto 33 years on the date of application'
                ],
                [
                    'icon' => 'ti-book',
                    'title' => 'Education',
                    'description' => '10+2 with Physics & Maths or any graduate with a science background with an aggregate of 60%in English, Maths & Physics'
                ],
                [
                    'icon' => 'ti-heart',
                    'title' => 'Medical',
                    'description' => 'Ability to hold unrestricted Class 1 & 2 medicals

'
                ]
            ],
            'selection_process' => [
                [
                    'icon' => 'ti-file',
                    'title' => 'Online Application',
                    'description' => 'Submit your application through our online portal with required documents'
                ],
                [
                    'icon' => 'ti-pencil-alt',
                    'title' => 'Aptitude Tests',
                    'description' => 'Comprehensive assessment including cognitive and psychometric testing'
                ],
                [
                    'icon' => 'ti-comments',
                    'title' => 'Interviews',
                    'description' => 'Multiple interview rounds with aviation experts and senior pilots'
                ],
                [
                    'icon' => 'ti-heart',
                    'title' => 'Medical Examination',
                    'description' => 'Thorough medical check-up to ensure fitness for flying'
                ]
            ],
            'training_stages' => [
                [
                    'stageNumber' => 1,
                    'title' => 'Ground School',
                    'description' => 'Comprehensive theoretical training covering aviation principles, navigation, meteorology, and aircraft systems'
                ],
                [
                    'stageNumber' => 2,
                    'title' => 'Flight Training Phase 1',
                    'description' => 'Initial flight training focusing on basic aircraft handling, takeoffs, landings, and emergency procedures'
                ],
                [
                    'stageNumber' => 3,
                    'title' => 'Flight Training Phase 2',
                    'description' => 'Advanced flight training including instrument flying, cross-country navigation, and complex aircraft operations'
                ],
                [
                    'stageNumber' => 4,
                    'title' => 'Type Rating & Line Training',
                    'description' => 'Specialized training on specific aircraft types followed by supervised line flying with experienced captains'
                ]
            ],
            
            // Regular Course Data (for the existing course_details section)
            'image' => 'img/courses/airasia.png.webp',
            'objectives' => 'The Air Asia Cadet Pilot Program is designed to transform aspiring individuals into professional airline pilots through comprehensive training and mentorship.',
            'eligibility' => 'Candidates must meet the minimum requirements including age, education, physical fitness, and language proficiency as specified in the requirements section.',
            'outline' => [
                ['title' => 'Program Overview', 'link' => '#'],
                ['title' => 'Application Process', 'link' => '#'],
                ['title' => 'Training Curriculum', 'link' => '#'],
                ['title' => 'Career Pathway', 'link' => '#'],
            ],
            'fee' => 0, // Typically cadet programs are sponsored or have different payment structures
            'available_seats' => 20,
            'schedule' => 'Full-time intensive program',
            'rating_categories' => [
                ['name' => 'Training Quality', 'rating' => 5, 'label' => 'Excellent'],
                ['name' => 'Career Support', 'rating' => 5, 'label' => 'Excellent'],
                ['name' => 'Program Structure', 'rating' => 4, 'label' => 'Very Good'],
            ]
        ];

        $instructor = [
            'name' => 'Air Asia Training Team'
        ];

        $reviews = [
            [
                'name' => 'Captain Raj Kumar',
                'avatar' => 'img/blog/c1.jpg',
                'rating' => 5,
                'comment' => 'Excellent program with comprehensive training and great career opportunities.'
            ],
            [
                'name' => 'First Officer Sarah Lim',
                'avatar' => 'img/blog/c2.jpg',
                'rating' => 5,
                'comment' => 'The cadet program provided me with all the skills needed to succeed as a commercial pilot.'
            ],
        ];

        return view('courses.details', compact('courseData', 'instructor', 'reviews'));
    }
}