@if(isset($countryData['flying_schools']))
<section class="fs-schools-section">
    <div class="fs-container">
        <div class="fs-header text-center">
            <h2 class="fs-main-title">Partner Flying Schools</h2>
            <p class="fs-subtitle">Top-rated flight training institutions in {{ $countryData['country_name'] ?? 'USA' }}</p>
        </div>
        
        <div class="fs-tabs-wrapper">
            <!-- Vertical Tabs Navigation -->
            <div class="fs-tabs-nav">
                <div class="fs-nav-header">
                    <h4>Select School</h4>
                    <p>Choose from our premium partners</p>
                </div>
                <div class="fs-nav-items">
                    @foreach($countryData['flying_schools'] as $index => $school)
                    <button class="fs-nav-item {{ $index === 0 ? 'fs-active' : '' }}" 
                            data-tab="school-{{ $index }}">
                        <div class="fs-nav-icon">
                            @if(isset($school['logo']))
                            <img src="{{ asset($school['logo']) }}" alt="{{ $school['school_name'] }}" class="fs-school-logo">
                            @else
                            <div class="fs-default-icon">
                                <i class="fs-icon-plane"></i>
                            </div>
                            @endif
                        </div>
                        <div class="fs-nav-content">
                            <h5 class="fs-school-name">{{ $school['school_name'] ?? 'Flight School' }}</h5>
                            <div class="fs-school-meta">
                                <span class="fs-location">
                                    <i class="fs-icon-pin"></i>
                                    {{ $school['location'] ?? 'Location not specified' }}
                                </span>
                            </div>
                        </div>
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- Tabs Content -->
            <div class="fs-tabs-content">
                @foreach($countryData['flying_schools'] as $index => $school)
                <div class="fs-tab-pane {{ $index === 0 ? 'fs-active' : '' }}" id="school-{{ $index }}">
                    <div class="fs-school-card">
                        <!-- School Header -->
                        <div class="fs-school-header">
                            <div class="fs-school-badge">
                                <span>Premium Partner</span>
                            </div>
                            <h3 class="fs-school-title">{{ $school['school_name'] ?? 'Flight School' }}</h3>
                            <div class="fs-school-location">
                                <i class="fs-icon-pin"></i>
                                <span>{{ $school['location'] ?? 'California, USA' }}</span>
                            </div>
                        </div>

                        <!-- Main Content Grid -->
                        <div class="fs-content-grid">
                            <!-- Left Column - Flight Image -->
                            <div class="fs-image-section">
                                <div class="fs-flight-image">
                                    <img src="{{ $school['flight_image'] ?? asset('img/elements/a.jpg') }}" alt="Flight Training" class="fs-main-image">
                                    <div class="fs-image-overlay">
                                        <span>Flight Training Excellence</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column - Course Details -->
                            <div class="fs-details-section">
                                <div class="fs-about-course">
                                    <h4 class="fs-section-title">About Course</h4>
                                    
                                    <!-- Course Stats -->
                                    <div class="fs-course-stats">
                                        <div class="fs-stat-row">
                                            <div class="fs-stat-item">
                                                <div class="fs-stat-icon">
                                                    <i class="fs-icon-calendar"></i>
                                                </div>
                                                <div class="fs-stat-content">
                                                    <span class="fs-stat-label">Course Duration</span>
                                                    <span class="fs-stat-value">{{ $school['course_duration'] ?? '6 Months' }}</span>
                                                </div>
                                            </div>
                                            <div class="fs-stat-item">
                                                <div class="fs-stat-icon">
                                                    <i class="fs-icon-plane"></i>
                                                </div>
                                                <div class="fs-stat-content">
                                                    <span class="fs-stat-label">Fleet Size</span>
                                                    <span class="fs-stat-value">{{ $school['fleet_size'] ?? '17' }} Aircrafts</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fs-stat-row">
                                            <div class="fs-stat-item">
                                                <div class="fs-stat-icon">
                                                    <i class="fs-icon-fleet"></i>
                                                </div>
                                                <div class="fs-stat-content">
                                                    <span class="fs-stat-label">Type of Fleet</span>
                                                    <span class="fs-stat-value">{{ $school['fleet_types'] ?? 'Cessna 152, Cessna 172, Tecnam 2006' }}</span>
                                                </div>
                                            </div>
                                            <div class="fs-stat-item">
                                                <div class="fs-stat-icon">
                                                    <i class="fs-icon-time"></i>
                                                </div>
                                                <div class="fs-stat-content">
                                                    <span class="fs-stat-label">No. Of Flying Hours</span>
                                                    <span class="fs-stat-value">{{ $school['flying_hours'] ?? '255' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Fleet Types Section -->
                                    <div class="fs-fleet-types">
                                        <h5 class="fs-section-subtitle">Types Of Fleet</h5>
                                        <div class="fs-fleet-list">
                                            <!-- Private Pilot - Cessna 152 -->
                                            <div class="fs-fleet-item">
                                                <div class="fs-fleet-header">
                                                    <span class="fs-fleet-category">Private Pilot</span>
                                                    <h6 class="fs-fleet-name">Cessna 152</h6>
                                                </div>
                                                <p class="fs-fleet-description">
                                                    The Cessna 152 is an American two-seat, fixed-tricycle-gear, general aviation airplane, 
                                                    used primarily for flight training and personal use.
                                                </p>
                                            </div>

                                            <!-- Private Pilot - Cessna 172 -->
                                            <div class="fs-fleet-item">
                                                <div class="fs-fleet-header">
                                                    <span class="fs-fleet-category">Private Pilot</span>
                                                    <h6 class="fs-fleet-name">Cessna 172</h6>
                                                </div>
                                                <p class="fs-fleet-description">
                                                    The Cessna 172 Skyhawk is an American four-seat, single-engine, high wing, fixed-wing 
                                                    aircraft made by the Cessna Aircraft Company.
                                                </p>
                                            </div>

                                            <!-- Private Pilot - Tecnam P2006 -->
                                            <div class="fs-fleet-item">
                                                <div class="fs-fleet-header">
                                                    <span class="fs-fleet-category">Private Pilot</span>
                                                    <h6 class="fs-fleet-name">Tecnam P2006</h6>
                                                </div>
                                                <p class="fs-fleet-description">
                                                    The Tecnam P2006 is a single-engine, high-wing two-seat aircraft built in Italy but 
                                                    aimed at the US market.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Contact Section -->
                                    <div class="fs-contact-section">
                                        <button class="fs-enquire-btn">
                                            <span>Enquire About This Course</span>
                                            <i class="fs-icon-arrow"></i>
                                        </button>
                                        <div class="fs-contact-info">
                                            <div class="fs-contact-item">
                                                <i class="fs-icon-phone"></i>
                                                <span>{{ $school['contact_phone'] ?? '+1 (555) 123-4567' }}</span>
                                            </div>
                                            <div class="fs-contact-item">
                                                <i class="fs-icon-email"></i>
                                                <span>{{ $school['contact_email'] ?? 'info@school.com' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
@push('head')
<link rel="stylesheet" href="{{ asset('css/flying-schools.css') }}" />
@endpush
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabItems = document.querySelectorAll('.fs-nav-item');
    const tabPanes = document.querySelectorAll('.fs-tab-pane');
    
    tabItems.forEach(item => {
        item.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active class from all items and panes
            tabItems.forEach(tab => tab.classList.remove('fs-active'));
            tabPanes.forEach(pane => pane.classList.remove('fs-active'));
            
            // Add active class to clicked item and target pane
            this.classList.add('fs-active');
            document.getElementById(targetTab).classList.add('fs-active');
        });
    });
});
</script>
@endpush