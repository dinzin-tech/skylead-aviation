<!--================ Start Selection Process Area =================-->
<section class="selection-process-section section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="main_title">
                    <h2>{{ $title }}</h2>
                </div>
            </div>
        </div>
        
        <div class="selection-process-grid">
            @foreach($processes as $process)
            <div class="process-card">
                <div class="process-icon">
                    <i class="{{ $process['icon'] }}"></i>
                </div>
                <div class="process-content">
                    <h4 class="process-title">{{ $process['title'] }}</h4>
                    <p class="process-description">{{ $process['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ End Selection Process Area =================-->