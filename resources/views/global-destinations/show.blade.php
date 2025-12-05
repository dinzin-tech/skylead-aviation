@extends('layouts.app')

@section('title', $destination->title)
@section('meta_description', Str::limit($destination->introduction, 160))

@push('head')
<link rel="stylesheet" href="{{ asset('css/global-destinations.css') }}" />
@endpush

@section('content')
<!-- Hero Section -->
{{-- <section class="global-hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="global-hero-content">
                    <!-- Country Header -->
                    <div class="global-country-header">
                        <div class="global-country-flag">
                            <img src="{{ asset('img/flags/' . strtolower($destination->slug) . '.png') }}" 
                                 alt="{{ $destination->country_name }}" 
                                 class="global-flag-img"
                                 onerror="this.src='{{ asset('img/flags/default.png') }}'">
                        </div>
                        <div class="global-country-name">{{ $destination->country_name }}</div>
                    </div>

                    <!-- Hero Title -->
                    <h1 class="global-hero-title">
                        {{ $destination->title }}
                    </h1>

                    <!-- Hero Description -->
                    <p class="global-hero-description">
                        {{ $destination->introduction }}
                    </p>

                    <!-- CTA Button -->
                    <div class="global-hero-cta">
                        <a href="#training-steps" class="global-cta-btn">
                            Explore Training Path
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Hero Stats -->
                    <div class="global-hero-stats">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="global-stat-item">
                                    <div class="global-stat-icon">
                                        <i class="bi bi-clock-history"></i>
                                    </div>
                                    <div class="global-stat-content">
                                        <h4>{{ $destination->total_hours_required }}+</h4>
                                        <p>Total Hours Required</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="global-stat-item">
                                    <div class="global-stat-icon">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <div class="global-stat-content">
                                        <h4>{{ $destination->regulatory_body }}</h4>
                                        <p>Regulatory Body</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="global-hero-image-grid">
                    <div class="row g-3">
                        @if($destination->images && count($destination->images) > 0)
                            @foreach(array_slice($destination->images, 0, 4) as $index => $image)
                            <div class="col-6">
                                <div class="global-image-card {{ $index === 0 ? 'global-main-image' : '' }}">
                                    <div class="global-image-card-inner">
                                        <img src="{{ Storage::url($image) }}" 
                                             alt="Flight Training in {{ $destination->country_name }}"
                                             class="global-hero-img">
                                        <div class="global-image-overlay">
                                            <div class="global-overlay-content">
                                                <i class="bi bi-zoom-in"></i>
                                                <span>View Image</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <div class="global-placeholder-image">
                                    <i class="bi bi-image display-1"></i>
                                    <p>Destination Images</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- Hero Section -->
<section class="global-hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="global-hero-content">
                    <!-- Country Header -->
                    <div class="global-country-header">
                        <div class="global-country-flag">
                            <img src="{{ asset('img/flags/' . strtolower($destination->slug) . '.png') }}" 
                                 alt="{{ $destination->country_name }}" 
                                 class="global-flag-img"
                                 onerror="this.src='{{ asset('img/flags/default.png') }}'">
                        </div>
                        <div class="global-country-name">{{ $destination->country_name }}</div>
                    </div>

                    <!-- Hero Title -->
                    <h1 class="global-hero-title">
                        {{ $destination->title }}
                    </h1>

                    <!-- Hero Description -->
                    <p class="global-hero-description">
                        {{ $destination->introduction }}
                    </p>

                    <!-- CTA Button -->
                    <div class="global-hero-cta">
                        <a href="#training-steps" class="global-cta-btn">
                            Explore Training Path
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Hero Stats -->
                    <div class="global-hero-stats">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="global-stat-item">
                                    <div class="global-stat-icon">
                                        <i class="ti-time"></i>
                                    </div>
                                    <div class="global-stat-content">
                                        <h4>{{ $destination->total_hours_required }}+</h4>
                                        <p>Total Hours Required</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="global-stat-item">
                                    <div class="global-stat-icon">
                                        <i class="ti-star"></i>
                                    </div>
                                    <div class="global-stat-content">
                                        <h4>{{ $destination->regulatory_body }}</h4>
                                        <p>Regulatory Body</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="global-hero-image-grid">
                    <div class="row g-3">
                        @if($destination->images && count($destination->images) > 0)
                            @foreach(array_slice($destination->images, 0, 4) as $index => $image)
                            <div class="col-6">
                                <div class="global-image-card">
                                    <div class="global-image-card-inner">
                                        <img src="{{ Storage::url($image) }}" 
                                             alt="Flight Training in {{ $destination->country_name }}"
                                             class="global-hero-img">
                                        <div class="global-image-overlay">
                                            <div class="global-overlay-content">
                                                <i class="bi bi-zoom-in"></i>
                                                <span>View Image</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <div class="global-placeholder-image">
                                    <i class="bi bi-image display-1"></i>
                                    <p>Destination Images</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Training Steps Section -->
<section id="training-steps" class="global-section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="global-main-title text-center">
                    <h2>Flight Training Pathway</h2>
                    <p>Step-by-step guide to becoming a commercial pilot in {{ $destination->country_name }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="global-training-steps">
                    @foreach($destination->formattedTrainingSteps as $index => $step)
                    <div class="global-training-step fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="global-step-header">
                            <div class="global-step-number">
                                {{ $index + 1 }}
                            </div>
                            <div class="global-step-title-content">
                                <h4 class="global-step-title">{{ $step['title'] }}</h4>
                                @if($step['hours'])
                                    <span class="global-step-hours">{{ $step['hours'] }} hours</span>
                                @endif
                            </div>
                        </div>
                        <div class="global-step-content">
                            <div class="global-training-content">
                                {!! nl2br(e($step['description'])) !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Flying Hours Breakdown Section -->
<section class="global-hours-breakdown global-section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="global-main-title text-center">
                    <h2>Flying Hours Breakdown</h2>
                    <p>Detailed training requirements in {{ $destination->country_name }}</p>
                </div>

                <div class="global-breakdown-container">
                    <div class="global-breakdown-header">
                        <h4>Training Requirements Overview</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table global-breakdown-table">
                            <thead>
                                <tr>
                                    <th width="40%">Stage / Requirement</th>
                                    <th width="25%">Hours</th>
                                    <th width="35%">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($destination->formattedHoursBreakdown as $breakdown)
                                <tr class="slide-in-left">
                                    <td class="global-stage-name">{{ $breakdown['stage'] }}</td>
                                    <td>
                                        <span class="global-hours-badge">{{ $breakdown['hours'] }}</span>
                                    </td>
                                    <td class="global-stage-notes">{{ $breakdown['notes'] }}</td>
                                </tr>
                                @endforeach
                                <tr class="global-total-row slide-in-right">
                                    <td class="global-total-label">Total Hours Required</td>
                                    <td>
                                        <span class="global-total-badge">{{ $destination->total_hours_required }} hours</span>
                                    </td>
                                    <td class="global-total-notes">For Commercial Pilot Licence</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Advantages Section -->
<section class="global-advantages-section global-section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="global-main-title text-center">
                    <h2>Why Choose {{ $destination->country_name }}?</h2>
                    <p>Discover the benefits of flight training in {{ $destination->country_name }}</p>
                </div>
            </div>
        </div>

        <div class="global-advantages-grid">
            @foreach($destination->formattedAdvantages as $index => $advantage)
            <div class="global-advantage-card slide-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                {{-- <div class="global-advantage-icon">
                    <i class="bi bi-check-circle"></i>
                </div> --}}
                <div class="global-advantage-content">
                    <h5 class="global-advantage-title">{{ $advantage }}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Quick Facts Section -->
<section class="global-quick-facts-section global-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="global-quick-facts">
                    <h4>Quick Facts</h4>
                    <ul class="global-facts-list">
                        <li><strong>Regulatory Body:</strong> {{ $destination->regulatory_body }}</li>
                        <li><strong>Total Hours Required:</strong> {{ $destination->total_hours_required }} hours</li>
                        <li><strong>Training Steps:</strong> {{ count($destination->training_steps ?? []) }} stages</li>
                        <li><strong>Global Recognition:</strong> ICAO compliant training standards</li>
                        <li><strong>Conversion:</strong> Easy conversion to DGCA CPL in India</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="global-cta-section global-section-gap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="global-cta-title">Ready to Start Your Aviation Journey in {{ $destination->country_name }}?</h3>
                <p class="global-cta-description">Contact us today to learn more about flight training opportunities and admission requirements.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="global-cta-button">
                    Contact Us <span class="bi bi-arrow-right"></span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Related Destinations -->
@php
    $relatedDestinations = \App\Models\GlobalDestination::where('id', '!=', $destination->id)
        ->active()
        ->ordered()
        ->limit(3)
        ->get();
@endphp

@if($relatedDestinations->count() > 0)
<section class="global-related-section global-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="global-main-title text-center">
                    <h2>Other Global Destinations</h2>
                    <p>Explore flight training opportunities in other countries</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($relatedDestinations as $related)
            <div class="col-lg-4 col-md-6">
                <div class="global-related-card">
                    <div class="global-related-image">
                        @if($related->images && count($related->images) > 0)
                            <img src="{{ Storage::url($related->images[0]) }}" 
                                 alt="{{ $related->country_name }}">
                        @else
                            <div class="global-related-placeholder">
                                <i class="bi bi-globe"></i>
                            </div>
                        @endif
                    </div>
                    <div class="global-related-content">
                        <h4 class="global-related-title">{{ $related->country_name }}</h4>
                        <p class="global-related-description">{{ Str::limit($related->introduction, 100) }}</p>
                        <div class="global-related-meta">
                            <span class="global-related-hours">{{ $related->total_hours_required }} hrs</span>
                            <span class="global-related-steps">{{ count($related->training_steps ?? []) }} steps</span>
                        </div>
                        <a href="{{ route('global.destination', $related->slug) }}" class="global-related-button">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
            }
        });
    }, observerOptions);

    // Observe elements for animation
    document.querySelectorAll('.slide-in-left, .slide-in-right, .slide-in-up, .fade-in').forEach(el => {
        observer.observe(el);
    });

    // Image lightbox functionality
    const lightbox = document.createElement('div');
    lightbox.className = 'global-lightbox';
    lightbox.innerHTML = `
        <span class="global-lightbox-close">&times;</span>
        <div class="global-lightbox-content">
            <img class="global-lightbox-image" src="" alt="">
        </div>
    `;
    document.body.appendChild(lightbox);

    const lightboxImage = lightbox.querySelector('.global-lightbox-image');
    const closeLightbox = lightbox.querySelector('.global-lightbox-close');

    // Open lightbox on image click
    document.querySelectorAll('.global-image-card').forEach(card => {
        card.addEventListener('click', function() {
            const img = this.querySelector('img');
            if (img) {
                lightboxImage.src = img.src;
                lightboxImage.alt = img.alt;
                lightbox.classList.add('global-lightbox-show');
                document.body.classList.add('global-lightbox-open');
            }
        });
    });

    // Close lightbox
    closeLightbox.addEventListener('click', function() {
        lightbox.classList.remove('global-lightbox-show');
        document.body.classList.remove('global-lightbox-open');
    });

    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            lightbox.classList.remove('global-lightbox-show');
            document.body.classList.remove('global-lightbox-open');
        }
    });

    // Close lightbox with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.classList.contains('global-lightbox-show')) {
            lightbox.classList.remove('global-lightbox-show');
            document.body.classList.remove('global-lightbox-open');
        }
    });
});
</script>
@endpush