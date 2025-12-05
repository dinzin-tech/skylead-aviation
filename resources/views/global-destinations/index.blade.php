@extends('layouts.app')

@section('title', 'Global Flight Training Destinations')
@section('meta_description', 'Explore premier global destinations for flight training including USA, South Africa, Australia, New Zealand, and Canada. Compare training requirements and advantages.')

@push('head')
<link rel="stylesheet" href="{{ asset('css/destinations.css') }}" />
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Premier Global Destinations for <span>Flight Training</span>
                    </h1>
                    <p class="hero-description">
                        Discover the world's best countries for commercial pilot training with comprehensive guides on requirements, costs, and advantages for Indian students.
                    </p>
                    
                    <!-- Country Badges -->
                    <div class="hero-stats justify-content-center">
                        <div class="row justify-content-center">
                            @foreach($destinations->take(4) as $destination)
                            <div class="col-lg-3 col-md-6">
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="stat-content">
                                        <h4>{{ $destination->country_name }}</h4>
                                        <p>{{ $destination->total_hours_required }} hrs</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Grid -->
<section class="section_gap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_title text-center mb-5">
                    <h2>Global Training Destinations</h2>
                    <p>Compare flight training programs across different countries</p>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($destinations as $destination)
            <div class="col-lg-6 mb-4">
                <div class="single_feature destination-card hover-lift">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if($destination->images && count($destination->images) > 0)
                                <img src="{{ Storage::url($destination->images[0]) }}" 
                                     alt="{{ $destination->country_name }}" 
                                     class="img-fluid w-100 h-100"
                                     style="object-fit: cover; min-height: 200px;">
                            @else
                                <div class="bg-light h-100 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-globe display-4 text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="p-4 h-100 d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h3 class="text-primary h4 mb-0">{{ $destination->country_name }}</h3>
                                    <span class="badge bg-info">{{ $destination->total_hours_required }} hrs</span>
                                </div>
                                
                                <h6 class="text-muted mb-3">{{ Str::limit($destination->title, 60) }}</h6>
                                
                                <p class="text-muted flex-grow-1 mb-3">
                                    {{ Str::limit($destination->introduction, 120) }}
                                </p>
                                
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <small class="text-muted">
                                            <i class="bi bi-building me-1"></i>
                                            {{ $destination->regulatory_body }}
                                        </small>
                                        <small class="text-muted">
                                            {{ count($destination->training_steps ?? []) }} training steps
                                        </small>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="advantage-preview">
                                            @if($destination->advantages && count($destination->advantages) > 0)
                                                <small class="text-primary">
                                                    {{ Str::limit($destination->advantages[0], 40) }}
                                                </small>
                                            @endif
                                        </div>
                                        <a href="{{ route('global.destination', $destination->slug) }}" 
                                           class="genric-btn primary circle btn-sm">
                                            Explore
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="single_feature text-center py-5">
                    <i class="bi bi-globe display-1 text-muted mb-3"></i>
                    <h3 class="text-muted">No Destinations Available</h3>
                    <p class="text-muted">Check back later for global flight training destinations.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Comparison Section -->
@if($destinations->count() > 1)
<section class="course_details_area section_gap_top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_title text-center mb-5">
                    <h2>Quick Comparison</h2>
                    <p>Compare key requirements across different destinations</p>
                </div>
            </div>
        </div>

        <div class="course_details_inner">
            <div class="content_wrapper">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Country</th>
                                <th>Regulatory Body</th>
                                <th>Total Hours</th>
                                <th>Training Steps</th>
                                <th>Key Advantage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($destinations as $destination)
                            <tr class="slide-in-left">
                                <td class="fw-semibold">{{ $destination->country_name }}</td>
                                <td>{{ $destination->regulatory_body }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ $destination->total_hours_required }}</span>
                                </td>
                                <td>{{ count($destination->training_steps ?? []) }}</td>
                                <td class="text-muted">
                                    @if($destination->advantages && count($destination->advantages) > 0)
                                        {{ Str::limit($destination->advantages[0], 50) }}
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('global.destination', $destination->slug) }}" 
                                       class="genric-btn primary-border circle btn-sm">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Why Choose Global Training Section -->
<section class="advantages-section section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="main_title text-center">
                    <h2>Why Choose International Flight Training?</h2>
                    <p>Benefits of pursuing your commercial pilot license abroad</p>
                </div>
            </div>
        </div>

        <div class="advantages-grid">
            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="bi bi-cloud-sun"></i>
                </div>
                <div class="advantage-content">
                    <h5 class="advantage-title">Better Weather Conditions</h5>
                    <p class="text-muted mt-2 mb-0">300+ flying days per year ensuring faster completion</p>
                </div>
            </div>
            
            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="bi bi-globe2"></i>
                </div>
                <div class="advantage-content">
                    <h5 class="advantage-title">International Exposure</h5>
                    <p class="text-muted mt-2 mb-0">Train in diverse airspace with global standards</p>
                </div>
            </div>
            
            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="advantage-content">
                    <h5 class="advantage-title">Cost Effective</h5>
                    <p class="text-muted mt-2 mb-0">Faster completion often makes training more affordable</p>
                </div>
            </div>
            
            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="bi bi-award"></i>
                </div>
                <div class="advantage-content">
                    <h5 class="advantage-title">Global Recognition</h5>
                    <p class="text-muted mt-2 mb-0">ICAO compliant licenses recognized worldwide</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section_gap bg-gradient-dark text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">Need Help Choosing the Right Destination?</h3>
                <p class="mb-0">Our aviation experts can guide you in selecting the best country for your flight training based on your goals and budget.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="genric-btn primary circle arrow">
                    Get Free Consultation <span class="bi bi-arrow-right"></span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="section_gap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_title text-center mb-5">
                    <h2>Global Training Statistics</h2>
                    <p>Key metrics across our featured destinations</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-box text-center">
                    <div class="stat-icon">
                        <i class="bi bi-airplane"></i>
                    </div>
                    <div class="stat-number">
                        {{ $destinations->sum('total_hours_required') }}+
                    </div>
                    <div class="stat-label">Total Training Hours</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-box text-center">
                    <div class="stat-icon">
                        <i class="bi bi-flag"></i>
                    </div>
                    <div class="stat-number">
                        {{ $destinations->count() }}
                    </div>
                    <div class="stat-label">Countries</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-box text-center">
                    <div class="stat-icon">
                        <i class="bi bi-list-check"></i>
                    </div>
                    <div class="stat-number">
                        {{ $destinations->sum(function($dest) { return count($dest->training_steps ?? []); }) }}
                    </div>
                    <div class="stat-label">Training Steps</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-box text-center">
                    <div class="stat-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="stat-number">
                        {{ $destinations->count() * 12 }}+
                    </div>
                    <div class="stat-label">Flying Schools</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
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
    document.querySelectorAll('.slide-in-left, .slide-in-right, .destination-card').forEach(el => {
        observer.observe(el);
    });

    // Add hover effects to destination cards
    document.querySelectorAll('.destination-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endpush