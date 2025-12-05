@extends('admin.layout.app')

@section('title', 'Create DGCA Subject')
@section('header', 'Create New DGCA Subject')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.dgca-syllabus.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="subject_name" class="form-label">Subject Name *</label>
                        <input type="text" class="form-control @error('subject_name') is-invalid @enderror" 
                               id="subject_name" name="subject_name" value="{{ old('subject_name') }}" required>
                        @error('subject_name')
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

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon *</label>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                               id="icon" name="icon" value="{{ old('icon') }}" placeholder="fas fa-book" required>
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Font Awesome icon class (e.g., fas fa-book, fas fa-cloud)</div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="benefit" class="form-label">Benefit *</label>
                        <input type="text" class="form-control @error('benefit') is-invalid @enderror" 
                               id="benefit" name="benefit" value="{{ old('benefit') }}" required>
                        @error('benefit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Main benefit of learning this subject</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">Additional Detail</label>
                <textarea class="form-control @error('detail') is-invalid @enderror" 
                          id="detail" name="detail" rows="2">{{ old('detail') }}</textarea>
                @error('detail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Optional additional information about the subject</div>
            </div>

            <!-- Topics Section -->
            <div class="mb-4">
                <label class="form-label fw-bold">Topics</label>
                <div id="topics-container">
                    <div class="card mb-3 topic-card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Topic Title *</label>
                                    <input type="text" class="form-control" name="topic_titles[]" placeholder="Enter topic title" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Duration</label>
                                    <input type="text" class="form-control" name="topic_durations[]" placeholder="e.g., 2 weeks, 10 hours">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Status</label>
                                    <div class="form-check form-switch pt-2">
                                        <input class="form-check-input" type="checkbox" name="topic_is_active[]" value="1" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-11">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="topic_descriptions[]" placeholder="Topic description" rows="2"></textarea>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-outline-danger h-100 mt-4" onclick="removeTopic(this)">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addTopic()">
                    <i class="bi bi-plus-circle"></i> Add Topic
                </button>
                <div class="form-text">Add all topics covered in this subject</div>
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
                        <label class="form-check-label" for="is_active">Active Subject</label>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.dgca-syllabus.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Subject</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Auto-generate slug from subject name
    document.getElementById('subject_name').addEventListener('input', function() {
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

    function addTopic() {
        const container = document.getElementById('topics-container');
        const card = document.createElement('div');
        card.className = 'card mb-3 topic-card';
        card.innerHTML = `
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Topic Title *</label>
                        <input type="text" class="form-control" name="topic_titles[]" placeholder="Enter topic title" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Duration</label>
                        <input type="text" class="form-control" name="topic_durations[]" placeholder="e.g., 2 weeks, 10 hours">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Status</label>
                        <div class="form-check form-switch pt-2">
                            <input class="form-check-input" type="checkbox" name="topic_is_active[]" value="1" checked>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-11">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="topic_descriptions[]" placeholder="Topic description" rows="2"></textarea>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-outline-danger h-100 mt-4" onclick="removeTopic(this)">Remove</button>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(card);
    }

    function removeTopic(button) {
        button.closest('.topic-card').remove();
    }
</script>
@endpush
@endsection