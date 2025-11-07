@extends('admin.layout.app')

@section('title', 'Edit Page')
@section('header', 'Edit Page: ' . $page->name)

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.pages.update', $page) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Page Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $page->name) }}" 
                               placeholder="e.g., About Us, Services, Contact" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">The display name of the page</div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="slug" class="form-label">Page Slug *</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                               id="slug" name="slug" value="{{ old('slug', $page->slug) }}" 
                               placeholder="e.g., about-us, services" required>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">URL-friendly version of the name. Changing this may break existing links.</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Page Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $page->title) }}" 
                       placeholder="e.g., About Our Company - SkyLead Aviation">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">This will appear in the browser tab. Recommended: 50-60 characters.</div>
                <div class="char-counter small {{ strlen(old('title', $page->title)) > 60 ? 'text-danger' : 'text-success' }}">
                    {{ strlen(old('title', $page->title)) }} characters
                </div>
            </div>

            <div class="mb-3">
                <label for="meta_description" class="form-label">Meta Description</label>
                <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                          id="meta_description" name="meta_description" rows="3"
                          placeholder="Brief description of the page for search engines">{{ old('meta_description', $page->meta_description) }}</textarea>
                @error('meta_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Brief description for search engines. Recommended: 150-160 characters.</div>
                <div class="char-counter small {{ strlen(old('meta_description', $page->meta_description)) > 160 ? 'text-danger' : 'text-success' }}">
                    {{ strlen(old('meta_description', $page->meta_description)) }} characters
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="menu_order" class="form-label">Menu Order</label>
                        <input type="number" class="form-control @error('menu_order') is-invalid @enderror" 
                               id="menu_order" name="menu_order" value="{{ old('menu_order', $page->menu_order) }}" min="0">
                        @error('menu_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Lower numbers appear first in menu</div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3 form-check pt-4">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" 
                               {{ old('is_active', $page->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active Page</label>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3 form-check pt-4">
                        <input type="checkbox" class="form-check-input" id="show_in_menu" name="show_in_menu" value="1" 
                               {{ old('show_in_menu', $page->show_in_menu) ? 'checked' : '' }}>
                        <label class="form-check-label" for="show_in_menu">Show in Navigation Menu</label>
                    </div>
                </div>
            </div>

            @if($page->sections()->count() > 0)
            <div class="alert alert-info">
                <div class="d-flex align-items-center">
                    <i class="bi bi-info-circle me-2"></i>
                    <div>
                        <strong>This page has {{ $page->sections()->count() }} section(s)</strong>
                        <div class="small">You can manage the page sections in the <a href="{{ route('admin.page-builder.index') }}?page={{ $page->slug }}" class="alert-link">Page Builder</a>.</div>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Pages
                    </a>
                    <a href="{{ route('admin.page-builder.index') }}?page={{ $page->slug }}" class="btn btn-info">
                        <i class="bi bi-layers"></i> Build Sections
                    </a>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Update Page
                    </button>
                </div>
            </div>
        </form>

        @if($page->sections()->count() === 0)
        <hr>
        <div class="mt-4">
            <h6>Quick Actions</h6>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.page-builder.create') }}?page={{ $page->slug }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> Add First Section
                </a>
                <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Are you sure you want to delete this page? This action cannot be undone.')">
                        <i class="bi bi-trash"></i> Delete Page
                    </button>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    // Character counters for edit form
    document.getElementById('title').addEventListener('input', function() {
        const counter = this.parentElement.querySelector('.char-counter');
        if (counter) {
            counter.textContent = `${this.value.length} characters`;
            counter.className = `char-counter small ${this.value.length > 60 ? 'text-danger' : 'text-success'}`;
        }
    });

    document.getElementById('meta_description').addEventListener('input', function() {
        const counter = this.parentElement.querySelector('.char-counter');
        if (counter) {
            counter.textContent = `${this.value.length} characters`;
            counter.className = `char-counter small ${this.value.length > 160 ? 'text-danger' : 'text-success'}`;
        }
    });
</script>
@endpush
@endsection