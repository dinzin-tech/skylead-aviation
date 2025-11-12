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
                                <div class="program_level {{ strtolower($program['level']) }}-level">
                                    {{ $program['level'] }}
                                </div>
                                <div class="program_type_badge {{ $program['type'] === 'cadet_program' ? 'cadet-badge' : 'regular-badge' }}">
                                    {{ $program['type'] === 'cadet_program' ? 'Cadet Program' : 'Regular Course' }}
                                </div>
                                @if(isset($program['category']))
                                <div class="program_category">
                                    {{ $program['category'] }}
                                </div>
                                @endif
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
.program_filters {
    margin-bottom: 30px;
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

.program_type_badge {
    position: absolute;
    top: 15px;
    right: 15px;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    color: white;
}

.cadet-badge {
    background: #e53e3e;
}

.regular-badge {
    background: #3182ce;
}

.program_level {
    position: absolute;
    top: 15px;
    left: 15px;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    color: white;
}

.beginner-level { background: #38a169; }
.intermediate-level { background: #d69e2e; }
.advanced-level { background: #dd6b20; }
.professional-level { background: #e53e3e; }

.program_category {
    position: absolute;
    bottom: 15px;
    left: 15px;
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    background: rgba(0,0,0,0.7);
    color: white;
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