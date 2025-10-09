@extends('layouts.app')

@section('title', 'Home - Skylead Aviation')

@section('content')
    <!--================ Start Home Banner Area =================-->
    @include('sections.banner')
    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    @include('sections.features')
    <!--================ End Feature Area =================-->

    <!--================ Start Popular Courses Area =================-->
    @include('sections.popular-courses')
    <!--================ End Popular Courses Area =================-->

    <!--================ Start Registration Area =================-->
    @include('sections.registration')
    <!--================ End Registration Area =================-->

    <!--================ Start Trainers Area =================-->
    @include('sections.trainers')
    <!--================ End Trainers Area =================-->

    <!--================ Start Events Area =================-->
    @include('sections.events')
    <!--================ End Events Area =================-->

    <!--================ Start Testimonial Area =================-->
    @include('sections.testimonials')
    <!--================ End Testimonial Area =================-->
@endsection