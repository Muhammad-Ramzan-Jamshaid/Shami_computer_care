@extends('layouts.app')

@section('content')
<style>
    .shop-sub-nav-item {
        position: relative;
    }
    .shop-sub-dropdown {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%) translateY(10px);
        background-color: var(--bg-white);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-sm);
        box-shadow: var(--shadow-lg);
        min-width: 190px;
        padding: 8px 0;
        opacity: 0;
        pointer-events: none;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1002;
        text-align: left;
    }
    .shop-sub-nav-item:hover .shop-sub-dropdown {
        opacity: 1;
        pointer-events: auto;
        transform: translateX(-50%) translateY(0);
    }
    .shop-sub-dropdown-link {
        display: block;
        padding: 8px 20px;
        font-size: 0.85rem;
        color: var(--text-color);
        text-decoration: none;
        transition: var(--transition-smooth);
        font-family: var(--font-body);
        font-weight: 550;
    }
    .shop-sub-dropdown-link:hover {
        background-color: rgba(14, 165, 233, 0.05);
        color: var(--primary-color);
    }
    .shop-hero-banner {
        background: linear-gradient(135deg, var(--secondary-color) 0%, #1e293b 100%);
        color: var(--bg-white);
        padding: 45px 0;
        position: relative;
        overflow: hidden;
    }
    .shop-hero-banner::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 350px;
        height: 100%;
        background: radial-gradient(circle, rgba(14, 165, 233, 0.15) 0%, transparent 70%);
        pointer-events: none;
    }
    .shop-layout {
        display: grid;
        grid-template-columns: 240px 1fr;
        gap: 30px;
        margin-top: 40px;
    }
    .category-sidebar {
        background: var(--bg-white);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        padding: 25px;
        height: fit-content;
        position: sticky;
        top: 155px;
    }
    .category-sidebar-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        color: var(--text-color);
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 550;
        transition: var(--transition-smooth);
        border-bottom: 1px solid rgba(226, 232, 240, 0.5);
    }
    .category-sidebar-link:hover, .category-sidebar-link.active {
        color: var(--primary-color);
        padding-left: 5px;
    }
    @media (max-width: 900px) {
        .shop-layout {
            grid-template-columns: 1fr;
        }
        .category-sidebar {
            display: none;
        }
    }
</style>

<!-- Shop Sub-Navbar Category Menu -->
<div class="shop-sub-navbar" style="background-color: var(--bg-white); border-bottom: 1px solid var(--border-color); position: sticky; top: 80px; z-index: 999; box-shadow: var(--shadow-sm); overflow: visible;">
    <div class="container" style="display: flex; align-items: center; justify-content: space-between; gap: 20px; overflow-x: auto; white-space: nowrap; padding: 0 20px; height: 60px;">
        <ul style="display: flex; gap: 25px; list-style: none; padding: 0; margin: 0; align-items: center;">
            <li style="position: relative;">
                <a href="{{ route('shop.index') }}" style="font-family: var(--font-heading); font-size: 0.9rem; font-weight: 700; color: {{ !$currentCategory ? 'var(--primary-color)' : 'var(--text-color)' }}; text-decoration: none; padding: 18px 0; display: inline-block;">All Products</a>
            </li>
            @foreach($categories as $cat)
                <li class="shop-sub-nav-item" style="display: inline-block;">
                    @if($cat->children->isNotEmpty())
                        <span class="shop-sub-nav-link" style="font-family: var(--font-heading); font-size: 0.9rem; font-weight: 600; color: {{ $currentCategory && ($currentCategory->id == $cat->id || $currentCategory->parent_id == $cat->id) ? 'var(--primary-color)' : 'var(--text-color)' }}; cursor: pointer; padding: 18px 0; display: flex; align-items: center; gap: 4px;">
                            {{ $cat->name }} <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem;"></i>
                        </span>
                        <!-- Sub-dropdown -->
                        <div class="shop-sub-dropdown">
                            <a href="{{ route('shop.category', $cat->slug) }}" class="shop-sub-dropdown-link" style="font-weight: 700; border-bottom: 1px solid var(--border-color); color: var(--secondary-color);">All {{ $cat->name }}</a>
                            @foreach($cat->children as $child)
                                <a href="{{ route('shop.category', $child->slug) }}" class="shop-sub-dropdown-link" style="color: {{ $currentCategory && $currentCategory->id == $child->id ? 'var(--primary-color)' : 'var(--text-color)' }};">{{ $child->name }}</a>
                            @endforeach
                        </div>
                    @else
                        <a href="{{ route('shop.category', $cat->slug) }}" style="font-family: var(--font-heading); font-size: 0.9rem; font-weight: 600; color: {{ $currentCategory && $currentCategory->id == $cat->id ? 'var(--primary-color)' : 'var(--text-color)' }}; text-decoration: none; padding: 18px 0; display: inline-block;">
                            {{ $cat->name }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>

        <!-- Fast Search -->
        <form action="{{ route('shop.index') }}" method="GET" style="display: flex; align-items: center; margin: 0; gap: 5px;">
            <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}" style="border: 1px solid var(--border-color); padding: 8px 15px; border-radius: var(--radius-sm); font-size: 0.85rem; font-family: var(--font-body); width: 200px;">
            <button type="submit" class="btn btn-primary btn-sm" style="padding: 8px 12px;"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</div>

