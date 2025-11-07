@extends('admin.layout.app')

@section('title', 'Edit Country')
@section('header', 'Edit Country')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.countries.update', $country) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Country Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $country->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="flag_image" class="form-label">Flag Image</label>
                        <input type="file" class="form-control @error('flag_image') is-invalid @enderror" 
                               id="flag_image" name="flag_image" accept="image/*">
                        @error('flag_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        @if($country->flag_image)
                            <div class="mt-2">
                                <label class="form-label">Current Flag:</label>
                                <div>
                                    <img src="{{ Storage::url($country->flag_image) }}" alt="{{ $country->name }}" 
                                         style="width: 60px; height: 40px; object-fit: cover;" class="border rounded">
                                </div>
                            </div>
                        @endif
                        <div class="form-text">Recommended size: 4:3 ratio (e.g., 80x60px)</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="number" step="any" class="form-control @error('latitude') is-invalid @enderror" 
                               id="latitude" name="latitude" value="{{ old('latitude', $country->latitude) }}" 
                               min="-90" max="90" required>
                        @error('latitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="number" step="any" class="form-control @error('longitude') is-invalid @enderror" 
                               id="longitude" name="longitude" value="{{ old('longitude', $country->longitude) }}" 
                               min="-180" max="180" required>
                        @error('longitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" 
                       {{ old('is_active', $country->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Country</button>
            </div>
        </form>
    </div>
</div>
@endsection