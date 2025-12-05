@extends('admin.layout.app')

@section('title', 'DGCA Syllabus')
@section('header', 'DGCA Syllabus Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">DGCA Subjects</h5>
        <a href="{{ route('admin.dgca-syllabus.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Subject
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Icon</th>
                        <th>Description</th>
                        <th>Topics</th>
                        <th>Status</th>
                        <th>Sort Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($syllabus as $subject)
                    <tr>
                        <td>
                            <strong>{{ $subject->subject_name }}</strong>
                            <br><small class="text-muted">{{ $subject->slug }}</small>
                        </td>
                        <td>
                            <i class="{{ $subject->icon }} fa-lg text-primary"></i>
                        </td>
                        <td>{{ Str::limit($subject->description, 50) }}</td>
                        <td>
                            <span class="badge bg-info">{{ $subject->active_topics_count }}/{{ $subject->total_topics }}</span>
                        </td>
                        <td>
                            <span class="badge {{ $subject->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $subject->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $subject->sort_order }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.dgca-syllabus.edit', $subject) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.dgca-syllabus.destroy', $subject) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this subject?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No DGCA subjects found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $syllabus->links() }}
        </div>
    </div>
</div>
@endsection