<!-- Shop Banner -->
<div class="shop-hero-banner">
    <div class="container text-center">
        <span class="badge" style="color: var(--primary-color);">Shami Hardware Hub</span>
        <h1 style="font-family: var(--font-heading); font-weight: 800; font-size: 2.2rem; margin-top: 5px; margin-bottom: 10px;">
            @if($currentCategory)
                {{ $currentCategory->name }}
            @else
                Computers, Cables & Accessories Shop
            @endif
        </h1>
        <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.95rem; max-width: 600px; margin: 0 auto;">Select from premium brand products, converters, high-speed cables, and storage devices. Order directly via WhatsApp invoice generation.</p>
    </div>
</div>

<!-- Shop Catalog Content -->
<section class="shop-content-section" style="padding-bottom: 80px;">
    <div class="container">
        
        <div class="shop-layout">
            
            <!-- Category Sidebar -->
            <aside class="category-sidebar">
                <h4 style="font-family: var(--font-heading); font-size: 1.05rem; color: var(--secondary-color); font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid var(--primary-color); padding-bottom: 8px;">Categories</h4>
                <div style="display: flex; flex-direction: column; gap: 5px;">
                    <a href="{{ route('shop.index') }}" class="category-sidebar-link {{ !$currentCategory ? 'active' : '' }}">
                        <span>All Categories</span>
                        <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i>
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('shop.category', $cat->slug) }}" class="category-sidebar-link {{ $currentCategory && ($currentCategory->id == $cat->id || $currentCategory->parent_id == $cat->id) ? 'active' : '' }}">
                            <span>{{ $cat->name }}</span>
                            <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i>
                        </a>
                    @endforeach
                </div>
            </aside>

            <!-- Products Catalog Grid -->
            <div>
                <!-- Catalog Header -->
                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border-color); padding-bottom: 15px; margin-bottom: 30px; flex-wrap: wrap; gap: 15px;">
                    <div style="font-size: 0.9rem; color: var(--text-muted); font-weight: 550;">
                        Showing {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} Products
                    </div>
                    
                    @if(request('search'))
                        <div style="font-size: 0.9rem; color: var(--text-color);">
                            Search result for: "<strong>{{ request('search') }}</strong>" | <a href="{{ route('shop.index') }}" style="color: var(--primary-color); font-weight: 600; text-decoration: none;">Clear Filter</a>
                        </div>
                    @endif
                </div>

                <!-- Product Cards Grid -->
                <div class="grid grid-3" style="gap: 30px;">
                    @forelse($products as $p)
                        @php
                            $fallbackUrl = 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=500&q=80'; // Laptop fallback
                            $catLower = Str::lower($p->category->name);
                            if (Str::contains($catLower, 'cable') || Str::contains($catLower, 'wire')) {
                                $fallbackUrl = 'https://images.unsplash.com/photo-1601524909162-be87252be298?auto=format&fit=crop&w=500&q=80'; // Cable
                            } elseif (Str::contains($catLower, 'usb') || Str::contains($catLower, 'storage')) {
                                $fallbackUrl = 'https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?auto=format&fit=crop&w=500&q=80'; // USB
                            } elseif (Str::contains($catLower, 'speaker') || Str::contains($catLower, 'sound')) {
                                $fallbackUrl = 'https://images.unsplash.com/photo-1545454675-3531b543be5d?auto=format&fit=crop&w=500&q=80'; // Speaker
                            } elseif (Str::contains($catLower, 'converter') || Str::contains($catLower, 'adapter')) {
                                $fallbackUrl = 'https://images.unsplash.com/photo-1591488320449-011701bb6704?auto=format&fit=crop&w=500&q=80'; // Converter
                            } elseif (Str::contains($catLower, 'charger') || Str::contains($catLower, 'power')) {
                                $fallbackUrl = 'https://images.unsplash.com/photo-1583863788434-e58a36330cf0?auto=format&fit=crop&w=500&q=80'; // Charger
                            } elseif (Str::contains($catLower, 'keyboard')) {
                                $fallbackUrl = 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=500&q=80'; // Keyboard
                            } elseif (Str::contains($catLower, 'mouse')) {
                                $fallbackUrl = 'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?auto=format&fit=crop&w=500&q=80'; // Mouse
                            } elseif (Str::contains($catLower, 'headphone')) {
                                $fallbackUrl = 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=500&q=80'; // Headphones
                            }
                        @endphp
                        <div class="product-card" style="box-shadow: var(--shadow-sm); border: 1px solid var(--border-color); border-radius: var(--radius-md); overflow: hidden; background: var(--bg-white); transition: var(--transition-smooth);" onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='var(--shadow-lg)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)';">
                            <div class="product-img-box" style="height: 180px; overflow: hidden; background-color: var(--bg-light); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; justify-content: center; position: relative;">
                                <span class="product-badge" style="position: absolute; top: 12px; left: 12px; font-size: 0.7rem; background: var(--secondary-color); color: var(--bg-white); padding: 4px 10px; border-radius: var(--radius-sm); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">{{ $p->category->name }}</span>
                                <img src="{{ $p->image_path ? asset($p->image_path) : $fallbackUrl }}" alt="{{ $p->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="product-info" style="padding: 20px;">
                                <h3 class="product-title" style="font-family: var(--font-heading); font-size: 1rem; color: var(--secondary-color); font-weight: 750; margin-bottom: 8px; line-height: 1.4; height: 42px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $p->name }}</h3>
                                <p style="font-size: 0.8rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 20px; height: 50px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $p->description }}</p>
                                
                                <div class="product-footer flex-between" style="border-top: 1px solid var(--border-color); padding-top: 15px; display: flex; justify-content: space-between; align-items: center;">
                                    <div class="product-price" style="font-size: 1.15rem; font-weight: 800; color: var(--primary-color);">Rs. {{ number_format($p->price) }}</div>
                                    <button class="btn btn-primary btn-sm btn-buy" onclick="openInvoice('{{ addslashes($p->name) }}', '{{ addslashes($p->category->name) }}')" style="padding: 8px 12px; font-size: 0.8rem; display: flex; align-items: center; gap: 6px;" title="Order via WhatsApp">
                                        <i class="fa-solid fa-cart-shopping"></i> Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div style="grid-column: 1 / -1; text-align: center; padding: 60px 0; color: var(--text-muted);">
                            <i class="fa-solid fa-circle-info" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 15px; display: block;"></i>
                            <h3 style="font-family: var(--font-heading); font-size: 1.2rem; color: var(--secondary-color); font-weight: 700; margin-bottom: 5px;">No Products Found</h3>
                            <p style="font-size: 0.85rem;">Try adjusting search terms or checking another sub-category.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div style="margin-top: 40px; display: flex; justify-content: center;">
                    {{ $products->links() }}
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Inquiry Invoice Modal (Popup Overlay) -->
<div id="invoiceModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 3000; align-items: center; justify-content: center; padding: 20px;">
    <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); box-shadow: var(--shadow-xl); width: 100%; max-width: 500px; padding: 30px; position: relative; animation: float 0.3s ease;">
        <button onclick="closeInvoice()" style="position: absolute; top: 20px; right: 20px; background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--text-muted);"><i class="fa-solid fa-xmark"></i></button>
        
        <div style="border-bottom: 2px dashed var(--border-color); padding-bottom: 15px; margin-bottom: 20px; text-align: center;">
            <div style="font-family: var(--font-heading); font-weight: 800; font-size: 1.25rem; color: var(--secondary-color); margin-bottom: 5px;">
                <i class="fa-solid fa-file-invoice" style="color: var(--primary-color); margin-right: 5px;"></i> INQUIRY INVOICE
            </div>
            <p style="font-size: 0.8rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase;">Shami Computer Care & CCTV</p>
            <p id="invoiceDate" style="font-size: 0.75rem; color: var(--text-muted); margin-top: 5px;"></p>
        </div>
        
        <form id="purchaseInquiryForm" onsubmit="submitInvoice(event)">
            <div style="font-size: 0.9rem; color: var(--text-color); margin-bottom: 20px; line-height: 1.8;">
                <p style="margin-bottom: 8px;"><strong>Selected Item:</strong> <span id="invItemName" style="color: var(--primary-color); font-weight: 700;"></span></p>
                <p style="margin-bottom: 8px;"><strong>Category:</strong> <span id="invItemCategory" style="font-weight: 600;"></span></p>
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label for="custName" style="font-weight: 600; display: block; margin-bottom: 5px; font-size: 0.85rem;">Your Name</label>
                <input type="text" id="custName" class="form-control" placeholder="e.g. Hammad Khan" required style="width: 100%; height: 38px; font-size: 0.85rem;">
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label for="custPhone" style="font-weight: 600; display: block; margin-bottom: 5px; font-size: 0.85rem;">Phone Number</label>
                <input type="tel" id="custPhone" class="form-control" placeholder="e.g. 03217654321" required style="width: 100%; height: 38px; font-size: 0.85rem;">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="custMessage" style="font-weight: 600; display: block; margin-bottom: 5px; font-size: 0.85rem;">Quantity & Custom Details</label>
                <textarea id="custMessage" class="form-control" rows="3" placeholder="e.g. I need 2 units of this item..." required style="width: 100%; font-size: 0.85rem;"></textarea>
            </div>
            
            <div style="border-top: 1px solid var(--border-color); padding-top: 20px; display: flex; gap: 10px;">
                <button type="button" onclick="closeInvoice()" class="btn btn-outline" style="flex: 1; padding: 10px 0;">Cancel</button>
                <button type="submit" class="btn btn-primary" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 0;">
                    <i class="fa-brands fa-whatsapp" style="font-size: 1.1rem;"></i> Send Order
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Custom Toast Alert Popups -->
<div class="toast-alert" id="shopToast">
    <div class="badge-icon" style="background-color: var(--primary-hover); color: var(--bg-white);">
        <i class="fa-solid fa-circle-check"></i>
    </div>
    <div>
        <h4 style="color: var(--bg-white); font-size: 0.95rem; margin-bottom: 2px;">Order Invoice Generated!</h4>
        <p style="color: #94a3b8; font-size: 0.8rem;">Opening WhatsApp support chat...</p>
    </div>
