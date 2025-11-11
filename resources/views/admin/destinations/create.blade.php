@extends('admin.layout.app')

@section('title', 'Create Destination')
@section('header', 'Create New Destination')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.destinations.store') }}" method="POST" id="destinationForm" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="country_name" class="form-label">Country Name *</label>
                        <input type="text" class="form-control @error('country_name') is-invalid @enderror" 
                               id="country_name" name="country_name" value="{{ old('country_name') }}" required>
                        @error('country_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug *</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                               id="slug" name="slug" value="{{ old('slug') }}" required>
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
                       id="country_title" name="country_title" value="{{ old('country_title') }}" required>
                @error('country_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="country_description" class="form-label">Country Description *</label>
                <textarea class="form-control @error('country_description') is-invalid @enderror" 
                          id="country_description" name="country_description" rows="3" required>{{ old('country_description') }}</textarea>
                @error('country_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="no_of_schools" class="form-label">Number of Schools *</label>
                        <input type="number" class="form-control @error('no_of_schools') is-invalid @enderror" 
                               id="no_of_schools" name="no_of_schools" value="{{ old('no_of_schools', 0) }}" min="0" required>
                        @error('no_of_schools')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="location" class="form-label">Location *</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" 
                               id="location" name="location" value="{{ old('location') }}" 
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
                               {{ in_array($school->id, old('flying_schools', [])) ? 'checked' : '' }}>
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
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addGuideField()">Add Guide Item</button>
            </div>

            <!-- Gallery -->
            <div class="mb-3">
                <label class="form-label">Gallery Images</label>
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
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="advantages[]" placeholder="Globally recognized FAA license">
                        <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addField('advantages')">Add Advantage</button>
            </div>

            <!-- Courses Offered -->
            <div class="mb-3">
                <label class="form-label">Courses Offered</label>
                <div id="courses-container">
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
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addCourseField()">Add Course</button>
                <div class="form-text">Upload course logos (JPEG, PNG, JPG, GIF, SVG, max 1MB each)</div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                               id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-check pt-4">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" 
                               {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active Destination</label>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Destination</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Auto-generate slug from country name
    document.getElementById('country_name').addEventListener('input', function() {
        const nameInput = this;
        const slugInput = document.getElementById('slug');
        
        if (!slugInput.value) {
            const slug = nameInput.value
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            
            slugInput.value = slug;
        }
    });

    let courseCounter = 1;

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
                <input type="text" class="form-control" name="advantages[]" placeholder="Advantage">
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

    // Image preview functionality
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }

    // Add preview for all file inputs
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