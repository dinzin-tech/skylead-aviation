@if(isset($images) && count($images) > 0)
<section class="sample-text-area">
    <div class="container">
        @if(isset($title))
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="main_title">
                    <h2>{{ $title }}</h2>
                    <p>Explore our training facilities and student life</p>
                </div>
            </div>
        </div>
        @endif
        <div class="row gallery-item">
            @foreach($images as $image)
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