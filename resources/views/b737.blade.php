{{-- resources/views/type-ratings/b737.blade.php --}}
@extends('layouts.app')

@section('title', $pageData['title'])
@section('description', $pageData['description'])

@section('content')
<!--================ Start Hero Section =================-->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <div class="country-header">
                        <div class="country-flag">
                            <img src="{{ asset('img/boeing-logo.png') }}" alt="Boeing" class="flag-img">
                        </div>
                        <div class="country-name">Boeing 737</div>
                    </div>
                    <h1 class="hero-title">{{ $pageData['hero']['title'] }}</h1>
                    <p class="hero-description">{{ $pageData['hero']['subtitle'] }}</p>
                    
                    <div class="hero-cta">
                        <a href="#training-process" class="cta-btn">
                            View Training Process <i class="lnr lnr-arrow-right"></i>
                        </a>
                    </div>

                    <div class="hero-stats">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        <i class="lnr lnr-clock"></i>
                                    </div>
                                    <div class="stat-content">
                                        <h4>6-8 Weeks</h4>
                                        <p>Total Duration</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        <i class="lnr lnr-screen"></i>
                                    </div>
                                    <div class="stat-content">
                                        <h4>40 Hours</h4>
                                        <p>Simulator Training</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        <i class="lnr lnr-airplane"></i>
                                    </div>
                                    <div class="stat-content">
                                        <h4>6 Landings</h4>
                                        <p>Base Training</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image-grid">
                    <div class="row">
                        <div class="col-6">
                            <div class="image-card">
                                <img src="{{ asset('img/b737-cockpit.jpg') }}" alt="B737 Cockpit">
                                <div class="image-overlay">
                                    <div class="overlay-content">
                                        <i class="lnr lnr-layers"></i>
                                        <span>Traditional Cockpit</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="image-card">
                                <img src="{{ asset('img/b737-simulator.jpg') }}" alt="B737 Simulator">
                                <div class="image-overlay">
                                    <div class="overlay-content">
                                        <i class="lnr lnr-laptop"></i>
                                        <span>Full Simulator</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="image-card main-image">
                                <img src="{{ asset('img/b737-exterior.jpg') }}" alt="B737 Aircraft">
                                <div class="image-overlay">
                                    <div class="overlay-content">
                                        <i class="lnr lnr-airplane"></i>
                                        <span>Boeing 737 MAX</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Hero Section =================-->

