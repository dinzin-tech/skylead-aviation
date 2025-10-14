
@extends('layouts.app')

@section('title',  'Home - Skylead Aviation')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}" />
@endpush

@section('content')
    <!--================ Start Home Banner Area =================-->
    @include('sections.banner')
    <!--================ End Home Banner Area =================-->

    {{-- about us secion start --}}
    @include('sections.about')
    {{-- about us secion end --}}

    <!--================ Start Feature Area =================-->
    {{-- @include('sections.features') --}}
    <!--================ End Feature Area =================-->

    <!--================ Start Popular Courses Area =================-->
    {{-- @include('sections.popular-courses') --}}
    @include('sections.programs')
    <!--================ End Popular Courses Area =================-->

    <!--================ Start Registration Area =================-->
    @include('sections.registration')
    <!--================ End Registration Area =================-->

    <!--================ Start Trainers Area =================-->
    {{-- @include('sections.trainers') --}}
    @include('sections.training-destinations')
    <!--================ End Trainers Area =================-->

    <!--================ Start Events Area =================-->
    {{-- @include('sections.events') --}}
    @include('sections.pilot-steps')
    <!--================ End Events Area =================-->

    <!--================ Start Testimonial Area =================-->
    {{-- @include('sections.testimonials') --}}
    <!--================ End Testimonial Area =================-->

    <!--================ Start FAQ Area =================-->
    @include('sections.faq')
    <!--================ End FAQ Area =================-->

@endsection


@push('scripts')
    <script src="{{ asset('js/leaflet.js') }}"></script>

    <script>
        // FAQ Filtering and Interaction
        document.addEventListener('DOMContentLoaded', function() {
            // Category Filtering
            const categoryButtons = document.querySelectorAll('.category_btn');
            const faqItems = document.querySelectorAll('.faq_item');
            
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    const selectedCategory = this.getAttribute('data-category');
                    
                    // Filter FAQ items
                    faqItems.forEach(item => {
                        const itemCategory = item.getAttribute('data-category');
                        
                        if (selectedCategory === 'All' || itemCategory === selectedCategory) {
                            item.style.display = 'block';
                            // Add slight animation
                            item.style.opacity = '0';
                            setTimeout(() => {
                                item.style.opacity = '1';
                            }, 50);
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
            
            // Smooth scroll to FAQ item when opening
            const faqButtons = document.querySelectorAll('.faq_btn');
            faqButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const target = this.getAttribute('data-target');
                    if (target) {
                        setTimeout(() => {
                            this.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }, 300);
                    }
                });
            });
            
            // Auto-open first FAQ item
            // const firstFaqButton = document.querySelector('.faq_btn');
            // if (firstFaqButton) {
            //     firstFaqButton.click();
            // }
        });
    </script>

    <script>
    // Initialize Map
    var map = L.map('map', {
      minZoom: 2,
      maxZoom: 6,
      worldCopyJump: true
    }).setView([50, 0], 2);

    // Add Tile Layer
    map.createPane('labels');
    map.getPane('labels').style.zIndex = 650;
    map.getPane('labels').style.pointerEvents = 'none';

    var baseLayer = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png').addTo(map);
    var labelsLayer = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
      pane: 'labels'
    }).addTo(map);

    // Highlighted Countries
    const highlightedCountries = ["India", "United States of America", "Australia", "South Africa", "Canada", "New Zealand"];

    function style(feature) {
      const name = feature.properties.name;
      const isHighlighted = highlightedCountries.includes(name);
      return {
        weight: 1,
        opacity: 1,
        color: isHighlighted ? '#002533' : 'white',
        dashArray: '3',
        fillOpacity: 0.8,
        fillColor: isHighlighted ? 'orange' : '#d9d9d9'
      };
    }

    // Load GeoJSON Data
    fetch('https://raw.githubusercontent.com/johan/world.geo.json/master/countries.geo.json')
      .then(response => response.json())
      .then(data => {
        L.geoJson(data, { style: style }).addTo(map);
      });

    // Add Pins
    const pinnedCountries = [
      { name: "India", lat: 20.5937, lng: 78.9629 },
      { name: "USA", lat: 37.0902, lng: -95.7129 },
      { name: "Australia", lat: -25.2744, lng: 133.7751 },
      { name: "South Africa", lat: -30.5595, lng: 22.9375 },
      { name: "Canada", lat: 56.1304, lng: -106.3468 },
      { name: "New Zealand", lat: -40.9006, lng: 174.886 }
    ];

    pinnedCountries.forEach(country => {
      L.marker([country.lat, country.lng])
        .bindPopup(`<b>${country.name}</b>`)
        .addTo(map);
    });
  </script>
@endpush