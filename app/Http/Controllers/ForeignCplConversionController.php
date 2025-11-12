<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForeignCplConversionController extends Controller
{
    public function index()
    {
        $pageData = [
            'title' => 'Foreign CPL Conversion to DGCA CPL (India)',
            'description' => 'Complete guide for converting your foreign CPL to DGCA CPL in India. Step-by-step process, eligibility requirements, and flying hours requirements.',
            'hero' => [
                'title' => 'Foreign CPL Conversion to DGCA CPL (India)',
                'subtitle' => 'The Directorate General of Civil Aviation (DGCA) allows conversion of an ICAO-compliant CPL (from countries like USA, Canada, South Africa, Australia, New Zealand, etc.) into an Indian CPL.',
                'background' => 'bg-gradient-primary'
            ],
            'eligibility' => [
                'title' => '✅ Eligibility Requirements',
                'items' => [
                    'Must hold a valid Commercial Pilot Licence (CPL) issued by an ICAO contracting state (e.g., FAA, CASA, SACAA, TC, CAANZ).',
                    'Minimum 200 flying hours total (as per DGCA requirements).',
                    'Valid Class 1 DGCA Medical in India.',
                    'Valid Foreign Licence and Logbook.',
                    'Pass DGCA theory exams in India.',
                    'Pass RTR (Aero) Licence (Radio Telephony, issued by WPC, Ministry of Communications, India).'
                ]
            ],
            'conversion_process' => [
                'title' => '📍 Step-by-Step Conversion Process',
                'steps' => [
                    [
                        'title' => 'Step 1: Document Verification & File Submission',
                        'items' => [
                            'Upload all documents on eGCA (DGCA online portal).',
                            'Required documents:',
                            'Application Form (through eGCA)',
                            'Foreign CPL copy (attested)',
                            'Valid Class 1 Indian Medical certificate',
                            'Logbook (certified) with flying hours breakdown',
                            'Certificate of authenticity from foreign CAA (Licence Verification Letter – LVL)',
                            'Passport (for training country proof)',
                            '10th & 12th Marksheet (Physics & Math mandatory)'
                        ]
                    ],
                    [
                        'title' => 'Step 2: DGCA Theory Exams',
                        'items' => [
                            'Conducted by DGCA, India (at exam centres).',
                            'Subjects to clear:',
                            'Air Regulations ✈️',
                            'Aviation Meteorology ☁️',
                            'Air Navigation 🧭',
                            'Aircraft Technical (General + Specific for type) ⚙️',
                            '⚠️ Even if you studied abroad, you must pass DGCA exams.'
                        ]
                    ],
                    [
                        'title' => 'Step 3: RTR (Aero) Licence (Radio Telephony)',
                        'items' => [
                            'Conducted by WPC (Wireless Planning & Coordination Wing), India.',
                            'Two parts:',
                            'Written (Air regulations & communication procedures)',
                            'Viva/interview (practical radio telephony & emergency procedures)',
                            'Mandatory for using radio equipment in aircraft in India.'
                        ]
                    ],
                    [
                        'title' => 'Step 4: Flying Skill Test (Check Ride in India)',
                        'items' => [
                            'Conducted by a DGCA Examiner (Check Pilot) in India.',
                            'You must demonstrate:',
                            'General flying skills',
                            'Cross-country navigation',
                            'Instrument flying procedures',
                            'Night flying (if applicable)',
                            'This ensures you meet DGCA\'s flight standards.'
                        ]
                    ],
                    [
                        'title' => 'Step 5: Issue of DGCA CPL',
                        'items' => [
                            'After successful completion of:',
                            '✅ DGCA exams',
                            '✅ RTR (Aero)',
                            '✅ Class 1 Medical',
                            '✅ Skill Test',
                            'DGCA issues your Indian CPL, allowing you to apply for airline jobs.'
                        ]
                    ]
                ]
            ],
            'flying_hours' => [
                'title' => '📊 Flying Hours Requirement (DGCA Minimums)',
                'requirements' => [
                    '200 total flying hours (including all stages)',
                    '100 hrs PIC (Pilot-in-Command)',
                    '20 hrs Cross-Country PIC',
                    '10 hrs Instrument Flying (5 hrs can be in simulator)',
                    '5 hrs Night Flying PIC (with 10 take-offs & landings)'
                ],
                'note' => '💡 Note: If your foreign CPL has 250 hrs (like USA FAA), you already meet DGCA 200 hrs. If your logbook doesn\'t meet any sub-requirement, you may need hour-building in India before conversion.'
            ],
            'summary' => [
                'title' => '🌍 Summary: Foreign CPL to DGCA CPL Path',
                'steps' => [
                    '✅ Get foreign CPL (ICAO-compliant, with ≥200 hrs).',
                    '✅ Apply for Indian Class 1 Medical.',
                    '✅ Submit documents on eGCA portal.',
                    '✅ Pass DGCA exams (Air Regs, Met, Nav, Technical).',
                    '✅ Clear RTR (Aero) exam in India.',
                    '✅ Pass Skill Test (Check Ride) in India.',
                    '🎖️ Get DGCA CPL → Eligible for airline Type Rating & airline jobs.'
                ]
            ]
        ];

        return view('foreign-cpl-conversion', compact('pageData'));
    }
}