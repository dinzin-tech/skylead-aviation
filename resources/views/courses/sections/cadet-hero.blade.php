<!--================ Start Cadet Hero Area =================-->
<section class="cadet-program-hero ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero_content">
                    <h1 class="">{{ $title }}</h1>
                    <p class=" mt-4 mb-5">{{ $description }}</p>
                    <div class="d-flex align-items-center">
                        <a href="#apply" class="primary-btn text-uppercase mr-4">Apply Now</a>
                        <a href="{{ $videoUrl }}" class="video-popup text-black d-flex align-items-center">
                            <i class="ti-control-play mr-2"></i>
                            <span>Watch Video</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero_image text-right">
                    <img class="img-fluid rounded" src="{{ asset($heroImage) }}" alt="{{ $title }}">
                </div>
            </div>
        </div>
    </div>
</section>
@push('styles')
    <style>
    .text-black{
        color: #000000 !important;
    }
    </style>
@endpush
<!--================ End Cadet Hero Area =================-->