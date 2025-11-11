<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $hero_text = "“ALL OUR DREAMS CAN COME TRUE,";
        $hero_subtext = "If we have the courage to pursue them.”";

        $contact_info = [
            'phone' => '+91 98765 43210',
            'email' => 'info@skyleadaviation.com',
            'address' => '123 Aviation St, Bangalore, India',
            'website' => 'www.skyleadaviation.com',
            'socials' => [
                'facebook' => 'https://facebook.com/skyleadaviation',
                'twitter' => 'https://twitter.com/skyleadaviation',
                'instagram' => 'https://instagram.com/skyleadaviation',
                'linkedin' => 'https://linkedin.com/company/skyleadaviation'
            ]
        ];

        $aboutData = [
            'title' => 'Why Skylead Aviation?',
            'description' => 'In an ever-changing market, finding the right trade and a fitting training program might seem like an impossible task. Enter Skylead Aviation Academy, founded by industry professionals.',
            'main_points' => [
                [
                    // 'icon' => 'flaticon-pilot',
                    'icon' => 'ti-medall-alt',
                    'title' => 'Learn from the Industry',
                    'description' => 'EXPERTS/PROFESSIONALS...',
                    'title2' => 'Enables to understand',
                    'description2' => 'IN-DEPTH & TECHNICAL KNOWLEDGE...'
                ],
                [
                    // 'icon' => 'flaticon-airplane',
                    'icon' => 'ti-star',
                    'title' => 'Updated Curriculum by Aviation',
                    'description' => 'INDUSTRY EXPERTS...',
                    'title2' => 'Provides Airport familiarisation  ',
                    'description2' => '& ON BOARD TRAINING....'
                ],
                [
                    // 'icon' => 'flaticon-graduation-cap',
                    'icon' => 'ti-infinite',
                    'title' => '98% Placement Record',
                    'description' => 'SINCE 2017...',
                    'title2' => 'Fastest Growing Institute',
                    'description2' => 'IN KARNATAKA...'
                ]
            ],
            'mission_vision_values' => [
                'mission' => [
                    'icon' => 'mission.avif',
                    'title' => 'MISSION',
                    'description' => 'To provide the Best quality of aviation training, industrial oriented training and helping students to get placement in aviation industry'
                ],
                'vision' => [
                    'icon' => 'shared-vision.avif',
                    'title' => 'VISION',
                    'description' => 'Sustained Excellence in Training, Career Orientation and Placement'
                ],
                'values' => [
                    'icon' => 'value.avif',
                    'title' => 'VALUES',
                    'description' => 'Self-motivation, Innovation, Hands-on, Team-work, Responsive, Passionate.'
                ]
            ]
        ];

        // Fetch published courses with regular_course type
        // $regularCourses = Course::where('type', 'regular_course')
        $regularCourses = Course::where('published', false)
            // ->where('published', false)
            ->latest()
            ->take(5) // Limit to 5 courses to match your original data
            ->get(); 
        // dd($regularCourses);
        // Map courses to match your exact original structure
        $programs = $regularCourses->map(function($course, $index) {
            return [
                'image' => $course->hero_image ? asset($course->hero_image) : $this->getDefaultImage($index),
                'price' => $course->fee ? '₹' . number_format($course->fee) : $this->getDefaultPrice($index),
                'category' => $this->getDefaultCategory($index),
                'title' => $course->title,
                'description' => $course->hero_description,
                'instructor' => $this->getDefaultInstructor($index),
                'students' => $course->number_of_students ?? $this->getDefaultStudents($index),
                'rating' => $course->rating ?? $this->getDefaultRating($index),
                'duration' => $course->duration ?? $this->getDefaultDuration($index),
                'level' => $course->program_level ?? $this->getDefaultLevel($index),
                'features' => $this->getDefaultFeatures($index),
                'slug' => $course->slug
            ];
        })->toArray();

        // dd($programs);
        // If no courses exist, use default data
        if (empty($programs)) {
            $programs = $this->getDefaultProgramsData();
        }
        // dd($programs);
        $programsData = [
            'title' => 'Our Aviation Programs',
            'description' => 'Professional aviation training programs designed to meet DGCA standards and international requirements',
            'programs' => $programs
        ];

        // dd($programsData);

        // $programsData = [
        //     'title' => 'Our Aviation Programs',
        //     'description' => 'Professional aviation training programs designed to meet DGCA standards and international requirements',
        //     'programs' => [
        //         [
        //             // 'image' => 'programs/dgca-cpl-ground.jpg',
        //             'image' => 'https://static.wixstatic.com/media/cf4588_adb298153bb84eb2999b633084ec33d4~mv2.png/v1/crop/x_52,y_0,w_546,h_534/fill/w_440,h_426,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/PngItem_2943178_edited.png',
        //             'price' => '₹89,999',
        //             'category' => 'Ground Training',
        //             'title' => 'DGCA CPL Ground Training',
        //             'description' => 'Complete DGCA CPL theoretical knowledge preparation with expert instructors and comprehensive study materials',
        //             'instructor' => [
        //                 'image' => 'instructors/captain-sharma.jpg',
        //                 'name' => 'Capt. Raj Sharma'
        //             ],
        //             'students' => 156,
        //             'rating' => 4.8,
        //             'duration' => '6 Months',
        //             'level' => 'Intermediate',
        //             'features' => ['DGCA Syllabus', 'Mock Tests', 'Study Materials', 'Expert Faculty']
        //         ],
        //         [
        //             // 'image' => 'programs/cpl-flight-training.jpg',
        //             'image' => 'https://static.wixstatic.com/media/cf4588_0c82d83e32f548fcb97ef270f719e659~mv2.jpg/v1/crop/x_0,y_24,w_1082,h_1057/fill/w_440,h_426,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/11.jpg',
        //             'price' => '₹25,00,000',
        //             'category' => 'Flight Training',
        //             'title' => 'CPL Flight Training',
        //             'description' => 'Complete CPL flight training with 200+ flying hours on modern aircraft and simulator training',
        //             'instructor' => [
        //                 'image' => 'instructors/captain-verma.jpg',
        //                 'name' => 'Capt. Amit Verma'
        //             ],
        //             'students' => 89,
        //             'rating' => 4.9,
        //             'duration' => '12-18 Months',
        //             'level' => 'Advanced',
        //             'features' => ['200+ Flying Hours', 'Simulator Training', 'DGCA Approved', 'Placement Assistance']
        //         ],
        //         [
        //             // 'image' => 'programs/foreign-cpl-conversion.jpg',
        //             'image' => 'https://static.wixstatic.com/media/11062b_f2eaf67428f84bb8af48bcd9d06c814d~mv2.jpeg/v1/crop/x_1228,y_0,w_5438,h_5265/fill/w_440,h_426,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/Airport%20Counter.jpeg',
        //             'price' => '₹2,49,999',
        //             'category' => 'License Conversion',
        //             'title' => 'Foreign CPL Conversion',
        //             'description' => 'Convert your foreign CPL to DGCA CPL with comprehensive conversion training and documentation support',
        //             'instructor' => [
        //                 'image' => 'instructors/captain-kumar.jpg',
        //                 'name' => 'Capt. Sanjay Kumar'
        //             ],
        //             'students' => 67,
        //             'rating' => 4.7,
        //             'duration' => '3-4 Months',
        //             'level' => 'Advanced',
        //             'features' => ['Documentation Support', 'Technical Training', 'Medical Assistance', 'Fast-track Process']
        //         ],
        //         [
        //             // 'image' => 'programs/type-rating.jpg',
        //             'image' => 'https://static.wixstatic.com/media/cf4588_baba802cda29432898e87ab6d814762a~mv2.jpg/v1/crop/x_190,y_0,w_414,h_405/fill/w_440,h_418,al_c,lg_1,q_80,enc_avif,quality_auto/14.jpg',
        //             'price' => '₹18,00,000',
        //             'category' => 'Type Rating',
        //             'title' => 'Type Rating on A320 & B737',
        //             'description' => 'Advanced type rating training on Airbus A320 and Boeing 737 with full flight simulators',
        //             'instructor' => [
        //                 'image' => 'instructors/captain-singh.jpg',
        //                 'name' => 'Capt. Preet Singh'
        //             ],
        //             'students' => 45,
        //             'rating' => 4.9,
        //             'duration' => '2-3 Months',
        //             'level' => 'Professional',
        //             'features' => ['A320 & B737', 'Full Flight Simulator', 'Line Training', 'Airline Preparation']
        //         ],
        //         [
        //             // 'image' => 'programs/cadet-pilot.jpg',
        //             'image' => 'https://static.wixstatic.com/media/nsplsh_44695469595178306d6834~mv2_d_4104_3026_s_4_2.jpg/v1/crop/x_504,y_0,w_3096,h_3026/fill/w_440,h_418,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/Image%20by%20Dose%20Media.jpg',
        //             'price' => '₹1,49,999',
        //             'category' => 'Career Preparation',
        //             'title' => 'Cadet Pilot Programme Preparation',
        //             'description' => 'Comprehensive preparation for airline cadet pilot programs including aptitude tests and interviews',
        //             'instructor' => [
        //                 'image' => 'instructors/captain-reddy.jpg',
        //                 'name' => 'Capt. Arjun Reddy'
        //             ],
        //             'students' => 234,
        //             'rating' => 4.8,
        //             'duration' => '4 Months',
        //             'level' => 'Beginner',
        //             'features' => ['Aptitude Training', 'Interview Prep', 'Psychometric Tests', 'CV Building']
        //         ]
        //     ]
        // ];

        $trainingDestinationsData = [
            'title' => 'Global Flight Training Destinations',
            'description' => 'World-class flight training facilities across multiple countries with international standards',
            'destinations' => [
                'INDIA' => [
                    'icon' => 'img/flags/india.png',
                    'description' => 'DGCA approved training with modern fleet and experienced instructors'
                ],
                'USA' => [
                    'icon' => 'img/flags/usa.png',
                    'description' => 'FAA approved programs with advanced training facilities'
                ],
                'SOUTH AFRICA' => [
                    // 'icon' => 'ti-location-pin',
                    'icon' => 'img/flags/south-africa.png',
                    'description' => 'Excellent weather conditions year-round for optimal training'
                ],
                'NEW ZEALAND' => [
                    'icon' => 'img/flags/new-zealand.png',
                    'description' => 'CAA NZ approved training in scenic training environments'
                ],
                'AUSTRALIA' => [
                    'icon' => 'img/flags/australia.png',
                    'description' => 'CASA approved programs with international recognition'
                ],
                'CANADA' => [
                    'icon' => 'img/flags/canada.png',
                    'description' => 'Transport Canada approved training in diverse conditions'
                ]
            ],
            'eligibility' => [
                'title' => 'Eligibility to Become a Pilot',
                'subtitle' => 'Basic Requirements',
                'requirements' => [
                    [
                        'title' => 'Age Requirement',
                        'description' => 'Minimum 17 years old',
                        'icon' => 'ti-user'
                    ],
                    [
                        'title' => 'Educational Qualification',
                        'description' => 'Must have passed 10+2 (Class XII) with Physics and Mathematics from a recognized board (or equivalent qualification like NIOS / open school)',
                        'icon' => 'ti-book'
                    ],
                    [
                        'title' => 'English Proficiency',
                        'description' => 'Must be able to read, write, and communicate in English (ICAO standard)',
                        'icon' => 'ti-world'
                    ],
                    [
                        'title' => 'Medical Fitness',
                        'description' => 'DGCA Class 1 Medical Certificate for Commercial Pilot License',
                        'icon' => 'ti-heart'
                    ]
                ],
                'additional_info' => 'All candidates must clear the DGCA medical examination and meet the physical fitness standards required for pilot training.'
            ]
        ];

        $pilotStepsData = [
            'title' => 'Steps to Become a Pilot',
            'description' => 'Follow this comprehensive roadmap to achieve your dream of becoming a commercial pilot',
            'steps' => [
                [
                    'step_number' => '1️⃣',
                    'title' => 'Complete 10+2 with Physics & Maths',
                    'description' => 'Finish your higher secondary education with Physics and Mathematics as core subjects from a recognized board',
                    'duration' => '2 Years',
                    'icon' => 'ti-book'
                ],
                [
                    'step_number' => '2️⃣',
                    'title' => 'Clear DGCA Class II Medical',
                    'description' => 'Get your initial medical examination done and upgrade to Class I medical certificate before CPL',
                    'duration' => '1-2 Weeks',
                    'icon' => 'ti-heart'
                ],
                [
                    'step_number' => '3️⃣',
                    'title' => 'Apply for Computer Number with DGCA',
                    'description' => 'Register with DGCA and obtain your unique computer number for pilot training',
                    'duration' => '2-4 Weeks',
                    'icon' => 'ti-id-badge'
                ],
                [
                    'step_number' => '4️⃣',
                    'title' => 'Enroll in DGCA Ground Classes',
                    'description' => 'Complete theoretical training in Air Regulations, Navigation, Meteorology, and other subjects',
                    'duration' => '6 Months',
                    'icon' => 'ti-blackboard'
                ],
                [
                    'step_number' => '5️⃣',
                    'title' => 'Start Flight Training',
                    'description' => 'Begin practical flight training to earn your Private Pilot Licence (PPL)',
                    'duration' => '3-4 Months',
                    // 'icon' => 'ti-plane'
                    // 'icon' => 'ti-map'
                    'icon' => 'ti-flag'
                ],
                [
                    'step_number' => '6️⃣',
                    'title' => 'Complete 200 Flying Hours',
                    'description' => 'Accumulate flight experience including Night, Cross-Country & Instrument Flying',
                    'duration' => '12-18 Months',
                    'icon' => 'ti-time'
                ],
                [
                    'step_number' => '7️⃣',
                    'title' => 'Pass DGCA Exams + Skill Test',
                    'description' => 'Clear all DGCA written examinations and practical skill tests',
                    'duration' => '1-2 Months',
                    'icon' => 'ti-write'
                ],
                [
                    'step_number' => '8️⃣',
                    'title' => 'Get Commercial Pilot Licence (CPL)',
                    'description' => 'Receive your CPL from DGCA after completing all requirements',
                    'duration' => '2-4 Weeks',
                    'icon' => 'ti-crown'
                ],
                [
                    'step_number' => '9️⃣',
                    'title' => 'Apply for Type Rating',
                    'description' => 'Complete type rating training on specific aircraft like A320 or B737',
                    'duration' => '2-3 Months',
                    'icon' => 'ti-settings'
                ],
                [
                    'step_number' => '🔟',
                    'title' => 'Start Airline Career',
                    'description' => 'Apply for airline jobs and begin your professional aviation career',
                    'duration' => '3-6 Months',
                    'icon' => 'ti-briefcase'
                ]
            ],
            'timeline_note' => 'Total duration: Approximately 2-3 years from start to airline job',
            'cta' => [
                'text' => 'Start Your Pilot Journey Today',
                'button_text' => 'Get Detailed Roadmap',
                'link' => route('contact')
            ]
        ];

        $faqData = [
            'title' => 'Frequently Asked Questions',
            'description' => 'Find answers to common questions about pilot training and aviation careers',
            'faqs' => [
                [
                    'question' => 'What is the minimum age to start pilot training?',
                    'answer' => 'You can start pilot training at 17 years of age. However, you need to be 18 years old to obtain a Commercial Pilot License (CPL). For Private Pilot License (PPL), the minimum age is 17 years.',
                    'category' => 'Eligibility'
                ],
                [
                    'question' => 'What are the educational requirements to become a pilot?',
                    'answer' => 'You must have passed 10+2 (Class XII) with Physics and Mathematics from a recognized board. Equivalent qualifications like NIOS or open school are also acceptable. A minimum of 50% marks in Physics and Mathematics is generally required.',
                    'category' => 'Eligibility'
                ],
                [
                    'question' => 'How long does it take to become a commercial pilot?',
                    'answer' => 'The complete process typically takes 2-3 years. This includes ground training (6 months), flight training (12-18 months), and obtaining your CPL. Type rating and job placement may take additional 3-6 months.',
                    'category' => 'Training Duration'
                ],
                [
                    'question' => 'What is the total cost of pilot training?',
                    'answer' => 'The total cost for Commercial Pilot License training in India ranges from ₹25-35 lakhs. This includes ground classes, flight training (200+ hours), DGCA fees, medical examinations, and other associated costs. Type rating programs cost additional ₹18-25 lakhs.',
                    'category' => 'Cost & Fees'
                ],
                [
                    'question' => 'What is a DGCA Computer Number and how to get it?',
                    'answer' => 'A DGCA Computer Number is a unique identification number issued by the Directorate General of Civil Aviation (DGCA) to track your pilot training progress. You need to apply for it before starting your flight training by submitting required documents and fees to DGCA.',
                    'category' => 'DGCA Procedures'
                ],
                [
                    'question' => 'What are the medical requirements for pilots?',
                    'answer' => 'You need a DGCA Class 1 Medical Certificate for Commercial Pilot License. This includes comprehensive physical examination, eye test (6/6 vision with or without glasses), hearing test, ECG, blood tests, and other medical assessments. Class 2 Medical is required for PPL.',
                    'category' => 'Medical Requirements'
                ],
                [
                    'question' => 'Can I become a pilot if I wear glasses?',
                    'answer' => 'Yes, you can become a pilot if you wear glasses or contact lenses. The DGCA medical standards require corrected vision of 6/6 in each eye. Certain vision-related conditions might require additional testing, but wearing glasses is generally acceptable.',
                    'category' => 'Medical Requirements'
                ],
                [
                    'question' => 'What is the difference between PPL and CPL?',
                    'answer' => 'PPL (Private Pilot License) allows you to fly aircraft for personal purposes but not for commercial operations. CPL (Commercial Pilot License) permits you to fly commercially and get paid for flying. CPL requires more flight hours and advanced training.',
                    'category' => 'License Types'
                ],
                [
                    'question' => 'What is type rating and when is it required?',
                    'answer' => 'Type rating is specific training for a particular aircraft type (like Airbus A320 or Boeing 737). It is required before you can fly that specific aircraft commercially. Type rating is usually done after obtaining your CPL and before joining an airline.',
                    'category' => 'Advanced Training'
                ],
                [
                    'question' => 'Are there any height requirements for pilots?',
                    'answer' => 'There are no specific height requirements, but you must be able to reach all aircraft controls comfortably. The cockpit ergonomics should allow you to operate the aircraft safely. Most airlines have specific reach requirements rather than height restrictions.',
                    'category' => 'Physical Requirements'
                ],
                [
                    'question' => 'What are the career opportunities after CPL?',
                    'answer' => 'After CPL, you can work as: Commercial Pilot in airlines, Charter Pilot, Flight Instructor, Corporate Pilot, Agricultural Pilot, or pursue further ratings like ATPL (Airline Transport Pilot License). Most pilots start as First Officers in regional or commercial airlines.',
                    'category' => 'Career Opportunities'
                ],
                [
                    'question' => 'Do you provide placement assistance?',
                    'answer' => 'Yes, Skylead Aviation provides comprehensive placement assistance to our graduates. We have tie-ups with major airlines and conduct campus recruitment drives. Our career guidance cell helps with resume building, interview preparation, and job applications.',
                    'category' => 'Placement & Career'
                ]
            ],
            'categories' => [
                'All' => 'All Questions',
                'Eligibility' => 'Eligibility Criteria',
                'Training Duration' => 'Training Timeline',
                'Cost & Fees' => 'Financial Aspects',
                'DGCA Procedures' => 'DGCA Requirements',
                'Medical Requirements' => 'Medical Standards',
                'License Types' => 'Pilot Licenses',
                'Advanced Training' => 'Advanced Courses',
                'Physical Requirements' => 'Physical Standards',
                'Career Opportunities' => 'Career Prospects',
                'Placement & Career' => 'Placement Support'
            ],
            'cta' => [
                'title' => 'Still Have Questions?',
                'description' => "Can't find the answer you're looking for? Please chat with our friendly team.",
                'button_text' => 'Get in Touch',
                'link' => route('contact')
            ]
        ];

        return view('home', compact('hero_text', 'hero_subtext', 'aboutData', 'programsData', 'trainingDestinationsData', 'pilotStepsData', 'faqData', 'contact_info'));
    }

    /**
     * Get default image based on index (matching your original images)
     */
    private function getDefaultImage($index)
    {
        $defaultImages = [
            'https://static.wixstatic.com/media/cf4588_adb298153bb84eb2999b633084ec33d4~mv2.png/v1/crop/x_52,y_0,w_546,h_534/fill/w_440,h_426,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/PngItem_2943178_edited.png',
            'https://static.wixstatic.com/media/cf4588_0c82d83e32f548fcb97ef270f719e659~mv2.jpg/v1/crop/x_0,y_24,w_1082,h_1057/fill/w_440,h_426,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/11.jpg',
            'https://static.wixstatic.com/media/11062b_f2eaf67428f84bb8af48bcd9d06c814d~mv2.jpeg/v1/crop/x_1228,y_0,w_5438,h_5265/fill/w_440,h_426,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/Airport%20Counter.jpeg',
            'https://static.wixstatic.com/media/cf4588_baba802cda29432898e87ab6d814762a~mv2.jpg/v1/crop/x_190,y_0,w_414,h_405/fill/w_440,h_418,al_c,lg_1,q_80,enc_avif,quality_auto/14.jpg',
            'https://static.wixstatic.com/media/nsplsh_44695469595178306d6834~mv2_d_4104_3026_s_4_2.jpg/v1/crop/x_504,y_0,w_3096,h_3026/fill/w_440,h_418,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/Image%20by%20Dose%20Media.jpg'
        ];
        
        return $defaultImages[$index] ?? $defaultImages[0];
    }

    /**
     * Get default price based on index (matching your original prices)
     */
    private function getDefaultPrice($index)
    {
        $defaultPrices = [
            '₹89,999',
            '₹25,00,000',
            '₹2,49,999',
            '₹18,00,000',
            '₹1,49,999'
        ];
        
        return $defaultPrices[$index] ?? 'Contact for Price';
    }

    /**
     * Get default category based on index (matching your original categories)
     */
    private function getDefaultCategory($index)
    {
        $defaultCategories = [
            'Ground Training',
            'Flight Training',
            'License Conversion',
            'Type Rating',
            'Career Preparation'
        ];
        
        return $defaultCategories[$index] ?? 'Aviation Training';
    }

    /**
     * Get default instructor based on index (matching your original instructors)
     */
    private function getDefaultInstructor($index)
    {
        $defaultInstructors = [
            [
                'image' => 'instructors/captain-sharma.jpg',
                'name' => 'Capt. Raj Sharma'
            ],
            [
                'image' => 'instructors/captain-verma.jpg',
                'name' => 'Capt. Amit Verma'
            ],
            [
                'image' => 'instructors/captain-kumar.jpg',
                'name' => 'Capt. Sanjay Kumar'
            ],
            [
                'image' => 'instructors/captain-singh.jpg',
                'name' => 'Capt. Preet Singh'
            ],
            [
                'image' => 'instructors/captain-reddy.jpg',
                'name' => 'Capt. Arjun Reddy'
            ]
        ];
        
        return $defaultInstructors[$index] ?? [
            'image' => 'instructors/default-instructor.jpg',
            'name' => 'Expert Instructor'
        ];
    }

    /**
     * Get default students count based on index
     */
    private function getDefaultStudents($index)
    {
        $defaultStudents = [156, 89, 67, 45, 234];
        return $defaultStudents[$index] ?? 0;
    }

    /**
     * Get default rating based on index
     */
    private function getDefaultRating($index)
    {
        $defaultRatings = [4.8, 4.9, 4.7, 4.9, 4.8];
        return $defaultRatings[$index] ?? 4.5;
    }

    /**
     * Get default duration based on index
     */
    private function getDefaultDuration($index)
    {
        $defaultDurations = [
            '6 Months',
            '12-18 Months',
            '3-4 Months',
            '2-3 Months',
            '4 Months'
        ];
        
        return $defaultDurations[$index] ?? 'Flexible';
    }

    /**
     * Get default level based on index
     */
    private function getDefaultLevel($index)
    {
        $defaultLevels = [
            'Intermediate',
            'Advanced',
            'Advanced',
            'Professional',
            'Beginner'
        ];
        
        return $defaultLevels[$index] ?? 'Intermediate';
    }

    /**
     * Get default features based on index
     */
    private function getDefaultFeatures($index)
    {
        $defaultFeatures = [
            ['DGCA Syllabus', 'Mock Tests', 'Study Materials', 'Expert Faculty'],
            ['200+ Flying Hours', 'Simulator Training', 'DGCA Approved', 'Placement Assistance'],
            ['Documentation Support', 'Technical Training', 'Medical Assistance', 'Fast-track Process'],
            ['A320 & B737', 'Full Flight Simulator', 'Line Training', 'Airline Preparation'],
            ['Aptitude Training', 'Interview Prep', 'Psychometric Tests', 'CV Building']
        ];
        
        return $defaultFeatures[$index] ?? ['Expert Faculty', 'Quality Training', 'Flexible Schedule'];
    }

    /**
     * Default programs data as fallback (your original data)
     */
    private function getDefaultProgramsData()
    {
        return [
            [
                'image' => 'https://static.wixstatic.com/media/cf4588_adb298153bb84eb2999b633084ec33d4~mv2.png/v1/crop/x_52,y_0,w_546,h_534/fill/w_440,h_426,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/PngItem_2943178_edited.png',
                'price' => '₹89,999',
                'category' => 'Ground Training',
                'title' => 'DGCA CPL Ground Training',
                'description' => 'Complete DGCA CPL theoretical knowledge preparation with expert instructors and comprehensive study materials',
                'instructor' => [
                    'image' => 'instructors/captain-sharma.jpg',
                    'name' => 'Capt. Raj Sharma'
                ],
                'students' => 156,
                'rating' => 4.8,
                'duration' => '6 Months',
                'level' => 'Intermediate',
                'features' => ['DGCA Syllabus', 'Mock Tests', 'Study Materials', 'Expert Faculty'],
                'slug' => 'dgca-cpl-ground-training'
            ],
            [
                'image' => 'https://static.wixstatic.com/media/cf4588_0c82d83e32f548fcb97ef270f719e659~mv2.jpg/v1/crop/x_0,y_24,w_1082,h_1057/fill/w_440,h_426,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/11.jpg',
                'price' => '₹25,00,000',
                'category' => 'Flight Training',
                'title' => 'CPL Flight Training',
                'description' => 'Complete CPL flight training with 200+ flying hours on modern aircraft and simulator training',
                'instructor' => [
                    'image' => 'instructors/captain-verma.jpg',
                    'name' => 'Capt. Amit Verma'
                ],
                'students' => 89,
                'rating' => 4.9,
                'duration' => '12-18 Months',
                'level' => 'Advanced',
                'features' => ['200+ Flying Hours', 'Simulator Training', 'DGCA Approved', 'Placement Assistance'],
                'slug' => 'cpl-flight-training'
            ],
            [
                'image' => 'https://static.wixstatic.com/media/11062b_f2eaf67428f84bb8af48bcd9d06c814d~mv2.jpeg/v1/crop/x_1228,y_0,w_5438,h_5265/fill/w_440,h_426,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/Airport%20Counter.jpeg',
                'price' => '₹2,49,999',
                'category' => 'License Conversion',
                'title' => 'Foreign CPL Conversion',
                'description' => 'Convert your foreign CPL to DGCA CPL with comprehensive conversion training and documentation support',
                'instructor' => [
                    'image' => 'instructors/captain-kumar.jpg',
                    'name' => 'Capt. Sanjay Kumar'
                ],
                'students' => 67,
                'rating' => 4.7,
                'duration' => '3-4 Months',
                'level' => 'Advanced',
                'features' => ['Documentation Support', 'Technical Training', 'Medical Assistance', 'Fast-track Process'],
                'slug' => 'foreign-cpl-conversion'
            ],
            [
                'image' => 'https://static.wixstatic.com/media/cf4588_baba802cda29432898e87ab6d814762a~mv2.jpg/v1/crop/x_190,y_0,w_414,h_405/fill/w_440,h_418,al_c,lg_1,q_80,enc_avif,quality_auto/14.jpg',
                'price' => '₹18,00,000',
                'category' => 'Type Rating',
                'title' => 'Type Rating on A320 & B737',
                'description' => 'Advanced type rating training on Airbus A320 and Boeing 737 with full flight simulators',
                'instructor' => [
                    'image' => 'instructors/captain-singh.jpg',
                    'name' => 'Capt. Preet Singh'
                ],
                'students' => 45,
                'rating' => 4.9,
                'duration' => '2-3 Months',
                'level' => 'Professional',
                'features' => ['A320 & B737', 'Full Flight Simulator', 'Line Training', 'Airline Preparation'],
                'slug' => 'type-rating-on-a320-b737'
            ],
            [
                'image' => 'https://static.wixstatic.com/media/nsplsh_44695469595178306d6834~mv2_d_4104_3026_s_4_2.jpg/v1/crop/x_504,y_0,w_3096,h_3026/fill/w_440,h_418,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/Image%20by%20Dose%20Media.jpg',
                'price' => '₹1,49,999',
                'category' => 'Career Preparation',
                'title' => 'Cadet Pilot Programme Preparation',
                'description' => 'Comprehensive preparation for airline cadet pilot programs including aptitude tests and interviews',
                'instructor' => [
                    'image' => 'instructors/captain-reddy.jpg',
                    'name' => 'Capt. Arjun Reddy'
                ],
                'students' => 234,
                'rating' => 4.8,
                'duration' => '4 Months',
                'level' => 'Beginner',
                'features' => ['Aptitude Training', 'Interview Prep', 'Psychometric Tests', 'CV Building'],
                'slug' => 'cadet-pilot-programme-preparation'
            ]
        ];
    }


    // public function about()
    // {
    //     return view('about');
    // }

    public function about()
    {
        $aboutData = [
            'title' => 'About Skylead Aviation',
            'description' => 'In an ever-changing market, finding the right trade and a fitting training program might seem like an impossible task. Enter Skylead Aviation Academy, which was founded by some of the industry\'s finest professionals. At Skylead Aviation, we\'re committed to providing the highest quality education focused on leadership, innovation and advanced skills.',
            'full_description' => 'Our program is flexible and our teachers are the best in their field. So if you\'re ready to roll up your sleeves, learn a new trade and make new friends - get in touch today.',
            'main_points' => [
                [
                    'icon' => 'flaticon-pilot',
                    'title' => 'Expert Certified Instructors',
                    'description' => 'Learn from industry veterans with decades of flying experience and certified training credentials. Our instructors are committed to your success in aviation.'
                ],
                [
                    'icon' => 'flaticon-airplane',
                    'title' => 'Modern Fleet & Equipment',
                    'description' => 'Train with our state-of-the-art aircraft and advanced flight simulators. We maintain our fleet to the highest safety standards for optimal learning.'
                ],
                [
                    'icon' => 'flaticon-graduation-cap',
                    'title' => 'Global Career Opportunities',
                    'description' => 'Our certification is recognized worldwide with partnerships with major airlines. 95% of our graduates secure positions within 6 months of completion.'
                ]
            ],
            'mission_vision_values' => [
                'mission' => [
                    'icon' => 'mission.png',
                    'title' => 'MISSION',
                    'description' => 'To provide the Best quality of aviation training, industrial oriented training and helping students to get placement in aviation industry'
                ],
                'vision' => [
                    'icon' => 'shared-vision.png',
                    'title' => 'VISION',
                    'description' => 'Sustained Excellence in Training, Career Orientation and Placement'
                ],
                'values' => [
                    'icon' => 'value.png',
                    'title' => 'VALUES',
                    'description' => 'Self-motivation, Innovation, Hands-on, Team-work, Responsive, Passionate.'
                ]
            ],
            'statistics' => [
                'students_trained' => 1500,
                'success_rate' => 95,
                'instructors' => 50,
                'years_experience' => 15
            ]
        ];

        return view('about', compact('aboutData'));
    }

    public function courses()
    {
        return view('courses');
    }

    public function elements()
    {
        return view('elements');
    }

    public function blogShow()
    {
        // Assuming you have a Blog model to fetch blog details from the database
        // $blog = \App\Models\Blog::where('slug', $slug)->firstOrFail();
        // return view('blog.show', compact('blog'));
        echo "Displaying blog post with slug: ";
    }

    public function blogs()
    {
        // Assuming you have a Blog model to fetch blog details from the database
        // $blog = \App\Models\Blog::where('slug', $slug)->firstOrFail();
        // return view('blog.show', compact('blog'));
        echo "Displaying blogs list";
    }

    public function programs()
    {
        return view('programs');
    }

    public function programDetails($id)
    {
        return view('blog');
    }
}