@extends('layouts.app')

@section('title', $flightTypeData['flight_type_name'] ?? 'Flight Training Courses')

@push('styles')
<style>
    .course-info {
        background: #f9f9ff;
        padding: 30px;
        border-radius: 5px;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    @include('components.hero', [
        'title' => $flightTypeData['flight_type_name'],
        'description' => $flightTypeData['flight_type_description']
    ])

    <!-- Course Overview -->
    @if(isset($flightTypeData['section_two']))
    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="content_wrapper">
                        <h4 class="title">{{ $flightTypeData['section_two']['title'] }}</h4>
                        <div class="content">
                            <p class="lead">{{ $flightTypeData['section_two']['description'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li><a class="justify-content-between d-flex" href="#">
                                    <p>Course Fee</p>
                                    <span class="color">$55,000 - $70,000</span>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="#">
                                    <p>Total Hours</p>
                                    <span>200+ Hours</span>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="#">
                                    <p>Instructor</p>
                                    <span>Expert Pilots</span>
                                </a></li>
                        </ul>
                        <a href="#" class="genric-btn primary circle arrow">Enroll Now<span class="ti-arrow-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Why Choose Program -->
    @if(isset($flightTypeData['section_three']))
    <section class="sample-text-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="main_title">
                        <h2>{{ $flightTypeData['section_three']['title'] }}</h2>
                        <p class="lead">{{ $flightTypeData['section_three']['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Program Highlights -->
    @if(isset($flightTypeData['key_highlights']))
    <section class="feature_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="main_title">
                        <h2>{{ $flightTypeData['key_highlights']['title'] }}</h2>
                        <p>Comprehensive training program highlights</p>
                    </div>
                </div>
            </div>
            @include('components.cards', [
                'cards' => $flightTypeData['key_highlights']['cards'],
                'columns' => 4
            ])
        </div>
    </section>
    @endif

    <!-- Life as Pilot -->
    @if(isset($flightTypeData['section_four']))
    <section class="sample-text-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="main_title">
                        <h2>{{ $flightTypeData['section_four']['title'] }}</h2>
                    <p class="lead">{{ $flightTypeData['section_four']['description'] }}</p>
                    <a href="#" class="genric-btn primary-border circle">Learn More</a>
                    </div>
                </div>
                @if(isset($flightTypeData['section_four']['image']))
                <div class="col-lg-6">
                    <img src="{{ asset($flightTypeData['section_four']['image']) }}" 
                         alt="Pilot Life" class="img-fluid rounded">
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    <!-- Career Paths -->
    @if(isset($flightTypeData['career_paths']))
    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main_title">
                        <h2>{{ $flightTypeData['career_paths']['title'] }}</h2>
                        <p>Explore various career opportunities after course completion</p>
                    </div>
                </div>
            </div>
            @include('components.cards', [
                'cards' => $flightTypeData['career_paths']['cards'],
                'columns' => 4
            ])
        </div>
    </section>
    @endif
@endsection