</div>

<script>
    let activeItem = {};

    function openInvoice(itemName, itemCategory) {
        activeItem = { name: itemName, category: itemCategory };
        document.getElementById('invItemName').innerText = itemName;
        document.getElementById('invItemCategory').innerText = itemCategory;
        
        const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
        document.getElementById('invoiceDate').innerText = new Date().toLocaleDateString('en-US', options);
        
        document.getElementById('invoiceModal').style.display = 'flex';
    }

    function closeInvoice() {
        document.getElementById('invoiceModal').style.display = 'none';
        document.getElementById('purchaseInquiryForm').reset();
    }

    function submitInvoice(event) {
        event.preventDefault();
        
        const custName = document.getElementById('custName').value;
        const custPhone = document.getElementById('custPhone').value;
        const custMessage = document.getElementById('custMessage').value;
        
        // Generate WhatsApp template string
        const textMessage = 
`🛒 *NEW SHOP ORDER INVOICE - SHAMI COMPUTER CARE*
----------------------------------------
*Product Name:* ${activeItem.name}
*Category:* ${activeItem.category}

*Customer Details:*
*Name:* ${custName}
*Phone:* ${custPhone}

*Order Instructions / Quantity:*
${custMessage}
----------------------------------------
_Generated via Shami Computer Care & CCTV Shop Page_`;

        const businessPhone = "923064565908"; 
        const waUrl = `https://wa.me/${businessPhone}?text=${encodeURIComponent(textMessage)}`;
        
        // Redirect to WhatsApp
        window.open(waUrl, '_blank');
        
        // Close modal
        closeInvoice();
        
        // Display toast alert
        const toast = document.getElementById('shopToast');
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 4000);
    }
</script>
@endsection
