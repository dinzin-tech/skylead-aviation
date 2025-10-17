@extends('layouts.app')

@section('title', $countryData['country_title'] ?? 'Flight Training Destination')

@push('styles')
<style>
    .country-overview {
        padding: 80px 0;
    }
    .quick-facts {
        background: #f9f9ff;
        padding: 30px;
        border-radius: 5px;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>{{ $countryData['country_title'] ?? 'Flight Training' }}</h2>
                            <p>{{ $countryData['country_description'] ?? 'World-class flight training programs' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Country Overview -->
    <section class="country-overview">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="main_title">
                        <h2>Flight Training in {{ $countryData['country_name'] ?? 'USA' }}</h2>
                    </div>
                    <p>{{ $countryData['country_description'] ?? 'World-class flight training destination.' }}</p>
                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="single_feature">
                                <div class="feature_head">
                                    <h4><i class="ti-location-pin"></i> Key Locations</h4>
                                </div>
                                <div class="feature_content">
                                    <p>{{ $countryData['location'] ?? 'Various locations' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single_feature">
                                <div class="feature_head">
                                    <h4><i class="ti-home"></i> Number of Schools</h4>
                                </div>
                                <div class="feature_content">
                                    <h3 class="text-primary">{{ $countryData['no_of_schools'] ?? 0 }}+ Schools</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="quick-facts">
                        <h4 class="mb-4">Quick Facts</h4>
                        <ul class="unordered-list">
                            <li><strong>Training Schools:</strong> {{ $countryData['no_of_schools'] ?? 0 }}+</li>
                            <li><strong>Popular Locations:</strong> {{ $countryData['location'] ?? 'Various locations' }}</li>
                            <li><strong>License Type:</strong> FAA Approved</li>
                            <li><strong>Weather:</strong> Year-round flying</li>
                            <li><strong>Global Recognition:</strong> Worldwide</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Training Guide -->
    @if(isset($countryData['guide']))
    <section class="feature_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="main_title">
                        <h2>Training Guide</h2>
                        <p>Comprehensive training program designed for international students</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($countryData['guide'] as $guide)
                <div class="col-lg-4 col-md-6">
                    <div class="single_feature">
                        <div class="feature_head">
                            <h4>{{ $guide['title'] ?? 'Guide' }}</h4>
                        </div>
                        <div class="feature_content">
                            <p>{{ $guide['value'] ?? 'Guide description' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Advantages -->
    @if(isset($countryData['advantages']))
    <section class="sample-text-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main_title">
                        <h2>Key Advantages</h2>
                        <p>Why choose {{ $countryData['country_name'] ?? 'this destination' }} for flight training?</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($countryData['advantages'] as $advantage)
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="ti-check-box text-success mr-3"></i>
                        <span class="h5">{{ $advantage }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Gallery -->
    @if(isset($countryData['gallery']))
    <section class="sample-text-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main_title">
                        <h2>Training Facilities Gallery</h2>
                        <p>Explore our training facilities and student life</p>
                    </div>
                </div>
            </div>
            <div class="row gallery-item">
                @foreach($countryData['gallery'] as $image)
                <div class="col-md-4">
                    <div class="single-gallery-image">
                        <img src="{{ asset($image) }}" alt="Gallery Image {{ $loop->iteration }}" class="img-fluid">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Flying Schools Tabs -->
    @if(isset($countryData['flying_schools']))
    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="main_title">
                        <h2>Partner Flying Schools</h2>
                        <p>Top-rated flight training institutions in {{ $countryData['country_name'] ?? 'USA' }}</p>
                    </div>
                </div>
            </div>
            
            <!-- School Tabs Navigation -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-12">
                    <div class="school-tabs-nav">
                        <ul class="nav nav-tabs" id="schoolTabs" role="tablist">
                            @foreach($countryData['flying_schools'] as $index => $school)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $index === 0 ? 'active' : '' }}" 
                                        id="tab-{{ $index }}" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#school-{{ $index }}" 
                                        type="button" 
                                        role="tab">
                                    <div class="tab-school-logo">
                                        @if(isset($school['logo']))
                                        <img src="{{ asset($school['logo']) }}" alt="{{ $school['school_name'] }}" class="img-fluid">
                                        @else
                                        <i class="ti-crown"></i>
                                        @endif
                                    </div>
                                    <span class="school-tab-name">{{ $school['school_name'] ?? 'Flight School' }}</span>
                                </button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- School Tabs Content -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="tab-content" id="schoolTabsContent">
                        @foreach($countryData['flying_schools'] as $index => $school)
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" 
                             id="school-{{ $index }}" 
                             role="tabpanel" 
                             aria-labelledby="tab-{{ $index }}">
                            
                            <div class="course_details_inner">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="content_wrapper">
                                            <div class="school-header mb-4">
                                                <h4 class="title">{{ $school['school_name'] ?? 'Flight School' }}</h4>
                                                <p class="text-muted mb-2">
                                                    <i class="ti-location-pin mr-2"></i>{{ $school['location'] ?? 'Location not specified' }}
                                                </p>
                                                @if(isset($school['rating']))
                                                <div class="school-rating">
                                                    <div class="stars">
                                                        @for($i = 1; $i <= 5; $i++)
                                                        <i class="ti-star{{ $i <= ($school['rating'] ?? 0) ? ' filled' : '' }}"></i>
                                                        @endfor
                                                    </div>
                                                    <span class="rating-text">({{ $school['reviews'] ?? 0 }}+ reviews)</span>
                                                </div>
                                                @endif
                                            </div>

                                            <!-- School Overview -->
                                            @if(isset($school['overview']))
                                            <div class="school-overview mb-5">
                                                <p class="lead">{{ $school['overview'] }}</p>
                                            </div>
                                            @endif

                                            <!-- Key Statistics -->
                                            <div class="row mb-5">
                                                <div class="col-md-3 col-6">
                                                    <div class="stat-box text-center">
                                                        <div class="stat-icon">
                                                            <i class="ti-plane"></i>
                                                        </div>
                                                        <h4 class="stat-number">{{ $school['fleet_size'] ?? 0 }}+</h4>
                                                        <p class="stat-label">Aircraft Fleet</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <div class="stat-box text-center">
                                                        <div class="stat-icon">
                                                            <i class="ti-user"></i>
                                                        </div>
                                                        <h4 class="stat-number">{{ $school['students_trained'] ?? '5000' }}+</h4>
                                                        <p class="stat-label">Students Trained</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <div class="stat-box text-center">
                                                        <div class="stat-icon">
                                                            <i class="ti-time"></i>
                                                        </div>
                                                        <h4 class="stat-number">{{ $school['years_established'] ?? '20' }}+</h4>
                                                        <p class="stat-label">Years Experience</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <div class="stat-box text-center">
                                                        <div class="stat-icon">
                                                            <i class="ti-cup"></i>
                                                        </div>
                                                        <h4 class="stat-number">{{ $school['success_rate'] ?? '95' }}%</h4>
                                                        <p class="stat-label">Success Rate</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Courses Offered -->
                                            @if(isset($school['courses_offered']))
                                            <div class="courses-section mb-5">
                                                <h5 class="section-subtitle mb-4">Courses Offered</h5>
                                                <div class="row">
                                                    @foreach($school['courses_offered'] as $course)
                                                    <div class="col-md-6 mb-3">
                                                        <div class="course-item">
                                                            <div class="course-icon">
                                                                <i class="{{ $course['icon'] ?? 'ti-plane' }}"></i>
                                                            </div>
                                                            <div class="course-content">
                                                                <h6>{{ $course['title'] ?? 'Course' }}</h6>
                                                                <p class="mb-0">{{ $course['description'] ?? 'Course description' }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif

                                            <!-- Fleet Information -->
                                            <div class="fleet-section mb-5">
                                                <h5 class="section-subtitle mb-4">Training Fleet</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="fleet-info">
                                                            <h6>Primary Training Aircraft</h6>
                                                            <p class="text-muted">{{ $school['fleet_type'] ?? 'Not specified' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="fleet-info">
                                                            <h6>Simulator Types</h6>
                                                            <p class="text-muted">{{ $school['simulators'] ?? 'FRASCA, Redbird, ALSIM' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Facilities -->
                                            @if(isset($school['facilities']))
                                            <div class="facilities-section mb-5">
                                                <h5 class="section-subtitle mb-4">{{ $school['facilities']['title'] ?? 'Facilities' }}</h5>
                                                <p>{{ $school['facilities']['description'] ?? 'School facilities description' }}</p>
                                                
                                                @if(isset($school['facilities']['facility_features']))
                                                <div class="row mt-4">
                                                    @foreach($school['facilities']['facility_features'] as $facility)
                                                    <div class="col-md-4 mb-4">
                                                        <div class="facility-item text-center">
                                                            <div class="facility-icon mb-3">
                                                                <i class="{{ $facility['icon'] ?? 'ti-cup' }}"></i>
                                                            </div>
                                                            <h6>{{ $facility['title'] ?? 'Facility' }}</h6>
                                                            <p class="text-muted small">{{ $facility['description'] ?? 'Facility description' }}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <!-- Sidebar -->
                                    <div class="col-lg-4 right-contents">
                                        <div class="sidebar_top">
                                            <h4 class="title">Course Fees</h4>
                                            @if(isset($school['course_fees']))
                                            <div class="content">
                                                <p>{{ $school['course_fees']['description'] ?? 'Contact for pricing information' }}</p>
                                            </div>
                                            @endif
                                            
                                            <!-- Quick Contact -->
                                            <div class="quick-contact mt-4">
                                                <h6>Get More Information</h6>
                                                <ul class="contact-list">
                                                    <li>
                                                        <i class="ti-email mr-2"></i>
                                                        <span>Email: {{ $school['contact_email'] ?? 'info@school.com' }}</span>
                                                    </li>
                                                    <li>
                                                        <i class="ti-mobile mr-2"></i>
                                                        <span>Phone: {{ $school['contact_phone'] ?? '+1 (555) 123-4567' }}</span>
                                                    </li>
                                                    <li>
                                                        <i class="ti-world mr-2"></i>
                                                        <span>Website: {{ $school['website'] ?? 'www.school.com' }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                            <a href="#" class="genric-btn primary circle arrow btn-block text-center mt-4">
                                                Enquire Now <span class="ti-arrow-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection

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