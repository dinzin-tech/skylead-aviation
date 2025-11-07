@extends('admin.layout.app')

@section('title', 'Manage Countries')
@section('header', 'Countries Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Countries</h5>
        <a href="{{ route('admin.countries.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Country
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Flag</th>
                        <th>Name</th>
                        <th>Coordinates</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($countries as $country)
                    <tr>
                        <td>
                            @if($country->flag_image)
                                <img src="{{ Storage::url($country->flag_image) }}" alt="{{ $country->name }}" 
                                     style="width: 40px; height: 25px; object-fit: cover;" class="border">
                            @else
                                <span class="text-muted">No flag</span>
                            @endif
                        </td>
                        <td>{{ $country->name }}</td>
                        <td>
                            <small>Lat: {{ $country->latitude }}</small><br>
                            <small>Lng: {{ $country->longitude }}</small>
                        </td>
                        <td>
                            <span class="badge {{ $country->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $country->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $country->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.countries.edit', $country) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.countries.destroy', $country) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this country?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No countries found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $countries->links() }}
        </div>
    </div>
</div>
@endsection