<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        .sidebar {
            width: 250px;
            height: calc(100vh - 56px);
            position: fixed;
            top: 56px;
            left: 0;
            background: #f8f9fa;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,.1);
        }
        
        .main-content {
            margin-left: 280px;
            margin-top: 56px;
            padding: 30px;
            transition: all 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                left: -280px;
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            .sidebar.active {
                left: 0;
            }
        }
    </style>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
            --background: #ffffff;
            --card-bg: #ffffff;
            --text: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --sidebar-bg: #f8fafc;
            --sidebar-hover: #f1f5f9;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    
        [data-bs-theme="dark"] {
            --background: #0f172a;
            --card-bg: #1e293b;
            --text: #f8fafc;
            --text-muted: #94a3b8;
            --border-color: #334155;
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
        }
    </style>
        <style>
            body {
                background-color: var(--background);
                color: var(--text);
                transition: all 0.3s ease;
                font-family: 'Inter', system-ui, -apple-system, sans-serif;
            }
        
            .card {
                background-color: var(--card-bg);
                border-radius: 0.75rem;
                border: 1px solid var(--border-color);
                box-shadow: var(--shadow);
                transition: transform 0.2s, box-shadow 0.2s;
                overflow: hidden;
            }
            
            .card:hover {
                box-shadow: var(--shadow-lg);
            }
            
            .card-header {
                background-color: transparent;
                border-bottom: 1px solid var(--border-color);
                padding: 1.25rem 1.5rem;
                font-weight: 600;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .btn {
                border-radius: 0.5rem;
                padding: 0.5rem 1rem;
                font-weight: 500;
                transition: all 0.2s;
            }
            
            .btn-primary {
                background-color: var(--primary);
                border-color: var(--primary);
            }
            
            .btn-primary:hover {
                background-color: var(--primary-hover);
                border-color: var(--primary-hover);
            }
            
            .form-control {
                border-radius: 0.5rem;
                padding: 0.625rem 1rem;
                border: 1px solid var(--border-color);
                transition: border-color 0.2s, box-shadow 0.2s;
            }
            
            .form-control:focus {
                border-color: var(--primary);
                box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
            }
            
            .table {
                border-color: var(--border-color);
            }
            
            .table thead th {
                font-weight: 600;
                border-bottom-width: 1px;
            }
            
            .badge {
                font-weight: 500;
                padding: 0.35em 0.65em;
                border-radius: 0.375rem;
            }
            
            .alert {
                border-radius: 0.5rem;
                border: none;
            }
        </style>
    <style>
        /* Animations and transitions */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .card, .alert {
            animation: fadeIn 0.3s ease-out;
        }
        
        .btn {
            position: relative;
            overflow: hidden;
        }
        
        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%, -50%);
            transform-origin: 50% 50%;
        }
        
        .btn:focus:not(:active)::after {
            animation: ripple 0.6s ease-out;
        }
        
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <!-- Header -->
    <nav class="navbar navbar-expand-lg shadow-sm fixed-top" style="background-color: var(--card-bg); border-bottom: 1px solid var(--border-color);">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
                <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background-color: var(--primary); color: white;">
                    <i class="bi bi-shop"></i>
                </div>
                <span class="fw-bold" style="color: var(--text);">MuscleHub</span>
            </a>
            
            <div class="d-flex align-items-center gap-3">
                @auth
                <div class="dropdown">
                    <button class="btn btn-link text-decoration-none p-0 d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--text);">
                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-light" style="width: 32px; height: 32px;">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        <i class="bi bi-chevron-down small"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow" style="min-width: 200px; border-radius: 0.5rem; border: 1px solid var(--border-color);">
                        <li><h6 class="dropdown-header">Signed in as</h6></li>
                        <li><span class="dropdown-item-text fw-medium">{{ Auth::user()->email }}</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}"><i class="bi bi-person-gear me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                        <form id="logout-form-nav" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
                @else
                <a href="{{ route('auth.login') }}" class="btn btn-outline-primary">Login</a>
                @endauth
                
                <button class="btn btn-icon" id="themeToggle" style="width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background-color: var(--sidebar-hover);">
                    <i class="bi bi-moon-stars"></i>
                </button>
                
                @auth
                <button class="navbar-toggler border-0" type="button" onclick="toggleSidebar()">
                    <i class="bi bi-list" style="color: var(--text); font-size: 1.5rem;"></i>
                </button>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    @auth
    <div class="sidebar">
        <div class="d-flex flex-column gap-4">
            <!-- User Profile Section -->
            <div class="text-center py-4">
                <div class="avatar-circle mx-auto mb-3">
                    <i class="bi bi-person-circle fs-1"></i>
                </div>
                <h6 class="mb-1" style="color: var(--text);">{{ Auth::user()->name }}</h6>
                <span class="text-muted small">{{ Auth::user()->email }}</span>
            </div>
            
            <!-- Navigation -->
            <div class="nav-section">
                <p class="sidebar-heading text-uppercase text-muted small fw-bold ms-3 mb-2">Main</p>
                <div class="nav flex-column">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center py-3 px-3 rounded-3 mb-1 {{ request()->routeIs('admin.dashboard') ? 'active bg-primary text-white' : '' }}">
                        <i class="bi bi-speedometer2 me-3"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="nav-link d-flex align-items-center py-3 px-3 rounded-3 mb-1 {{ request()->routeIs('admin.products.*') ? 'active bg-primary text-white' : '' }}">
                        <i class="bi bi-box-seam me-3"></i>
                        <span>Products</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="nav-link d-flex align-items-center py-3 px-3 rounded-3 mb-1 {{ request()->routeIs('admin.users.*') ? 'active bg-primary text-white' : '' }}">
                        <i class="bi bi-people me-3"></i>
                        <span>Users</span>
                    </a>
                </div>
            </div>
            
            <!-- Account Section -->
            <div class="nav-section mt-auto">
                <p class="sidebar-heading text-uppercase text-muted small fw-bold ms-3 mb-2">Account</p>
                <div class="nav flex-column">
                    <a href="{{ route('admin.profile.edit') }}" class="nav-link d-flex align-items-center py-3 px-3 rounded-3 mb-1 {{ request()->routeIs('admin.profile.*') ? 'active bg-primary text-white' : '' }}">
                        <i class="bi bi-person-gear me-3"></i>
                        <span>Settings</span>
                    </a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                       class="nav-link d-flex align-items-center py-3 px-3 rounded-3 mb-1 text-danger">
                        <i class="bi bi-box-arrow-right me-3"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <!-- Main Content -->
    <div class="main-content @guest ms-0 @endguest">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
        }
    </script>
    <script>
        // Theme toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize theme
            const themeToggle = document.getElementById('themeToggle');
            const htmlElement = document.documentElement;
            
            // Check for saved theme preference or use preferred color scheme
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                htmlElement.setAttribute('data-bs-theme', savedTheme);
                updateThemeIcon(savedTheme);
            } else {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                const initialTheme = prefersDark ? 'dark' : 'light';
                htmlElement.setAttribute('data-bs-theme', initialTheme);
                localStorage.setItem('theme', initialTheme);
                updateThemeIcon(initialTheme);
            }
            
            // Toggle theme when button is clicked
            themeToggle.addEventListener('click', function() {
                const currentTheme = htmlElement.getAttribute('data-bs-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                htmlElement.setAttribute('data-bs-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateThemeIcon(newTheme);
            });
            
            function updateThemeIcon(theme) {
                const icon = themeToggle.querySelector('i');
                if (theme === 'dark') {
                    icon.classList.remove('bi-moon-stars');
                    icon.classList.add('bi-sun');
                } else {
                    icon.classList.remove('bi-sun');
                    icon.classList.add('bi-moon-stars');
                }
            }
            
            // Initialize animations for all page elements
            initializeAnimations();
            
            // Add click event listeners to all sidebar links to handle animations
            const sidebarLinks = document.querySelectorAll('.sidebar .nav-link');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Don't intercept logout links or links with onclick handlers
                    if (this.getAttribute('href') === '#' || this.hasAttribute('onclick')) {
                        return;
                    }
                    
                    // Store the URL we're navigating to
                    const targetUrl = this.getAttribute('href');
                    
                    // Only intercept if it's an internal link
                    if (targetUrl && targetUrl.startsWith(window.location.origin) || targetUrl.startsWith('/')) {
                        e.preventDefault();
                        
                        // Fade out current content
                        const mainContent = document.querySelector('.main-content');
                        mainContent.style.transition = 'opacity 0.2s ease-out';
                        mainContent.style.opacity = '0';
                        
                        // Navigate after a short delay
                        setTimeout(() => {
                            window.location.href = targetUrl;
                        }, 200);
                    }
                });
            });
        });
        
        // Toggle sidebar on mobile
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }
        
        // Initialize animations for page elements
        function initializeAnimations() {
            // Apply animations to cards, alerts, and other elements
            const animatedElements = document.querySelectorAll('.card, .alert');
            animatedElements.forEach(element => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    element.style.transition = 'opacity 0.3s ease-out, transform 0.3s ease-out';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, 100);
            });
            
            // Ensure main content is visible
            const mainContent = document.querySelector('.main-content');
            mainContent.style.opacity = '1';
        }
        
        // Re-initialize animations when navigating between pages
        document.addEventListener('turbolinks:load', function() {
            initializeAnimations();
        });
        
        // If not using Turbolinks, add this event listener for regular page loads
        window.addEventListener('pageshow', function(event) {
            // Check if the page is being loaded from cache
            if (event.persisted) {
                initializeAnimations();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>

<style>
    .sidebar {
        width: 280px;
        height: calc(100vh - 56px);
        position: fixed;
        top: 56px;
        left: 0;
        background-color: var(--sidebar-bg);
        padding: 0;
        box-shadow: 2px 0 15px rgba(0,0,0,.1);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        overflow-y: auto;
    }
    
    .avatar-circle {
        width: 80px;
        height: 80px;
        background-color: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .sidebar .nav-link {
        color: var(--text);
        transition: all 0.2s;
    }
    
    .sidebar .nav-link:hover:not(.active) {
        background-color: var(--sidebar-hover);
    }
    
    .sidebar-heading {
        letter-spacing: 1px;
        font-size: 0.75rem;
        color: var(--text-muted);
    }
    
    .sidebar .text-muted {
        color: var(--text-muted) !important;
    }
</style>
