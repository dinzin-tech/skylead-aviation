<?php
// app/Http/Controllers/TypeRatingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeRatingController extends Controller
{
    // A320 Type Rating Page
    public function a320TypeRating()
    {
        $pageData = [
            'title' => 'A320 Type Rating Training | DGCA-Compliant Program',
            'description' => 'Complete A320 Type Rating training program compliant with DGCA regulations. Become a certified Airbus A320 pilot with our comprehensive training.',
            'hero' => [
                'title' => 'A320 Type Rating Training',
                'subtitle' => 'DGCA-Compliant Program for Commercial Pilots'
            ],
            'training_steps' => [
                [
                    'step' => 'Pre-Requisites',
                    'icon' => '📋',
                    'description' => 'Essential requirements before starting A320 Type Rating',
                    'requirements' => [
                        'Valid CPL (DGCA) with Multi-Engine & Instrument Rating',
                        'Valid DGCA Class 1 Medical Certificate',
                        'Current RTR(A) Licence',
                        'English language proficiency (ICAO Level 4 or above)'
                    ]
                ],
                [
                    'step' => 'Enroll in DGCA-Approved TRTO',
                    'icon' => '🏫',
                    'description' => 'Join approved Type Rating Training Organization',
                    'requirements' => [
                        'CAE, BAA, SkyBlue, FSTC, Sim Aero (India & abroad)',
                        'Verify DGCA approval status',
                        'Complete enrollment formalities'
                    ]
                ],
                [
                    'step' => 'Ground Training',
                    'icon' => '📚',
                    'description' => 'Technical & Non-Technical classroom training',
                    'requirements' => [
                        'Classroom & CBT (Computer-Based Training)',
                        'Aircraft systems, performance, procedures',
                        'Duration: 10-14 days'
                    ]
                ],
                [
                    'step' => 'Simulator Training',
                    'icon' => '🎮',
                    'description' => 'Full Flight Simulator - A320',
                    'requirements' => [
                        'Fixed Base + Full Motion simulators',
                        'Real-world scenario training',
                        'Duration: 9-12 sessions (36-40 hours)'
                    ]
                ],
                [
                    'step' => 'Skill Test (LST)',
                    'icon' => '✅',
                    'description' => 'Licence Skill Test with DGCA examiner',
                    'requirements' => [
                        'Final check ride in simulator',
                        'DGCA/TRI (Type Rating Instructor/Examiner)',
                        'Covers all operational scenarios'
                    ]
                ],
                [
                    'step' => 'Base Training',
                    'icon' => '✈️',
                    'description' => 'Actual aircraft training',
                    'requirements' => [
                        '6 actual take-offs & landings in real A320',
                        'Mandatory DGCA requirement',
                        'Scheduled with airline/TRTO'
                    ]
                ],
                [
                    'step' => 'DGCA Endorsement',
                    'icon' => '📄',
                    'description' => 'Final licence endorsement',
                    'requirements' => [
                        'Type Rating endorsed on your CPL',
                        'Eligible for Airline Jobs as First Officer',
                        'Complete documentation process'
                    ]
                ]
            ],
            'journey_summary' => [
                'title' => 'Your Path to A320 Certification',
                'description' => 'Complete your A320 Type Rating in 6-8 weeks and become eligible for First Officer positions with major airlines.'
            ],
            'flying_hours' => [
                'title' => 'A320 Type Rating Training Breakdown',
                'data' => [
                    ['Training Phase', 'Duration', 'Hours/Sessions'],
                    ['Ground School', '2-3 weeks', '10-14 days'],
                    ['Simulator Training', '3-4 weeks', '36-40 hours'],
                    ['Base Training', '1-2 days', '6 landings'],
                    ['Total Duration', '6-8 weeks', 'Complete Program']
                ]
            ],
            'aircraft_specs' => [
                'type' => 'Airbus A320',
                'cockpit' => 'Glass Cockpit - Fly-by-wire',
                'controls' => 'Sidestick controllers',
                'systems' => 'ECAM monitoring',
                'automation' => 'High level of automation',
                'philosophy' => 'Flight envelope protection'
            ]
        ];

        return view('a320', compact('pageData'));
    }

    // B737 Type Rating Page
    public function b737TypeRating()
    {
        $pageData = [
            'title' => 'B737 Type Rating Training | DGCA-Compliant Program',
            'description' => 'Complete Boeing 737 Type Rating training program compliant with DGCA regulations. Become a certified B737 pilot with comprehensive training.',
            'hero' => [
                'title' => 'B737 Type Rating Training',
                'subtitle' => 'DGCA-Compliant Program for Commercial Pilots'
            ],
            'training_steps' => [
                [
                    'step' => 'Pre-Requisites',
                    'icon' => '📋',
                    'description' => 'Essential requirements before starting B737 Type Rating',
                    'requirements' => [
                        'Valid DGCA CPL/ATPL with Multi-Engine & Instrument Rating',
                        'Valid DGCA Class 1 Medical Certificate',
                        'Current RTR(A) Licence',
                        'ICAO English Proficiency (Level 4+)'
                    ]
                ],
                [
                    'step' => 'Join DGCA-Approved TRTO',
                    'icon' => '🏫',
                    'description' => 'Enroll in approved Type Rating Training Organisation',
                    'requirements' => [
                        'CAE, FSTC, SkyBlue, Sim Aero, BAA',
                        'Verify DGCA approval status',
                        'Complete enrollment process'
                    ]
                ],
                [
                    'step' => 'Ground School',
                    'icon' => '📚',
                    'description' => 'CBT + classroom technical training',
                    'requirements' => [
                        'In-depth B737 systems & performance',
                        'Technical training modules',
                        'Duration: 2 weeks'
                    ]
                ],
                [
                    'step' => 'Simulator Training',
                    'icon' => '🎮',
                    'description' => 'Full Flight Simulator - B737NG',
                    'requirements' => [
                        'Normal, abnormal, and emergency scenarios',
                        'FFS Level D, 6-axis motion',
                        'Duration: 36-40 hours'
                    ]
                ],
                [
                    'step' => 'Skill Test (LST)',
                    'icon' => '✅',
                    'description' => 'Licence Skill Test with examiner',
                    'requirements' => [
                        'Conducted by DGCA/approved examiner',
                        'Comprehensive operational testing',
                        'Simulator-based assessment'
                    ]
                ],
                [
                    'step' => 'Base Training',
                    'icon' => '✈️',
                    'description' => 'Actual B737 aircraft training',
                    'requirements' => [
                        '6 take-offs and landings on actual B737',
                        'Mandatory DGCA requirement',
                        'Aircraft availability dependent'
                    ]
                ],
                [
                    'step' => 'Licence Endorsement',
                    'icon' => '📄',
                    'description' => 'DGCA licence endorsement',
                    'requirements' => [
                        'B737 Type Rating endorsed on CPL',
                        'Eligible for airline First Officer positions',
                        'Documentation completion'
                    ]
                ]
            ],
            'journey_summary' => [
                'title' => 'Your Path to B737 Certification',
                'description' => 'Complete your B737 Type Rating in 6-8 weeks and qualify for First Officer roles with leading airlines.'
            ],
            'flying_hours' => [
                'title' => 'B737 Type Rating Training Breakdown',
                'data' => [
                    ['Training Phase', 'Duration', 'Hours/Sessions'],
                    ['Ground School', '2 weeks', 'Technical training'],
                    ['Simulator Training', '3-4 weeks', '36-40 hours'],
                    ['Base Training', '1-2 days', '6 landings'],
                    ['Total Duration', '6-8 weeks', 'Complete Program']
                ]
            ],
            'aircraft_specs' => [
                'type' => 'Boeing 737',
                'cockpit' => 'Traditional with modern avionics',
                'controls' => 'Control yoke',
                'systems' => 'EICAS monitoring',
                'automation' => 'Moderate automation',
                'philosophy' => 'Manual control emphasis'
            ]
        ];

        return view('b737', compact('pageData'));
    }
}