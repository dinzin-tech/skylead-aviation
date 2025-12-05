<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('favicon.png')}}" rel="icon">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
            height: 100% !important;
            overflow-y: auto !important;
            scrollbar-width: none !important;
            scrollbar-color: #6c757d #343a40 !important;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            padding: 0.75rem 1rem;
            margin: 0.125rem 0;
            border-radius: 0.375rem;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #495057;
        }
        .main-content {
            margin-left: 0;
            transition: margin-left 0.3s;
        }
        @media (min-width: 768px) {
            .main-content {
                margin-left: 250px;
            }
        }
        .card-stats {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse position-fixed" id="sidebar">
                <div class="position-sticky pt-3">
                    <div class="px-3 pb-2 mb-3 border-bottom">
                        <h5 class="text-white">Admin Panel</h5>
                    </div>
                    
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                               href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-house-door"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}" 
                               href="{{ route('admin.blogs.index') }}">
                                <i class="bi bi-journal-text"></i> Blogs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.countries.*') ? 'active' : '' }}" 
                            href="{{ route('admin.countries.index') }}">
                                <i class="bi bi-globe"></i> Countries
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.aircrafts.*') ? 'active' : '' }}" 
                            href="{{ route('admin.aircrafts.index') }}">
                                <i class="bi bi-airplane"></i> Fleet Management
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.flying-schools.*') ? 'active' : '' }}" 
                            href="{{ route('admin.flying-schools.index') }}">
                                <i class="bi bi-building"></i> Flying Schools
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.destinations.*') ? 'active' : '' }}" 
                            href="{{ route('admin.destinations.index') }}">
                                <i class="bi bi-globe-americas"></i> Destinations
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.global-destinations.*') ? 'active' : '' }}" 
                            href="{{ route('admin.global-destinations.index') }}">
                                <i class="bi bi-globe"></i> Global Destinations
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dgca-syllabus.*') ? 'active' : '' }}" 
                            href="{{ route('admin.dgca-syllabus.index') }}">
                                <i class="bi bi-book"></i> DGCA Syllabus
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}" 
                                href="{{ route('admin.courses.index') }}">
                                    <i class="bi bi-book"></i> Courses
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.page-builder.*') ? 'active' : '' }}" 
                            href="{{ route('admin.page-builder.index') }}">
                                <i class="bi bi-layers"></i> Page Builder
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}" 
                            href="{{ route('admin.pages.index') }}">
                                <i class="bi bi-file-earmark"></i> Pages
                            </a>
                        </li>

                        {{-- add more nav links --}}

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.maintenance.*') ? 'active' : '' }}" 
                            href="{{ route('admin.maintenance.index') }}">
                                <i class="bi bi-wrench"></i> Maintenance
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-start w-100">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="main-content col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('header', 'Dashboard')</h1>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    
    <script>
        // Initialize CSRF token for AJAX requests
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
        
        // Set up CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>