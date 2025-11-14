@extends('layouts.app')

@section('title', $pageData['title'])
@section('description', $pageData['description'])

@section('content')
<!--================ Start Page Header =================-->
<section class="page-header-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="main_title text-center">
                    <h1 class="mb-3">{{ $pageData['hero']['title'] }}</h1>
                    <p class="mb-5 lead">{{ $pageData['hero']['subtitle'] }}</p>
                    <a href="#conversion-process" class="genric-btn primary circle arrow">
                        Start Conversion Process <span class="lnr lnr-arrow-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Page Header =================-->

<!--================ Start Conversion Process Area =================-->
<section class="section_gap_top country-overview">
    <div class="container">
        <!-- Eligibility Requirements -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $pageData['eligibility']['title'] }}</h2>
                </div>
                <div class="course_details_inner">
                    <div class="content_wrapper">
                        <div class="unordered-list">
                            @foreach($pageData['eligibility']['items'] as $item)
                            <div class="single_details mb-3">
                                <p>{{ $item }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conversion Process -->
        <div class="row mb-5" id="conversion-process">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $pageData['conversion_process']['title'] }}</h2>
                </div>
                
                @foreach($pageData['conversion_process']['steps'] as $step)
                <div class="course_details_inner mb-4">
                    <div class="content_wrapper">
                        <h4 class="title">{{ $step['title'] }}</h4>
                        <div class="unordered-list">
                            @foreach($step['items'] as $item)
                            <div class="single_details mb-2">
                                <p>{{ $item }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Flying Hours Requirements -->
        <div class="row mb-5">
            <div class="col-lg-8">
                <div class="course_details_inner">
                    <div class="content_wrapper">
                        <h4 class="title">{{ $pageData['flying_hours']['title'] }}</h4>
                        <div class="unordered-list">
                            @foreach($pageData['flying_hours']['requirements'] as $requirement)
                            <div class="single_details mb-2">
                                <p>{{ $requirement }}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="single_details mt-4">
                            <p class="text-primary font-weight-bold">{{ $pageData['flying_hours']['note'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="quick-facts">
                    <h4>Quick Facts</h4>
                    <ul class="unordered-list">
                        <li><strong>Minimum Hours:</strong> 200 Total</li>
                        <li><strong>PIC Hours:</strong> 100 Hours</li>
                        <li><strong>Cross Country:</strong> 20 Hours</li>
                        <li><strong>Instrument Flying:</strong> 10 Hours</li>
                        <li><strong>Night Flying:</strong> 5 Hours</li>
                        <li><strong>Countries Accepted:</strong> USA, Canada, Australia, NZ, South Africa</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Summary Path -->
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $pageData['summary']['title'] }}</h2>
                </div>
                <div class="course_details_inner">
                    <div class="content_wrapper">
                        <div class="unordered-list">
                            @foreach($pageData['summary']['steps'] as $step)
                            <div class="single_details mb-3">
                                <p class="h5">{{ $step }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Conversion Process Area =================-->

<!--================ Start CTA Section =================-->
<section class="section_gap bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mb-4">Ready to Start Your DGCA CPL Conversion?</h2>
                <p class="text-white mb-4">Contact our experts to guide you through the entire conversion process</p>
                <a href="{{ route('contact') }}" class="genric-btn primary-border circle arrow">
                    Get Started Today <span class="lnr lnr-arrow-right"></span>
                </a>
            </div>
        </div>
    </div>
</section>
<!--================ End CTA Section =================-->
@endsection

@push('styles')
<style>
.text-white
{
    color: #000000ff !important;
}
.page-header-section {
    background: linear-gradient(rgba(26, 43, 109, 0.8), rgba(44, 62, 80, 0.8)), url('/img/aviation-bg.jpg') no-repeat center center;
    background-size: cover;
    padding: 120px 0 80px 0;
    position: relative;
}

.page-header-section .main_title h1 {
    color: #fff;
    font-size: 3.5rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 25px;
}

.page-header-section .main_title .lead {
    color: #fff;
    font-size: 1.3rem;
    line-height: 1.6;
    margin-bottom: 35px;
}

.single_details p {
    font-size: 16px;
    line-height: 1.7;
    color: #555;
    margin-bottom: 8px;
}

.single_details p.h5 {
    font-size: 18px;
    font-weight: 600;
    color: var(--secondary-color);
}

.course_details_inner {
    background: #fff;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    margin-bottom: 30px;
    border-left: 4px solid var(--primary-color);
}

.content_wrapper .title {
    font-size: 24px;
    font-weight: 700;
    color: var(--secondary-color);
    margin-bottom: 20px;
    border-bottom: 2px solid var(--primary-color);
    padding-bottom: 10px;
}

.quick-facts {
    background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
    color: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    height: 100%;
}

.quick-facts h4 {
    color: #fff;
    font-weight: 600;
    margin-bottom: 25px;
    font-size: 22px;
    text-align: center;
}

.quick-facts .unordered-list li {
    color: #fff;
    margin-bottom: 12px;
    font-size: 15px;
    line-height: 1.6;
    padding-left: 10px;
}

.quick-facts .unordered-list li strong {
    color: #fff;
    font-weight: 600;
}

.unordered-list {
    list-style: none;
    padding: 0;
}

.unordered-list .single_details {
    position: relative;
    padding-left: 25px;
}

.unordered-list .single_details:before {
    content: "•";
    color: var(--primary-color);
    font-weight: bold;
    position: absolute;
    left: 0;
    font-size: 20px;
}
</style>
@endpush