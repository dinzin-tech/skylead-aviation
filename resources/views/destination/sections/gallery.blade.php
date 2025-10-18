<!-- Justified Gallery -->
@if(isset($countryData['gallery']))
<section class="justified-gallery-section section_gap">
    <div class="container-fluid px-0">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="main_title">
                    <h2>Training Facilities Gallery</h2>
                    <p>Explore our world-class training facilities</p>
                </div>
            </div>
        </div>
        
        <div class="justified-grid-equal-height">
            @foreach($countryData['gallery'] as $index => $image)
            <div class="justified-item-equal" data-image="{{ asset($image) }}" data-index="{{ $index }}">
                <div class="justified-image-wrapper">
                    <img src="{{ asset($image) }}" alt="Gallery Image {{ $loop->iteration }}" class="img-fluid">
                    <div class="justified-overlay">
                        <div class="overlay-content">
                            <i class="ti-zoom-in"></i>
                            <span>View Image {{ $loop->iteration }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Add more images if needed -->
        @if(count($countryData['gallery']) < 15)
        <div class="justified-grid-equal-height">
            <!-- Additional sample images -->
            @for($i = count($countryData['gallery']) + 1; $i <= 15; $i++)
            <div class="justified-item-equal" data-image="{{ asset('img/banner/banner-2.jpg') }}" data-index="{{ $i }}">
                <div class="justified-image-wrapper">
                    <img src="{{ asset('img/banner/banner-2.jpg') }}" alt="Sample Image {{ $i }}" class="img-fluid">
                    <div class="justified-overlay">
                        <div class="overlay-content">
                            <i class="ti-zoom-in"></i>
                            <span>Sample Facility {{ $i }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        @endif
    </div>

    <!-- Lightbox HTML -->
    <div id="galleryLightbox" class="lightbox">
        <span class="lightbox-close">&times;</span>
        <div class="lightbox-content">
            <img class="lightbox-image" src="" alt="">
        </div>
    </div>
</section>
@endif
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get lightbox elements
    const lightbox = document.getElementById('galleryLightbox');
    const lightboxImage = document.querySelector('.lightbox-image');
    const lightboxClose = document.querySelector('.lightbox-close');
    
    // Get all gallery items
    const galleryItems = document.querySelectorAll('.justified-item-equal');
    
    // Add click event to each gallery item
    galleryItems.forEach(item => {
        item.addEventListener('click', function() {
            const imageUrl = this.getAttribute('data-image');
            const imageAlt = this.querySelector('img').alt;
            
            // Set lightbox image
            lightboxImage.src = imageUrl;
            lightboxImage.alt = imageAlt;
            
            // Show lightbox
            lightbox.classList.add('show');
            document.body.classList.add('lightbox-open');
        });
    });
    
    // Close lightbox when clicking X
    lightboxClose.addEventListener('click', function() {
        lightbox.classList.remove('show');
        document.body.classList.remove('lightbox-open');
    });
    
    // Close lightbox when clicking outside the image
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            lightbox.classList.remove('show');
            document.body.classList.remove('lightbox-open');
        }
    });
    
    // Close lightbox with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.classList.contains('show')) {
            lightbox.classList.remove('show');
            document.body.classList.remove('lightbox-open');
        }
    });
});
</script>
@endpush