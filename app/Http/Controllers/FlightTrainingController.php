<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightTrainingController extends Controller
{
    public function index()
    {
        $pageData = [
            'title' => 'Flight Training for Commercial Pilot Licence (CPL)',
            'description' => 'Complete guide to flight training for Commercial Pilot Licence in India. Step-by-step process from SPL to CPL with DGCA flying hours requirements.',
            'hero' => [
                'title' => 'Flight Training for Commercial Pilot Licence (CPL)',
                'subtitle' => 'Once you complete your DGCA Ground Subjects, the next step is Flight Training – the practical stage where you transform classroom knowledge into real flying skills.',
                'background' => 'bg-gradient-primary'
            ],
            'training_steps' => [
                [
                    'step' => 'Step 1: Student Pilot Licence (SPL)',
                    'icon' => '📍',
                    'description' => 'Your first licence – allows you to start flying training.',
                    'requirements' => [
                        'Requirement: Class 2 Medical + DGCA exam',
                        'No flying hours yet'
                    ]
                ],
                [
                    'step' => 'Step 2: Private Pilot Licence (PPL)',
                    'icon' => '✈️',
                    'description' => 'Learn the basics of flying.',
                    'requirements' => [
                        '40 hours minimum flying (dual + solo)',
                        'Skills: take-off, landing, basic maneuvers, short cross-country'
                    ]
                ],
                [
                    'step' => 'Step 3: Commercial Pilot Licence (CPL) Training',
                    'icon' => '🌍',
                    'description' => 'Build hours & professional flying skills.',
                    'requirements' => [
                        '200 hours total flying (including PPL)',
                        '100 hrs Pilot-in-Command (solo)',
                        '20 hrs Cross-Country (long routes)',
                        '10 hrs Instrument Flying (real + simulator)',
                        '5 hrs Night Flying (10 take-offs & landings)'
                    ]
                ],
                [
                    'step' => 'Step 4: Skill Test (Check Ride)',
                    'icon' => '✅',
                    'description' => 'Final flying test by DGCA Examiner.',
                    'requirements' => [
                        'General flying, navigation, instrument check'
                    ]
                ],
                [
                    'step' => 'Step 5: CPL Issue',
                    'icon' => '🎖️',
                    'description' => 'You are now a Commercial Pilot Licence holder!',
                    'requirements' => [
                        'Eligible to join airlines as a First Officer',
                        'Pathway to Type Rating & Airline Jobs'
                    ]
                ]
            ],
            'journey_summary' => [
                'title' => '✨ From SPL → PPL → CPL → Airline Career ✨',
                'description' => 'Your dream of flying professionally takes shape step by step.'
            ],
            'flying_hours' => [
                'title' => 'Summary of Flying Hours (India – DGCA Norms)',
                'data' => [
                    ['Type of Flying', 'Minimum Hours'],
                    ['Total Flying (including PPL)', '200 hrs'],
                    ['Pilot-in-Command (PIC)', '100 hrs'],
                    ['Cross-Country PIC', '20 hrs'],
                    ['Instrument Flying', '10 hrs'],
                    ['Night Flying (PIC)', '5 hrs'],
                    ['PPL Requirement', '40 hrs']
                ]
            ]
        ];

        return view('flight-training', compact('pageData'));
    }
}