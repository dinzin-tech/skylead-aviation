@extends('layouts.app')

@section('title', $aboutData['page_title'])

@section('content')

<!-- Banner -->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>{{ $aboutData['title'] }}</h2>
            </div>
        </div>
    </div>
</section>

<!-- History Section -->
<section class="about-section fade-in-up">
    <div class="container">
        <div class="section-title-centered text-center mb-5">
            <h2>Our History</h2>
        </div>

        <div class="premium-card">
            <p>{{ $aboutData['history']['text'] }}</p>
        </div>
    </div>
</section>

<!-- Who We Are -->
<section class="about-section fade-in-up bg-light">
    <div class="container">
        <div class="section-title-centered text-center mb-5">
            <h2>Who We Are</h2>
        </div>

        <div class="premium-card">
            <p>{{ $aboutData['who_we_are']['text'] }}</p>
        </div>
    </div>
</section>

<!-- Mission, Vision & Values -->
<section class="section_gap fade-in-up">
    <div class="container">
        <div class="section-title-centered text-center mb-5">
            <h2>Mission • Vision • Values</h2>
        </div>

        <div class="row">
            @foreach ($aboutData['mission_vision_values'] as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="premium-card text-center">
                        <div class="icon">
                            <img src="{{ asset('img/icons/'.$item['icon']) }}">
                        </div>
                        <h4>{{ $item['title'] }}</h4>

                        @if(isset($item['description']))
                            <p>{{ $item['description'] }}</p>
                        @endif

                        @if(isset($item['list']))
                            <ul class="unordered-list text-start mt-3">
                                @foreach($item['list'] as $value)
                                    <li>{{ $value }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- What Sets Us Apart -->
<section class="section_gap fade-in-up bg-light">
    <div class="container">
        <div class="section-title-centered text-center mb-5">
            <h2>What Sets Us Apart</h2>
        </div>

        <div class="row">
            @foreach($aboutData['unique_points'] as $point)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="premium-card text-center">
                        <div class="feature-icon">
                            <span class="{{ $point['icon'] }}"></span>
                        </div>
                        <h4>{{ $point['title'] }}</h4>
                        <p>{{ $point['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="banner_area fade-in-up" style="padding: 80px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center text-white">

                <h1 class="mb-5 mt-5 text-white">Our Achievements</h1>

                <div class="d-flex flex-wrap justify-content-center">
                    <div class="stats-box">
                        <h2>{{ $aboutData['statistics']['students_trained'] }}+</h2>
                        <p>Students Trained</p>
                    </div>

                    <div class="stats-box">
                        <h2>{{ $aboutData['statistics']['success_rate'] }}%</h2>
                        <p>Placement Success</p>
                    </div>

                    <div class="stats-box">
                        <h2>{{ $aboutData['statistics']['instructors'] }}+</h2>
                        <p>Expert Instructors</p>
                    </div>

                    <div class="stats-box">
                        <h2>{{ $aboutData['statistics']['years_experience'] }}+</h2>
                        <p>Years of Legacy</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section_gap fade-in-up bg-light">
    <div class="container">

        <div class="section-title-centered text-center mb-5">
            <h2>Why Choose Us?</h2>
            <p class="mt-3" style="font-size: 18px; color:#555;">
                Choosing the right aviation academy is the first step toward a successful flying career.
                At Skylead Aviation Academy, we go beyond training — we prepare you for a global aviation journey.
            </p>
        </div>

        <div class="row">
            @php
                $whychooseus = [
                    ['title' => 'DGCA-Compliant Training', 'desc' => 'Structured CPL ground classes aligned with DGCA syllabus and exam patterns for complete readiness.'],
                    ['title' => 'Experienced Faculty', 'desc' => 'Learn from industry professionals and licensed instructors with real-world aviation experience.'],
                    ['title' => 'Global Opportunities', 'desc' => 'Guidance and support for international flying schools and global placement pathways.'],
                    ['title' => 'Modern Learning Approach', 'desc' => 'Interactive sessions, digital tools, and personalized mentoring to enhance understanding.'],
                    ['title' => 'Proven Track Record', 'desc' => 'Strong history of high success rates with alumni flying across the world.'],
                    ['title' => 'Career Guidance & Support', 'desc' => 'End-to-end assistance from admission counseling to DGCA exam prep and placements.'],
                    ['title' => 'Values That Inspire', 'desc' => 'Driven by passion, innovation, teamwork, and leadership — we shape aviation leaders.'],
                ];
            @endphp

            @foreach($whychooseus as $point)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="premium-card h-100">
                        <h4>{{ $point['title'] }}</h4>
                        <p>{{ $point['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Our Facilities -->
<section class="section_gap fade-in-up">
    <div class="container">

        <div class="section-title-centered text-center mb-5">
            <h2>Our Facilities</h2>
            <p class="mt-3" style="font-size: 18px; color:#555;">
                A professional and supportive learning environment designed for aviation excellence.
                Our facilities ensure world-class training and comfort throughout your journey.
            </p>
        </div>

        <div class="row">
            @php
                $facilities = [
                    'Modern Classrooms – Equipped with projectors, whiteboards, and digital learning tools.',
                    'Dedicated Ground Training Center – Built specifically for CPL ground classes as per DGCA standards.',
                    'Library & Resource Hub – Updated aviation books, DGCA references, and international manuals.',
                    'Computer Labs – Navigation training, DGCA mock exams, and simulation exercises.',
                    'DGCA Exam Preparation Support – Mock tests, question banks, and doubt-clearing sessions.',
                    'Student Counseling & Career Guidance – Personalized mentorship throughout the program.',
                    'Comfortable Learning Environment – AC classrooms, study spaces, and student lounges.',
                    'Networking Opportunities – Workshops, seminars, and sessions with aviation professionals.',
                    'Global Tie-Ups – Partnerships with international flying schools for smooth flying transitions.'
                ];
            @endphp

            @foreach($facilities as $facility)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="premium-card h-100">
                        <p>{{ $facility }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>


@endsection