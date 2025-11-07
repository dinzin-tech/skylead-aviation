@extends('admin.layout.app')

@section('title', 'Edit Course')
@section('header', 'Edit Course: ' . $course->title)

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Course Title *</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $course->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug *</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $course->slug) }}" required>
                        <small class="text-muted">URL-friendly version of the title</small>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Course Type *</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="regular_course" {{ $course->type === 'regular_course' ? 'selected' : '' }}>Regular Course</option>
                            <option value="cadet_program" {{ $course->type === 'cadet_program' ? 'selected' : '' }}>Cadet Program</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="hero_description" class="form-label">Hero Description *</label>
                        <textarea class="form-control" id="hero_description" name="hero_description" rows="4" required>{{ old('hero_description', $course->hero_description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="video_url" class="form-label">Video URL</label>
                        <input type="url" class="form-control" id="video_url" name="video_url" value="{{ old('video_url', $course->video_url) }}">
                    </div>

                    <!-- Hero Image Upload -->
                    <div class="mb-3">
                        <label for="hero_image" class="form-label">Hero Image</label>
                        <input type="file" class="form-control" id="hero_image" name="hero_image" accept="image/*">
                        @if($course->hero_image)
                            <div class="mt-2">
                                <img src="{{ asset($course->hero_image) }}" alt="Current hero image" style="max-width: 200px; max-height: 150px;" class="img-thumbnail">
                                <small class="d-block text-muted">Current image</small>
                            </div>
                        @endif
                        <small class="text-muted">Recommended size: 800x600px. Formats: JPG, PNG, WEBP</small>
                    </div>

                    <!-- Add the same dynamic form sections for requirements, selection process, training stages, and course outline as in create.blade.php -->
                    <!-- You'll need to populate these with existing data from $course -->

                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Course Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="fee" class="form-label">Course Fee ($)</label>
                                <input type="number" class="form-control" id="fee" name="fee" value="{{ old('fee', $course->fee) }}" step="0.01">
                            </div>

                            <div class="mb-3">
                                <label for="available_seats" class="form-label">Available Seats</label>
                                <input type="number" class="form-control" id="available_seats" name="available_seats" value="{{ old('available_seats', $course->available_seats) }}">
                            </div>

                            <div class="mb-3">
                                <label for="schedule" class="form-label">Schedule</label>
                                <input type="text" class="form-control" id="schedule" name="schedule" value="{{ old('schedule', $course->schedule) }}" placeholder="2.00 pm to 4.00 pm">
                            </div>

                            <div class="mb-3">
                                <label for="objectives" class="form-label">Objectives</label>
                                <textarea class="form-control" id="objectives" name="objectives" rows="4">{{ old('objectives', $course->objectives) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="eligibility" class="form-label">Eligibility</label>
                                <textarea class="form-control" id="eligibility" name="eligibility" rows="4">{{ old('eligibility', $course->eligibility) }}</textarea>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="published" name="published" value="1" {{ $course->published ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h6 class="mb-0">Course Information</h6>
                        </div>
                        <div class="card-body">
                            <p><strong>Created:</strong> {{ $course->created_at->format('M d, Y') }}</p>
                            <p><strong>Last Updated:</strong> {{ $course->updated_at->format('M d, Y') }}</p>
                            <p><strong>Slug:</strong> {{ $course->slug }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Course</button>
                <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const title = this.value;
        const slug = title.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '') // Remove invalid chars
            .replace(/\s+/g, '-')        // Replace spaces with -
            .replace(/-+/g, '-')         // Replace multiple - with single -
            .trim();
        
        document.getElementById('slug').value = slug;
    });
</script>
@endpush