@extends('layouts.app')

@section('title', 'Our Blog & Technology Guide - Shami Computer Care & CCTV Cameras')

@section('content')

    <!-- Blog Header -->
    <section class="hero" style="padding-top: 150px; padding-bottom: 50px; text-align: center;">
        <div class="container">
            <span class="badge">Shami Knowledge Base</span>
            <h1 style="font-size: 3rem; margin-bottom: 10px;">Our Blog & Tech Updates</h1>
            <p class="max-w-600" style="color: var(--text-muted);">Expert buying guides, IT accessories maintenance tips, and professional security system deployment strategies.</p>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="blog-section section-padding" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color);">
        <div class="container">
            <div class="grid grid-3">
                <!-- Blog 1: CCTV -->
                <div class="blog-card">
                    <div class="blog-img-box">
                        <img src="/images/blog-cctv.webp" alt="Commercial CCTV surveillance guide" onerror="this.src='https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=400&q=80'">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta-info">
                            <span><i class="fa-solid fa-tag" style="color: var(--primary-color);"></i> CCTV Cameras</span>
                            <span><i class="fa-solid fa-calendar"></i> July 10, 2026</span>
                        </div>
                        <h3 class="blog-title"><a href="#">Top 5 Security Standards for Office CCTV Installations</a></h3>
                        <p class="blog-excerpt">Planning a business security grid? Learn the essential rules for NVR placement, camera height optimization, remote app access, and multi-user privilege settings.</p>
                        <a href="#" class="service-link" style="font-size: 0.85rem;">Read Full Guide <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Blog 2: Cables -->
                <div class="blog-card">
                    <div class="blog-img-box">
                        <img src="/images/blog-network.webp" alt="Networking Ethernet cables guide" onerror="this.src='https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=400&q=80'">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta-info">
                            <span><i class="fa-solid fa-tag" style="color: var(--primary-color);"></i> Networking</span>
                            <span><i class="fa-solid fa-calendar"></i> June 28, 2026</span>
                        </div>
                        <h3 class="blog-title"><a href="#">Choosing Networking Wires: CAT6 vs CAT6A vs Fiber Optics</a></h3>
                        <p class="blog-excerpt">Which ethernet cable is best for building projects and data transfer? Compare signal loss, structural cabling noise shielding, and bandwidth capacities in detail.</p>
                        <a href="#" class="service-link" style="font-size: 0.85rem;">Read Full Guide <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Blog 3: SSD Upgrade -->
                <div class="blog-card">
                    <div class="blog-img-box">
                        <img src="/images/blog-ssd.webp" alt="Laptop hard drive ssd upgrades" onerror="this.src='https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=400&q=80'">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta-info">
                            <span><i class="fa-solid fa-tag" style="color: var(--primary-color);"></i> Laptop Care</span>
                            <span><i class="fa-solid fa-calendar"></i> June 15, 2026</span>
                        </div>
                        <h3 class="blog-title"><a href="#">SSD vs HDD: Why Upgrade Your Office Computers Today</a></h3>
                        <p class="blog-excerpt">Slow boot speeds? Applications freezing? Discover why solid-state drives (SSDs) are the single most budget-friendly upgrade to boost laptop productivity by 10x.</p>
                        <a href="#" class="service-link" style="font-size: 0.85rem;">Read Full Guide <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
