@extends('admin.layout.app')

@section('title', 'Create Page')
@section('header', 'Create New Page')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.pages.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Page Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" 
                               placeholder="e.g., About Us, Services, Contact" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">The display name of the page</div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="slug" class="form-label">Page Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                               id="slug" name="slug" value="{{ old('slug') }}" 
                               placeholder="e.g., about-us, services">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">URL-friendly version of the name. Leave empty to auto-generate.</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Page Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title') }}" 
                       placeholder="e.g., About Our Company - SkyLead Aviation">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">This will appear in the browser tab. Recommended: 50-60 characters.</div>
            </div>

            <div class="mb-3">
                <label for="meta_description" class="form-label">Meta Description</label>
                <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                          id="meta_description" name="meta_description" rows="3"
                          placeholder="Brief description of the page for search engines">{{ old('meta_description') }}</textarea>
                @error('meta_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Brief description for search engines. Recommended: 150-160 characters.</div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="menu_order" class="form-label">Menu Order</label>
                        <input type="number" class="form-control @error('menu_order') is-invalid @enderror" 
                               id="menu_order" name="menu_order" value="{{ old('menu_order', 0) }}" min="0">
                        @error('menu_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Lower numbers appear first in menu</div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3 form-check pt-4">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" 
                               {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active Page</label>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3 form-check pt-4">
                        <input type="checkbox" class="form-check-input" id="show_in_menu" name="show_in_menu" value="1" 
                               {{ old('show_in_menu', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="show_in_menu">Show in Navigation Menu</label>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Pages
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Create Page
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const nameInput = this;
        const slugInput = document.getElementById('slug');
        
        // Only auto-generate if slug is empty or matches the previous auto-generation
        if (!slugInput.value || slugInput.dataset.autoGenerated === 'true') {
            const slug = nameInput.value
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            
            slugInput.value = slug;
            slugInput.dataset.autoGenerated = 'true';
        }
    });

    // Remove auto-generated flag when user manually edits slug
    document.getElementById('slug').addEventListener('input', function() {
        this.dataset.autoGenerated = 'false';
    });

    // Character counters
    document.getElementById('title').addEventListener('input', function() {
        const counter = this.nextElementSibling?.querySelector('.char-counter') || 
                       this.parentElement.querySelector('.char-counter');
        if (counter) {
            counter.textContent = `${this.value.length} characters`;
            counter.className = `char-counter small ${this.value.length > 60 ? 'text-danger' : 'text-success'}`;
        }
    });

    document.getElementById('meta_description').addEventListener('input', function() {
        const counter = this.nextElementSibling?.querySelector('.char-counter') || 
                       this.parentElement.querySelector('.char-counter');
        if (counter) {
            counter.textContent = `${this.value.length} characters`;
            counter.className = `char-counter small ${this.value.length > 160 ? 'text-danger' : 'text-success'}`;
        }
    });

    // Initialize counters on page load
    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.getElementById('title');
        const metaInput = document.getElementById('meta_description');
        
        // Add counter elements
        const titleCounter = document.createElement('div');
        titleCounter.className = 'char-counter small';
        titleCounter.textContent = `${titleInput.value.length} characters`;
        titleInput.parentElement.appendChild(titleCounter);

        const metaCounter = document.createElement('div');
        metaCounter.className = 'char-counter small';
        metaCounter.textContent = `${metaInput.value.length} characters`;
        metaInput.parentElement.appendChild(metaCounter);
    });
</script>
@endpush
@endsection