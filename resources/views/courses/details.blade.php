@extends('layouts.app')

@section('title', $courseData['title'] ?? 'Course Details')

@push('head')
    <!-- Additional CSS if needed -->
    <link rel="stylesheet" href="{{ asset('css/coursedetails.css') }}">
@endpush
@section('content')
    <!-- Banner Section -->

   
    <!-- Check if it's Air Asia Cadet Program to show special sections -->
    {{--- @if(($courseData['type'] ?? '') === 'cadet_program') ---}}
        <!-- Hero Section for Cadet Program -->
        @include('courses.sections.cadet-hero', [
            'title' => $courseData['title'] ?? 'Air Asia Cadet Pilot Program',
            'description' => $courseData['hero_description'] ?? 'Launch your aviation career with comprehensive training.',
            'videoUrl' => $courseData['video_url'] ?? '#',
            'heroImage' => $courseData['hero_image'] ?? 'img/courses/hero.webp'
        ])

        <!-- Minimum Requirements Section -->
        @include('courses.sections.requirements', [
            'title' => 'Minimum Requirements',
            'requirements' => $courseData['requirements'] ?? []
        ])

        <!-- Selection Process Section -->
        @include('courses.sections.selection-process', [
            'title' => 'Selection Process',
            'processes' => $courseData['selection_process'] ?? []
        ])

        <!-- Training Stages Section -->
        @include('courses.sections.training-stages', [
            'title' => 'Training Stages',
            'stages' => $courseData['training_stages'] ?? []
        ])
    {{--- @endif ---}}

    <!-- Course Details Section (Original Content) -->
    
@endsection

@push('head')
    <!-- Additional CSS if needed -->
    <style>
        .cadet-program-hero {
            background: linear-gradient(135deg, #e2dadaff 0%, #f4ebebff 100%);
            padding:100px 0;
        }
        .stage-tag {
            background: #FF0000;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .requirement-card, .process-card, .stage-card {
            transition: transform 0.3s ease;
            height: 100%;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .requirement-card:hover, .process-card:hover, .stage-card:hover {
            transform: translateY(-5px);
        }
    </style>
@endpush

@push('scripts')
    <!-- Additional JS if needed -->
@endpush