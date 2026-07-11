@extends('layouts.app')

@section('title', 'Shami Computer Care & CCTV Cameras - Laptops, Accessories & CCTV Installation')

@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container grid grid-2 hero-grid">
            <div class="hero-content">
                <span class="badge">Welcome to Shami Computer Care</span>
                <h1>Empowering Your Business with IT & CCTV Security</h1>
                <p>We are your all-in-one destination for premium laptops, computer peripherals, cables, and storage. In addition, we deliver top-tier commercial CCTV installation, building network projects, and government authority contracting.</p>
                <div class="hero-actions">
                    <a href="#products" class="btn btn-primary">Explore Products</a>
                    <a href="#services" class="btn btn-outline">Our Services</a>
                </div>
            </div>
            <div class="hero-visuals">
                <!-- Using a beautifully generated image placeholder -->
                <img src="/images/hero-showcase.webp" alt="Shami IT & CCTV Showcase" class="hero-main-img" id="heroImage" onerror="this.src='https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=600&q=80'">
                
                <!-- Floating Badges -->
                <div class="floating-badge badge-1">
                    <div class="badge-icon">
                        <i class="fa-solid fa-camera"></i>
                    </div>
                    <div class="badge-text">
                        <h4>CCTV Projects</h4>
                        <p>100% Certified Installers</p>
                    </div>
                </div>
                
                <div class="floating-badge badge-2">
                    <div class="badge-icon">
                        <i class="fa-solid fa-laptop"></i>
                    </div>
                    <div class="badge-text">
                        <h4>Premium Hardware</h4>
                        <p>Dell, HP, ASUS & Apple</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                <span class="badge" style="background-color: rgba(14, 165, 233, 0.15); color: var(--primary-color);">Why Choose Shami</span>
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

    <!-- Inquiry and Contact Form -->
    <section class="inquiry-section section-padding" id="inquiry">
        <div class="container grid grid-2">
            <div>
                <span class="badge">Inquire Today</span>
                <h2>Let's Discuss Your Project Requirements</h2>
                <p style="margin-bottom: 40px; max-width: 500px;">Have a custom setup requirement? Want a corporate price quote for bulk accessories, wire installations, or security system configurations? Drop us your details, and our technical expert will get back to you within 24 hours.</p>
                
                <div class="contact-info-list">
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fa-solid fa-envelope"></i></div>
                        <div class="contact-info-text">
                            <h4>Email Us</h4>
                            <p>support@shamipccctv.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fa-solid fa-phone"></i></div>
                        <div class="contact-info-text">
                            <h4>Phone Hotline</h4>
                            <p>+92 306 4565908</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fa-solid fa-building"></i></div>
                        <div class="contact-info-text">
                            <h4>Government Contracting Desk</h4>
                            <p>tenders@shamipccctv.com</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Inquiry Card Form -->
            <div class="inquiry-form-card">
                <form id="projectInquiryForm" onsubmit="handleInquirySubmit(event)">
                    <div class="form-group-grid">
                        <div class="form-group">
                            <label for="fullName">Your Name</label>
                            <input type="text" id="fullName" class="form-control" placeholder="e.g. Asif Ali" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="tel" id="phoneNumber" class="form-control" placeholder="e.g. 03001234567" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input type="email" id="emailAddress" class="form-control" placeholder="e.g. name@company.com" required>
                    </div>

                    <div class="form-group">
                        <label for="inquiryType">Inquiry Type</label>
                        <select id="inquiryType" class="form-control" required>
                            <option value="" disabled selected>Select service requirements</option>
                            <option value="CCTV Installation">CCTV Camera Installation</option>
                            <option value="Building Network">Building Infrastructure Networking</option>
                            <option value="Laptop Purchase">Laptops & Computer Hardware Purchase</option>
                            <option value="Government Authority Supply">Government Supply & Contracting</option>
                            <option value="Accessories Inquiry">Accessories & Cables Bulk Purchase</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="messageText">Project Description / Details</label>
                        <textarea id="messageText" class="form-control" rows="4" placeholder="Briefly describe your requirements..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-full">Submit Request</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Custom Toast Alert Popups -->
    <div class="toast-alert" id="inquiryToast">
        <div class="badge-icon" style="background-color: var(--primary-hover); color: var(--bg-white);">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div>
            <h4 style="color: var(--bg-white); font-size: 0.95rem; margin-bottom: 2px;">Inquiry Sent Successfully!</h4>
            <p style="color: #94a3b8; font-size: 0.8rem;">Shami Team will contact you shortly.</p>
        </div>
    </div>

    <!-- Page Javascript for Product Tab switching and Custom inquiry triggers -->
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

        // Form submission animation and popup toast
        function handleInquirySubmit(event) {
            event.preventDefault();
            
            // Get values (for display verification/processing simulation)
            const name = document.getElementById('fullName').value;
            const phone = document.getElementById('phoneNumber').value;
            const service = document.getElementById('inquiryType').value;
            
            console.log(`Submitting Inquiry from: ${name}, Phone: ${phone}, Service: ${service}`);
            
            // Trigger beautiful Toast notification
            const toast = document.getElementById('inquiryToast');
            toast.classList.add('show');
            
            // Reset form
            document.getElementById('projectInquiryForm').reset();
            
            // Dismiss toast after 4 seconds
            setTimeout(() => {
                toast.classList.remove('show');
            }, 4000);
        }
    </script>

@endsection
