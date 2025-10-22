<!-- Advantages -->
@if(isset($countryData['advantages']))
<section class="advantages-section section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="main_title">
                    <h2>Key Advantages</h2>
                    <p>Why choose {{ $countryData['country_name'] ?? 'this destination' }} for flight training?</p>
                </div>
            </div>
        </div>
        
        <div class="advantages-grid">
            @foreach($countryData['advantages'] as $advantage)
            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="ti-check-box"></i>
                </div>
                <div class="advantage-content">
                    <h4 class="advantage-title">{{ $advantage }}</h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif