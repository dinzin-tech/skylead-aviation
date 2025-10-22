<!--================ Start Requirements Area =================-->
<section class="section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-5">{{ $title }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($requirements as $requirement)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card requirement-card h-100">
                    <div class="card-body text-center">
                        <div class="icon mb-4">
                            <i class="{{ $requirement['icon'] }} display-4 "></i>
                        </div>
                        <h5 class="card-title mb-3">{{ $requirement['title'] }}</h5>
                        <p class="card-text">{{ $requirement['description'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ End Requirements Area =================-->