<!--================ Start Training Process =================-->
<section class="section_gap country-overview" id="training-process">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">B737 Type Rating Training Process</h2>
                    <p>Complete DGCA-compliant training pathway to become B737 certified</p>
                </div>
            </div>
        </div>

        <!-- Training Steps -->
        <div class="row mb-5">
            <div class="col-lg-12">
                @foreach($pageData['training_steps'] as $index => $step)
                <div class="course_details_inner mb-4 fade-in">
                    <div class="content_wrapper">
                        <h4 class="title">
                            <span class="mr-2">{{ $step['icon'] }}</span>
                            Step {{ $index + 1 }}: {{ $step['step'] }}
                        </h4>
                        <div class="single_details mb-3">
                            <p class="font-weight-bold text-primary">{{ $step['description'] }}</p>
                        </div>
                        <div class="unordered-list">
                            @foreach($step['requirements'] as $requirement)
                            <div class="single_details mb-2">
                                <p>{{ $requirement }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Facts -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="quick-facts">
                    <h4>B737 Type Rating Quick Facts</h4>
                    <ul class="unordered-list">
                        <li><strong>Training Duration:</strong> 6-8 weeks total program</li>
                        <li><strong>Simulator Hours:</strong> 36-40 hours in Full Flight Simulator</li>
                        <li><strong>Base Training:</strong> 6 take-offs & landings in actual B737</li>
                        <li><strong>Cockpit Type:</strong> Traditional cockpit with control yoke</li>
                        <li><strong>Automation Level:</strong> Moderate with manual control emphasis</li>
                        <li><strong>Market Demand:</strong> Steady (SpiceJet, Akasa, charter ops)</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Training Breakdown -->
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $pageData['flying_hours']['title'] }}</h2>
                </div>
                <div class="course_details_inner">
                    <div class="content_wrapper">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-gradient-primary text-white">
                                    <tr>
                                        @foreach($pageData['flying_hours']['data'][0] as $header)
                                        <th class="text-center">{{ $header }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(array_slice($pageData['flying_hours']['data'], 1) as $row)
                                    <tr>
                                        @foreach($row as $index => $cell)
                                        <td class="{{ $index === 0 ? 'font-weight-bold' : 'text-center' }}">
                                            {{ $cell }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Training Process =================-->

<!--================ Start Aircraft Specs =================-->
<section class="advantages-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">Boeing 737 Aircraft Specifications</h2>
                    <p>Proven aircraft with traditional cockpit design and modern avionics</p>
                </div>
            </div>
        </div>

        <div class="advantages-grid">
            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="lnr lnr-layers"></i>
                </div>
                <div class="advantage-content">
                    <h4 class="advantage-title">Traditional Cockpit</h4>
                    <p class="mt-2">Classic control yoke design with modern avionics upgrades and manual control emphasis</p>
                </div>
            </div>

            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="lnr lnr-cog"></i>
                </div>
                <div class="advantage-content">
                    <h4 class="advantage-title">EICAS Systems</h4>
                    <p class="mt-2">Engine Indicating and Crew Alerting System for comprehensive aircraft monitoring</p>
                </div>
            </div>

            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="lnr lnr-sync"></i>
                </div>
                <div class="advantage-content">
                    <h4 class="advantage-title">Manual Control Focus</h4>
                    <p class="mt-2">Emphasis on manual flying skills with hydraulic-assisted controls and traditional handling</p>
                </div>
            </div>

            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="lnr lnr-chart-bars"></i>
                </div>
                <div class="advantage-content">
                    <h4 class="advantage-title">Proven Reliability</h4>
                    <p class="mt-2">World's most successful jet airliner with proven track record and extensive support network</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Aircraft Specs =================-->

<!--================ Start CTA Section =================-->
<section class="section_gap bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mb-4">Ready to Start Your B737 Type Rating?</h2>
                <p class="text-white mb-4">Begin your journey to becoming a Boeing 737 First Officer with our comprehensive DGCA-approved training program</p>
                <a href="{{ route('contact') }}" class="genric-btn primary-border circle arrow text-white">
                    Start B737 Training <span class="lnr lnr-arrow-right"></span>
                </a>
            </div>
        </div>
    </div>
</section>
<!--================ End CTA Section =================-->
@endsection

@push('styles')
<style>
/* ===== Common Type Rating Page Styles ===== */

/* Hero Section Styles */
.text-white{
    color: #000000ff !important;
}

.page-header-section {
    background-size: cover;
    background-attachment: fixed;
    padding: 140px 0 100px 0;
    position: relative;
    overflow: hidden;
}

.page-header-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.page-header-section .main_title h1 {
    color: #fff;
    font-size: 4rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 25px;
    text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
    position: relative;
    animation: fadeInUp 1s ease-out;
}

.page-header-section .main_title h1::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 4px;
    background: var(--primary-color);
    border-radius: 2px;
}

.page-header-section .main_title .lead {
    color: rgba(255, 255, 255, 0.95);
    font-size: 1.4rem;
    line-height: 1.7;
    margin-bottom: 40px;
    font-weight: 300;
    animation: fadeInUp 1s ease-out 0.2s both;
}

/* Content Section Styles */
.section_gap {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.single_details p {
    font-size: 16px;
    line-height: 1.8;
    color: #555;
    margin-bottom: 12px;
    position: relative;
}

.single_details p.h5 {
    font-size: 18px;
    font-weight: 700;
    color: var(--secondary-color);
}

/* Course Details Cards */
.course_details_inner {
    background: #fff;
    padding: 50px 45px;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    margin-bottom: 35px;
    border-left: 6px solid var(--primary-color);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}

.course_details_inner::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.6s;
}

.course_details_inner:hover::before {
    left: 100%;
}

.course_details_inner:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
}

.course_details_inner.bg-gradient-primary {
    background: var(--primary-color) !important;
    border-left: 6px solid #fff;
    color: #fff;
}

.course_details_inner.bg-gradient-primary::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200px;
    height: 200px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    animation: pulse 4s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(0.8); opacity: 0.5; }
    50% { transform: scale(1.2); opacity: 0.8; }
}

