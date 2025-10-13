<!--================ Start About Us Area =================-->
{{-- <section class="about_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">Why Skylead Aviation?</h2>
                    <p>
                        Excellence in aviation training with world-class facilities and expert instructors
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_about">
                    <div class="icon">
                        <span class="flaticon-pilot"></span>
                    </div>
                    <div class="desc">
                        <h4 class="mt-3 mb-2">Expert Certified Instructors</h4>
                        <p>
                            Learn from industry veterans with decades of flying experience and certified training credentials. 
                            Our instructors are committed to your success in aviation.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_about">
                    <div class="icon">
                        <span class="flaticon-airplane"></span>
                    </div>
                    <div class="desc">
                        <h4 class="mt-3 mb-2">Modern Fleet & Equipment</h4>
                        <p>
                            Train with our state-of-the-art aircraft and advanced flight simulators. 
                            We maintain our fleet to the highest safety standards for optimal learning.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single_about">
                    <div class="icon">
                        <span class="flaticon-graduation-cap"></span>
                    </div>
                    <div class="desc">
                        <h4 class="mt-3 mb-2">Global Career Opportunities</h4>
                        <p>
                            Our certification is recognized worldwide with partnerships with major airlines. 
                            95% of our graduates secure positions within 6 months of completion.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional About Content -->
        <div class="row mt-5 pt-5">
            <div class="col-lg-6">
                <div class="about_content">
                    <h3 class="mb-4">Leading Aviation Training Since 2005</h3>
                    <p class="mb-4">
                        Skylead Aviation has been at the forefront of pilot training for over 15 years, 
                        producing some of the finest aviation professionals in the industry. Our commitment 
                        to excellence and safety sets us apart.
                    </p>
                    <div class="about_details">
                        <div class="single_detail d-flex mb-3">
                            <span class="ti-check mr-3"></span>
                            <p>FAA & EASA Certified Training Programs</p>
                        </div>
                        <div class="single_detail d-flex mb-3">
                            <span class="ti-check mr-3"></span>
                            <p>Advanced Flight Simulation Technology</p>
                        </div>
                        <div class="single_detail d-flex mb-3">
                            <span class="ti-check mr-3"></span>
                            <p>Personalized Career Guidance & Placement</p>
                        </div>
                        <div class="single_detail d-flex">
                            <span class="ti-check mr-3"></span>
                            <p>24/7 Access to Training Facilities</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about_image">
                    <img class="img-fluid rounded" src="{{ asset('img/about/about-aviation.jpg') }}" alt="Skylead Aviation Training">
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--================ End About Us Area =================-->



<!--================ Start About Us Area =================-->
<section class="about_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $aboutData['title'] ?? 'Why Skylead Aviation?' }}</h2>
                    <p class="mb-5">
                        {{ $aboutData['description'] ?? 'Excellence in aviation training with world-class facilities and expert instructors' }}
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Three Main Points -->
        {{-- <div class="row mb-5">
            @if(isset($aboutData['main_points']) && count($aboutData['main_points']) > 0)
                @foreach($aboutData['main_points'] as $point)
                    <div class="col-lg-4 col-md-6">
                        <div class="single_about">
                            <div class="icon">
                                <span class="{{ $point['icon'] }}"></span>
                            </div>
                            <div class="desc">
                                <h4 class="mt-3 mb-2">{{ $point['title'] }}</h4>
                                <p>
                                    {{ $point['description'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div> --}}

        <!-- Mission, Vision & Values -->
        <div class="row mt-5 pt-5">
            <div class="col-lg-12">
                <div class="row">
                    @if(isset($aboutData['mission_vision_values']))
                        <div class="col-lg-4 col-md-4">
                            <div class="mv_item text-center">
                                <div class="mv_icon mb-4">
                                    <img src="{{ asset('img/about/' . $aboutData['mission_vision_values']['mission']['icon']) }}" alt="Mission" class="img-fluid">
                                </div>
                                <h4 class="mb-3">{{ $aboutData['mission_vision_values']['mission']['title'] }}</h4>
                                <p class="mb-0">
                                    {{ $aboutData['mission_vision_values']['mission']['description'] }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4">
                            <div class="mv_item text-center">
                                <div class="mv_icon mb-4">
                                    <img src="{{ asset('img/about/' . $aboutData['mission_vision_values']['vision']['icon']) }}" alt="Vision" class="img-fluid">
                                </div>
                                <h4 class="mb-3">{{ $aboutData['mission_vision_values']['vision']['title'] }}</h4>
                                <p class="mb-0">
                                    {{ $aboutData['mission_vision_values']['vision']['description'] }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4">
                            <div class="mv_item text-center">
                                <div class="mv_icon mb-4">
                                    <img src="{{ asset('img/about/' . $aboutData['mission_vision_values']['values']['icon']) }}" alt="Values" class="img-fluid">
                                </div>
                                <h4 class="mb-3">{{ $aboutData['mission_vision_values']['values']['title'] }}</h4>
                                <p class="mb-0">
                                    {{ $aboutData['mission_vision_values']['values']['description'] }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Additional About Content (for home page) -->
        @if(isset($aboutData['full_description']))
        <div class="row mt-5 pt-5">
            <div class="col-lg-6">
                <div class="about_content">
                    <h3 class="mb-4">Leading Aviation Training Since 2005</h3>
                    <p class="mb-4">
                        {{ $aboutData['full_description'] }}
                    </p>
                    <div class="about_details">
                        <div class="single_detail d-flex mb-3">
                            <span class="ti-check mr-3"></span>
                            <p>FAA & EASA Certified Training Programs</p>
                        </div>
                        <div class="single_detail d-flex mb-3">
                            <span class="ti-check mr-3"></span>
                            <p>Advanced Flight Simulation Technology</p>
                        </div>
                        <div class="single_detail d-flex mb-3">
                            <span class="ti-check mr-3"></span>
                            <p>Personalized Career Guidance & Placement</p>
                        </div>
                        <div class="single_detail d-flex">
                            <span class="ti-check mr-3"></span>
                            <p>24/7 Access to Training Facilities</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about_image">
                    <img class="img-fluid rounded" src="{{ asset('img/about/about-aviation.jpg') }}" alt="Skylead Aviation Training">
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!--================ End About Us Area =================-->