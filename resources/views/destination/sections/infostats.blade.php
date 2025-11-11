<section class="training-guide-section section_gap">
    <div class="container">
        <div class="row">

            @foreach ($guides as $i => $guide)
                <div class="col-lg-12">
                    <div class="guide-item">
                        <div class="row align-items-start">
                            <div class="col-lg-3">
                                <h3 class="guide-title">{{ $guide['title'] }}</h3>
                            </div>
                            <div class="col-lg-9">
                                <p class="guide-description">{{ $guide['value'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>