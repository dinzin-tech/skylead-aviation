{{-- Courses Offered Section --}}
<!-- Courses Offered Section -->

@if(isset($countryData['courses_offered']))
<section class="courses-offered-section section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="main_title">
                    <h2>Courses Offered</h2>
                    <p>Comprehensive flight training programs for aspiring pilots</p>
                </div>
            </div>
        </div>
        
        <div class="courses-grid">
            @foreach($countryData['courses_offered'] as $course)
            <div class="course-card">
                <div class="course-logo">
                    @if(Storage::exists($course['logo']))
                        <img src="{{ Storage::url($course['logo']) }}" alt="{{ $course['title'] }}" class="course-logo-img">
                    @else
                        <i class="{{ $course['icon'] }}"></i>
                    @endif
                </div>
                <div class="course-content">
                    <h3 class="course-title">{{ $course['title'] }}</h3>
                    @if(isset($course['subtitle']) && $course['subtitle'])
                        {{-- <div class="course-subtitle">{{ $course['subtitle'] }}</div> --}}
                    @endif
                    <p class="course-description">
                        {{ $course['description'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif