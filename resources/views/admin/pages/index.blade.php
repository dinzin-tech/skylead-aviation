@extends('admin.layout.app')

@section('title', 'Manage Pages')
@section('header', 'Page Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Website Pages</h5>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Page
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Title</th>
                        <th>Menu</th>
                        <th>Status</th>
                        <th>Sections</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $page)
                    <tr>
                        <td>
                            <strong>{{ $page->name }}</strong>
                            @if($page->meta_description)
                                <br><small class="text-muted">{{ Str::limit($page->meta_description, 50) }}</small>
                            @endif
                        </td>
                        <td><code>/{{ $page->slug }}</code></td>
                        <td>{{ $page->title ?? 'N/A' }}</td>
                        <td>
                            <span class="badge {{ $page->show_in_menu ? 'bg-success' : 'bg-secondary' }}">
                                {{ $page->show_in_menu ? 'In Menu' : 'Hidden' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $page->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $page->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $page->sections_count ?? 0 }} sections</span>
                        </td>
                        <td>{{ $page->menu_order }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.page-builder.index') }}?page={{ $page->slug }}" 
                                   class="btn btn-sm btn-primary" title="Build Sections">
                                    <i class="bi bi-layers"></i>
                                </a>
                                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this page?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No pages found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection