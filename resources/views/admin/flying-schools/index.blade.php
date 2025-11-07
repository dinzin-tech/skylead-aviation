@extends('admin.layout.app')

@section('title', 'Manage Flying Schools')
@section('header', 'Flying Schools Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Flying Schools</h5>
        <a href="{{ route('admin.flying-schools.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New School
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Country</th>
                        <th>Course Duration</th>
                        <th>Fleet Size</th>
                        <th>Flying Hours</th>
                        <th>Aircraft Types</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($flyingSchools as $school)
                    <tr>
                        <td>
                            <strong>{{ $school->name }}</strong>
                            @if($school->description)
                                <br><small class="text-muted">{{ Str::limit($school->description, 50) }}</small>
                            @endif
                        </td>
                        <td>{{ Str::limit($school->location, 30) }}</td>
                        <td>
                            @if($school->country)
                                <div class="d-flex align-items-center">
                                    @if($school->country->flag_image)
                                        <img src="{{ Storage::url($school->country->flag_image) }}" 
                                             alt="{{ $school->country->name }}" 
                                             style="width: 20px; height: 15px; object-fit: cover;" 
                                             class="me-2 border">
                                    @endif
                                    {{ $school->country->name }}
                                </div>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $school->course_duration }}</td>
                        <td>
                            @if($school->fleet_size)
                                <span class="badge bg-info">{{ $school->fleet_size }} aircraft</span>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if($school->flying_hours)
                                <span class="badge bg-primary">{{ $school->flying_hours }} hours</span>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if($school->aircrafts->count() > 0)
                                <div>
                                    @foreach($school->aircrafts->take(2) as $aircraft)
                                        <span class="badge bg-secondary mb-1">{{ $aircraft->name }}</span>
                                    @endforeach
                                    @if($school->aircrafts->count() > 2)
                                        <span class="badge bg-light text-dark">+{{ $school->aircrafts->count() - 2 }} more</span>
                                    @endif
                                </div>
                            @else
                                <span class="text-muted">No aircraft</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $school->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $school->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.flying-schools.edit', $school) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.flying-schools.destroy', $school) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this flying school?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">No flying schools found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $flyingSchools->links() }}
        </div>
    </div>
</div>
@endsection