<!-- Advantages -->
    @if(isset($countryData['advantages']))
    <section class="sample-text-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main_title">
                        <h2>Key Advantages</h2>
                        <p>Why choose {{ $countryData['country_name'] ?? 'this destination' }} for flight training?</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($countryData['advantages'] as $advantage)
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-center">
                        <i class="ti-check-box text-success mr-3"></i>
                        <span class="h5">{{ $advantage }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif