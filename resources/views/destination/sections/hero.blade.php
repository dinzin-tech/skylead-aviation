@push('styles')
<style>
/* Modern Hero Section Styles */
    .destination-hero {
        padding: 120px 0 80px;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        position: relative;
        overflow: hidden;
    }

    .dh-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .dh-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
    }

    /* Content Styles */
    .dh-content-col {
        padding-right: 40px;
    }

    .dh-country-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: white;
        padding: 8px 20px 8px 8px;
        border-radius: 50px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
        border: 1px solid #e2e8f0;
    }

    .dh-flag {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #e2e8f0;
    }

    .dh-flag-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .dh-country-text {
        font-weight: 600;
        /* color: #1e293b; */
        color: var(--secondary-color);
        font-size: 16px;
    }

    .dh-main-title {
        font-size: 3.5rem;
        font-weight: 800;
        /* color: #0f172a; */
        color: var(--secondary-color);
        line-height: 1.1;
        margin-bottom: 24px;
        background: linear-gradient(135deg, #0f172a 0%, #334155 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .dh-description {
        font-size: 1.25rem;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 40px;
        max-width: 500px;
    }

    /* Button Styles */
    .dh-actions {
        margin-bottom: 60px;
    }

    .dh-primary-btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
        padding: 16px 32px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
        border: none;
        cursor: pointer;
    }

    .dh-primary-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(245, 158, 11, 0.4);
        color: white;
    }

    .dh-btn-icon {
        transition: transform 0.3s ease;
    }

    .dh-primary-btn:hover .dh-btn-icon {
        transform: translateX(4px);
    }

    /* Statistics Styles */
    .dh-stats {
        border-top: 1px solid #e2e8f0;
        padding-top: 40px;
    }

    .dh-stats-grid {
        display: flex;
        gap: 0;
    }

    .dh-stat-item {
        display: flex;
        align-items: center;
        gap: 16px;
        flex: 1;
        position: relative;
    }

    .dh-stat-icon-wrapper {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
        flex-shrink: 0;
    }

    .dh-stat-icon-wrapper i {
        color: white;
        font-size: 20px;
    }

    .dh-stat-content {
        display: flex;
        flex-direction: column;
    }

    .dh-stat-number {
        font-size: 1.75rem;
        font-weight: 700;
        color: #0f172a;
        line-height: 1;
        margin-bottom: 4px;
    }

    .dh-stat-label {
        font-size: 14px;
        color: #64748b;
        font-weight: 500;
    }

    .dh-stat-divider {
        width: 1px;
        height: 40px;
        background: #e2e8f0;
        margin-left: 24px;
        margin-right: 8px;
    }

    /* Image Gallery Styles */
    .dh-image-col {
        padding-left: 20px;
    }

    .dh-gallery-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        height: 500px;
    }

    .dh-gallery-item {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .dh-gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .dh-featured-item {
        grid-row: span 2;
    }

    .dh-image-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .dh-gallery-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .dh-gallery-item:hover .dh-gallery-img {
        transform: scale(1.05);
    }

    .dh-image-badge {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 50px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Icons (using Font Awesome classes as base) */
    .dh-icon-plane:before { content: "✈"; font-style: normal; }
    .dh-icon-school:before { content: "🏫"; font-style: normal; }
    .dh-icon-location:before { content: "📍"; font-style: normal; }
    .dh-icon-premium:before { content: "👑"; font-style: normal; }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .dh-row {
            gap: 60px;
        }
        
        .dh-main-title {
            font-size: 3rem;
        }
        
        .dh-gallery-grid {
            height: 450px;
        }
    }

    @media (max-width: 768px) {
        .destination-hero {
            padding: 100px 0 60px;
        }
        
        .dh-row {
            grid-template-columns: 1fr;
            gap: 50px;
        }
        
        .dh-content-col {
            padding-right: 0;
            text-align: center;
        }
        
        .dh-image-col {
            padding-left: 0;
        }
        
        .dh-main-title {
            font-size: 2.5rem;
        }
        
        .dh-description {
            margin-left: auto;
            margin-right: auto;
        }
        
        .dh-stats-grid {
            flex-direction: column;
            gap: 24px;
        }
        
        .dh-stat-item {
            justify-content: center;
            text-align: center;
        }
        
        .dh-stat-divider {
            display: none;
        }
        
        .dh-gallery-grid {
            height: 400px;
            grid-template-columns: 1fr;
        }
        
        .dh-featured-item {
            grid-row: span 1;
        }
    }

    @media (max-width: 480px) {
        .dh-container {
            padding: 0 16px;
        }
        
        .dh-main-title {
            font-size: 2rem;
        }
        
        .dh-description {
            font-size: 1.125rem;
        }
        
        .dh-primary-btn {
            padding: 14px 28px;
            font-size: 15px;
        }
        
        .dh-gallery-grid {
            height: 350px;
            gap: 16px;
        }
        
        .dh-stat-icon-wrapper {
            width: 48px;
            height: 48px;
        }
        
        .dh-stat-number {
            font-size: 1.5rem;
        }
    }
</style>
@endpush

<section class="destination-hero">
    <div class="dh-container">
        <div class="dh-row">
            <!-- Left Content -->
            <div class="dh-content-col">
                <div class="dh-content">
                    <!-- Country Header -->
                    <div class="dh-country-badge">
                        @if(isset($countryFlag))
                        <div class="dh-flag">
                            <img src="{{ asset($countryFlag) }}" alt="{{ $countryName ?? 'Country Flag' }}" class="dh-flag-img">
                        </div>
                        @endif
                        <span class="dh-country-text">{{ $countryName ?? 'Training Destination' }}</span>
                    </div>

                    <!-- Title -->
                    <h1 class="dh-main-title">
                        {{ $title ?? 'Flight Training Academy' }}
                    </h1>

                    <!-- Description -->
                    <p class="dh-description">
                        {{ $description ?? 'World-class flight training programs with expert instructors and modern facilities.' }}
                    </p>

                    <!-- CTA Button -->
                    @if(isset($ctaText))
                    <div class="dh-actions">
                        <a href="{{ $ctaLink ?? '#' }}" class="dh-primary-btn">
                            {{ $ctaText }}
                            <svg class="dh-btn-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    @endif

                    <!-- Statistics -->
                    <div class="dh-stats">
                        <div class="dh-stats-grid">
                            @if(isset($stats) && count($stats) > 0)
                                @foreach($stats as $index => $stat)
                                <div class="dh-stat-item">
                                    <div class="dh-stat-icon-wrapper">
                                        <i class="{{ $stat['icon'] ?? 'dh-icon-plane' }}"></i>
                                    </div>
                                    <div class="dh-stat-content">
                                        <div class="dh-stat-number">{{ $stat['number'] ?? '0' }}</div>
                                        <div class="dh-stat-label">{{ $stat['label'] ?? 'Statistic' }}</div>
                                    </div>
                                    @if(!$loop->last)
                                    <div class="dh-stat-divider"></div>
                                    @endif
                                </div>
                                @endforeach
                            @else
                                <!-- Default Stats -->
                                <div class="dh-stat-item">
                                    <div class="dh-stat-icon-wrapper">
                                        <i class="dh-icon-plane"></i>
                                    </div>
                                    <div class="dh-stat-content">
                                        <div class="dh-stat-number">50+</div>
                                        <div class="dh-stat-label">Aircraft Fleet</div>
                                    </div>
                                    <div class="dh-stat-divider"></div>
                                </div>
                                <div class="dh-stat-item">
                                    <div class="dh-stat-icon-wrapper">
                                        <i class="dh-icon-school"></i>
                                    </div>
                                    <div class="dh-stat-content">
                                        <div class="dh-stat-number">12</div>
                                        <div class="dh-stat-label">Flying Schools</div>
                                    </div>
                                    <div class="dh-stat-divider"></div>
                                </div>
                                <div class="dh-stat-item">
                                    <div class="dh-stat-icon-wrapper">
                                        <i class="dh-icon-location"></i>
                                    </div>
                                    <div class="dh-stat-content">
                                        <div class="dh-stat-number">USA</div>
                                        <div class="dh-stat-label">Course Location</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Images -->
            <div class="dh-image-col">
                <div class="dh-image-gallery">
                    <div class="dh-gallery-grid">
                        @if(isset($images) && count($images) > 0)
                            @foreach($images as $index => $image)
                            <div class="dh-gallery-item {{ $index == 0 ? 'dh-featured-item' : '' }}">
                                <div class="dh-image-wrapper">
                                    <img src="{{ asset($image) }}" alt="Training Image {{ $index + 1 }}" class="dh-gallery-img">
                                    @if($index == 0)
                                    <div class="dh-image-badge">
                                        <i class="dh-icon-premium"></i>
                                        <span>Premium Training</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @else
                            <!-- Default Images -->
                            <div class="dh-gallery-item dh-featured-item">
                                <div class="dh-image-wrapper">
                                    <img src="{{ asset('img/elements/a.jpg') }}" alt="Flight Training" class="dh-gallery-img">
                                    <div class="dh-image-badge">
                                        <i class="dh-icon-premium"></i>
                                        <span>Premium Training</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dh-gallery-item">
                                <div class="dh-image-wrapper">
                                    <img src="{{ asset('img/elements/a2.jpg') }}" alt="Aircraft" class="dh-gallery-img">
                                </div>
                            </div>
                            <div class="dh-gallery-item">
                                <div class="dh-image-wrapper">
                                    <img src="{{ asset('img/elements/d.jpg') }}" alt="Simulator" class="dh-gallery-img">
                                </div>
                            </div>
                            <div class="dh-gallery-item">
                                <div class="dh-image-wrapper">
                                    <img src="{{ asset('img/elements/f1.jpg') }}" alt="Campus" class="dh-gallery-img">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>