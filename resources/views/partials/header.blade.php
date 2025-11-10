<header class="header_area">
    <div class="main_menu">
        {{-- <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between" method="" action="">
                    <input
                        type="text"
                        class="form-control"
                        id="search_input"
                        placeholder="Search Here"
                    />
                    <button type="submit" class="btn"></button>
                    <span
                        class="ti-close"
                        id="close_search"
                        title="Close Search"
                    ></span>
                </form>
            </div>
        </div> --}}

        <div class="top-info-ribbon">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top-info-ribbon-content d-flex justify-content-end">
                            <p class="d-flex align-items-center justify-center-end mr-2">
                                <i class="ti-email mr-1"></i>
                                <span>
                                    <a href="mailto:{{$contact_info['email'] ?? 'info@skyleadaviation.com'}}">
                                        {{$contact_info['email'] ?? 'info@skyleadaviation.com'}}
                                    </a>
                                </span>
                            </p>

                            <p class="d-flex align-items-center justify-center-end mr-2">
                                <i class="ti-mobile mr-1"></i>
                                <span>
                                    <a href="callto:{{$contact_info['phone'] ?? 'info@skyleadaviation.com'}}">
                                        {{$contact_info['phone'] ?? 'info@skyleadaviation.com'}}
                                    </a>
                                </span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Edustage Logo" width="80" />
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        {{-- <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li> --}}

                        <li class="nav-item submenu dropdown">
                            <a
                                href="#"
                                class="nav-link dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Pilot Training</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">USA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Canada</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">New Zealand</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">India</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item submenu dropdown">
                            <a
                                href="#"
                                class="nav-link dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Who We Are</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Team</a>
                                </li>
                            </ul>
                        </li>

                        {{-- Cadet Pilot Program In India --}}
                        <li class="nav-item submenu dropdown">
                            <a
                                href="#"
                                class="nav-link dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Cadet Pilot Program In India</a>
                            <ul class="dropdown-menu" style="width: 280px">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Air Asia Cadet Pilot Program</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Indigo Cadet Pilot Program</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Air India Cadet Pilot Program</a>
                                </li>
                            </ul>
                        </li>
                        
                        {{-- <li class="nav-item submenu dropdown">
                            <a
                                href="#"
                                class="nav-link dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Pages</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('courses') }}">Courses</a>
                                </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('course.details', ['slug' => 'web-development']) }}">Course Details</a>
                                    </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('elements') }}">Elements</a>
                                </li>
                            </ul>
                        </li> --}}

                        <li class="nav-item submenu dropdown">
                            <a
                                href="#"
                                class="nav-link dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Blog</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ /*route('blog')*/ }}">Blog</a> --}}
                                    <a class="nav-link" href="#">Blog</a>
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ /*route('blog.show')*/ }}">Blog Details</a> --}}
                                    <a class="nav-link" href="#">Blog Details</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="#">DGCA Ground Classes</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link search" id="search">
                                <i class="ti-search"></i>
                            </a>
                        </li> --}}

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>