<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DgcaSyllabus;
use Illuminate\Http\Request;

class DgcaGroundClasses extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'DGCA Ground Classes - Skylead Aviation',
            'meta_description' => 'Comprehensive DGCA ground training program covering Air Regulations, Aviation Meteorology, Air Navigation, Aircraft Technical, and RTR (Aero) subjects.',
            'pageData' => [
                'hero' => [
                    'title' => 'DGCA Ground Classes',
                    'subtitle' => 'Comprehensive Theoretical Training for Aspiring Pilots',
                    'description' => 'At Skylead Aviation, we ensure that every aspiring pilot is thoroughly prepared before taking to the skies. Our Ground School program provides comprehensive training in aviation theory, regulations, and procedures as per DGCA requirements.'
                ],
                
                'overview' => [
                    'title' => 'DGCA Theoretical Training Program',
                    'description' => 'As per DGCA (Directorate General of Civil Aviation) requirements, our Ground School program provides comprehensive training in aviation theory, regulations, and procedures. This knowledge is essential not only to clear DGCA examinations but also to build the strong foundation every safe and confident pilot needs.',
                    'highlight' => 'With Skylead Aviation, you don\'t just learn how to fly—you gain the complete aeronautical understanding required to excel in your aviation career.'
                ],

                'subjects' => [
                    [
                        'icon' => 'fas fa-book',
                        'title' => 'Air Regulations',
                        'description' => 'Covers ICAO & DGCA rules, licensing requirements, air traffic services, classification of airspace, communication procedures, flight rules (VFR/IFR), etc.',
                        'benefit' => 'Ensures pilots know the legal and regulatory framework of flying.'
                    ],
                    [
                        'icon' => 'fas fa-cloud-sun',
                        'title' => 'Aviation Meteorology',
                        'description' => 'Study of weather patterns, clouds, winds, storms, icing, turbulence, meteorological charts, and forecasts.',
                        'benefit' => 'Helps pilots interpret weather and make safe flight decisions.'
                    ],
                    [
                        'icon' => 'fas fa-compass',
                        'title' => 'Air Navigation',
                        'description' => 'Covers general navigation, radio navigation (VOR, DME, ADF, GPS), flight planning, time-speed-distance calculations, great circle/mercator charts.',
                        'benefit' => 'Essential for accurate route planning and position fixing.'
                    ],
                    [
                        'icon' => 'fas fa-cogs',
                        'title' => 'Aircraft Technical (General & Specific)',
                        'description' => 'Knowledge of aerodynamics, engines (piston & turbine), electrical, hydraulic, fuel systems, landing gear, instruments, performance & limitations.',
                        'detail' => '"General" covers overall systems; "Specific" relates to the aircraft type you will fly.',
                        'benefit' => 'Helps pilots understand how the aircraft works and manage technical issues.'
                    ],
                    [
                        'icon' => 'fas fa-broadcast-tower',
                        'title' => 'RTR (Aero) – Radio Telephony Restricted License',
                        'description' => 'Covers radio communication procedures with ATC, phraseology, emergency communications.',
                        'benefit' => 'Needed for pilots to legally operate aircraft radios.'
                    ]
                ],

                'whyRequired' => [
                    'title' => 'Why is Ground Training Required?',
                    'points' => [
                        [
                            'icon' => 'fas fa-shield-alt',
                            'title' => 'Safety',
                            'description' => 'Pilots must understand theory (weather, navigation, regulations) before flying.'
                        ],
                        [
                            'icon' => 'fas fa-file-contract',
                            'title' => 'Compliance',
                            'description' => 'DGCA licensing requires passing written exams in these subjects.'
                        ],
                        [
                            'icon' => 'fas fa-brain',
                            'title' => 'Decision-Making',
                            'description' => 'Knowledge helps pilots handle unexpected situations (engine failures, weather diversions, communication issues).'
                        ],
                        [
                            'icon' => 'fas fa-user-tie',
                            'title' => 'Professionalism',
                            'description' => 'Ensures Indian-trained pilots meet international ICAO standards.'
                        ],
                        [
                            'icon' => 'fas fa-graduation-cap',
                            'title' => 'Foundation for Flight Training',
                            'description' => 'Ground knowledge supports practical flying lessons (e.g., planning a cross-country flight requires strong navigation skills).'
                        ]
                    ]
                ],

                'whyChoose' => [
                    'title' => 'Why Choose Skylead for DGCA Ground Training?',
                    'features' => [
                        [
                            'icon' => 'fas fa-chalkboard-teacher',
                            'title' => 'Expert Trainers',
                            'description' => 'Learn from seasoned aviation professionals.'
                        ],
                        [
                            'icon' => 'fas fa-book-open',
                            'title' => 'DGCA-Focused Curriculum',
                            'description' => 'Designed exactly as per exam standards.'
                        ],
                        [
                            'icon' => 'fas fa-briefcase',
                            'title' => 'Career Placement Support',
                            'description' => 'Strong industry links to help you land jobs.'
                        ],
                        [
                            'icon' => 'fas fa-chart-line',
                            'title' => 'Proven Success Rate',
                            'description' => 'Majority of students trained are successfully placed.'
                        ],
                        [
                            'icon' => 'fas fa-laptop',
                            'title' => 'Modern Learning Experience',
                            'description' => 'Interactive, practical, and confidence-building training.'
                        ]
                    ]
                ],

                'quickFacts' => [
                    'title' => 'Quick Facts About DGCA Ground Training',
                    'points' => [
                        'Comprehensive coverage of all 5 DGCA theoretical subjects',
                        'Training duration: 6-8 weeks intensive program',
                        '100% DGCA syllabus coverage',
                        'Regular mock tests and assessments',
                        'Study material and notes provided',
                        'Flexible batch timings available'
                    ]
                ]
            ]
        ];

        $syllabus = DgcaSyllabus::all()->toArray();
        $data['syllabus'] = $syllabus;

        return view('dgca-ground-classes', $data);
    }
}