<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.4/dist/locomotive-scroll.min.css">

<style>
    /* --- Desktop Styles (Largely Unchanged) --- */
    .modern-navbar {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(59, 130, 246, 0.1);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        z-index: 1030; /* Ensure navbar is on top */
    }

    .navbar-brand {
        font-size: 1rem;
        font-weight: 700;
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        transition: all 0.3s ease;
    }

    .navbar-brand:hover {
        transform: scale(1.05);
        filter: brightness(1.1);
    }

    .navbar-nav .nav-link {
        color: #374151 !important;
        font-weight: 500;
        padding: 0.75rem 1.25rem !important;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
        margin: 0 0.25rem;
         font-size: 0.85rem;
    }

    .navbar-nav .nav-link:hover {
        color: #2563eb !important;
        background: rgba(37, 99, 235, 0.1);
        transform: translateY(-1px);
    }

    .navbar-nav .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        background: linear-gradient(90deg, #2563eb, #3b82f6);
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover::after {
        width: 80%;
        left: 10%;
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        padding: 0.75rem 0;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        margin-top: 0.5rem;
    }

    .dropdown-item {
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
        color: #374151;
        font-weight: 500;
    }

    .dropdown-item:hover {
        background: rgba(37, 99, 235, 0.1);
        color: #2563eb;
        transform: translateX(5px);
    }

    .search-form {
        position: relative;
            width:400px;
            height: 40px
    }

    .search-form .form-control {
        border: 2px solid rgba(37, 99, 235, 0.2);
        border-radius: 25px;
        padding: 0.75rem 1.25rem;
        padding-right: 3.5rem;
        background: rgba(248, 250, 252, 0.8);
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .search-form .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.15);
        background: white;
    }

    .search-form .btn {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        border-radius: 20px;
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        border: none;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
        font-weight: 600;
       
    }

    .search-form .btn:hover {
        background: linear-gradient(135deg, #1d4ed8, #2563eb);
        transform: translateY(-50%) scale(1.05);
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
    }

    .navbar-toggler {
        border: none;
        padding: 0.5rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.15);
    }

    .navbar-toggler:hover {
        background: rgba(37, 99, 235, 0.1);
    }
@media (min-width: 1321) {
        .navbar-brand {
            font-size: 1.25rem;
        }

        .navbar-nav .nav-link {
            padding: 0.75rem 1rem !important;
            font-size: 0.9rem;
            margin: 0 0.5rem;
        }

        .search-form {
            max-width: 100%;
            width: 600px
        }
    }
    /* --- [FINAL FIX] RESPONSIVE FIX FOR INTERMEDIATE SCREENS --- */
    @media (max-width: 1200px) and (min-width: 992px) {
        .navbar-brand {
            /* Reduce brand font size to save space */
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            /* Further reduce padding to save horizontal space */
            padding: 0.75rem 0.5rem !important; 
            /* Reduce font size slightly */
            font-size: 0.85rem;
            /* Reduce margin between links */
            margin: 0 0.1rem;
        }

        .search-form {
            /* Make the search form even smaller */
            max-width: 220px;
        }
    }

    /* --- Mobile Styles (for screens smaller than 992px) --- */
    @media (max-width: 991.98px) {
        /* Align items vertically inside the collapsed menu */
        .navbar-collapse {
            padding: 1rem 0;
            text-align: center;
        }

        /* Adjust nav links for vertical layout */
        .navbar-nav .nav-link {
            font-size: 1rem; /* Restore font size for mobile */
            margin: 0.5rem 0;
            padding: 0.75rem 1rem !important; /* Adjust padding for mobile */
            display: inline-block; /* Allows for centering */
        }
        
        .navbar-nav .nav-link:hover {
            transform: none; /* Disable hover transform on mobile */
        }

        .navbar-nav .nav-link:hover::after {
            width: 50%; /* Adjust underline effect for mobile */
            left: 25%;
        }

        /* Style the dropdown menu for mobile */
        .dropdown-menu {
            box-shadow: none;
            background: transparent;
            text-align: center;
            margin-top: 0;
        }
        
        .dropdown-item:hover {
            transform: none; /* Disable hover transform on mobile */
        }

        /* Make search form full width and add margin */
        .search-form {
            margin: 1rem auto; /* Center the search form */
            max-width: 90%;
        }
    }
</style>


</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light modern-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-store me-2"></i>{{ config('app.name', 'HamroPasal') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about.us') }}">
                                {{ __('About Us') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.us') }}">
                                {{ __('Contact Us') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('Categories') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-male me-2"></i>{{ __('Men')
                                        }}</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-female me-2"></i>{{ __('Women')
                                        }}</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-running me-2"></i>{{ __('Sports')
                                        }}</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-laptop me-2"></i>{{
                                        __('Electronics') }}</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-tshirt me-2"></i>{{ __('Fashion')
                                        }}</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Center Search Bar -->
                    <form class="d-flex mx-auto search-form" action="{{ route('search') }}" method="GET" role="search">
                        <input class="form-control me-2" type="search" name="query" placeholder="Search for products..."
                            aria-label="Search" required>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>{{ __('Login') }}
                            </a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i>{{ __('Register') }}
                            </a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i>{{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <main class="">
            @yield('aboutus')
        </main>
        <footer class="bg-light mt-auto">
            @include('footer')
        </footer>
    </div>
    <!-- Vanta.js Dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.birds.min.js"></script>
    <!-- Spline Viewer Script -->
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.10.32/build/spline-viewer.js"></script>
    <script>
        var setVanta = () => {
    if (window.VANTA) window.VANTA.BIRDS({
      el: ".s-page-1 .s-section-1 .s-section",
      mouseControls: true,
      touchControls: true,
      gyroControls: false,
      minHeight: 200.00,
      minWidth: 200.00,
      scale: 1.00,
      scaleMobile: 1.00,
      backgroundColor: 0x0,
      color1: 0xcc2f2f,
      color2: 0xffffff,
      speedLimit: 6.00
    });
  };

  document.addEventListener("DOMContentLoaded", setVanta);
    </script>

</body>

</html>