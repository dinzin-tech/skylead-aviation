@extends('layouts.app')

@section('title', $countryData['country_title'] ?? 'Flight Training Destination')

@section('content')
   <!-- Hero Section -->
@include('destination.sections.hero', [
        'countryName' => $countryData['country_name'] ?? 'The United States',
        'countryFlag' => $countryData['flag'] ?? 'img/flags/usa.png',
        'title' => $countryData['country_title'] ?? 'Fly High in the Skies',
        'description' => $countryData['country_description'] ?? 'World-class flight training programs',
        'ctaText' => 'Start Your Journey',
        'ctaLink' => '#enroll',
        'stats' => [
            [
                'icon' => 'ti-home', 
                'number' => $countryData['no_of_schools'] ?? '12',
                'label' => 'Flying Schools'
            ],
            [
                'icon' => 'ti-location-pin',
                'number' => $countryData['location'] ?? 'USA',
                'label' => 'Course Location'
            ]
        ],
        'images' => [
            'img/elements/a.jpg',
            'img/elements/a2.jpg', 
            'img/elements/d.jpg',
            'img/elements/f1.jpg'
        ]
    ])
    @include('destination.sections.destination_hero')
    @include('destination.sections.infostats')
    @include('destination.sections.country_overview')
    @include('destination.sections.gallery')
    @include('destination.sections.advantages')
    @include('destination.sections.flying-schools-tabs')
    @include('destination.sections.courses-offered', ['countryData' => $countryData])


@endsection
@push('head')
<link rel="stylesheet" href="{{ asset('css/destinations.css') }}" />
@endpush





  



