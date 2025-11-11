<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\FlyingSchool;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{

    /**
     * Show flight training details for a specific destination country.
     */
    public function destinationCountry($slug = 'usa')
    {
        $destination = Destination::with(['flyingSchools', 'flyingSchools.aircrafts'])
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        // Transform to match your existing structure
        $countryData = [
            'country_name' => $destination->country_name,
            'country_title' => $destination->country_title,
            'country_description' => $destination->country_description,
            'no_of_schools' => $destination->no_of_schools,
            'location' => $destination->location,
            'images' => $destination->images ?? [],
            'guide' => $destination->guide ?? [],
            'gallery' => $destination->gallery ?? [],
            'advantages' => $destination->advantages ?? [],
            'courses_offered' => $destination->courses_offered ?? [],
            'flying_schools' => $this->formatFlyingSchools($destination->flyingSchools)
        ];

        return view('destination.index', compact('countryData'));
    }

    /**
     * Format flying schools data for the frontend
     */
    private function formatFlyingSchools($flyingSchools)
    {
        return $flyingSchools->map(function($school) {
            return [
                'school_name' => $school->name,
                'course_duration' => $school->course_duration,
                'fleet_size' => $school->fleet_size,
                'fleet_types' => $school->aircrafts->pluck('name')->join(', '),
                'flying_hours' => $school->flying_hours,
                'aircrafts' => $school->aircrafts->map(function($aircraft) {
                    return [
                        'name' => $aircraft->name,
                        'description' => $aircraft->description,
                        'img' => $aircraft->image ? Storage::url($aircraft->image) : null
                    ];
                })->toArray()
            ];
        })->toArray();
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