@if(isset($countryData['flying_schools']))
<section class="simple-schools-section">
    <div class="ss-container">
        <div class="ss-header">
            <h1 class="ss-main-title">Partner Flying School</h1>
        </div>
        
        <div class="ss-layout">
            <!-- Left Sidebar - School List -->
            <div class="ss-sidebar">
                <div class="ss-schools-list">
                    <h3 class="ss-sidebar-title">Flying School</h3>
                    @foreach($countryData['flying_schools'] as $index => $school)
                    <div class="ss-school-item {{ $index === 0 ? 'ss-active' : '' }}" 
                         data-school="{{ $index }}">
                        <span class="ss-school-name">{{ $school['school_name'] ?? 'Flying School' }}</span>
                        <span class="ss-school-number">{{ $index + 1 }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Main Content -->
            <div class="ss-main-content">
                @foreach($countryData['flying_schools'] as $index => $school)
                <div class="ss-school-content {{ $index === 0 ? 'ss-active' : '' }}" id="school-{{ $index }}">
                    <!-- School Header -->
                    <div class="ss-content-header">
                        <h2 class="ss-school-title">{{ $school['school_name'] ?? 'Flying School' }}</h2>
                    </div>

                    <!-- About Course Section -->
                    <div class="ss-course-section">
                        <h3 class="ss-section-title">About Course</h3>
                        <div class="ss-course-details">
                            <div class="ss-detail-row">
                                <span class="ss-detail-label">Course Duration:</span>
                                <span class="ss-detail-value">{{ $school['course_duration'] ?? '10 to 12 Months' }}</span>
                            </div>
                            <div class="ss-detail-row">
                                <span class="ss-detail-label">Fleet Size:</span>
                                <span class="ss-detail-value">{{ $school['fleet_size'] ?? '25' }} Aircrafts</span>
                            </div>
                            <div class="ss-detail-row">
                                <span class="ss-detail-label">Type of Fleet:</span>
                                <span class="ss-detail-value">{{ $school['fleet_types'] ?? 'Cessna 152, Cessna 172, Tecnam 2008 & 2009' }}</span>
                            </div>
                            <div class="ss-detail-row">
                                <span class="ss-detail-label">No. Of Flying Hours:</span>
                                <span class="ss-detail-value">{{ $school['flying_hours'] ?? '250' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Types of Fleet Section -->
                    <div class="ss-fleet-section">
                        <h3 class="ss-section-title">Types Of Fleet</h3>
                        <div class="ss-fleet-list">
                            @if(isset($school['aircrafts']))
                                @foreach($school['aircrafts'] as $aircraft)
                                <div class="ss-fleet-item">
                                    <h4 class="ss-aircraft-name">{{ $aircraft['name'] ?? 'Cessna 152' }}</h4>
                                    <p class="ss-aircraft-desc">{{ $aircraft['description'] ?? 'The Cessna 152 is an American two-seat, fixed-tricycle-gear, general aviation airplane, used primarily for flight training and personal use.' }}</p>
                                </div>
                                @endforeach
                            @else
                                <!-- Default Aircrafts -->
                                <div class="ss-fleet-item">
                                    <h4 class="ss-aircraft-name">Cessna 152</h4>
                                    <p class="ss-aircraft-desc">The Cessna 152 is an American two-seat, fixed-tricycle-gear, general aviation airplane, used primarily for flight training and personal use.</p>
                                </div>
                                <div class="ss-fleet-item">
                                    <h4 class="ss-aircraft-name">Cessna 172</h4>
                                    <p class="ss-aircraft-desc">The Cessna 172 Skyhawk is an American four-seat, single-engine, high wing, fixed-wing aircraft made by the Cessna Aircraft Company.</p>
                                </div>
                                <div class="ss-fleet-item">
                                    <h4 class="ss-aircraft-name">Tecnam P2006</h4>
                                    <p class="ss-aircraft-desc">The Tecnam P2006 is a single-engine, high-wing two-seat aircraft built in Italy but aimed at the US market.</p>
                                </div>
                                <div class="ss-fleet-item">
                                    <h4 class="ss-aircraft-name">Tecnam P2008</h4>
                                    <p class="ss-aircraft-desc">The Tecnam P2008 is a single-engine, high-wing two-seat aircraft built in Italy but aimed at the US market.</p>
                                </div>
                            @endif
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
    const schoolItems = document.querySelectorAll('.ss-school-item');
    const schoolContents = document.querySelectorAll('.ss-school-content');
    
    schoolItems.forEach(item => {
        item.addEventListener('click', function() {
            const schoolIndex = this.getAttribute('data-school');
            
            // Remove active class from all items and contents
            schoolItems.forEach(school => school.classList.remove('ss-active'));
            schoolContents.forEach(content => content.classList.remove('ss-active'));
            
            // Add active class to clicked item and corresponding content
            this.classList.add('ss-active');
            document.getElementById(`school-${schoolIndex}`).classList.add('ss-active');
        });
    });
});
</script>
@endpush