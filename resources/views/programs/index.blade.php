@extends('layouts.app') {{-- or your layout file --}}

@section('title', 'All Aviation Programs')
@section('description', 'Explore our complete range of aviation training programs and courses')

@section('content')
<!--================ Start Programs Page Area =================-->
<section class="programs_page_area section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $programsData['title'] ?? 'All Aviation Programs' }}</h2>
                    <p class="mb-5">
                        {{ $programsData['description'] ?? 'Explore our complete range of aviation training programs' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Program Filters -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="program_filters text-center">
                    <button class="filter_btn active" data-filter="all">All Programs</button>
                    <button class="filter_btn" data-filter="regular_course">Regular Courses</button>
                    <button class="filter_btn" data-filter="cadet_program">Cadet Programs</button>
                </div>
            </div>
        </div>
        
        <div class="row">
            @if(isset($programsData['programs']) && count($programsData['programs']) > 0)
                @foreach($programsData['programs'] as $program)
                    <div class="col-lg-4 col-md-6 mb-4 program-item" data-type="{{ $program['type'] }}">
                        <div class="single_course">
                           <div class="course_head position-relative">
    <img class="img-fluid" src="{{ $program['image'] }}" alt="{{ $program['title'] }}" style="height: 250px; object-fit: cover; width: 100%;" />
    <!-- Badges container -->
    <div class="badges-container">
        <!-- Program type badge at top left -->
        <div class="program_type_badge {{ $program['type'] === 'cadet_program' ? 'cadet-badge' : 'regular-badge' }}">
            {{ $program['type'] === 'cadet_program' ? 'Cadet Program' : 'Regular Course' }}
        </div>
        <!-- Level badge at top right -->
        <div class="program_level {{ strtolower($program['level']) }}-level">
            {{ $program['level'] }}
        </div>
    </div>
</div>
                            <div class="course_content">
                                @if(isset($program['price']))
                                <span class="price">{{ $program['price'] }}</span>
                                @endif
                                <h4 class="mb-3">
                                    <a href="{{ route('courses.show', $program['slug']) }}">{{ $program['title'] }}</a>
                                </h4>
                                <p class="mb-3">
                                    {{ Str::limit($program['description'], 120) }}
                                </p>
                                
                                @if(isset($program['features']) && count($program['features']) > 0)
                                <div class="program_features mb-3">
                                    @foreach(array_slice($program['features'], 0, 3) as $feature)
                                        <span class="feature_badge">{{ $feature }}</span>
                                    @endforeach
                                    @if(count($program['features']) > 3)
                                        <span class="feature_badge">+{{ count($program['features']) - 3 }} more</span>
                                    @endif
                                </div>
                                @endif

                                <div class="program_meta mb-3">
                                    <div class="meta_item">
                                        <i class="ti-time mr-2"></i>
                                        <span>{{ $program['duration'] }}</span>
                                    </div>
                                    <div class="meta_item">
                                        <i class="ti-star mr-2"></i>
                                        <span>{{ $program['rating'] }}/5.0</span>
                                    </div>
                                    <div class="meta_item">
                                        <i class="ti-user mr-2"></i>
                                        <span>{{ $program['students'] }} Students</span>
                                    </div>
                                </div>

                                <div class="course_meta d-flex justify-content-between align-items-center mt-4">
                                    <div class="mt-lg-0 mt-3">
                                        <a href="{{ route('courses.show', $program['slug']) }}" class="primary-btn small-btn">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <div class="no-programs">
                        <i class="ti-book" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
                        <h4>No Programs Available</h4>
                        <p class="text-muted">We're currently updating our program offerings. Please check back later.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!--================ End Programs Page Area =================-->
@endsection

@push('styles')
<style>
/* Badges container for proper positioning */
.badges-container {
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    z-index: 10;
}

/* Consistent badge styling - same width and size */
.program_level,
.program_type_badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    color: white;
    text-transform: capitalize;
    line-height: 1;
    white-space: nowrap;
    min-width: 120px;
    text-align: center;
    letter-spacing: 0.5px;
}

/* Level badge styles */
.program_level {
    background: #4299e1; /* Default blue */
}

.beginner-level { 
    background: #4299e1; /* Blue for beginner */
}
.intermediate-level { 
    background: #ed8936; /* Orange for intermediate */
}
.advanced-level { 
    background: #e53e3e; /* Red for advanced */
}
.professional-level { 
    background: #805ad5; /* Purple for professional */
}

/* Program type badge styles */
.program_type_badge {
    background: #38a169; /* Default green */
}

.cadet-badge {
    background: #e53e3e; /* Red for cadet programs */
}

.regular-badge {
    background: #38a169; /* Green for regular courses */
}
.program_category {
    position: absolute;
    bottom: 15px;
    left: 15px;
    padding: 6px 12px;
    border-radius: 15px;
    font-size: 11px;
    font-weight: 600;
    background: rgba(0,0,0,0.7);
    color: white;
    text-transform: capitalize;
    line-height: 1;
}
.program_filters {
    margin-bottom: 30px;
}
.program_type_badge {
    position: absolute;
    top: 1px;
    left: 5px;
    /* padding: 5px 12px; */
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    color: white;
    text-transform: capitalize;
}

.cadet-badge {
    background: #e53e3e; /* Red for cadet programs */
}

.regular-badge {
    background: #38a169; /* Green for regular courses */
}
.filter_btn {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    padding: 10px 25px;
    margin: 0 5px;
    border-radius: 25px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.filter_btn.active,
.filter_btn:hover {
    background: #5a67d8;
    color: white;
    border-color: #5a67d8;
}

/* Level badge positioned at top right */
.program_level {
    position: absolute;
    top: 1px;
    height: 30px;
    right: -11px;
    /* padding: 5px 12px; */
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    color: white;
    text-transform: capitalize;
}

.beginner-level { 
    background: #4299e1; /* Blue for beginner */
}
.intermediate-level { 
    background: #ed8936; /* Orange for intermediate */
}
.advanced-level { 
    background: #e53e3e; /* Red for advanced */
}
.professional-level { 
    background: #805ad5; /* Purple for professional */
}

.program_category {
    position: absolute;
    bottom: 15px;
    left: 15px;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    background: transparent;
    color: white;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.7);
}

.program-item {
    transition: transform 0.3s ease;
}

.program-item:hover {
    transform: translateY(-5px);
}

.no-programs {
    padding: 60px 20px;
    text-align: center;
}

/* Course card styling */
.single_course {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    height: 100%;
}

.single_course:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.course_content {
    padding: 20px;
}

.price {
    font-size: 18px;
    font-weight: 700;
    color: #5a67d8;
}

.primary-btn {
    background: #5a67d8;
    color: white;
    padding: 8px 20px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.primary-btn:hover {
    background: #4c51bf;
    color: white;
    text-decoration: none;
}

.program_meta {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.meta_item {
    display: flex;
    align-items: center;
    margin-right: 10px;
    font-size: 14px;
    color: #6c757d;
}

.feature_badge {
    display: inline-block;
    background: #e9ecef;
    padding: 4px 10px;
    border-radius: 15px;
    font-size: 12px;
    margin-right: 5px;
    margin-bottom: 5px;
    color: #495057;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter_btn');
    const programItems = document.querySelectorAll('.program-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            programItems.forEach(item => {
                if (filter === 'all') {
                    item.style.display = 'block';
                } else {
                    if (item.getAttribute('data-type') === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
        });
    });
});
</script>
@endpush