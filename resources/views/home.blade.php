@extends('layouts.app')

@section('title', 'Home - Skylead Aviation')

@section('content')
    <!--================ Start Home Banner Area =================-->
    @include('sections.banner')
    <!--================ End Home Banner Area =================-->

    {{-- about us secion start --}}
    @include('sections.about')
    {{-- about us secion end --}}

    <!--================ Start Feature Area =================-->
    {{-- @include('sections.features') --}}
    <!--================ End Feature Area =================-->

    <!--================ Start Popular Courses Area =================-->
    {{-- @include('sections.popular-courses') --}}
    @include('sections.programs')
    <!--================ End Popular Courses Area =================-->

    <!--================ Start Registration Area =================-->
    @include('sections.registration')
    <!--================ End Registration Area =================-->

    <!--================ Start Trainers Area =================-->
    {{-- @include('sections.trainers') --}}
    @include('sections.training-destinations')
    <!--================ End Trainers Area =================-->

    <!--================ Start Events Area =================-->
    {{-- @include('sections.events') --}}
    @include('sections.pilot-steps')
    <!--================ End Events Area =================-->

    <!--================ Start Testimonial Area =================-->
    {{-- @include('sections.testimonials') --}}
    <!--================ End Testimonial Area =================-->

    <!--================ Start FAQ Area =================-->
    @include('sections.faq')
    <!--================ End FAQ Area =================-->

@endsection
@push('scripts')
    <script>
        // FAQ Filtering and Interaction
        document.addEventListener('DOMContentLoaded', function() {
            // Category Filtering
            const categoryButtons = document.querySelectorAll('.category_btn');
            const faqItems = document.querySelectorAll('.faq_item');
            
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    const selectedCategory = this.getAttribute('data-category');
                    
                    // Filter FAQ items
                    faqItems.forEach(item => {
                        const itemCategory = item.getAttribute('data-category');
                        
                        if (selectedCategory === 'All' || itemCategory === selectedCategory) {
                            item.style.display = 'block';
                            // Add slight animation
                            item.style.opacity = '0';
                            setTimeout(() => {
                                item.style.opacity = '1';
                            }, 50);
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
            
            // Smooth scroll to FAQ item when opening
            const faqButtons = document.querySelectorAll('.faq_btn');
            faqButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const target = this.getAttribute('data-target');
                    if (target) {
                        setTimeout(() => {
                            this.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }, 300);
                    }
                });
            });
            
            // Auto-open first FAQ item
            // const firstFaqButton = document.querySelector('.faq_btn');
            // if (firstFaqButton) {
            //     firstFaqButton.click();
            // }
        });
    </script>