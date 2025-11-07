@extends('admin.layout.app')

@section('title', 'Manage Fleet')
@section('header', 'Aircraft Fleet Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Aircraft Fleet</h5>
        <a href="{{ route('admin.aircrafts.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Aircraft
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Model</th>
                        <th>Registration</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aircrafts as $aircraft)
                    <tr>
                        <td>
                            @if($aircraft->image)
                                <img src="{{ Storage::url($aircraft->image) }}" alt="{{ $aircraft->name }}" 
                                     style="width: 60px; height: 40px; object-fit: cover;" class="border rounded">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                     style="width: 60px; height: 40px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $aircraft->name }}</strong>
                            @if($aircraft->manufacturer)
                                <br><small class="text-muted">{{ $aircraft->manufacturer }}</small>
                            @endif
                        </td>
                        <td>{{ $aircraft->model ?? 'N/A' }}</td>
                        <td>{{ $aircraft->registration_number ?? 'N/A' }}</td>
                        <td>
                            @if($aircraft->capacity)
                                <span class="badge bg-info">{{ $aircraft->capacity }} seats</span>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $aircraft->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $aircraft->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $aircraft->sort_order }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.aircrafts.edit', $aircraft) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.aircrafts.destroy', $aircraft) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this aircraft?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No aircraft found in the fleet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $aircrafts->links() }}
        </div>
    </div>
</div>
@endsection