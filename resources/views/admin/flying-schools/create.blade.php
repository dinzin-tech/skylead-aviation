@extends('admin.layout.app')

@section('title', 'Add Flying School')
@section('header', 'Add New Flying School')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.flying-schools.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">School Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="country_id" class="form-label">Country *</label>
                        <select class="form-select @error('country_id') is-invalid @enderror" 
                                id="country_id" name="country_id" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" 
                                    {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location *</label>
                <textarea class="form-control @error('location') is-invalid @enderror" 
                          id="location" name="location" rows="2" required>{{ old('location') }}</textarea>
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="course_duration" class="form-label">Course Duration *</label>
                        <input type="text" class="form-control @error('course_duration') is-invalid @enderror" 
                               id="course_duration" name="course_duration" value="{{ old('course_duration') }}" 
                               placeholder="e.g., 6 months, 1 year" required>
                        @error('course_duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="fleet_size" class="form-label">Fleet Size</label>
                        <input type="number" class="form-control @error('fleet_size') is-invalid @enderror" 
                               id="fleet_size" name="fleet_size" value="{{ old('fleet_size') }}" min="0">
                        @error('fleet_size')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="flying_hours" class="form-label">Flying Hours</label>
                        <input type="number" class="form-control @error('flying_hours') is-invalid @enderror" 
                               id="flying_hours" name="flying_hours" value="{{ old('flying_hours') }}" min="0">
                        @error('flying_hours')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="aircrafts" class="form-label">Type of Fleet</label>
                <select class="form-select @error('aircrafts') is-invalid @enderror" 
                        id="aircrafts" name="aircrafts[]" multiple size="5">
                    @foreach($aircrafts as $aircraft)
                        <option value="{{ $aircraft->id }}"
                            {{ in_array($aircraft->id, old('aircrafts', [])) ? 'selected' : '' }}>
                            {{ $aircraft->name }} 
                            {{-- ({{ $aircraft->model }}) --}}
                        </option>
                    @endforeach
                </select>
                @error('aircrafts')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Hold Ctrl/Cmd to select multiple aircraft types</div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.flying-schools.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Add Flying School</button>
            </div>
        </form>
    </div>
</div>
@endsection