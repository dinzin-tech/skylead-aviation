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
                    'school_name' => 'Fuelin Aviation Academy',
                    'course_duration' => '10 to 12 Months',
                    'fleet_size' => '25',
                    'fleet_types' => 'Cessna 152, Cessna 172, Tecnam 2008 & 2009',
                    'flying_hours' => '250',
                    'aircrafts' => [
                        [
                            'name' => 'Cessna 152',
                            'description' => 'The Cessna 152 is an American two-seat, fixed-tricycle-gear, general aviation airplane, used primarily for flight training and personal use.',
                            'img' => 'https://thepilot.in/wp-content/uploads/2023/10/fsf-1.png.webp'
                        ],
                        [
                            'name' => 'Cessna 172', 
                            'description' => 'The Cessna 172 Skyhawk is an American four-seat, single-engine, high wing, fixed-wing aircraft made by the Cessna Aircraft Company.'
                        ],
                        [
                            'name' => 'Tecnam P2006',
                            'description' => 'The Tecnam P2006 is a single-engine, high-wing two-seat aircraft built in Italy but aimed at the US market.'
                        ],
                        [
                            'name' => 'Tecnam P2008',
                            'description' => 'The Tecnam P2008 is a light sport aircraft featuring advanced composite materials and excellent fuel efficiency.'
                        ],
                        [
                            'name' => 'Piper PA-28',
                            'description' => 'The Piper PA-28 Cherokee is a family of light aircraft designed for flight training and personal use.'
                        ]
                    ]
                ],
                [
                    'school_name' => 'Skyward Flight Training',
                    'course_duration' => '8 to 10 Months',
                    'fleet_size' => '18',
                    'fleet_types' => 'Diamond DA20, Diamond DA40, Piper Archer',
                    'flying_hours' => '200',
                    'aircrafts' => [
                        [
                            'name' => 'Diamond DA20',
                            'description' => 'The Diamond DA20 is a two-seat, composite material training aircraft known for its excellent safety record and fuel efficiency.'
                        ],
                        [
                            'name' => 'Diamond DA40',
                            'description' => 'The Diamond DA40 is a four-seat, composite aircraft with a glass cockpit and exceptional visibility.'
                        ],
                        [
                            'name' => 'Piper PA-28 Archer',
                            'description' => 'The Piper Archer is a reliable training aircraft with traditional instrumentation and proven performance.'
                        ],
                        [
                            'name' => 'Cessna 182 Skylane',
                            'description' => 'The Cessna 182 is a four-seat, single-engine aircraft perfect for advanced training and cross-country flights.'
                        ]
                    ]
                ],
                [
                    'school_name' => 'AeroPro Flight Academy',
                    'course_duration' => '12 to 14 Months',
                    'fleet_size' => '32',
                    'fleet_types' => 'Cirrus SR20, Beechcraft Bonanza, Cessna 206',
                    'flying_hours' => '280',
                    'aircrafts' => [
                        [
                            'name' => 'Cirrus SR20',
                            'description' => 'The Cirrus SR20 features a composite airframe, advanced avionics, and a whole-airframe parachute system.'
                        ],
                        [
                            'name' => 'Beechcraft G36 Bonanza',
                            'description' => 'The Bonanza is a high-performance single-engine aircraft known for its distinctive V-tail and excellent cruise performance.'
                        ],
                        [
                            'name' => 'Cessna 206 Stationair',
                            'description' => 'The Cessna 206 is a rugged utility aircraft capable of operating from rough fields and carrying heavy loads.'
                        ],
                        [
                            'name' => 'Piper Seminole',
                            'description' => 'The Piper PA-44 Seminole is a twin-engine aircraft used for multi-engine training with counter-rotating propellers.'
                        ]
                    ]
                ],
                [
                    'school_name' => 'Pacific Wings Institute',
                    'course_duration' => '9 to 11 Months',
                    'fleet_size' => '22',
                    'fleet_types' => 'Robinson R44, Schweizer 300, Bell 206',
                    'flying_hours' => '150',
                    'aircrafts' => [
                        [
                            'name' => 'Robinson R44',
                            'description' => 'The Robinson R44 is a four-seat, piston-powered helicopter widely used for training and commercial operations.'
                        ],
                        [
                            'name' => 'Schweizer 300',
                            'description' => 'The Schweizer 300 is a light utility helicopter known for its stability and excellent training characteristics.'
                        ],
                        [
                            'name' => 'Bell 206 JetRanger',
                            'description' => 'The Bell 206 is a popular five-seat helicopter used worldwide for training, tourism, and utility work.'
                        ],
                        [
                            'name' => 'Robinson R22',
                            'description' => 'The Robinson R22 is a two-seat, piston-powered helicopter that revolutionized helicopter training with its low operating costs.'
                        ]
                    ]
                ],
                [
                    'school_name' => 'Global Flight Center',
                    'course_duration' => '11 to 13 Months',
                    'fleet_size' => '28',
                    'fleet_types' => 'Cessna 172, Piper Seneca, Diamond Star',
                    'flying_hours' => '260',
                    'aircrafts' => [
                        [
                            'name' => 'Cessna 172S Skyhawk SP',
                            'description' => 'The modern Cessna 172S features a glass cockpit, increased useful load, and improved performance.'
                        ],
                        [
                            'name' => 'Piper PA-34 Seneca',
                            'description' => 'The Piper Seneca is a popular twin-engine aircraft used for multi-engine and instrument training.'
                        ],
                        [
                            'name' => 'Diamond DA42',
                            'description' => 'The Diamond DA42 is a twin-engine aircraft with diesel engines, offering excellent fuel efficiency and modern avionics.'
                        ],
                        [
                            'name' => 'Cessna 182T Turbo',
                            'description' => 'The turbocharged Cessna 182 offers improved high-altitude performance and better climb rates.'
                        ]
                    ]
                ],
                [
                    'school_name' => 'Elite Aviation College',
                    'course_duration' => '7 to 9 Months',
                    'fleet_size' => '20',
                    'fleet_types' => 'Cirrus SR22, Mooney M20, Beechcraft Baron',
                    'flying_hours' => '220',
                    'aircrafts' => [
                        [
                            'name' => 'Cirrus SR22',
                            'description' => 'The Cirrus SR22 is a high-performance composite aircraft with a parachute system and advanced avionics.'
                        ],
                        [
                            'name' => 'Mooney M20',
                            'description' => 'The Mooney M20 series is known for its efficient design, high cruise speeds, and retractable landing gear.'
                        ],
                        [
                            'name' => 'Beechcraft Baron',
                            'description' => 'The Beechcraft Baron is a high-performance twin-engine aircraft with excellent speed and payload capabilities.'
                        ],
                        [
                            'name' => 'Piper Malibu Mirage',
                            'description' => 'The Piper Malibu is a pressurized single-engine aircraft capable of high-altitude flight with cabin comfort.'
                        ]
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