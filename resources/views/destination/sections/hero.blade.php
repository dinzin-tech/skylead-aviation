<section class="hero-section">
    <div class="container">
        <div class="row align-items-center mt-5">
            <!-- Left Content Section -->
            <div class="col-lg-6">
                <div class="hero-content">
                    <!-- Country Flag and Name -->
                    <div class="country-header mb-4">
                        @if(isset($countryFlag))
                        <div class="country-flag">
                            <img src="{{ asset($countryFlag) }}" alt="{{ $countryName ?? 'Country Flag' }}" class="flag-img">
                        </div>
                        @endif
                        <span class="country-name">{{ $countryName ?? 'Training Destination' }}</span>
                    </div>

                    <!-- Title -->
                    <h1 class="hero-title">
                        {{ $title ?? 'Flight Training Academy' }}
                    </h1>

                    <!-- Description -->
                    <p class="hero-description">
                        {{ $description ?? 'World-class flight training programs with expert instructors and modern facilities.' }}
                    </p>

                    <!-- CTA Button -->
                    @if(isset($ctaText))
                    <div class="hero-cta mb-5">
                        <a href="{{ $ctaLink ?? '#' }}" class="cta-btn">
                            {{ $ctaText }}
                            <i class="ti-arrow-right"></i>
                        </a>
                    </div>
                    @endif

                    <!-- Info Stats -->
                    <div class="hero-stats">
                        <div class="row">
                            @if(isset($stats) && count($stats) > 0)
                                @foreach($stats as $stat)
                                <div class="col-md-4 col-6">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <i class="{{ $stat['icon'] ?? 'ti-plane' }}"></i>
                                            <h4 class="stat-number">{{ $stat['number'] ?? '0' }}</h4>
                                        </div>
                                        <div class="stat-content">
                                            <!-- <h4 class="stat-number">{{ $stat['number'] ?? '0' }}</h4> -->
                                            <p class="stat-label">{{ $stat['label'] ?? 'Statistic' }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <!-- Default Stats -->
                                <div class="col-md-4 col-6">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <i class="ti-plane"></i>
                                        </div>
                                        <div class="stat-content">
                                            <h4 class="stat-number">50+</h4>
                                            <p class="stat-label">Aircraft Fleet</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <i class="ti-home"></i>
                                        </div>
                                        <div class="stat-content">
                                            <h4 class="stat-number">12</h4>
                                            <p class="stat-label">Flying Schools</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <i class="ti-location-pin"></i>
                                        </div>
                                        <div class="stat-content">
                                            <h4 class="stat-number">USA</h4>
                                            <p class="stat-label">Location</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Image Grid Section -->
            <div class="col-lg-6">
                <div class="hero-image-grid">
                    <div class="row g-3">
                        @if(isset($images) && count($images) > 0)
                            @foreach($images as $index => $image)
                            <div class="col-6">
                                <div class="image-card {{ $index == 0 ? 'main-image' : '' }}">
                                    <img src="{{ asset($image) }}" alt="Hero Image {{ $index + 1 }}" class="img-fluid">
                                    @if($index == 0)
                                    <div class="image-overlay">
                                        <div class="overlay-content">
                                            <i class="ti-crown"></i>
                                            <span>Premium Training</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @else
                            <!-- Default Images -->
                            <div class="col-6">
                                <div class="image-card main-image">
                                    <img src="{{ asset('img/elements/a.jpg') }}" alt="Flight Training" class="img-fluid">
                                    <div class="image-overlay">
                                        <div class="overlay-content">
                                            <i class="ti-crown"></i>
                                            <span>Premium Training</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="image-card">
                                    <img src="{{ asset('img/elements/a2.jpg') }}" alt="Aircraft" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="image-card">
                                    <img src="{{ asset('img/elements/d.jpg') }}" alt="Simulator" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="image-card">
                                    <img src="{{ asset('img/elements/f1.jpg') }}" alt="Campus" class="img-fluid">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>