@extends('admin.layout.app')

@section('title', 'Create Page Section')
@section('header', 'Create New Page Section')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.page-builder.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="page_name" class="form-label">Page *</label>
                        <select class="form-select @error('page_name') is-invalid @enderror" 
                                id="page_name" name="page_name" required>
                            <option value="">Select Page</option>
                            @foreach($pages as $key => $value)
                                <option value="{{ $key }}" {{ old('page_name') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        @error('page_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="section_name" class="form-label">Section Name *</label>
                        <input type="text" class="form-control @error('section_name') is-invalid @enderror" 
                               id="section_name" name="section_name" value="{{ old('section_name') }}" required>
                        @error('section_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="section_header" class="form-label">Section Header</label>
                <input type="text" class="form-control @error('section_header') is-invalid @enderror" 
                       id="section_header" name="section_header" value="{{ old('section_header') }}">
                @error('section_header')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="section_description" class="form-label">Section Description</label>
                <textarea class="form-control @error('section_description') is-invalid @enderror" 
                          id="section_description" name="section_description" rows="3">{{ old('section_description') }}</textarea>
                @error('section_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="layout_type" class="form-label">Layout Type *</label>
                        <select class="form-select @error('layout_type') is-invalid @enderror" 
                                id="layout_type" name="layout_type" required>
                            @foreach($layoutTypes as $key => $value)
                                <option value="{{ $key }}" {{ old('layout_type', 'default') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        @error('layout_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="background_color" class="form-label">Background Color</label>
                        <input type="color" class="form-control form-control-color @error('background_color') is-invalid @enderror" 
                               id="background_color" name="background_color" value="{{ old('background_color') }}">
                        @error('background_color')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="text_color" class="form-label">Text Color</label>
                        <input type="color" class="form-control form-control-color @error('text_color') is-invalid @enderror" 
                               id="text_color" name="text_color" value="{{ old('text_color') }}">
                        @error('text_color')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
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
                        <label class="form-check-label" for="is_active">Active Section</label>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.page-builder.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Section</button>
            </div>
        </form>
    </div>
</div>
@endsection