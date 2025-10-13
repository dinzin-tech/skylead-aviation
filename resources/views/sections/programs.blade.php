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
            <div class="col-lg-12">
                <div class="owl-carousel active_course">
                    @if(isset($programsData['programs']) && count($programsData['programs']) > 0)
                        @foreach($programsData['programs'] as $program)
                            <div class="single_course">
                                <div class="course_head position-relative">
                                    <img class="img-fluid" src="{{ asset($program['image']) }}" alt="{{ $program['title'] }}" />
                                    <div class="program_level {{ strtolower($program['level']) }}-level">
                                        {{ $program['level'] }}
                                    </div>
                                    @if(isset($program['category']))
                                    <div class="program_category">
                                        {{ $program['category'] }}
                                    </div>
                                    @endif
                                </div>
                                <div class="course_content">
                                    {{-- <span class="price">{{ $program['price'] }}</span> --}}
                                    <h4 class="mb-3">
                                        <a href="{{ route('program.details', ['id' => $loop->index]) }}">{{ $program['title'] }}</a>
                                    </h4>
                                    <p class="mb-3">
                                        {{ $program['description'] }}
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

                                    <div class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
                                        {{-- <div class="authr_meta">
                                            <img src="{{ asset('img/' . $program['instructor']['image']) }}" alt="{{ $program['instructor']['name'] }}" />
                                            <span class="d-inline-block ml-2">{{ $program['instructor']['name'] }}</span>
                                        </div> --}}
                                        <div class="mt-lg-0 mt-3">
                                            <a href="{{ route('program.details', ['id' => $loop->index]) }}" class="primary-btn small-btn">
                                                Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p>No programs available at the moment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- View All Programs Button -->
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <a href="{{ route('programs') }}" class="primary-btn">
                    View All Programs
                    <i class="ti-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!--================ End Our Programs Area =================-->