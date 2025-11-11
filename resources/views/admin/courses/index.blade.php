@extends('admin.layout.app')

@section('title', 'Manage Courses')
@section('header', 'Course Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Courses</h5>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Create New Course
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Fee</th>
                        <th>Seats</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                    <tr>
                        <td>
                            <a href="{{ route('course.details', $course->slug) }}" target="_blank" rel="noopener noreferrer">
                                {{ $course->title }}
                            </a>
                        </td>
                        <td>
                            <span class="badge {{ $course->type === 'cadet_program' ? 'bg-info' : 'bg-secondary' }}">
                                {{ ucfirst(str_replace('_', ' ', $course->type)) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $course->published ? 'bg-success' : 'bg-secondary' }}">
                                {{ $course->published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>${{ number_format($course->fee) }}</td>
                        <td>{{ $course->available_seats }}</td>
                        <td>{{ $course->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this course?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No courses found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $courses->links() }}
        </div>
    </div>
</div>
@endsection