
    <!-- Training Guide -->
    @if(isset($countryData['guide']))
    <section class="feature_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="main_title">
                        <h2>Training Guide</h2>
                        <p>Comprehensive training program designed for international students</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($countryData['guide'] as $guide)
                <div class="col-lg-4 col-md-6">
                    <div class="single_feature">
                        <div class="feature_head">
                            <h4>{{ $guide['title'] ?? 'Guide' }}</h4>
                        </div>
                        <div class="feature_content">
                            <p>{{ $guide['value'] ?? 'Guide description' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif