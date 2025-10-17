
    <!-- Gallery -->
    @if(isset($countryData['gallery']))
    <section class="sample-text-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main_title">
                        <h2>Training Facilities Gallery</h2>
                        <p>Explore our training facilities and student life</p>
                    </div>
                </div>
            </div>
            <div class="row gallery-item">
                @foreach($countryData['gallery'] as $image)
                <div class="col-md-4">
                    <div class="single-gallery-image">
                        <img src="{{ asset($image) }}" alt="Gallery Image {{ $loop->iteration }}" class="img-fluid">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif