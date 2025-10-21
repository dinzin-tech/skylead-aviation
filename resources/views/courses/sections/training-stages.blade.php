<!--================ Start Training Stages Area =================-->
<section class="section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-5">{{ $title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="training-timeline">
                    @foreach($stages as $stage)
                    <div class="timeline-item mb-5">
                        <div class="row">
                            <div class="col-lg-2 col-md-3">
                                <div class="stage-number text-center mb-3">
                                    <div class="stage-circle d-inline-flex align-items-center justify-content-center">
                                        <span class="stage-text">{{ $stage['stageNumber'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-9">
                                <div class="stage-details">
                                    <h4 class="mb-3">{{ $stage['title'] }}</h4>
                                    <p class="mb-0">{{ $stage['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Training Stages Area =================-->