@extends('admin.layout.app')

@section('title', 'Edit Destination')
@section('header', 'Edit Destination: ' . $destination->country_name)

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.destinations.update', $destination) }}" method="POST" id="destinationForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="country_name" class="form-label">Country Name *</label>
                        <input type="text" class="form-control @error('country_name') is-invalid @enderror" 
                               id="country_name" name="country_name" value="{{ old('country_name', $destination->country_name) }}" required>
                        @error('country_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug *</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                               id="slug" name="slug" value="{{ old('slug', $destination->slug) }}" required>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">URL-friendly identifier (e.g., usa, canada, australia)</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="country_title" class="form-label">Country Title *</label>
                <input type="text" class="form-control @error('country_title') is-invalid @enderror" 
                       id="country_title" name="country_title" value="{{ old('country_title', $destination->country_title) }}" required>
                @error('country_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="country_description" class="form-label">Country Description *</label>
                <textarea class="form-control @error('country_description') is-invalid @enderror" 
                          id="country_description" name="country_description" rows="3" required>{{ old('country_description', $destination->country_description) }}</textarea>
                @error('country_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="no_of_schools" class="form-label">Number of Schools *</label>
                        <input type="number" class="form-control @error('no_of_schools') is-invalid @enderror" 
                               id="no_of_schools" name="no_of_schools" value="{{ old('no_of_schools', $destination->no_of_schools) }}" min="0" required>
                        @error('no_of_schools')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="location" class="form-label">Location *</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" 
                               id="location" name="location" value="{{ old('location', $destination->location) }}" 
                               placeholder="e.g., Florida, Texas, California" required>
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Flying Schools Selection -->
            <div class="mb-3">
                <label class="form-label">Select Flying Schools</label>
                <div class="border rounded p-3">
                    @foreach($flyingSchools as $school)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="flying_schools[]" 
                               value="{{ $school->id }}" id="school_{{ $school->id }}"
                               {{ in_array($school->id, old('flying_schools', $destination->flyingSchoolIds)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="school_{{ $school->id }}">
                            <strong>{{ $school->name }}</strong> 
                            <small class="text-muted">- {{ $school->course_duration }} - {{ $school->fleet_size }} aircraft</small>
                            @if($school->country)
                                <span class="badge bg-secondary ms-2">{{ $school->country->name }}</span>
                            @endif
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Images -->
            <div class="mb-3">
                <label class="form-label">Images</label>
                
                <!-- Display existing images -->
                @if($destination->images && count($destination->images) > 0)
                <div class="mb-3">
                    <label class="form-label">Current Images:</label>
                    <div class="row">
                        @foreach($destination->images as $index => $image)
                        <div class="col-md-3 mb-2">
                            <div class="card">
                                <img src="{{ Storage::url($image) }}" class="card-img-top" alt="Destination Image" style="height: 100px; object-fit: cover;">
                                <div class="card-body p-2 text-center">
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeExistingImage('images', {{ $index }})">
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <div id="images-container">
                    <div class="input-group mb-2">
                        <input type="file" class="form-control" name="images[]" accept="image/*">
                        <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addField('images')">Add Image</button>
                <div class="form-text">Upload destination images (JPEG, PNG, JPG, GIF, SVG, max 2MB each)</div>
            </div>

            <!-- Guide Section -->
            <div class="mb-3">
                <label class="form-label">Guide Items</label>
                <div id="guide-container">
                    @if($destination->guide && count($destination->guide) > 0)
                        @foreach($destination->guide as $index => $guideItem)
                        <div class="row mb-2">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="guide_titles[]" value="{{ $guideItem['title'] ?? '' }}" placeholder="Title (e.g., Flight Training)">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="guide_values[]" value="{{ $guideItem['value'] ?? '' }}" placeholder="Description">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="row mb-2">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="guide_titles[]" placeholder="Title (e.g., Flight Training)">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="guide_values[]" placeholder="Description">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                            </div>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addGuideField()">Add Guide Item</button>
            </div>

            <!-- Gallery -->
            <div class="mb-3">
                <label class="form-label">Gallery Images</label>
                
                <!-- Display existing gallery images -->
                @if($destination->gallery && count($destination->gallery) > 0)
                <div class="mb-3">
                    <label class="form-label">Current Gallery Images:</label>
                    <div class="row">
                        @foreach($destination->gallery as $index => $galleryImage)
                        <div class="col-md-3 mb-2">
                            <div class="card">
                                <img src="{{ Storage::url($galleryImage) }}" class="card-img-top" alt="Gallery Image" style="height: 100px; object-fit: cover;">
                                <div class="card-body p-2 text-center">
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeExistingImage('gallery', {{ $index }})">
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <div id="gallery-container">
                    <div class="input-group mb-2">
                        <input type="file" class="form-control" name="gallery[]" accept="image/*">
                        <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addField('gallery')">Add Gallery Image</button>
                <div class="form-text">Upload gallery images (JPEG, PNG, JPG, GIF, SVG, max 2MB each)</div>
            </div>

            <!-- Advantages -->
            <div class="mb-3">
                <label class="form-label">Advantages</label>
                <div id="advantages-container">
                    @if($destination->advantages && count($destination->advantages) > 0)
                        @foreach($destination->advantages as $advantage)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="advantages[]" value="{{ $advantage }}" placeholder="Globally recognized FAA license">
                            <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                        </div>
                        @endforeach
                    @else
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="advantages[]" placeholder="Globally recognized FAA license">
                            <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addField('advantages')">Add Advantage</button>
            </div>

            <!-- Courses Offered -->
            <div class="mb-3">
                <label class="form-label">Courses Offered</label>
                
                <!-- Display existing course logos -->
                @if($destination->courses_offered && count($destination->courses_offered) > 0)
                <div class="mb-3">
                    <label class="form-label">Current Course Logos:</label>
                    <div class="row">
                        @foreach($destination->courses_offered as $index => $course)
                        @if(!empty($course['logo']))
                        <div class="col-md-3 mb-2">
                            <div class="card">
                                <img src="{{ Storage::url($course['logo']) }}" class="card-img-top" alt="Course Logo" style="height: 80px; object-fit: contain;">
                                <div class="card-body p-2 text-center">
                                    <small class="text-muted">{{ $course['title'] ?? 'Course Logo' }}</small>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif
                
                <div id="courses-container">
                    @if($destination->courses_offered && count($destination->courses_offered) > 0)
                        @foreach($destination->courses_offered as $index => $course)
                        <div class="border p-3 mb-3">
                            <input type="hidden" name="course_logo_indexes[]" value="{{ $index }}">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="course_titles[]" value="{{ $course['title'] ?? '' }}" placeholder="Course Title" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="course_subtitles[]" value="{{ $course['subtitle'] ?? '' }}" placeholder="Subtitle">
                                </div>
                                <div class="col-md-3">
                                    <input type="file" class="form-control" name="course_logos[]" accept="image/*">
                                    @if(!empty($course['logo']))
                                    <div class="form-text">Current: {{ basename($course['logo']) }}</div>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="course_icons[]" value="{{ $course['icon'] ?? 'fas fa-plane' }}" placeholder="Icon class">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-11">
                                    <textarea class="form-control" name="course_descriptions[]" placeholder="Course description" rows="2" required>{{ $course['description'] ?? '' }}</textarea>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-outline-danger h-100" onclick="removeField(this)">Remove</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="border p-3 mb-3">
                            <input type="hidden" name="course_logo_indexes[]" value="0">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="course_titles[]" placeholder="Course Title" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="course_subtitles[]" placeholder="Subtitle">
                                </div>
                                <div class="col-md-3">
                                    <input type="file" class="form-control" name="course_logos[]" accept="image/*">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="course_icons[]" placeholder="Icon class" value="fas fa-plane">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-11">
                                    <textarea class="form-control" name="course_descriptions[]" placeholder="Course description" rows="2" required></textarea>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-outline-danger h-100" onclick="removeField(this)">Remove</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addCourseField()">Add Course</button>
                <div class="form-text">Upload course logos (JPEG, PNG, JPG, GIF, SVG, max 1MB each)</div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                               id="sort_order" name="sort_order" value="{{ old('sort_order', $destination->sort_order) }}">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-check pt-4">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" 
                               {{ old('is_active', $destination->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active Destination</label>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Destinations
                </a>
                <div>
                    <a href="{{ route('destination.country', $destination->slug) }}" 
                       class="btn btn-info" target="_blank">
                        <i class="bi bi-eye"></i> View Page
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Update Destination
                    </button>
                </div>
            </div>
        </form>

        @if($destination->flyingSchools->count() > 0)
        <hr>
        <div class="mt-4">
            <h6>Current Flying Schools ({{ $destination->flyingSchools->count() }})</h6>
            <div class="row">
                @foreach($destination->flyingSchools as $school)
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $school->name }}</strong>
                                    <br>
                                    <small class="text-muted">
                                        {{ $school->course_duration }} | 
                                        {{ $school->fleet_size }} aircraft | 
                                        {{ $school->flying_hours }} hours
                                    </small>
                                </div>
                                @if($school->country)
                                    <span class="badge bg-primary">{{ $school->country->name }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    let courseCounter = {{ $destination->courses_offered ? count($destination->courses_offered) : 1 }};

    // Auto-generate slug from country name (only if empty)
    document.getElementById('country_name').addEventListener('input', function() {
        const nameInput = this;
        const slugInput = document.getElementById('slug');
        
        // Only auto-generate if slug is empty
        if (!slugInput.value.trim()) {
            const slug = nameInput.value
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            
            slugInput.value = slug;
        }
    });

    function addField(type) {
        const container = document.getElementById(`${type}-container`);
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        // div.innerHTML = `
        //     <input type="file" class="form-control" name="${type}[]" accept="image/*">
        //     <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
        // `;

        if (type === 'advantages') {
            div.innerHTML = `
                <input type="text" class="form-control" name="advantages[]" placeholder="Globally recognized FAA license">
                <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
            `;
        } else {
            div.innerHTML = `
                <input type="file" class="form-control" name="${type}[]" accept="image/*">
                <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
            `;
        }

        container.appendChild(div);
    }

    function addGuideField() {
        const container = document.getElementById('guide-container');
        const div = document.createElement('div');
        div.className = 'row mb-2';
        div.innerHTML = `
            <div class="col-md-5">
                <input type="text" class="form-control" name="guide_titles[]" placeholder="Title">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="guide_values[]" placeholder="Description">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
            </div>
        `;
        container.appendChild(div);
    }

    function addCourseField() {
        const container = document.getElementById('courses-container');
        const div = document.createElement('div');
        div.className = 'border p-3 mb-3';
        div.innerHTML = `
            <input type="hidden" name="course_logo_indexes[]" value="${courseCounter}">
            <div class="row mb-2">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="course_titles[]" placeholder="Course Title" required>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="course_subtitles[]" placeholder="Subtitle">
                </div>
                <div class="col-md-3">
                    <input type="file" class="form-control" name="course_logos[]" accept="image/*">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="course_icons[]" placeholder="Icon class" value="fas fa-plane">
                </div>
            </div>
            <div class="row">
                <div class="col-11">
                    <textarea class="form-control" name="course_descriptions[]" placeholder="Course description" rows="2" required></textarea>
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-outline-danger h-100" onclick="removeField(this)">Remove</button>
                </div>
            </div>
        `;
        container.appendChild(div);
        courseCounter++;
    }

    function removeField(button) {
        button.closest('.input-group, .row, .border').remove();
    }

    function removeExistingImage(type, index) {
        if (confirm('Are you sure you want to remove this image?')) {
            // Create hidden input to mark image for removal
            const container = document.getElementById(`${type}-container`);
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = `remove_${type}[]`;
            hiddenInput.value = index;
            container.appendChild(hiddenInput);
            
            // Hide the image card
            const imageCard = event.target.closest('.col-md-3');
            if (imageCard) {
                imageCard.style.display = 'none';
            }
        }
    }

    // Image preview functionality for new uploads
    document.addEventListener('DOMContentLoaded', function() {
        const fileInputs = document.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            input.addEventListener('change', function() {
                const container = this.closest('.input-group, .border');
                if (container) {
                    // Remove existing preview
                    const existingPreview = container.querySelector('.image-preview');
                    if (existingPreview) {
                        existingPreview.remove();
                    }
                    
                    // Add new preview
                    if (this.files[0]) {
                        const preview = document.createElement('img');
                        preview.className = 'image-preview mt-2';
                        preview.style.maxWidth = '100px';
                        preview.style.maxHeight = '100px';
                        preview.style.objectFit = 'cover';
                        preview.style.borderRadius = '4px';
                        preview.style.display = 'block';
                        
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                        }
                        reader.readAsDataURL(this.files[0]);
                        
                        container.appendChild(preview);
                    }
                }
            });
        });
    });
</script>
@endpush

<style>
.image-preview {
    max-width: 100px;
    max-height: 100px;
    object-fit: cover;
    border-radius: 4px;
    border: 1px solid #dee2e6;
}
</style>
@endsection