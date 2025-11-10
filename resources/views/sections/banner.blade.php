<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-sm-6 col-md-6">
                    <div class="banner_content text-center">
                        <div 
                            class="banner-image" 
                            {{-- style="background: url({{ asset('img/banner/home-banner-2.avif') }}) no-repeat center center; background-size: cover; height: 400px;" --}}
                        >
                            <img
                                src="{{ $hero_image ?? asset('img/banner/home-banner-2.avif') }}"
                                alt="Banner Image"
                                {{-- class="img-fluid" --}}
                                height="400px"
                            />
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6">
                    <div class="banner_content text-center">
                        <blockquote >
                            <h2 class="text-uppercase">
                                {{ $hero_text ?? 'Best online education service In the world' }}
                            </h2>
                            <h3 class="text-uppercase mt-4 mb-5">
                                {{ $hero_subtext ?? 'One Step Ahead This Season' }}
                            </h3>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>