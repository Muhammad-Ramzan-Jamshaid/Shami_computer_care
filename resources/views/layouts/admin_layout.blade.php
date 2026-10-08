<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Shami Computer Care</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Compiled Assets -->
    @vite(['resources/css/app.css'])

    <style>
        :root {
            --sidebar-width: 260px;
        }
        body {
            background-color: var(--bg-light);
            font-family: var(--font-body);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }
        
        /* Admin Sidebar */
        .admin-sidebar {
            width: var(--sidebar-width);
            background-color: var(--secondary-color);
            color: var(--bg-white);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }
        .admin-sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .admin-sidebar-logo {
            font-family: var(--font-heading);
            font-weight: 800;
            font-size: 1.15rem;
            color: var(--bg-white);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .admin-sidebar-logo span {
            color: var(--primary-color);
        }
        .admin-sidebar-menu {
            list-style: none;
            padding: 25px 12px;
            margin: 0;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .admin-sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 18px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-family: var(--font-heading);
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: var(--radius-sm);
            transition: var(--transition-smooth);
        }
        .admin-sidebar-link:hover, .admin-sidebar-link.active {
            background-color: rgba(14, 165, 233, 0.1);
            color: var(--primary-color);
        }
        .admin-sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        /* Main Layout Content Panel */
        .admin-main {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .admin-navbar {
            height: 70px;
            background-color: var(--bg-white);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }
        .admin-content-area {
            padding: 40px 30px;
            flex: 1;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .admin-sidebar.open {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
            }
            .mobile-sidebar-toggle {
                display: block !important;
            }
        }
        .mobile-sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.3rem;
            color: var(--secondary-color);
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Sidebar navigation -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="admin-sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-logo">
                <div style="width: 32px; height: 32px; background: linear-gradient(135deg, var(--primary-color), var(--primary-hover)); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--bg-white); font-size: 1.1rem;">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                </div>
                <span>Shami</span> Admin
            </a>
        </div>
        
        <ul class="admin-sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.products.index') }}" class="admin-sidebar-link {{ Request::is('admin/products*') ? 'active' : '' }}">
                    <i class="fa-solid fa-boxes-stacked"></i> Manage Products
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}" class="admin-sidebar-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
                    <i class="fa-solid fa-tags"></i> Manage Categories
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projects.index') }}" class="admin-sidebar-link {{ Request::is('admin/projects*') ? 'active' : '' }}">
                    <i class="fa-solid fa-diagram-project"></i> Manage Projects
                </a>
            </li>
            <li style="margin-top: auto; border-top: 1px solid rgba(255, 255, 255, 0.05); padding-top: 15px;">
                <a href="{{ route('shop.index') }}" class="admin-sidebar-link" target="_blank" style="color: var(--primary-color);">
                    <i class="fa-solid fa-shop"></i> View Store Catalog
                </a>
            </li>
            <li>
                <a href="{{ route('projects.index') }}" class="admin-sidebar-link" target="_blank" style="color: #38bdf8;">
                    <i class="fa-solid fa-diagram-project"></i> View Projects Page
                </a>
            </li>
        </ul>
        
        <div class="admin-sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0; width: 100%;">
                @csrf
                <button type="submit" class="btn btn-outline w-full" style="border-color: rgba(239, 68, 68, 0.4); color: #ef4444; padding: 10px; border-radius: var(--radius-sm); display: inline-flex; align-items: center; justify-content: center; gap: 8px; font-weight: 700; width: 100%; background: transparent; transition: all 0.2s;" onmouseover="this.style.backgroundColor='#ef4444'; this.style.color='#ffffff';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ef4444';">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Panel -->
    <div class="admin-main">
        <header class="admin-navbar">
            <button class="mobile-sidebar-toggle" onclick="toggleSidebar()">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div style="font-family: var(--font-heading); font-weight: 700; color: var(--secondary-color); font-size: 1.05rem;">
                <i class="fa-solid fa-circle" style="color: #10b981; font-size: 0.5rem; margin-right: 5px;"></i> Connected: {{ session('admin_user') }}
            </div>
            <div>
                <a href="{{ url('/') }}" class="btn btn-outline btn-sm" style="padding: 6px 14px; font-size: 0.8rem;"><i class="fa-solid fa-home"></i> Main Site</a>
            </div>
        </header>

        <main class="admin-content-area">
            @yield('admin_content')
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            sidebar.classList.toggle('open');
        }
    </script>
</body>
</html>
