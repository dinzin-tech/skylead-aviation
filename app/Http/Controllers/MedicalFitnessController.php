<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalFitnessController extends Controller
{
    public function index()
    {
        $pageData = [
            'title' => 'Medical Fitness Requirements for CPL in India',
            'description' => 'Complete guide to DGCA medical fitness requirements for Commercial Pilot Licence in India. Class 1 and Class 2 medical exams process, tests, and requirements.',
            'hero' => [
                'title' => 'Medical Fitness Requirements for CPL in India',
                'subtitle' => 'Before beginning pilot training in India, every student must pass DGCA-approved medical assessments.',
                'background' => 'bg-gradient-primary'
            ],
            'intro' => [
                'items' => [
                    'Class 2 Medical → Required for Student Pilot Licence (SPL) and to start flying.',
                    'Class 1 Medical → Required before you can be issued a Commercial Pilot Licence (CPL).'
                ]
            ],
            'class2_medical' => [
                'title' => '1️⃣ Class 2 Medical (Initial Medical)',
                'when' => '📍 When: First step before applying for Student Pilot Licence (SPL).',
                'process_title' => 'Process:',
                'steps' => [
                    'Choose a DGCA-Empanelled Class 2 Medical Examiner',
                    'Book an Appointment',
                    'Medical Tests Include:',
                    'Submission to DGCA'
                ],
                'tests' => [
                    'General physical examination (height, weight, BMI)',
                    'ENT check (ears, hearing, sinuses)',
                    'Eye exam (vision, colour vision, depth perception)',
                    'ECG (heart)',
                    'Chest X-ray',
                    'Blood and urine tests (sugar, haemoglobin, etc.)'
                ],
                'result' => '✅ Once you have Class 2 Medical, you can apply for SPL and start flying training.'
            ],
            'class1_medical' => [
                'title' => '2️⃣ Class 1 Medical (CPL Requirement)',
                'when' => '📍 When: Must be done before DGCA issues your CPL. Most students do it soon after starting flight training.',
                'process_title' => 'Process:',
                'steps' => [
                    'Apply Online (eGCA Portal)',
                    'Appointment Allotment',
                    'Medical Tests Include (More Detailed than Class 2):',
                    'Result'
                ],
                'centers' => [
                    'AFCME (Air Force Central Medical Establishment), Delhi',
                    'IAM (Institute of Aerospace Medicine), Bengaluru',
                    'MEC (Medical Examination Centre), Mumbai',
                    'Some authorized civil aviation medical examiners (for renewal only).'
                ],
                'tests' => [
                    'General physical exam (height, weight, BMI, blood pressure)',
                    'Vision test (far, near, colour vision, depth perception)',
                    'ENT check (audiometry for hearing)',
                    'Chest X-ray',
                    'ECG (resting & treadmill test in some cases)',
                    'Blood & urine tests (sugar, cholesterol, liver/kidney function, haemoglobin, HIV, etc.)',
                    'Lung function test (spirometry)',
                    'Mental health evaluation (basic psychological tests/interview)',
                    'Additional tests if examiner finds anything abnormal'
                ],
                'result' => '✅ Class 1 Medical is mandatory for DGCA to issue you a Commercial Pilot Licence (CPL).',
                'validity' => 'Validity: 1 year (up to age 40), then renewals required more frequently.'
            ],
            'comparison' => [
                'title' => '📊 Quick Comparison: Class 2 vs Class 1',
                'data' => [
                    ['Aspect', 'Class 2 Medical', 'Class 1 Medical'],
                    ['Required For', 'SPL, PPL, start of training', 'CPL issue, airline flying'],
                    ['Where Done', 'DGCA-empanelled doctors across India', 'AFCME (Delhi), IAM (Bengaluru), MEC (Mumbai), few civil centres'],
                    ['Tests', 'Basic (physical, vision, ENT, ECG, X-ray, blood/urine)', 'Detailed (all Class 2 + advanced vision, audiometry, spirometry, treadmill, psychology)'],
                    ['Validity', '2 years (till age 40)', '1 year (till age 40), 6 months after 40'],
                    ['Issuing Authority', 'DGCA (based on empanelled examiner\'s report)', 'DGCA (based on specialized centre\'s evaluation)']
                ]
            ],
            'why_become_pilot' => [
                'title' => 'Why Become a Commercial Pilot?',
                'reasons' => [
                    [
                        'title' => 'Fastest Growing Industry',
                        'description' => 'Aviation is one of the fastest expanding sectors worldwide. Passenger traffic is increasing rapidly due to globalization, tourism, and affordable flying.'
                    ],
                    [
                        'title' => 'India\'s Aviation Growth',
                        'description' => 'India is projected to become the 3rd largest aviation market globally by 2030. Domestic and international connectivity is improving, fueling demand for pilots.'
                    ],
                    [
                        'title' => 'Expansion of Airlines',
                        'description' => 'Airlines are adding hundreds of new aircraft to their fleets. Each new aircraft requires multiple trained pilots, ensuring strong job opportunities.'
                    ],
                    [
                        'title' => 'Prestige of the Profession',
                        'description' => 'Pilots are highly respected due to their responsibility and specialized skills. The role carries social recognition and admiration.'
                    ],
                    [
                        'title' => 'Global Career Opportunities',
                        'description' => 'Pilot licenses (especially CPL/ATPL) are recognized internationally. Qualified pilots can find jobs with airlines around the world.'
                    ],
                    [
                        'title' => 'High Earning Potential',
                        'description' => 'Commercial pilots enjoy attractive salaries and benefits. Pay scales increase significantly with experience and seniority (First Officer → Captain → Training Captain).'
                    ],
                    [
                        'title' => 'Professional Growth & Development',
                        'description' => 'Clear career progression with opportunities to move into instructing, management, or specialized flying (cargo, private jets, corporate aviation). Exposure to the latest technology, international operations, and continuous skill enhancement.'
                    ],
                    [
                        'title' => 'Dynamic Lifestyle',
                        'description' => 'Opportunity to travel to new destinations. Diverse work environment with constant challenges and excitement.'
                    ]
                ]
            ]
        ];

        return view('medical-fitness', compact('pageData'));
    }
}