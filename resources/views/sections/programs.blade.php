@extends('layouts.app') {{-- Use your main layout --}}

@section('content')
<!--================ Start Our Programs Area =================-->
<section class="programs_area section_gap_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $programsData['title'] ?? 'Our Aviation Programs' }}</h2>
                    <p class="mb-5">
                        {{ $programsData['description'] ?? 'Professional aviation training programs designed to meet DGCA standards and international requirements' }}
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row">
            @if(isset($programs) && count($programs) > 0)
                @foreach($programs as $program)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="single_course">
                            <div class="course_head position-relative">
                                <img class="img-fluid" src="{{ asset($program->image ?? 'img/default-program.jpg') }}" alt="{{ $program->title ?? 'Program Image' }}" />
                                @if(isset($program->level))
                                <div class="program_level {{ strtolower($program->level) }}-level">
                                    {{ $program->level }}
                                </div>
                                @endif
                                @if(isset($program->category))
                                <div class="program_category">
                                    {{ $program->category }}
                                </div>
                                @endif
                            </div>
                            <div class="course_content">
                                <h4 class="mb-3">
                                    <a href="{{ route('program.details', ['id' => $program->id]) }}">
                                        {{ $program->title ?? 'Untitled Program' }}
                                    </a>
                                </h4>
                                <p class="mb-3">
                                    {{ $program->description ?? 'No description available.' }}
                                </p>
                                
                                @if(isset($program->features) && count($program->features) > 0)
                                <div class="program_features mb-3">
                                    @php
                                        $features = is_array($program->features) ? $program->features : json_decode($program->features, true);
                                    @endphp
                                    @foreach(array_slice($features, 0, 3) as $feature)
                                        <span class="feature_badge">{{ $feature }}</span>
                                    @endforeach
                                    @if(count($features) > 3)
                                        <span class="feature_badge">+{{ count($features) - 3 }} more</span>
                                    @endif
                                </div>
                                @endif

                                <div class="program_meta mb-3">
                                    @if(isset($program->duration))
                                    <div class="meta_item">
                                        <i class="ti-time mr-2"></i>
                                        <span>{{ $program->duration }}</span>
                                    </div>
                                    @endif
                                    
                                    @if(isset($program->rating))
                                    <div class="meta_item">
                                        <i class="ti-star mr-2"></i>
                                        <span>{{ $program->rating }}/5.0</span>
                                    </div>
                                    @endif
                                    
                                    @if(isset($program->students))
                                    <div class="meta_item">
                                        <i class="ti-user mr-2"></i>
                                        <span>{{ $program->students }} Students</span>
                                    </div>
                                    @endif
                                </div>

                                <div class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
                                    <div class="mt-lg-0 mt-3">
                                        <a href="{{ route('program.details', ['id' => $program->id]) }}" class="primary-btn small-btn">
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
                    <div class="alert alert-info">
                        <p>No programs available at the moment. Please check back later.</p>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Pagination if needed -->
        @if(isset($programs) && method_exists($programs, 'links'))
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="pagination_style">
                    {{ $programs->links() }}
                </div>
            </div>
        </div>
        @endif
        
        <!-- View All Programs Button (optional - can remove since this is all programs page) -->
        {{-- <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <a href="{{ route('home') }}" class="primary-btn">
                    Back to Home
                    <i class="ti-arrow-left ml-2"></i>
                </a>
            </div>
        </div> --}}
    </div>
</section>
<!--================ End Our Programs Area =================-->
@endsection