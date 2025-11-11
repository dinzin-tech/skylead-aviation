<!--================ Start Requirements Area =================-->
<section class="requirements-section section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="main_title">
                    <h2>{{ $title }}</h2>
                </div>
            </div>
        </div>
        
        <div class="requirements-grid">
            @foreach($requirements as $requirement)
            <div class="requirement-card">
                <div class="requirement-icon">
                    <i class="{{ $requirement['icon'] }}"></i>
                </div>
                <div class="requirement-content">
                    <h4 class="requirement-title">{{ $requirement['title'] }}</h4>
                    <p class="requirement-description">{{ $requirement['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ End Requirements Area =================-->