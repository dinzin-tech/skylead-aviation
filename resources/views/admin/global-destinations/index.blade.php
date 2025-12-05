@extends('admin.layout.app')

@section('title', 'Global Destinations')
@section('header', 'Global Destinations Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Global Destinations</h5>
        <a href="{{ route('admin.global-destinations.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Destination
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Title</th>
                        <th>Regulatory Body</th>
                        <th>Total Hours</th>
                        <th>Training Steps</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($destinations as $destination)
                    <tr>
                        <td>
                            <strong>{{ $destination->country_name }}</strong>
                            <br><small class="text-muted">{{ $destination->slug }}</small>
                        </td>
                        <td>{{ Str::limit($destination->title, 30) }}</td>
                        <td>{{ $destination->regulatory_body }}</td>
                        <td>
                            <span class="badge bg-info">{{ $destination->total_hours_required }} hours</span>
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ count($destination->training_steps ?? []) }} steps</span>
                        </td>
                        <td>
                            <span class="badge {{ $destination->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $destination->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('global.destination', $destination->slug) }}" 
                                   class="btn btn-sm btn-info" target="_blank" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.global-destinations.edit', $destination) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.global-destinations.destroy', $destination) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this destination?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No global destinations found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $destinations->links() }}
        </div>
    </div>
</div>
@endsection