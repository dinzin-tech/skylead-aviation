@extends('admin.layout.app')

@section('title', 'Edit Destination')
@section('header', 'Edit Destination: ' . $destination->country_name)

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.destinations.update', $destination) }}" method="POST" id="destinationForm">
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
                <label class="form-label">Images URLs</label>
                <div id="images-container">
                    @if($destination->images && count($destination->images) > 0)
                        @foreach($destination->images as $image)
                        <div class="input-group mb-2">
                            <input type="url" class="form-control" name="images[]" value="{{ $image }}" placeholder="https://example.com/image1.jpg">
                            <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                        </div>
                        @endforeach
                    @else
                        <div class="input-group mb-2">
                            <input type="url" class="form-control" name="images[]" placeholder="https://example.com/image1.jpg">
                            <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addField('images')">Add Image URL</button>
            </div>

            <!-- Guide Section -->
            <div class="mb-3">
                <label class="form-label">Guide Items</label>
                <div id="guide-container">
                    @if($destination->guide && count($destination->guide) > 0)
                        @foreach($destination->guide as $guideItem)
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
                <label class="form-label">Gallery URLs</label>
                <div id="gallery-container">
                    @if($destination->gallery && count($destination->gallery) > 0)
                        @foreach($destination->gallery as $galleryItem)
                        <div class="input-group mb-2">
                            <input type="url" class="form-control" name="gallery[]" value="{{ $galleryItem }}" placeholder="https://example.com/gallery1.jpg">
                            <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                        </div>
                        @endforeach
                    @else
                        <div class="input-group mb-2">
                            <input type="url" class="form-control" name="gallery[]" placeholder="https://example.com/gallery1.jpg">
                            <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addField('gallery')">Add Gallery URL</button>
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
                <div id="courses-container">
                    @if($destination->courses_offered && count($destination->courses_offered) > 0)
                        @foreach($destination->courses_offered as $course)
                        <div class="border p-3 mb-3">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="course_titles[]" value="{{ $course['title'] ?? '' }}" placeholder="Course Title" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="course_subtitles[]" value="{{ $course['subtitle'] ?? '' }}" placeholder="Subtitle">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="course_logos[]" value="{{ $course['logo'] ?? '' }}" placeholder="Logo URL">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="course_icons[]" value="{{ $course['icon'] ?? 'fas fa-plane' }}" placeholder="Icon class">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea class="form-control" name="course_descriptions[]" placeholder="Course description" rows="2" required>{{ $course['description'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="border p-3 mb-3">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="course_titles[]" placeholder="Course Title" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="course_subtitles[]" placeholder="Subtitle">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="course_logos[]" placeholder="Logo URL">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="course_icons[]" placeholder="Icon class" value="fas fa-plane">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea class="form-control" name="course_descriptions[]" placeholder="Course description" rows="2" required></textarea>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addCourseField()">Add Course</button>
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
        div.innerHTML = `
            <input type="${type === 'advantages' ? 'text' : 'url'}" class="form-control" name="${type}[]" placeholder="${type === 'advantages' ? 'Enter advantage' : 'https://example.com/image.jpg'}">
            <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
        `;
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
            <div class="row mb-2">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="course_titles[]" placeholder="Course Title" required>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="course_subtitles[]" placeholder="Subtitle">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="course_logos[]" placeholder="Logo URL">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="course_icons[]" placeholder="Icon class" value="fas fa-plane">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <textarea class="form-control" name="course_descriptions[]" placeholder="Course description" rows="2" required></textarea>
                </div>
            </div>
        `;
        container.appendChild(div);
    }

    function removeField(button) {
        button.closest('.input-group, .row, .border').remove();
    }

    // Preview images/gallery URLs
    document.addEventListener('DOMContentLoaded', function() {
        // Add preview functionality for image URLs
        const imageInputs = document.querySelectorAll('input[name="images[]"], input[name="gallery[]"]');
        imageInputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value) {
                    // You can add image preview functionality here if needed
                    console.log('Image URL entered:', this.value);
                }
            });
        });
    });
</script>
@endpush
@endsection