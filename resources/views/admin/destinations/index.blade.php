@extends('admin.layout.app')

@section('title', 'Manage Destinations')
@section('header', 'Destinations Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Destinations</h5>
        <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Destination
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Slug</th>
                        <th>Title</th>
                        <th>Schools</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($destinations as $destination)
                    <tr>
                        <td>
                            <strong>{{ $destination->country_name }}</strong>
                            @if($destination->country_description)
                                <br><small class="text-muted">{{ Str::limit($destination->country_description, 50) }}</small>
                            @endif
                        </td>
                        <td><code>{{ $destination->slug }}</code></td>
                        <td>{{ Str::limit($destination->country_title, 30) }}</td>
                        <td>
                            <span class="badge bg-info">{{ $destination->flying_schools_count ?? 0 }} schools</span>
                        </td>
                        <td>{{ Str::limit($destination->location, 20) }}</td>
                        <td>
                            <span class="badge {{ $destination->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $destination->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('destination.country', $destination->slug) }}" 
                                   class="btn btn-sm btn-info" target="_blank" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.destinations.edit', $destination) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.destinations.destroy', $destination) }}" method="POST" class="d-inline">
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
                        <td colspan="7" class="text-center">No destinations found.</td>
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