/* Content Wrapper */
.content_wrapper .title {
    font-size: 28px;
    font-weight: 800;
    color: var(--secondary-color);
    margin-bottom: 25px;
    border-bottom: 3px solid var(--primary-color);
    padding-bottom: 15px;
    position: relative;
    display: inline-block;
}

.content_wrapper .title::before {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--primary-color);
    border-radius: 2px;
}

.course_details_inner.bg-gradient-primary .title {
    color: #fff;
    border-bottom: 3px solid #fff;
}

.course_details_inner.bg-gradient-primary .title::before {
    background: #fff;
}

/* Unordered List Styles */
.unordered-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.unordered-list .single_details {
    position: relative;
    padding-left: 35px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

.unordered-list .single_details:hover {
    transform: translateX(10px);
}

.unordered-list .single_details:before {
    content: "▸";
    color: var(--primary-color);
    font-weight: 900;
    position: absolute;
    left: 0;
    font-size: 22px;
    transition: all 0.3s ease;
}

.unordered-list .single_details:hover:before {
    color: var(--secondary-color);
    transform: scale(1.2);
}

.course_details_inner.bg-gradient-primary .unordered-list .single_details:before {
    color: #fff;
}

/* Table Styles */
.table {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin: 30px 0;
}

.table th {
    background: var(--primary-color);
    color: white;
    font-weight: 700;
    border: none;
    padding: 20px 15px;
    text-align: center;
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
}

.table th::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.table th:hover::after {
    left: 100%;
}

.table td {
    padding: 18px 15px;
    vertical-align: middle;
    border: 1px solid #e9ecef;
    font-size: 15px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.table-hover tbody tr:hover {
    background-color: rgba(var(--primary-color-rgb), 0.08);
    transform: scale(1.01);
}

.table-hover tbody tr:hover td {
    color: var(--secondary-color);
    font-weight: 600;
}

/* Animation Classes */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translate3d(0, 40px, 0);
    }
    to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
}

.fade-in {
    animation: fadeInUp 0.8s ease-out;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .page-header-section .main_title h1 {
        font-size: 3.5rem;
    }
}

@media (max-width: 991px) {
    .page-header-section {
        padding: 120px 0 80px 0;
    }
    
    .page-header-section .main_title h1 {
        font-size: 3rem;
    }
    
    .page-header-section .main_title .lead {
        font-size: 1.2rem;
    }
    
    .course_details_inner {
        padding: 40px 35px;
    }
}

@media (max-width: 768px) {
    .page-header-section {
        padding: 100px 0 60px 0;
        background-attachment: scroll;
    }
    
    .page-header-section .main_title h1 {
        font-size: 2.5rem;
        letter-spacing: 1px;
    }
    
    .page-header-section .main_title .lead {
        font-size: 1.1rem;
    }
    
    .course_details_inner {
        padding: 30px 25px;
        border-radius: 15px;
    }
    
    .content_wrapper .title {
        font-size: 24px;
    }
    
    .table th,
    .table td {
        padding: 15px 10px;
        font-size: 14px;
    }
}

@media (max-width: 576px) {
    .page-header-section .main_title h1 {
        font-size: 2rem;
    }
    
    .course_details_inner {
        padding: 25px 20px;
        border-radius: 12px;
    }
    
    .content_wrapper .title {
        font-size: 22px;
    }
    
    .unordered-list .single_details {
        padding-left: 25px;
    }
}

/* Additional Utility Classes */
.text-gradient {
    background: var(--primary-color);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.shadow-custom {
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1) !important;
}

.hover-lift {
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

/* Fix Footer Styles */
.footer-area {
    background: var(--secondary-color);
    color: #fff;
}

.footer-area .single-footer-widget h4 {
    color: #fff;
    margin-bottom: 25px;
    font-weight: 600;
    font-size: 20px;
}

.footer-area .single-footer-widget ul li a {
    color: #bdc3c7;
    transition: all 0.3s ease;
}

.footer-area .single-footer-widget ul li a:hover {
    color: var(--primary-color);
    padding-left: 5px;
}
/* ===== B737 Specific Styles ===== */
.page-header-section {
    background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%) !important;
}

/* B737 specific color variations */
.b737-accent {
    color: var(--secondary-color);
}

.b737-bg {
    background: var(--secondary-color);
}

/* Custom B737 animations */
@keyframes b737-float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(-5deg); }
}

.page-header-section::before {
    animation: b737-float 18s ease-in-out infinite;
}
</style>
@endpush