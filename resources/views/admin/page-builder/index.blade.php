@extends('admin.layout.app')

@section('title', 'Page Builder')
@section('header', 'Page Builder')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Page Sections</h5>
        <a href="{{ route('admin.page-builder.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Create New Section
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Page</th>
                        <th>Section Name</th>
                        <th>Header</th>
                        <th>Layout</th>
                        <th>Elements</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sections as $section)
                    <tr>
                        <td>
                            <span class="badge bg-info">{{ ucfirst($section->page_name) }}</span>
                        </td>
                        <td>
                            <strong>{{ $section->section_name }}</strong>
                            @if($section->section_description)
                                <br><small class="text-muted">{{ Str::limit($section->section_description, 50) }}</small>
                            @endif
                        </td>
                        <td>{{ $section->section_header ?? 'N/A' }}</td>
                        <td>
                            <span class="badge bg-secondary">{{ $section->layout_type }}</span>
                        </td>
                        <td>
                            <span class="badge {{ $section->elements->count() > 0 ? 'bg-success' : 'bg-warning' }}">
                                {{ $section->elements->count() }} elements
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $section->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $section->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $section->sort_order }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.page-builder.edit', $section) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="{{ route('admin.section-elements.create', $section) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-plus"></i> Add Element
                                </a>
                                <form action="{{ route('admin.page-builder.destroy', $section) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this section and all its elements?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No page sections found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $sections->links() }}
        </div>
    </div>
</div>
@endsection