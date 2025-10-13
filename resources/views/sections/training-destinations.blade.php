<!--================ Start Training Destinations Area =================-->
<section class="training_destinations_area section_gap">
    <div class="container">
        <!-- Global Destinations Section -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $trainingDestinationsData['title'] ?? 'Global Flight Training Destinations' }}</h2>
                    <p class="mb-5">
                        {{ $trainingDestinationsData['description'] ?? 'World-class flight training facilities across multiple countries with international standards' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            @if(isset($trainingDestinationsData['destinations']))
                @foreach($trainingDestinationsData['destinations'] as $country => $destination)
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="destination_card text-center">
                            {{-- <div class="destination_icon mb-3">
                                <i class="{{ $destination['icon'] }}"></i>
                            </div> --}}
                            <span>
                                <img src="{{ asset($destination['icon']) }}" alt="{{ $country }} Flag" class="country-flag mb-2">
                                <h5 class="mb-2">{{ $country }}</h5>
                            </span>
                            <p class="mb-0">{{ $destination['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Eligibility Section -->
        <div class="row mt-5 pt-5">
            <div class="col-lg-12">
                <div class="eligibility_section">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="eligibility_content">
                                <h3 class="mb-4">{{ $trainingDestinationsData['eligibility']['title'] ?? 'Eligibility to Become a Pilot' }}</h3>
                                <h5 class="text-primary mb-4">{{ $trainingDestinationsData['eligibility']['subtitle'] ?? 'Basic Requirements' }}</h5>
                                
                                @if(isset($trainingDestinationsData['eligibility']['requirements']))
                                    <div class="requirements_list">
                                        @foreach($trainingDestinationsData['eligibility']['requirements'] as $requirement)
                                            <div class="single_requirement d-flex align-items-start mb-4">
                                                <div class="requirement_icon mr-4">
                                                    <i class="{{ $requirement['icon'] }}"></i>
                                                </div>
                                                <div class="requirement_content">
                                                    <h5 class="mb-2">{{ $requirement['title'] }}</h5>
                                                    <p class="mb-0">{{ $requirement['description'] }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                @if(isset($trainingDestinationsData['eligibility']['additional_info']))
                                    <div class="additional_info mt-4 p-4 bg-light rounded">
                                        <p class="mb-0 text-muted">
                                            <i class="ti-info-alt mr-2"></i>
                                            {{ $trainingDestinationsData['eligibility']['additional_info'] }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="eligibility_image text-center">
                                {{-- <img src="{{ asset('img/training/pilot-eligibility.jpg') }}" alt="Pilot Eligibility Requirements" class="img-fluid rounded shadow"> --}}
                                <img src="https://www.aviationjobsearch.com/storage/AJS/uploads/hub/advices/WT71UHqC7Ctk4RJ2rOEXHHU2kiAK1so5wQlbI3uw.jpg" alt="Pilot Eligibility Requirements" class="img-fluid rounded shadow mt-3">
                                <div class="image_caption mt-3">
                                    <p class="text-muted mb-0">Start your aviation journey with Skylead Aviation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <div class="cta_section p-5 bg-primary text-white rounded">
                    <h3 class="mb-3">Ready to Start Your Aviation Career?</h3>
                    <p class="mb-4">Contact our admission counselors to check your eligibility and begin your pilot training journey.</p>
                    <a href="{{ route('contact') }}" class="primary-btn light-btn">
                        Check Your Eligibility
                        <i class="ti-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Training Destinations Area =================-->