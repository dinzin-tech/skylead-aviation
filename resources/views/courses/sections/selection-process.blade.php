<!--================ Start Selection Process Area =================-->
<section class="section_gap bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-5">{{ $title }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($processes as $process)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card process-card h-100">
                    <div class="card-body text-center ">
                        <div class="icon mb-4">
                            <i class="{{ $process['icon'] }} display-4 "></i>
                        </div>
                        <h5 class="card-title mb-3">{{ $process['title'] }}</h5>
                        <p class="card-text">{{ $process['description'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@push('styles')
    <style>
    .icon.mb-4{
        color: var(--primary-color) !important;
    }
    </style>
@endpush
<!--================ End Selection Process Area =================-->