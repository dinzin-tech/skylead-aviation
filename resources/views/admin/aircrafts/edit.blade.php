@extends('admin.layout.app')

@section('title', 'Edit Aircraft')
@section('header', 'Edit Aircraft')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.aircrafts.update', $aircraft) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Aircraft Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $aircraft->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" 
                               id="model" name="model" value="{{ old('model', $aircraft->model) }}">
                        @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="registration_number" class="form-label">Registration Number</label>
                        <input type="text" class="form-control @error('registration_number') is-invalid @enderror" 
                               id="registration_number" name="registration_number" 
                               value="{{ old('registration_number', $aircraft->registration_number) }}">
                        @error('registration_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="manufacturer" class="form-label">Manufacturer</label>
                        <input type="text" class="form-control @error('manufacturer') is-invalid @enderror" 
                               id="manufacturer" name="manufacturer" value="{{ old('manufacturer', $aircraft->manufacturer) }}">
                        @error('manufacturer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Passenger Capacity</label>
                        <input type="number" class="form-control @error('capacity') is-invalid @enderror" 
                               id="capacity" name="capacity" value="{{ old('capacity', $aircraft->capacity) }}" min="1">
                        @error('capacity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="range" class="form-label">Range (km)</label>
                        <input type="number" class="form-control @error('range') is-invalid @enderror" 
                               id="range" name="range" value="{{ old('range', $aircraft->range) }}" min="0">
                        @error('range')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="cruise_speed" class="form-label">Cruise Speed (km/h)</label>
                        <input type="number" class="form-control @error('cruise_speed') is-invalid @enderror" 
                               id="cruise_speed" name="cruise_speed" value="{{ old('cruise_speed', $aircraft->cruise_speed) }}" min="0">
                        @error('cruise_speed')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="year_manufactured" class="form-label">Year Manufactured</label>
                        <input type="number" class="form-control @error('year_manufactured') is-invalid @enderror" 
                               id="year_manufactured" name="year_manufactured" 
                               value="{{ old('year_manufactured', $aircraft->year_manufactured) }}" 
                               min="1900" max="{{ date('Y') + 1 }}">
                        @error('year_manufactured')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                               id="sort_order" name="sort_order" value="{{ old('sort_order', $aircraft->sort_order) }}">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="4">{{ old('description', $aircraft->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">Aircraft Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                       id="image" name="image" accept="image/*">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
                @if($aircraft->image)
                    <div class="mt-2">
                        <label class="form-label">Current Image:</label>
                        <div>
                            <img src="{{ Storage::url($aircraft->image) }}" alt="{{ $aircraft->name }}" 
                                 style="max-width: 200px; height: auto;" class="border rounded">
                        </div>
                    </div>
                @endif
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" 
                       {{ old('is_active', $aircraft->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active in fleet</label>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.aircrafts.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Aircraft</button>
            </div>
        </form>
    </div>
</div>
@endsection