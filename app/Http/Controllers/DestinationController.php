<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Show flight training details for a specific destination country.
     */
    public function destinationCountry($country = 'USA')
    {
        $countryData = [
            // 'country_name' => 'United States of America (USA)',
            // 'country_title' => 'Fly High in the Skies of the USA',
            // 'country_description' => 'The United States is one of the best destinations for pilot training, offering world-class flight schools, consistent weather, and FAA-approved programs recognized globally.',
            // 'no_of_schools' => 12,
            // 'location' => 'Florida, Texas, California, Arizona',

            'images' => [
                'img/destinations/usa1.jpg',
                'img/destinations/usa2.jpg',
                'img/destinations/usa3.jpg'
            ],

            'guide' => [
                ['title' => 'Flight Training', 'value' => 'Get trained under FAA-approved schools with 200+ flying hours and world-class instructors.'],
                ['title' => 'Weather for Flight', 'value' => 'USA offers perfect year-round flying weather, ensuring uninterrupted training schedules.'],
                ['title' => 'Living in USA', 'value' => 'Experience a student-friendly environment with affordable living and diverse culture.']
            ],

            'gallery' => [
                'https://static.wixstatic.com/media/cf4588_79003f1aaabe44038d563ff6c9163eb0~mv2.jpg/v1/crop/x_0,y_0,w_1213,h_960/fill/w_634,h_502,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/cf4588_79003f1aaabe44038d563ff6c9163eb0~mv2.jpg',
                'https://static.wixstatic.com/media/cf4588_f692ea2dc6c44395acf03cf63fc61b0f~mv2.jpg/v1/crop/x_59,y_0,w_1102,h_847/fill/w_654,h_502,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/cf4588_f692ea2dc6c44395acf03cf63fc61b0f~mv2.jpg',
                'https://static.wixstatic.com/media/70acfd_74a5c80ab3cc4a73acee4d894e251183~mv2.jpg/v1/fill/w_892,h_502,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/IMG_20210215_081824.jpg',
                'https://static.wixstatic.com/media/cf4588_ec56d07b3e534e52a200175f61fa7232~mv2.jpg/v1/crop/x_0,y_259,w_960,h_1021/fill/w_634,h_674,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/cf4588_ec56d07b3e534e52a200175f61fa7232~mv2.jpg',
                'https://static.wixstatic.com/media/70acfd_90e4ffc706034ea0a7fca9ed1989b99e~mv2.jpg/v1/crop/x_493,y_0,w_3498,h_2592/fill/w_894,h_662,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/70acfd_90e4ffc706034ea0a7fca9ed1989b99e~mv2.jpg',
                'https://static.wixstatic.com/media/70acfd_90ac9dd322394cfe817d18fd1ab3f4fa~mv2.jpg/v1/crop/x_8,y_582,w_2584,h_2634/fill/w_658,h_670,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/70acfd_90ac9dd322394cfe817d18fd1ab3f4fa~mv2.jpg,'
                    // 'img/gallery/about.jpg',
                // 'img/gallery/usa2.jpg',
                // 'img/gallery/usa3.jpg',
                // 'img/gallery/usa4.jpg'
            ],

            'advantages' => [
                'Globally recognized FAA license',
                'Flexible training schedules',
                'Advanced simulators & aircraft',
                'Highly experienced instructors',
                'Post-training placement opportunities'
            ],

            'flying_schools' => [
                [
                    'school_name' => 'Epic Flight Academy',
                    'logo' => 'img/schools/epic-logo.png',
                    'location' => 'New Smyrna Beach, Florida',
                    'rating' => 5,
                    'reviews' => 250,
                    'overview' => 'One of the premier flight training academies in the USA with over 20 years of experience training international students for successful aviation careers.',
                    'fleet_type' => 'Cessna 172, Piper Seminole, Diamond DA40',
                    'fleet_size' => 35,
                    'students_trained' => 5000,
                    'years_established' => 20,
                    'success_rate' => 95,
                    'simulators' => 'FRASCA 142, Redbird MCX, ALSIM AL42',
                    'contact_email' => 'admissions@epicflight.com',
                    'contact_phone' => '+1 (386) 409-5583',
                    'website' => 'www.epicflight.com',
                    'courses_offered' => [
                        ['icon' => 'ti-user', 'title' => 'PPL', 'description' => 'Private Pilot License training for beginners.'],
                        ['icon' => 'ti-cloud-up', 'title' => 'IR', 'description' => 'Instrument Rating training for advanced navigation.'],
                        ['icon' => 'ti-plane', 'title' => 'CPL-MEIR', 'description' => 'Commercial Pilot License with Multi-Engine Instrument Rating.'],
                        ['icon' => 'ti-cup', 'title' => 'CFI', 'description' => 'Certified Flight Instructor course to build hours.']
                    ],
                    'facilities' => [
                        'title' => 'Training Facilities',
                        'description' => 'Fully equipped classrooms, modern fleet, student accommodation, and simulator centers.',
                        'facility_features' => [
                            ['icon' => 'ti-blackboard', 'title' => 'Modern Classrooms', 'description' => 'Smart classrooms with live ATC audio.'],
                            ['icon' => 'ti-signal', 'title' => 'Simulator Training', 'description' => 'FAA-approved simulators for realistic flight experience.'],
                            ['icon' => 'ti-home', 'title' => 'Accommodation', 'description' => 'Comfortable and safe student housing nearby.']
                        ]
                    ],
                    'course_fees' => [
                        'title' => 'Course Fees Overview',
                        'description' => 'Complete CPL with IR and CFI training starting from $55,000 - $70,000 depending on flight hours and aircraft type.'
                    ]
                ],
                [
                    'school_name' => 'Phoenix East Aviation',
                    'logo' => 'img/schools/phoenix-logo.png',
                    'location' => 'Daytona Beach, Florida',
                    'rating' => 5,
                    'reviews' => 180,
                    'overview' => 'Located in the aviation hub of Daytona Beach, PEA offers comprehensive flight training programs with excellent weather conditions year-round.',
                    'fleet_type' => 'Cessna 172, Piper Archer, Piper Seneca',
                    'fleet_size' => 42,
                    'students_trained' => 6500,
                    'years_established' => 25,
                    'success_rate' => 94,
                    'simulators' => 'FRASCA 141, Redbird TD, ALSIM ALX',
                    'contact_email' => 'info@pea.com',
                    'contact_phone' => '+1 (386) 258-0703',
                    'website' => 'www.phoenixeastaviation.com',
                    'courses_offered' => [
                        ['icon' => 'ti-user', 'title' => 'PPL', 'description' => 'Private Pilot License training program.'],
                        ['icon' => 'ti-cloud-up', 'title' => 'IR', 'description' => 'Instrument Rating certification course.'],
                        ['icon' => 'ti-plane', 'title' => 'CPL', 'description' => 'Commercial Pilot License training.'],
                        ['icon' => 'ti-cup', 'title' => 'MEIR', 'description' => 'Multi-Engine Instrument Rating program.']
                    ],
                    'facilities' => [
                        'title' => 'Campus Facilities',
                        'description' => 'State-of-the-art training facilities with modern aircraft and experienced instructors.',
                        'facility_features' => [
                            ['icon' => 'ti-book', 'title' => 'Ground School', 'description' => 'Comprehensive ground training programs.'],
                            ['icon' => 'ti-shield', 'title' => 'Safety Training', 'description' => 'Advanced safety and emergency procedures.'],
                            ['icon' => 'ti-world', 'title' => 'International Support', 'description' => 'Dedicated international student support.']
                        ]
                    ],
                    'course_fees' => [
                        'title' => 'Training Costs',
                        'description' => 'Professional pilot program packages starting from $58,000 with financing options available.'
                    ]
                ],
                [
                    'school_name' => 'Aviator College',
                    'logo' => 'img/schools/aviator-logo.png',
                    'location' => 'Fort Pierce, Florida',
                    'rating' => 4,
                    'reviews' => 120,
                    'overview' => 'Aviator College offers degree programs combined with flight training, providing both education and practical flying experience.',
                    'fleet_type' => 'Cessna 152, Cessna 172, Piper Aztec',
                    'fleet_size' => 28,
                    'students_trained' => 3200,
                    'years_established' => 18,
                    'success_rate' => 92,
                    'simulators' => 'FRASCA 142, Redbird FMX',
                    'contact_email' => 'admissions@aviator.edu',
                    'contact_phone' => '+1 (772) 466-4822',
                    'website' => 'www.aviator.edu',
                    'courses_offered' => [
                        ['icon' => 'ti-user', 'title' => 'PPL', 'description' => 'Private Pilot License course.'],
                        ['icon' => 'ti-cloud-up', 'title' => 'IR', 'description' => 'Instrument Rating training.'],
                        ['icon' => 'ti-plane', 'title' => 'CPL', 'description' => 'Commercial Pilot License program.'],
                        ['icon' => 'ti-graduate', 'title' => 'Degree Program', 'description' => 'Aviation degree with flight training.']
                    ],
                    'facilities' => [
                        'title' => 'College Facilities',
                        'description' => 'Combined college campus and flight training center with academic and practical facilities.',
                        'facility_features' => [
                            ['icon' => 'ti-book', 'title' => 'College Campus', 'description' => 'Full college campus facilities.'],
                            ['icon' => 'ti-library', 'title' => 'Aviation Library', 'description' => 'Extensive aviation resource library.'],
                            ['icon' => 'ti-home', 'title' => 'Student Housing', 'description' => 'On-campus accommodation options.']
                        ]
                    ],
                    'course_fees' => [
                        'title' => 'Program Fees',
                        'description' => 'Degree programs with flight training from $65,000 - $85,000 depending on program selection.'
                    ]
                ],
                [
                    'school_name' => 'FlightSafety Academy',
                    'logo' => 'img/schools/flightsafety-logo.png',
                    'location' => 'Vero Beach, Florida',
                    'rating' => 5,
                    'reviews' => 210,
                    'overview' => 'Part of the world-renowned FlightSafety International, offering professional pilot training with exceptional standards.',
                    'fleet_type' => 'Cessna 172, Diamond DA42, King Air C90',
                    'fleet_size' => 55,
                    'students_trained' => 8000,
                    'years_established' => 30,
                    'success_rate' => 96,
                    'simulators' => 'FRASCA, Redbird, ALSIM, FTD Level 5/6',
                    'contact_email' => 'academy@flightsafety.com',
                    'contact_phone' => '+1 (772) 564-7650',
                    'website' => 'www.flightsafetyacademy.com',
                    'courses_offered' => [
                        ['icon' => 'ti-user', 'title' => 'PPL', 'description' => 'Private Pilot License training.'],
                        ['icon' => 'ti-cloud-up', 'title' => 'IR', 'description' => 'Instrument Rating certification.'],
                        ['icon' => 'ti-plane', 'title' => 'CPL-MEIR', 'description' => 'Commercial with Multi-Engine IR.'],
                        ['icon' => 'ti-cup', 'title' => 'ATP', 'description' => 'Airline Transport Pilot program.']
                    ],
                    'facilities' => [
                        'title' => 'World-Class Facilities',
                        'description' => 'Industry-leading training facilities with advanced simulators and professional environment.',
                        'facility_features' => [
                            ['icon' => 'ti-cup', 'title' => 'Professional Standards', 'description' => 'Airline-level training standards.'],
                            ['icon' => 'ti-signal', 'title' => 'Advanced Simulators', 'description' => 'State-of-the-art simulation technology.'],
                            ['icon' => 'ti-briefcase', 'title' => 'Career Placement', 'description' => 'Industry connections and job placement.']
                        ]
                    ],
                    'course_fees' => [
                        'title' => 'Training Investment',
                        'description' => 'Professional pilot programs starting from $75,000 with comprehensive career preparation.'
                    ]
                ],
                [
                    'school_name' => 'L3Harris Airline Academy',
                    'logo' => 'img/schools/l3harris-logo.png',
                    'location' => 'Sanford, Florida',
                    'rating' => 5,
                    'reviews' => 190,
                    'overview' => 'Global airline training academy with direct pathways to airline careers and advanced training methodologies.',
                    'fleet_type' => 'Cessna 172, Piper Seminole, Airbus A320',
                    'fleet_size' => 65,
                    'students_trained' => 12000,
                    'years_established' => 35,
                    'success_rate' => 97,
                    'simulators' => 'Full Flight Simulators, FTDs, CPTs',
                    'contact_email' => 'admissions@l3harris.com',
                    'contact_phone' => '+1 (407) 330-7020',
                    'website' => 'www.l3harrisairlineacademy.com',
                    'courses_offered' => [
                        ['icon' => 'ti-user', 'title' => 'PPL', 'description' => 'Private Pilot License course.'],
                        ['icon' => 'ti-cloud-up', 'title' => 'IR', 'description' => 'Instrument Rating program.'],
                        ['icon' => 'ti-plane', 'title' => 'CPL-MEIR', 'description' => 'Commercial Pilot License.'],
                        ['icon' => 'ti-briefcase', 'title' => 'Airline Program', 'description' => 'Direct airline career pathway.']
                    ],
                    'facilities' => [
                        'title' => 'Airline Training Center',
                        'description' => 'World-class airline training facility with full-motion simulators and airline partnerships.',
                        'facility_features' => [
                            ['icon' => 'ti-plane', 'title' => 'Airline Partners', 'description' => 'Direct connections with major airlines.'],
                            ['icon' => 'ti-signal', 'title' => 'Full Motion Sims', 'description' => 'Airline-level full motion simulators.'],
                            ['icon' => 'ti-briefcase', 'title' => 'Job Guarantee', 'description' => 'Career placement guarantee programs.']
                        ]
                    ],
                   
                    'course_fees' => [
                        'title' => 'Program Costs',
                        'description' => 'Integrated airline pilot programs from $85,000 with financing and career guarantees.'
                    ]
                ],
                [
                    'school_name' => 'ATP Flight School',
                    'logo' => 'img/schools/atp-logo.png',
                    'location' => 'Jacksonville, Florida',
                    'rating' => 4,
                    'reviews' => 300,
                    'overview' => 'Nationwide flight school network offering accelerated training programs with fixed pricing and airline partnerships.',
                    'fleet_type' => 'Cessna 172, Piper Seminole, Diamond DA42',
                    'fleet_size' => 200,
                    'students_trained' => 25000,
                    'years_established' => 28,
                    'success_rate' => 93,
                    'simulators' => 'Redbird MCX, FMX, ALSIM',
                    'contact_email' => 'info@atpflightschool.com',
                    'contact_phone' => '+1 (904) 595-7950',
                    'website' => 'www.atpflightschool.com',
                    'courses_offered' => [
                        ['icon' => 'ti-user', 'title' => 'PPL', 'description' => 'Private Pilot License training.'],
                        ['icon' => 'ti-cloud-up', 'title' => 'IR', 'description' => 'Instrument Rating course.'],
                        ['icon' => 'ti-plane', 'title' => 'CPL-MEIR', 'description' => 'Commercial Pilot License.'],
                        ['icon' => 'ti-bolt', 'title' => 'Accelerated', 'description' => 'Fast-track training programs.']
                    ],
                    'facilities' => [
                        'title' => 'National Network',
                        'description' => 'Multiple training locations nationwide with consistent training standards and quality.',
                        'facility_features' => [
                            ['icon' => 'ti-map', 'title' => 'Multiple Locations', 'description' => 'Training centers across the USA.'],
                            ['icon' => 'ti-timer', 'title' => 'Accelerated', 'description' => 'Fast-track training programs.'],
                            ['icon' => 'ti-money', 'title' => 'Fixed Pricing', 'description' => 'No hidden costs or surprises.']
                        ]
                    ],
                    'course_fees' => [
                        'title' => 'Fixed Price Training',
                        'description' => 'Professional pilot program at $89,995 all-inclusive with financing options available.'
                    ]
                ]
                    ],
                    'courses_offered' => [
                        [
                            'title' => 'Private Pilot License (PPL)',
                            'subtitle' => 'Private Pilot License (PPL)',
                            'description' => 'This license is ideal for aviation enthusiasts or hobby flyers.',
                            'logo' => 'img/courses-offered/PPL.webp',
                            'icon' => 'fas fa-plane'
                        ],
                        [
                            'title' => 'Commercial Pilot License with Multi Engine Instrument Rating (CPL-MEIR)',
                            'subtitle' => '',
                            'description' => 'This provides students with a complete theoretical and practical flight training and makes them eligible for Airline Pilot vacancies.',
                            'logo' => 'img/courses-offered/CPL.webp',
                            'icon' => 'fas fa-plane-departure'
                        ],
                        [
                            'title' => 'Instrument Rating (IR)',
                            'subtitle' => '',
                            'description' => 'This refers to the qualifications that a student can undertake to fly under IFR (Instrument Flight Rules) and can be applicable to CPL and PPL.',
                            'logo' => 'img/courses-offered/IR.webp',
                            'icon' => 'fas fa-compass'
                        ],
                        [
                            'title' => 'Instructor Rating (CFI)',
                            'subtitle' => '',
                            'description' => 'Become a certified flight instructor and build flight hours while training the next generation of pilots. Gain valuable teaching experience and enhance your aviation career.',
                            'logo' => 'img/courses-offered/CFI.webp',
                            'icon' => 'fas fa-chalkboard-teacher'
                        ]
                    ],

            
        ];

        return view('destination.index', compact('countryData'));
    }

    /**
     * Show details for a specific flight training type (e.g., CPL, PPL, Type Rating).
     */
    public function flightType($type = 'CPL')
    {
        $flightTypeData = [
            'flight_type_name' => 'Commercial Pilot License (CPL)',
            'flight_type_description' => 'The Commercial Pilot License allows you to fly aircraft for commercial operations and start your professional aviation career.',

            'section_two' => [
                'title' => 'CPL Course Overview',
                'description' => 'The CPL program provides advanced training on aircraft systems, navigation, meteorology, air law, and flight operations. Students also complete over 200 flying hours.'
            ],

            'section_three' => [
                'title' => 'Why Choose Our CPL Program',
                'description' => 'We offer world-class instructors, DGCA/FAA-approved curriculum, and personalized flight planning sessions.'
            ],

            'key_highlights' => [
                'title' => 'Program Highlights',
                'cards' => [
                    ['title' => '200+ Flying Hours', 'description' => 'Accumulate essential flight hours to qualify for CPL.'],
                    ['title' => 'Simulator Sessions', 'description' => 'Enhance flying precision and safety through simulator-based practice.'],
                    ['title' => 'DGCA-Approved Curriculum', 'description' => 'Course designed per DGCA and FAA standards.'],
                    ['title' => 'Global License Conversion', 'description' => 'Easily convert your CPL to international equivalents.']
                ]
            ],

            'section_four' => [
                'title' => 'Life as a Commercial Pilot',
                'description' => 'A rewarding career filled with adventure, global travel, and opportunities in airlines, charter operations, and training schools.',
                'image' => 'img/flight-type/pilot-life.jpg'
            ],

            'career_paths' => [
                'title' => 'Career Opportunities',
                'cards' => [
                    ['title' => 'Airline Pilot', 'description' => 'Join domestic or international airlines as First Officer.'],
                    ['title' => 'Flight Instructor', 'description' => 'Train future pilots while building more flight hours.'],
                    ['title' => 'Corporate Pilot', 'description' => 'Fly private jets for high-profile clients or companies.'],
                    ['title' => 'Cargo Pilot', 'description' => 'Operate cargo aircraft across global logistics routes.']
                ]
            ]
        ];

        return view('flight-type', compact('flightTypeData'));
    }
}