@extends('layouts.app')

@section('title', $countryData['country_title'] ?? 'Flight Training Destination')

@section('content')
   <!-- Hero Section -->
@include('destination.sections.hero', [
    'countryName' => $countryData['country_name'] ?? 'USA',
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
            'label' => 'Location'
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
   
    @include('destination.sections.advantages')
    @include('destination.sections.gallery')
    @include('destination.sections.flying-schools-tabs')


@endsection
@push('head')
<link rel="stylesheet" href="{{ asset('css/destinations.css') }}" />
@endpush
@push('scripts')
    <script>
    // Initialize Bootstrap tabs properly
    document.addEventListener('DOMContentLoaded', function() {
        // Get all tab buttons
        const tabButtons = document.querySelectorAll('#schoolTabs .nav-link');
        
        // Add click event listeners to each tab button
        tabButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all tabs and panes
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.setAttribute('aria-selected', 'false');
                });
                
                const allPanes = document.querySelectorAll('.tab-pane');
                allPanes.forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                
                // Add active class to clicked tab
                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
                
                // Show corresponding pane
                const targetPane = document.querySelector(this.getAttribute('data-bs-target'));
                if (targetPane) {
                    targetPane.classList.add('show', 'active');
                }
            });
        });
        
        // Alternative method using Bootstrap's built-in functionality
        if (typeof bootstrap !== 'undefined') {
            var triggerTabList = [].slice.call(document.querySelectorAll('#schoolTabs button[data-bs-toggle="tab"]'));
            triggerTabList.forEach(function (triggerEl) {
                var tabTrigger = new bootstrap.Tab(triggerEl);
                triggerEl.addEventListener('click', function (event) {
                    event.preventDefault();
                    tabTrigger.show();
                });
            });
        }
    });
</script>
@endpush





  



