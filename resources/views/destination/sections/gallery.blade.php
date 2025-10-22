<!-- Justified Gallery -->
@if(isset($countryData['gallery']))
<section class="justified-gallery-section section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="main_title">
                    <h2>Training Facilities Gallery</h2>
                    <p>Explore our world-class training facilities</p>
                </div>
            </div>
        </div>
        
        <div class="masonry-gallery">
            @foreach($countryData['gallery'] as $index => $image)
            <div class="masonry-item" data-image="{{ asset($image) }}" data-index="{{ $index }}">
                <div class="masonry-image-wrapper">
                    <img src="{{ asset($image) }}" alt="Gallery Image {{ $loop->iteration }}" class="img-fluid">
                    <div class="masonry-overlay">
                        <div class="overlay-content">
                            <i class="ti-zoom-in"></i>
                            <span>View Image</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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

@push('styles')
<style>
/* True Masonry Layout with CSS Columns */
.masonry-gallery {
    column-count: 3;
    column-gap: 15px;
}

.masonry-item {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    cursor: pointer;
    margin-bottom: 15px;
    break-inside: avoid;
}

.masonry-image-wrapper {
    width: 100%;
    position: relative;
}

.masonry-item img {
    width: 100%;
    height: auto;
    display: block;
    transition: all 0.3s ease;
}

.masonry-item:hover img {
    transform: scale(1.05);
}

.masonry-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.masonry-item:hover .masonry-overlay {
    opacity: 1;
}

.overlay-content {
    text-align: center;
    color: white;
}

.overlay-content i {
    font-size: 2rem;
    margin-bottom: 10px;
    display: block;
}

.overlay-content span {
    font-size: 0.9rem;
    font-weight: 500;
}

/* Responsive for column layout */
@media (max-width: 992px) {
    .masonry-gallery {
        column-count: 2;
    }
}

@media (max-width: 768px) {
    .masonry-gallery {
        column-count: 2;
        column-gap: 10px;
    }
    
    .masonry-item {
        margin-bottom: 10px;
    }
}

@media (max-width: 480px) {
    .masonry-gallery {
        column-count: 1;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get lightbox elements
    const lightbox = document.getElementById('galleryLightbox');
    const lightboxImage = document.querySelector('.lightbox-image');
    const lightboxClose = document.querySelector('.lightbox-close');
    
    // Get all gallery items
    const galleryItems = document.querySelectorAll('.masonry-item');
    
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