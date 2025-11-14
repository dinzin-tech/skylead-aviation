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
                    <a href="#training-steps" class="genric-btn primary circle arrow">
                        View Training Steps <span class="lnr lnr-arrow-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Page Header =================-->

<!--================ Start Flight Training Area =================-->
<section class="section_gap_top country-overview">
    <div class="container">
        <!-- Training Steps -->
        <div class="row mb-5" id="training-steps">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">Your Journey to a Commercial Pilot Licence (CPL)</h2>
                </div>
                
                @foreach($pageData['training_steps'] as $step)
                <div class="course_details_inner mb-4">
                    <div class="content_wrapper">
                        <h4 class="title">
                            <span class="mr-2">{{ $step['icon'] }}</span>
                            {{ $step['step'] }}
                        </h4>
                        <div class="single_details mb-3">
                            <p class="font-weight-bold">{{ $step['description'] }}</p>
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

        <!-- Journey Summary -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="course_details_inner bg-gradient-primary text-white">
                    <div class="content_wrapper text-center">
                        <h3 class="title text-white">{{ $pageData['journey_summary']['title'] }}</h3>
                        <div class="single_details">
                            <p class="h5 text-white">{{ $pageData['journey_summary']['description'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flying Hours Summary -->
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $pageData['flying_hours']['title'] }}</h2>
                </div>
                <div class="course_details_inner">
                    <div class="content_wrapper">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary text-white">
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
<!--================ End Flight Training Area =================-->

<!--================ Start CTA Section =================-->
<section class="section_gap bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mb-4">Ready to Start Your Flight Training?</h2>
                <p class="text-white mb-4">Begin your journey to becoming a commercial pilot with our comprehensive training programs</p>
                <a href="{{ route('contact') }}" class="genric-btn primary-border circle arrow">
                    Start Your Training <span class="lnr lnr-arrow-right"></span>
                </a>
            </div>
        </div>
    </div>
</section>
<!--================ End CTA Section =================-->
@endsection

@push('styles')
<style>
.page-header-section {
    background: linear-gradient(rgba(26, 43, 109, 0.8), rgba(44, 62, 80, 0.8)), url('/img/flight-training-bg.jpg') no-repeat center center;
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

.course_details_inner.bg-gradient-primary {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
    border-left: 4px solid #fff;
}

.content_wrapper .title {
    font-size: 24px;
    font-weight: 700;
    color: var(--secondary-color);
    margin-bottom: 20px;
    border-bottom: 2px solid var(--primary-color);
    padding-bottom: 10px;
}

.course_details_inner.bg-gradient-primary .title {
    color: #fff;
    border-bottom: 2px solid #fff;
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

.table th {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    font-weight: 600;
    border: none;
    padding: 15px;
    text-align: center;
}

.table td {
    padding: 15px;
    vertical-align: middle;
    border: 1px solid #dee2e6;
}

.table-hover tbody tr:hover {
    background-color: rgba(var(--primary-color-rgb), 0.1);
}
</style>
@endpush