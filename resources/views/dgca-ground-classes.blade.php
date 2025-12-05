@extends('layouts.app')

@section('title', 'DGCA Ground Classes - Skylead Aviation')
@section('meta_description', 'Comprehensive DGCA ground training program covering Air Regulations, Aviation Meteorology, Air Navigation, Aircraft Technical, and RTR (Aero) subjects.')

@push('styles')
<style>
    /* DGCA Ground Classes Specific Styles */
    .dgca-hero {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--tertiary-color) 100%);
        padding: 120px 0 80px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .dgca-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" opacity="0.1"><path fill="white" d="M500,250c138.07,0,250,111.93,250,250s-111.93,250-250,250s-250-111.93-250-250S361.93,250,500,250z"/></svg>') no-repeat center center;
        background-size: cover;
    }

    .dgca-hero-content {
        position: relative;
        z-index: 2;
    }

    .dgca-hero-title {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 20px;
        text-transform: uppercase;
    }

    .dgca-hero-subtitle {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 25px;
        color: rgba(255, 255, 255, 0.9);
    }

    .dgca-hero-description {
        font-size: 18px;
        line-height: 1.7;
        margin-bottom: 30px;
        color: rgba(255, 255, 255, 0.8);
    }

    /* Subjects Section */
    .subjects-section {
        padding: 100px 0;
        background: var(--white-bg);
    }

    .subject-card {
        background: #fff;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid #e8e8e8;
        margin-bottom: 30px;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .subject-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .subject-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    }

    .subject-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        box-shadow: 0 8px 25px rgba(231, 76, 60, 0.3);
    }

    .subject-icon i {
        color: white;
        font-size: 32px;
    }

    .subject-title {
        font-size: 22px;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 15px;
    }

    .subject-description {
        color: #7f8c8d;
        line-height: 1.7;
        margin-bottom: 15px;
    }

    .subject-benefit {
        background: rgba(52, 152, 219, 0.1);
        padding: 15px;
        border-radius: 8px;
        border-left: 4px solid #3498db;
        margin-top: 15px;
    }

    .subject-benefit p {
        margin-bottom: 0;
        color: #2c3e50;
        font-weight: 500;
    }

    /* Why Required Section */
    .why-required-section {
        padding: 100px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    .requirement-card {
        background: white;
        padding: 30px 25px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        text-align: center;
        height: 100%;
        border: 1px solid #e8e8e8;
    }

    .requirement-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .requirement-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        box-shadow: 0 8px 20px rgba(155, 89, 182, 0.3);
    }

    .requirement-icon i {
        color: white;
        font-size: 28px;
    }

    .requirement-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 12px;
    }

    .requirement-description {
        color: #7f8c8d;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* Why Choose Section */
    .why-choose-section {
        padding: 100px 0;
        background: var(--white-bg);
    }

    .feature-box {
        background: white;
        padding: 30px 25px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        text-align: center;
        height: 100%;
        border: 1px solid #e8e8e8;
        position: relative;
        overflow: hidden;
    }

    .feature-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .feature-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color) 0%, #e58e08 100%);
        transform: scaleX(0);
        transition: all 0.3s ease;
    }

    .feature-box:hover::before {
        transform: scaleX(1);
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        box-shadow: 0 8px 20px rgba(46, 204, 113, 0.3);
    }

    .feature-icon i {
        color: white;
        font-size: 24px;
    }

    .feature-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 12px;
    }

    .feature-description {
        color: #7f8c8d;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* Quick Facts Sidebar */
    .quick-facts-sidebar {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 100px;
    }

    .quick-facts-sidebar h4 {
        color: white;
        font-weight: 600;
        margin-bottom: 25px;
        font-size: 24px;
        text-align: center;
    }

    .quick-facts-sidebar .unordered-list li {
        color: white;
        margin-bottom: 12px;
        font-size: 16px;
        line-height: 1.6;
        padding-left: 10px;
    }

    .quick-facts-sidebar .unordered-list li::before {
        content: '✓';
        margin-right: 10px;
        font-weight: bold;
    }

    /* Overview Section */
    .overview-section {
        padding: 80px 0;
        background: #f8f9fa;
    }

    .overview-highlight {
        background: linear-gradient(135deg, var(--primary-color) 0%, #e58e08 100%);
        color: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(252, 158, 14, 0.3);
        margin-top: 30px;
        text-align: center;
        font-size: 18px;
        font-weight: 600;
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        .dgca-hero-title {
            font-size: 36px;
        }
        
        .dgca-hero-subtitle {
            font-size: 20px;
        }
        
        .dgca-hero-description {
            font-size: 16px;
        }
        
        .subject-card {
            padding: 30px 20px;
        }
        
        .subject-icon {
            width: 60px;
            height: 60px;
        }
        
        .subject-icon i {
            font-size: 24px;
        }
        
        .subject-title {
            font-size: 20px;
        }
    }

    @media (max-width: 768px) {
        .dgca-hero {
            padding: 100px 0 60px;
        }
        
        .dgca-hero-title {
            font-size: 32px;
        }
        
        .subjects-section,
        .why-required-section,
        .why-choose-section {
            padding: 80px 0;
        }
        
        .quick-facts-sidebar {
            margin-top: 50px;
            position: relative;
            top: 0;
        }
    }

    @media (max-width: 576px) {
        .dgca-hero-title {
            font-size: 28px;
        }
        
        .dgca-hero-subtitle {
            font-size: 18px;
        }
        
        .subjects-section,
        .why-required-section,
        .why-choose-section {
            padding: 60px 0;
        }
        
        .subject-card {
            padding: 25px 20px;
        }
        
        .requirement-card,
        .feature-box {
            padding: 25px 20px;
        }
    }
    .global-hero-stats .global-stat-item {
        flex-items: flex-start !important;
    }
    /* .container {
        max-width: 1200px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    } */

    h1 {
        text-align: center;
        padding: 20px;
        /* background-color: #fff; */
        margin-bottom: 0;
        /* color: #383838; */
        color: #fff;
    }

    .tabs-container {
        display: flex;
        min-height: 500px;
    }

    .tabs {
        width: 200px;
        background-color: #fff;
        padding: 10px 0;
    }

    .tab-button {
        display: block;
        width: 100%;
        padding: 15px 20px;
        background-color: transparent;
        border: none;
        color: #3c3c3c;
        text-align: left;
        cursor: pointer;
        font-size: 16px;
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }

    .tab-button:hover {
        background-color: #383838;
        color: #e0e0e0;
    }

    .tab-button.active {
        background-color: #3a3a3a;
        color: #ffffff;
        border-left: 4px solid var(--primary-color);
    }

    .tab-content {
        flex: 1;
        padding: 20px;
        background-color: #fff;
        overflow: auto;
    }

    .tab-pane {
        display: none;
        animation: fadeIn 0.5s;
    }

    .tab-pane.active {
        display: block;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th {
        background-color: #2d2d2d;
        color: #f0f0f0;
        padding: 12px 15px;
        text-align: left;
        border-bottom: 2px solid var(--primary-color);
    }

    td {
        padding: 12px 15px;
        border-bottom: 1px solid #4a4a4a;
        /* color: #d0d0d0; */
    }

    tr:hover {
        background-color: #424242;
        color: #d0d0d0 !important;
    }

    .status-active {
        color: #6bc950;
        font-weight: bold;
    }

    .status-inactive {
        color: #ff6b6b;
        font-weight: bold;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @media (max-width: 768px) {
        .tabs-container {
            flex-direction: column;
        }
        
        .tabs {
            width: 100%;
            display: flex;
            overflow-x: auto;
        }
        
        .tab-button {
            min-width: 150px;
            border-left: none;
            border-bottom: 4px solid transparent;
        }
        
        .tab-button.active {
            border-left: none;
            border-bottom: 4px solid var(--primary-color);
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="dgca-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="dgca-hero-content text-center">
                    <h1 class="dgca-hero-title">{{ $pageData['hero']['title'] }}</h1>
                    <h2 class="dgca-hero-subtitle">{{ $pageData['hero']['subtitle'] }}</h2>
                    <p class="dgca-hero-description">{{ $pageData['hero']['description'] }}</p>
                    <a href="#subjects" class="genric-btn primary circle arrow">
                        Explore Subjects <span class="lnr lnr-arrow-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="overview-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_title text-center">
                    <h2>{{ $pageData['overview']['title'] }}</h2>
                </div>
                <div class="text-center mb-4">
                    <p class="lead">{{ $pageData['overview']['description'] }}</p>
                </div>
                <div class="overview-highlight">
                    {{ $pageData['overview']['highlight'] }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Subjects Section -->
<section id="subjects" class="subjects-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2>DGCA Theoretical Training Subjects</h2>
                    <p>Comprehensive coverage of all essential aviation theory subjects</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            @foreach($pageData['subjects'] as $subject)
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="subject-card">
                    <div class="subject-icon">
                        <i class="{{ $subject['icon'] }}"></i>
                    </div>
                    <h3 class="subject-title">{{ $subject['title'] }}</h3>
                    <p class="subject-description">{{ $subject['description'] }}</p>
                    @if(isset($subject['detail']))
                    <p class="subject-description"><small><em>{{ $subject['detail'] }}</em></small></p>
                    @endif
                    <div class="subject-benefit">
                        <p><strong>Benefit:</strong> {{ $subject['benefit'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Required & Why Choose Section -->
<section class="why-required-section">
    <div class="container">
        <div class="row">
            <!-- Why Required -->
            <div class="col-lg-8">
                <div class="main_title">
                    <h2>{{ $pageData['whyRequired']['title'] }}</h2>
                </div>
                <div class="row">
                    @foreach($pageData['whyRequired']['points'] as $point)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="requirement-card">
                            <div class="requirement-icon">
                                <i class="{{ $point['icon'] }}"></i>
                            </div>
                            <h4 class="requirement-title">{{ $point['title'] }}</h4>
                            <p class="requirement-description">{{ $point['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Quick Facts Sidebar -->
            <div class="col-lg-4">
                <div class="quick-facts-sidebar">
                    <h4>{{ $pageData['quickFacts']['title'] }}</h4>
                    <ul class="unordered-list">
                        @foreach($pageData['quickFacts']['points'] as $point)
                        <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="text-center mt-4">
                        <a href="#contact" class="genric-btn primary circle">
                            Enroll Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Section -->
<section class="why-choose-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2>{{ $pageData['whyChoose']['title'] }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($pageData['whyChoose']['features'] as $feature)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="{{ $feature['icon'] }}"></i>
                    </div>
                    <h4 class="feature-title">{{ $feature['title'] }}</h4>
                    <p class="feature-description">{{ $feature['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section_gap bg-dark text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3 text-white">Ready to Start Your Aviation Career?</h3>
                <p class="mb-0">Join Skylead Aviation's DGCA Ground Classes and build the strong foundation every safe and confident pilot needs.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="genric-btn primary circle arrow">
                    Enroll Now <span class="lnr lnr-arrow-right"></span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section_gap">
    <div class="container">
        <h1>Syllabus</h1>
        <div class="tabs-container">
            <div class="tabs">
                {{-- <button class="tab-button active" data-tab="employees">Employees</button>
                <button class="tab-button" data-tab="departments">Departments</button>
                <button class="tab-button" data-tab="projects">Projects</button>
                <button class="tab-button" data-tab="clients">Clients</button>
                <button class="tab-button" data-tab="reports">Reports</button> --}}
                @foreach($syllabus as $index => $item)

                    <button class="tab-button {{ $index === 0 ? 'active' : '' }}" data-tab="tab-{{ $item['slug'] }}">{{ $item['subject_name'] }}</button>

                @endforeach
            </div>
            <div class="tab-content">

                @foreach($syllabus as $index => $item)

                    <div class="tab-pane {{ $index === 0 ? 'active' : '' }}" id="{{ 'tab-' . $item['slug'] }}">
                        <h2>{{ $item['subject_name'] }}</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Topic</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($item['topics'] as $topic)
                                    <tr>
                                        <td>{{ $topic['title'] }}</td>
                                        <td>{{ $topic['title'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

</section>

<!-- Statistics Section -->
<section class="section_gap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_title text-center mb-5">
                    <h2>DGCA Training Statistics</h2>
                    <p>Key metrics about our ground training program</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-box feature-box animated text-center">
                    <div class="stat-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stat-number">5</div>
                    <div class="stat-label">Subjects</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-box feature-box animated text-center">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number">6-8</div>
                    <div class="stat-label">Weeks Duration</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-box feature-box animated text-center">
                    <div class="stat-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Syllabus Coverage</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-box feature-box animated text-center">
                    <div class="stat-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Success Rate</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
            }
        });
    }, observerOptions);

    // Initialize animation styles and observe elements
    document.querySelectorAll('.subject-card, .requirement-card, .feature-box').forEach(element => {
        element.style.opacity = "0";
        element.style.transform = "translateY(30px)";
        element.style.transition = "all 0.6s ease";
        observer.observe(element);
    });

    // Add hover effects to cards
    document.querySelectorAll('.subject-card, .requirement-card, .feature-box').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            if (!this.classList.contains('animated')) {
                this.style.transform = 'translateY(30px)';
            } else {
                this.style.transform = 'translateY(-5px)';
            }
        });
    });

    // Tab functionality
    // document.addEventListener('DOMContentLoaded', function() {
        
    // });
    const tabButtons = document.querySelectorAll('.tab-button');
        
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons and panes
            tabButtons.forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Show corresponding tab pane
            const tabId = this.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });

});
</script>
@endpush