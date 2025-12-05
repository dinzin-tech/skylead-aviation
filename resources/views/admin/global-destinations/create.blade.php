@extends('admin.layout.app')

@section('title', 'Create Global Destination')
@section('header', 'Create New Global Destination')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.global-destinations.store') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="form-text">URL-friendly identifier</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="introduction" class="form-label">Introduction *</label>
                <textarea class="form-control @error('introduction') is-invalid @enderror" 
                          id="introduction" name="introduction" rows="4" required>{{ old('introduction') }}</textarea>
                @error('introduction')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="regulatory_body" class="form-label">Regulatory Body *</label>
                        <input type="text" class="form-control @error('regulatory_body') is-invalid @enderror" 
                               id="regulatory_body" name="regulatory_body" value="{{ old('regulatory_body') }}" required>
                        @error('regulatory_body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="total_hours_required" class="form-label">Total Hours Required *</label>
                        <input type="number" class="form-control @error('total_hours_required') is-invalid @enderror" 
                               id="total_hours_required" name="total_hours_required" value="{{ old('total_hours_required') }}" min="0" required>
                        @error('total_hours_required')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Training Steps -->
            <div class="mb-3">
                <label class="form-label">Training Steps</label>
                <div id="training-steps-container">
                    <div class="border p-3 mb-3">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="step_titles[]" placeholder="Step Title (e.g., Student Pilot Certificate)" required>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="step_hours[]" placeholder="Hours" min="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-11">
                                <textarea class="form-control" name="step_descriptions[]" placeholder="Step description" rows="3" required></textarea>
                            </div>
                            <div class="col-1">
                                <button type="button" class="btn btn-outline-danger h-100" onclick="removeField(this)">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addTrainingStep()">Add Training Step</button>
            </div>

            <!-- Flying Hours Breakdown -->
            <div class="mb-3">
                <label class="form-label">Flying Hours Breakdown</label>
                <div id="hours-breakdown-container">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="breakdown_stages[]" placeholder="Stage (e.g., Private Pilot Licence)" required>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="breakdown_hours[]" placeholder="Hours (e.g., 40 hrs)" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="breakdown_notes[]" placeholder="Notes">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addHoursBreakdown()">Add Hours Breakdown</button>
            </div>

            <!-- Advantages -->
            <div class="mb-3">
                <label class="form-label">Advantages</label>
                <div id="advantages-container">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="advantages[]" placeholder="Enter advantage">
                        <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addAdvantage()">Add Advantage</button>
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
                <button type="button" class="btn btn-sm btn-secondary" onclick="addImageField()">Add Image</button>
                <div class="form-text">Upload destination images (JPEG, PNG, JPG, GIF, SVG, max 2MB each)</div>
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
                <a href="{{ route('admin.global-destinations.index') }}" class="btn btn-secondary">Cancel</a>
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

    function addTrainingStep() {
        const container = document.getElementById('training-steps-container');
        const div = document.createElement('div');
        div.className = 'border p-3 mb-3';
        div.innerHTML = `
            <div class="row mb-2">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="step_titles[]" placeholder="Step Title" required>
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" name="step_hours[]" placeholder="Hours" min="0">
                </div>
            </div>
            <div class="row">
                <div class="col-11">
                    <textarea class="form-control" name="step_descriptions[]" placeholder="Step description" rows="3" required></textarea>
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-outline-danger h-100" onclick="removeField(this)">Remove</button>
                </div>
            </div>
        `;
        container.appendChild(div);
    }

    function addHoursBreakdown() {
        const container = document.getElementById('hours-breakdown-container');
        const div = document.createElement('div');
        div.className = 'row mb-2';
        div.innerHTML = `
            <div class="col-md-4">
                <input type="text" class="form-control" name="breakdown_stages[]" placeholder="Stage" required>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="breakdown_hours[]" placeholder="Hours" required>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="breakdown_notes[]" placeholder="Notes">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
            </div>
        `;
        container.appendChild(div);
    }

    function addAdvantage() {
        const container = document.getElementById('advantages-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" class="form-control" name="advantages[]" placeholder="Enter advantage">
            <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
        `;
        container.appendChild(div);
    }

    function addImageField() {
        const container = document.getElementById('images-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="file" class="form-control" name="images[]" accept="image/*">
            <button type="button" class="btn btn-outline-danger" onclick="removeField(this)">Remove</button>
        `;
        container.appendChild(div);
    }

    function removeField(button) {
        button.closest('.input-group, .row, .border').remove();
    }
</script>
@endpush
@endsection