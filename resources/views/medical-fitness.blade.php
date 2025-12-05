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
                    <a href="#medical-requirements" class="genric-btn primary circle arrow">
                        View Medical Requirements <span class="lnr lnr-arrow-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Page Header =================-->

<!--================ Start Medical Requirements Area =================-->
<section class="section_gap_top country-overview">
    <div class="container">
        <!-- Introduction -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="course_details_inner">
                    <div class="content_wrapper">
                        <div class="unordered-list">
                            @foreach($pageData['intro']['items'] as $item)
                            <div class="single_details mb-3">
                                <p class="h5">{{ $item }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class 2 Medical -->
        <div class="row mb-5" id="medical-requirements">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $pageData['class2_medical']['title'] }}</h2>
                </div>
                <div class="course_details_inner">
                    <div class="content_wrapper">
                        <div class="single_details mb-4">
                            <p class="font-weight-bold">{{ $pageData['class2_medical']['when'] }}</p>
                        </div>
                        
                        <h4 class="title">{{ $pageData['class2_medical']['process_title'] }}</h4>
                        <div class="unordered-list">
                            @foreach($pageData['class2_medical']['steps'] as $step)
                            <div class="single_details mb-2">
                                <p>{{ $step }}</p>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <h5 class="text-primary mb-3">Medical Tests Include:</h5>
                            <div class="row">
                                @foreach($pageData['class2_medical']['tests'] as $test)
                                <div class="col-md-6">
                                    <div class="single_details mb-2">
                                        <p>{{ $test }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="single_details mt-4">
                            <p class="text-success font-weight-bold">{{ $pageData['class2_medical']['result'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class 1 Medical -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $pageData['class1_medical']['title'] }}</h2>
                </div>
                <div class="course_details_inner">
                    <div class="content_wrapper">
                        <div class="single_details mb-4">
                            <p class="font-weight-bold">{{ $pageData['class1_medical']['when'] }}</p>
                        </div>
                        
                        <h4 class="title">{{ $pageData['class1_medical']['process_title'] }}</h4>
                        <div class="unordered-list">
                            @foreach($pageData['class1_medical']['steps'] as $step)
                            <div class="single_details mb-2">
                                <p>{{ $step }}</p>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <h5 class="text-primary mb-3">Medical Centers:</h5>
                            <div class="unordered-list">
                                @foreach($pageData['class1_medical']['centers'] as $center)
                                <div class="single_details mb-2">
                                    <p>{{ $center }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5 class="text-primary mb-3">Medical Tests Include (More Detailed than Class 2):</h5>
                            <div class="row">
                                @foreach($pageData['class1_medical']['tests'] as $test)
                                <div class="col-md-6">
                                    <div class="single_details mb-2">
                                        <p>{{ $test }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="single_details mt-4">
                            <p class="text-success font-weight-bold">{{ $pageData['class1_medical']['result'] }}</p>
                            <p class="text-info font-weight-bold">{{ $pageData['class1_medical']['validity'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comparison Table -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $pageData['comparison']['title'] }}</h2>
                </div>
                <div class="course_details_inner">
                    <div class="content_wrapper">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        @foreach($pageData['comparison']['data'][0] as $header)
                                        <th>{{ $header }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(array_slice($pageData['comparison']['data'], 1) as $row)
                                    <tr>
                                        @foreach($row as $cell)
                                        <td>{{ $cell }}</td>
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

        <!-- Why Become a Pilot -->
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $pageData['why_become_pilot']['title'] }}</h2>
                </div>
                <div class="row">
                    @foreach($pageData['why_become_pilot']['reasons'] as $reason)
                    <div class="col-lg-6 mb-4">
                        <div class="course_details_inner h-100">
                            <div class="content_wrapper">
                                <h4 class="title">{{ $reason['title'] }}</h4>
                                <div class="single_details">
                                    <p>{{ $reason['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Medical Requirements Area =================-->

<!--================ Start CTA Section =================-->
<section class="section_gap bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mb-4">Ready to Start Your Aviation Career?</h2>
                <p class="text-white mb-4">Contact our experts to guide you through medical requirements and pilot training process</p>
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
.page-header-section {
    background: linear-gradient(rgba(26, 43, 109, 0.8), rgba(44, 62, 80, 0.8)), url('/img/medical-bg.jpg') no-repeat center center;
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
}

.table td {
    padding: 15px;
    vertical-align: middle;
    border: 1px solid #dee2e6;
}

.table-hover tbody tr:hover {
    background-color: rgba(var(--primary-color-rgb), 0.1);
}

.text-white {
    color: #020202ff !important;
}
</style>
@endpush