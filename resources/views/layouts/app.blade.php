<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO Optimization -->
    <title>@yield('title', 'Shami Computer Care & CCTV Cameras - Premium Laptops & Security Solutions')</title>
    <meta name="description" content="Get premium laptops, computers, cables, USB drives, and professional CCTV camera installation services at Shami Computer Care. We specialize in building projects and government authority supplies.">
    <meta name="keywords" content="Shami Computer Care, CCTV installation, Laptops, computer accessories, cables, USB drives, networking, government contractor, CCTV cameras, building projects">

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!-- Sticky Glassmorphism Header & Navigation -->
    <header class="header-nav" id="mainHeader">
        <div class="container flex-between navbar-container">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="logo">
                <div class="logo-icon">
                    <i class="fa-solid fa-network-wired"></i>
                </div>
                <div>Shami <span>Computer Care</span></div>
            </a>

            <!-- Mobile Navigation Toggle -->
            <button class="mobile-nav-toggle" id="mobileMenuBtn" aria-label="Toggle Menu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Navigation Links -->
            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ url('/shop') }}" class="nav-link {{ Request::is('shop*') ? 'active' : '' }}">Shop</a>
                </li>

                @if(session()->has('admin_logged_in'))
                <li class="nav-item">
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ Request::is('admin*') ? 'active' : '' }}" style="color: var(--primary-color); font-weight: 700;"><i class="fa-solid fa-user-gear"></i> Admin</a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ url('/blog') }}" class="nav-link {{ Request::is('blog') ? 'active' : '' }}">Blog</a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ url('/contact') }}" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                </li>

                @if(session()->has('user_logged_in'))
                <li class="nav-item" style="display: flex; align-items: center; gap: 15px; padding-left: 10px;">
                    <span style="font-family: var(--font-heading); font-size: 0.9rem; font-weight: 700; color: var(--secondary-color); display: inline-flex; align-items: center; gap: 6px;"><i class="fa-solid fa-circle-user" style="color: var(--primary-color); font-size: 1.1rem;"></i> {{ session('user_name') }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0; display: inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem; border-color: #ef4444; color: #ef4444; border-radius: var(--radius-sm); font-weight: 700; transition: all 0.2s;" onmouseover="this.style.backgroundColor='#ef4444'; this.style.color='var(--bg-white)';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ef4444';">Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link {{ Request::is('login') ? 'active' : '' }}">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link {{ Request::is('register') ? 'active' : '' }}">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </header>

    <!-- Main Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container grid grid-4">
            <!-- Brand Info Column -->
            <div class="footer-col">
                <div class="footer-logo">
                    <a href="{{ url('/') }}" class="logo">
                        <div class="logo-icon">
                            <i class="fa-solid fa-network-wired"></i>
                        </div>
                        <div>Shami <span>Care</span></div>
                    </a>
                </div>
                <p style="margin-bottom: 20px;">Your trusted partner for top-quality IT hardware, computers, cabling solutions, and professional security system integrations.</p>
                <div class="social-links">
                    <a href="#" class="social-link" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="social-link" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="social-link" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" class="social-link" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>

            <!-- Quick Products Links -->
            <div class="footer-col">
                <h4>Retail Shop</h4>
                <ul class="footer-links">
                    <li><a href="{{ url('/#laptops') }}">Premium Laptops</a></li>
                    <li><a href="{{ url('/#accessories') }}">HDMI & Ethernet Wires</a></li>
                    <li><a href="{{ url('/#accessories') }}">USB Flash Drives</a></li>
                    <li><a href="{{ url('/#accessories') }}">Audio Speakers</a></li>
                    <li><a href="{{ url('/#accessories') }}">Keyboards & Mouse</a></li>
                </ul>
            </div>

            <!-- Services Column -->
            <div class="footer-col">
                <h4>Our Services</h4>
                <ul class="footer-links">
                    <li><a href="{{ url('/contact?service=cctv') }}">CCTV Camera Installation</a></li>
                    <li><a href="{{ url('/contact?service=sales') }}">Sell & Buy Devices</a></li>
                    <li><a href="{{ url('/contact?service=repair') }}">Device Repair Service</a></li>
                    <li><a href="{{ url('/contact?service=software') }}">Windows & Software Setup</a></li>
                    <li><a href="{{ url('/contact?service=wifi') }}">Wi-Fi Modem Configurations</a></li>
                    <li><a href="{{ url('/contact?service=accessories') }}">Computer Accessories</a></li>
                </ul>
            </div>

            <!-- Contact Info Column -->
            <div class="footer-col">
                <h4>Contact Us</h4>
                <ul class="footer-links" style="color: #94a3b8; font-size: 0.9rem;">
                    <li style="margin-bottom: 12px;"><i class="fa-solid fa-location-dot" style="color: var(--primary-color); margin-right: 10px;"></i> <a href="https://www.google.com/maps/place/Shami+Computer+Care/@31.7544355,73.8173093,13z/data=!4m6!3m5!1s0x3918bfb41d6aaa1f:0x16338d2fa58e77e3!8m2!3d31.7414756!4d73.8287892!16s%2Fg%2F11vf3s9gkg" target="_blank" style="color: #94a3b8;">near Habib Shah Hospital, Farooqabad, Pakistan</a></li>
                    <li style="margin-bottom: 12px;"><i class="fa-solid fa-phone" style="color: var(--primary-color); margin-right: 10px;"></i> +92 306 4565908</li>
                    <li style="margin-bottom: 12px;"><i class="fa-solid fa-envelope" style="color: var(--primary-color); margin-right: 10px;"></i> info@shamipccctv.com</li>
                    <li style="margin-bottom: 12px;"><i class="fa-solid fa-clock" style="color: var(--primary-color); margin-right: 10px;"></i> Mon - Sun: 8:30 AM - 9:00 PM</li>
                </ul>
            </div>
        </div>

        <div class="container text-center footer-bottom">
            <p>&copy; {{ date('Y') }} Shami Computer Care & CCTV Cameras. All rights reserved. Built with Laravel.</p>
        </div>
    </footer>

    <!-- CSS/JS Active States & Interactive Scroll Effects -->
    <script>
        // Header scroll effect
        const mainHeader = document.getElementById('mainHeader');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                mainHeader.classList.add('scrolled');
            } else {
                mainHeader.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navMenu = document.getElementById('navMenu');
        
        mobileMenuBtn.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            const icon = mobileMenuBtn.querySelector('i');
            if (navMenu.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            } else {
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }
        });

        // Dropdown toggles for mobile view
        if (window.innerWidth <= 991) {
            const dropdownItems = document.querySelectorAll('.nav-item');
            dropdownItems.forEach(item => {
                const link = item.querySelector('.nav-link');
                const menu = item.querySelector('.dropdown-menu');
                
                if (menu && link) {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        item.classList.toggle('active');
                    });
                }
            });
        }
    </script>
</body>
</html>
