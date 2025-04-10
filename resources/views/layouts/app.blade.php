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
            margin-left: 250px;
            margin-top: 56px;
            padding: 20px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar.active {
                left: 0;
            }
        }
    </style>
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #64748b;
            --success: #22c55e;
            --danger: #ef4444;
            --warning: #eab308;
            --background: #ffffff;
            --text: #1e293b;
        }
    
        [data-bs-theme="dark"] {
            --background: #0f172a;
            --text: #f8fafc;
        }
    
        body {
            background-color: var(--background);
            color: var(--text);
            transition: all 0.3s ease;
        }
    
        .sidebar {
            width: 280px;
            background: var(--background);
            box-shadow: 2px 0 15px rgba(0,0,0,.1);
            transition: transform 0.3s ease;
        }
    
        .card {
            background: var(--background);
            border: 1px solid rgba(0,0,0,.125);
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        }
    
        .table-hover tbody tr {
            transition: background-color 0.2s;
        }
    
        .btn {
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <i class="bi bi-shop"></i>
                <span class="fw-bold">MuscleHub</span>
            </a>
            
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light" id="themeToggle">
                    <i class="bi bi-moon-stars"></i>
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="list-group">
            <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-box-seam me-2"></i> Products
            </a>
            <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-people me-2"></i> Users
            </a>
            <a href="{{ route('admin.profile.edit') }}" class="list-group-item list-group-item-action">
                <i class="bi bi-person-circle me-2"></i> Profile
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
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
        // Theme toggle
        const themeToggle = document.getElementById('themeToggle');
        const storedTheme = localStorage.getItem('theme');
        
        if (storedTheme) {
            document.documentElement.setAttribute('data-bs-theme', storedTheme);
        }
    
        themeToggle.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            
            themeToggle.innerHTML = newTheme === 'dark' 
                ? '<i class="bi bi-sun"></i>'
                : '<i class="bi bi-moon-stars"></i>';
        });
    </script>
    @stack('scripts')
</body>
</html>
