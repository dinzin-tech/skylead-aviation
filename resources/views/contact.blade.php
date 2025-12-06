@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

<!-- Banner -->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Contact Us</h2>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="section_gap fade-in-up">
    <div class="container">

        <div class="section-title-centered text-center mb-5">
            <h2>Get In Touch</h2>
            <p style="font-size: 18px; color:#555;">
                Have questions? Need guidance? We’re here to help you start your aviation journey.
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <div class="premium-card mx-auto" style="max-width: 700px;">

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <div class="form-group mb-4">
                    <label><strong>Name</strong></label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group mb-4">
                    <label><strong>Email</strong></label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group mb-4">
                    <label><strong>Phone</strong></label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="form-group mb-4">
                    <label><strong>Message</strong></label>
                    <textarea name="message" class="form-control" rows="5" required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="primary-btn">Send Message</button>
                </div>

            </form>

        </div>

    </div>
</section>

@endsection