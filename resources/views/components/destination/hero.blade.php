<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="banner_content text-center">
                        <h2>{{ $title }}</h2>
                        <p>{{ $description }}</p>
                        @if(isset($ctaText))
                        <div class="page_link">
                            <a href="{{ $ctaLink ?? '#' }}" class="genric-btn primary">{{ $ctaText }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>