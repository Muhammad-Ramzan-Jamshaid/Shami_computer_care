@extends('layouts.app')

@section('title', 'Shami Computer Care & CCTV Cameras - Laptops, Accessories & CCTV Installation')

@section('content')

    <!-- Hero Section (Centered Text with Faded Background Combination, Right Visuals Removed) -->
    <section class="hero" style="background: linear-gradient(180deg, #e0f2fe 0%, #f0f9ff 60%, #ffffff 100%); padding-top: 145px; padding-bottom: 90px; position: relative; text-align: center; overflow: hidden;">
        <!-- Soft Ambient Color Blur Glow -->
        <div style="position: absolute; top: -120px; left: 50%; transform: translateX(-50%); width: 750px; height: 750px; background: radial-gradient(circle, rgba(14, 165, 233, 0.15) 0%, rgba(15, 23, 42, 0) 70%); pointer-events: none;"></div>
        
        <div class="container" style="max-width: 850px; margin: 0 auto; position: relative; z-index: 2;">
            <div class="hero-content text-center" style="display: flex; flex-direction: column; align-items: center;">
                <span class="badge" style="background: rgba(14, 165, 233, 0.12); color: #0284c7; padding: 6px 18px; border-radius: 20px; font-weight: 700; font-size: 0.85rem; display: inline-block; margin-bottom: 18px; letter-spacing: 0.5px;">
                    <i class="fa-solid fa-shield-halved" style="margin-right: 6px;"></i> Welcome to Shami Computer Care
                </span>
                
                <h1 style="font-family: var(--font-heading); font-size: 3.2rem; font-weight: 800; color: var(--secondary-color); line-height: 1.25; margin-bottom: 22px; text-align: center;">
                    Empowering Your Business with <span style="color: var(--primary-color);">IT & CCTV Security</span>
                </h1>
                
                <p style="font-size: 1.15rem; color: var(--text-muted); max-width: 700px; margin: 0 auto 35px auto; line-height: 1.7; text-align: center;">
                    We are your all-in-one destination for premium laptops, computer peripherals, cables, and storage. In addition, we deliver top-tier commercial CCTV installation, building network projects, and government authority contracting.
                </p>
                
                <div class="hero-actions" style="display: flex; gap: 16px; justify-content: center; align-items: center; flex-wrap: wrap;">
                    <a href="{{ url('/shop') }}" class="btn btn-primary" style="padding: 14px 32px; font-size: 1rem; font-weight: 700; box-shadow: 0 6px 20px rgba(14, 165, 233, 0.35);">
                        <i class="fa-solid fa-shop" style="margin-right: 8px;"></i> Explore Shop Catalog
                    </a>
                    <a href="{{ url('/projects') }}" class="btn btn-outline" style="padding: 14px 32px; font-size: 1rem; font-weight: 700; border-color: var(--secondary-color); color: var(--secondary-color);">
                        <i class="fa-solid fa-diagram-project" style="margin-right: 8px;"></i> Our Projects
                    </a>
                </div>
            </div>
        </div>
    <!-- Services Highlights -->
    <section class="services-section section-padding" id="services">
        <div class="container">
            <div class="section-header text-center max-w-600">
                <span class="badge">Our Expertise</span>
                <h2>Professional Service Solutions</h2>
                <p>We combine high-quality retail electronics with professional installation, repair, and configuration services to keep your systems running smoothly.</p>
            </div>
            
            <div class="grid grid-3">
                <!-- CCTV Installation Card -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-video"></i>
                    </div>
                    <h3>CCTV Camera Installation</h3>
                    <p>Expert planning, wiring, and configuration of high-definition IP and analog security cameras. Includes mobile remote monitoring and DVR/NVR storage setup.</p>
                    <a href="{{ url('/contact?service=cctv') }}" class="service-link">Request Installation <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                
                <!-- Selling & Purchasing Computers and Laptops -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-laptop"></i>
                    </div>
                    <h3>Selling & Purchasing Computers & Laptops</h3>
                    <p>Purchase high-quality, pre-tested laptops or desktop computers with warranty support, or sell your old devices at the best competitive market price.</p>
                    <a href="{{ url('/contact?service=sales') }}" class="service-link">Buy / Sell Device <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                
                <!-- Repairing Computers and Laptops -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </div>
                    <h3>Repairing Computers & Laptops</h3>
                    <p>Professional diagnostic and repairs of motherboard faults, keyboard replacements, screen fixes, RAM/SSD upgrades, and system dust cleaning.</p>
                    <a href="{{ url('/contact?service=repair') }}" class="service-link">Request Repair Service <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                
                <!-- System Windows & Software Installation -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-compact-disc"></i>
                    </div>
                    <h3>System Windows & Software Installation</h3>
                    <p>Installation of genuine Windows 10/11 operating systems, hardware drivers, essential security utilities, Microsoft Office, and business software packages.</p>
                    <a href="{{ url('/contact?service=software') }}" class="service-link">Install Software <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Wi-Fi Modems Reset -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-wifi"></i>
                    </div>
                    <h3>Wi-Fi Modems Reset & Setup</h3>
                    <p>Reset and configure GPON, Fiber, and PTCL Wi-Fi modems. Set up secure Wi-Fi passwords, wireless bridges, and multi-room network coverage routers.</p>
                    <a href="{{ url('/contact?service=wifi') }}" class="service-link">Reset Wi-Fi Modem <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Selling and purchasing computer accessories -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-keyboard"></i>
                    </div>
                    <h3>Selling & Purchasing Accessories</h3>
                    <p>Find essential computer peripherals, high-speed gold-plated cables (HDMI, CAT6 rolls), USB drives, audio speakers, and keyboard-mouse bundles.</p>
                    <a href="{{ url('/contact?service=accessories') }}" class="service-link">Inquire Accessories <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Tabs Showcase Section -->
    <section class="products-section section-padding" id="products">
        <div class="container">
            <div class="section-header text-center max-w-600">
                <span class="badge">Featured Products</span>
                <h2>Explore Our Retail Shop</h2>
                <p>Premium quality items in-store. Check out our high-performance laptops and essential accessories with official warranty coverages.</p>
            </div>
            
            <div class="tabs-container">
                <!-- Tabs Nav -->
                <ul class="tabs-nav">
                    <li class="tab-btn active" onclick="switchTab(event, 'laptops')">Laptops</li>
                    <li class="tab-btn" onclick="switchTab(event, 'accessories')">Accessories & Cables</li>
                </ul>
                
                <!-- Laptops Tab Content -->
                <div id="laptops" class="tab-content active">
                    <div class="grid grid-4" id="laptop-grid">
                        <!-- Laptop Item 1 -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">New</span>
                                <img src="/images/laptop-dell.webp" alt="Dell Latitude Laptop" onerror="this.src='https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Dell</div>
                                <h3 class="product-title">Dell Latitude 5420 Core i5</h3>
                                <div class="product-meta"><i class="fa-solid fa-microchip"></i> 16GB RAM / 512GB SSD</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 135,000</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Laptop Item 2 -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">Sale</span>
                                <img src="/images/laptop-hp.webp" alt="HP EliteBook Laptop" onerror="this.src='https://images.unsplash.com/photo-1593642632823-8f785ba67e45?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">HP</div>
                                <h3 class="product-title">HP EliteBook 840 G8 Core i7</h3>
                                <div class="product-meta"><i class="fa-solid fa-microchip"></i> 16GB RAM / 1TB SSD</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 165,000</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Laptop Item 3 -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">New</span>
                                <img src="/images/laptop-lenovo.webp" alt="Lenovo ThinkPad Laptop" onerror="this.src='https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Lenovo</div>
                                <h3 class="product-title">Lenovo ThinkPad L14 Core i5</h3>
                                <div class="product-meta"><i class="fa-solid fa-microchip"></i> 8GB RAM / 256GB SSD</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 108,000</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Laptop Item 4 -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">Premium</span>
                                <img src="/images/laptop-macbook.webp" alt="Apple MacBook Pro" onerror="this.src='https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Apple</div>
                                <h3 class="product-title">MacBook Pro M2 Space Gray</h3>
                                <div class="product-meta"><i class="fa-solid fa-microchip"></i> M2 chip / 8GB / 512GB</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 320,000</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Accessories Tab Content -->
                <div id="accessories" class="tab-content">
                    <div class="grid grid-4" id="accessory-grid">
                        <!-- Accessory 1: Wires -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">Shielded</span>
                                <img src="/images/cable-hdmi.webp" alt="HDMI Cable 4K" onerror="this.src='https://images.unsplash.com/photo-1557063673-0493e05d49ef?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Cables</div>
                                <h3 class="product-title">Premium Gold-Plated HDMI 4K Cable</h3>
                                <div class="product-meta"><i class="fa-solid fa-ruler-combined"></i> 5 Meters Length</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 2,200</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Accessory 2: Ethernet Wires -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">CAT6</span>
                                <img src="/images/cable-ethernet.webp" alt="CAT6 Ethernet Cable" onerror="this.src='https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Cables</div>
                                <h3 class="product-title">CAT6 High-Speed RJ45 Network Cable</h3>
                                <div class="product-meta"><i class="fa-solid fa-ruler-combined"></i> 305M Roll (Boxed)</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 18,500</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Accessory 3: USB Kingston -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">USB 3.2</span>
                                <img src="/images/usb-kingston.webp" alt="Kingston Flash Drive" onerror="this.src='https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Kingston</div>
                                <h3 class="product-title">Kingston DataTraveler Exodia 64GB</h3>
                                <div class="product-meta"><i class="fa-solid fa-database"></i> High-Speed Read/Write</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 1,600</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Accessory 4: Speakers -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">Woofer</span>
                                <img src="/images/speaker-periph.webp" alt="Computer Speakers" onerror="this.src='https://images.unsplash.com/photo-1545454675-3531b543be5d?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Speakers</div>
                                <h3 class="product-title">2.1 Multimedia Speaker System</h3>
                                <div class="product-meta"><i class="fa-solid fa-music"></i> Heavy Bass / USB Powered</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 4,500</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-us section-padding">
        <div class="container grid grid-2">
            <div>
                <span class="badge">Why Choose Shami</span>
                <h2>Dedicated to Quality IT hardware and Dependable Integrations</h2>
                <p style="color: rgba(255, 255, 255, 0.7); margin-bottom: 30px;">For over a decade, we have partnered with building operators, retail buyers, and government departments to install and supply the best technology. We ensure professional accountability on every single project.</p>
                
                <div class="why-list">
                    <div class="why-item">
                        <div class="why-icon"><i class="fa-solid fa-shield-halved"></i></div>
                        <div class="why-text">
                            <h3>High-Security Equipment</h3>
                            <p>All our CCTV projects utilize certified hardware with deep infrared night-vision and reliable cloud backups.</p>
                        </div>
                    </div>

                    <div class="why-item">
                        <div class="why-icon"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                        <div class="why-text">
                            <h3>Official Contracting & Invoicing</h3>
                            <p>We support fully compliant tax billing, custom tenders and authority bidding processes for governments.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="display: flex; flex-direction: column; justify-content: center;">
                <div class="grid grid-2 stats-grid">
                    <div class="stat-item">
                        <h4>10+</h4>
                        <p>Years in Industry</p>
                    </div>
                    <div class="stat-item">
                        <h4>500+</h4>
                        <p>Surveillance Projects</p>
                    </div>
                    <div class="stat-item">
                        <h4>100%</h4>
                        <p>Client Satisfaction</p>
                    </div>
                    <div class="stat-item">
                        <h4>A+</h4>
                        <p>Government Supplier Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Map Section -->
    <section class="map-section section-padding" id="location" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color);">
        <div class="container text-center">
            <span class="badge">Our Location</span>
            <h2 style="font-family: var(--font-heading); font-size: 2.2rem; color: var(--secondary-color); font-weight: 800; margin-bottom: 10px;">Visit Our Retail Outlet</h2>
            <p style="color: var(--text-muted); font-size: 0.95rem; max-width: 600px; margin: 0 auto 35px auto;">We are located at the heart of Farooqabad. Click the map below to get instant directions on Google Maps.</p>
            
            <a href="https://www.google.com/maps/place/Shami+Computer+Care/@31.7544355,73.8173093,13z/data=!4m6!3m5!1s0x3918bfb41d6aaa1f:0x16338d2fa58e77e3!8m2!3d31.7414756!4d73.8287892!16s%2Fg%2F11vf3s9gkg" target="_blank" style="display: block; position: relative; text-decoration: none; max-width: 900px; margin: 0 auto 20px auto;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 10; cursor: pointer; border-radius: var(--radius-md); transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='rgba(14, 165, 233, 0.04)'" onmouseout="this.style.backgroundColor='transparent'"></div>
                <div class="map-container" style="border-radius: var(--radius-md); overflow: hidden; border: 4px solid var(--bg-white); box-shadow: var(--shadow-lg); height: 400px; position: relative; z-index: 1;">
                    <iframe src="https://maps.google.com/maps?q=Shami%20Computer%20Care,Farooqabad&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </a>
            
            <a href="https://www.google.com/maps/place/Shami+Computer+Care/@31.7544355,73.8173093,13z/data=!4m6!3m5!1s0x3918bfb41d6aaa1f:0x16338d2fa58e77e3!8m2!3d31.7414756!4d73.8287892!16s%2Fg%2F11vf3s9gkg" target="_blank" class="btn btn-outline" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 30px;">
                <i class="fa-solid fa-map-location-dot"></i> Get Directions on Google Maps
            </a>
        </div>
    </section>

    <!-- Page Javascript for Product Tab switching -->
    <script>
        // Tab switching logic
        function switchTab(evt, tabName) {
            // Get all elements with class="tab-content" and hide them
            const tabContents = document.getElementsByClassName("tab-content");
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove("active");
            }

            // Get all elements with class="tab-btn" and remove the class "active"
            const tabBtns = document.getElementsByClassName("tab-btn");
            for (let i = 0; i < tabBtns.length; i++) {
                tabBtns[i].classList.remove("active");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).classList.add("active");
            evt.currentTarget.classList.add("active");
        }
    </script>
@endsection
