@extends('layouts.app')

@section('title', 'Shop Computers, Laptops & Accessories - Shami Computer Care')

@section('content')
<style>
    .shop-category-dropdown-wrap {
        position: relative;
        display: inline-block;
    }
    .shop-category-btn {
        background-color: var(--secondary-color);
        color: var(--bg-white);
        border: none;
        padding: 10px 20px;
        border-radius: var(--radius-sm);
        font-family: var(--font-heading);
        font-weight: 700;
        font-size: 0.9rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: var(--transition-smooth);
    }
    .shop-category-btn:hover {
        background-color: var(--primary-color);
    }
    .shop-main-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        margin-top: 8px;
        background: var(--bg-white);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-xl);
        min-width: 250px;
        max-height: 420px;
        overflow-y: auto;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.25s ease;
        z-index: 1050;
        padding: 8px 0;
    }
    .shop-category-dropdown-wrap:hover .shop-main-dropdown,
    .shop-category-dropdown-wrap:focus-within .shop-main-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    .shop-cat-item {
        position: relative;
    }
    .shop-cat-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        color: var(--secondary-color);
        text-decoration: none;
        font-family: var(--font-heading);
        font-weight: 600;
        font-size: 0.88rem;
        transition: background 0.2s, color 0.2s;
    }
    .shop-cat-link:hover {
        background-color: rgba(14, 165, 233, 0.08);
        color: var(--primary-color);
    }
    .shop-sub-cat-menu {
        display: none;
        background-color: #f8fafc;
        border-top: 1px solid #f1f5f9;
        border-bottom: 1px solid #f1f5f9;
        padding: 4px 0;
    }
    .shop-cat-item:hover .shop-sub-cat-menu {
        display: block;
    }
    .shop-sub-cat-link {
        display: block;
        padding: 7px 20px 7px 35px;
        font-size: 0.82rem;
        color: var(--text-color);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
    }
    .shop-sub-cat-link:hover {
        color: var(--primary-color);
    }
    .shop-hero-banner {
        background: linear-gradient(135deg, var(--secondary-color) 0%, #1e293b 100%);
        color: var(--bg-white);
        padding: 40px 0;
        position: relative;
        overflow: hidden;
    }
    .shop-layout-full {
        width: 100%;
        margin-top: 35px;
    }
    .admin-shop-bar {
        background: #f1f5f9;
        border: 1px dashed var(--primary-color);
        border-radius: var(--radius-sm);
        padding: 12px 20px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>

<!-- Shop Sub-Navbar Header with Single Category Dropdown and Search -->
<div class="shop-sub-navbar" style="background-color: var(--bg-white); border-bottom: 1px solid var(--border-color); position: sticky; top: 80px; z-index: 999; box-shadow: var(--shadow-sm);">
    <div class="container" style="display: flex; align-items: center; justify-content: space-between; gap: 20px; padding: 12px 20px;">
        
        <!-- Single Categories Dropdown Menu -->
        <div class="shop-category-dropdown-wrap">
            <button class="shop-category-btn" type="button">
                <i class="fa-solid fa-list-ul"></i> Categories <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem; margin-left: 5px;"></i>
            </button>
            <div class="shop-main-dropdown">
                <a href="{{ route('shop.index') }}" class="shop-cat-link" style="border-bottom: 1px solid var(--border-color); font-weight: 700; color: var(--primary-color);">
                    <span><i class="fa-solid fa-border-all" style="margin-right: 8px;"></i> All Products</span>
                </a>

                @foreach($categories as $cat)
                    <div class="shop-cat-item">
                        <a href="{{ route('shop.category', $cat->slug) }}" class="shop-cat-link {{ $currentCategory && ($currentCategory->id == $cat->id || $currentCategory->parent_id == $cat->id) ? 'active' : '' }}">
                            <span>{{ $cat->name }}</span>
                            @if($cat->children->isNotEmpty())
                                <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; color: var(--text-muted);"></i>
                            @endif
                        </a>

                        @if($cat->children->isNotEmpty())
                            <div class="shop-sub-cat-menu">
                                <a href="{{ route('shop.category', $cat->slug) }}" class="shop-sub-cat-link" style="font-weight: 700; color: var(--secondary-color);">
                                    All {{ $cat->name }}
                                </a>
                                @foreach($cat->children as $child)
                                    <a href="{{ route('shop.category', $child->slug) }}" class="shop-sub-cat-link {{ $currentCategory && $currentCategory->id == $child->id ? 'active' : '' }}">
                                        • {{ $child->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Fast Search Bar -->
        <form action="{{ route('shop.index') }}" method="GET" style="display: flex; align-items: center; margin: 0; gap: 8px; flex: 1; max-width: 450px;">
            <input type="text" name="search" placeholder="Search products by title or specs..." value="{{ request('search') }}" style="border: 1px solid var(--border-color); padding: 10px 16px; border-radius: var(--radius-sm); font-size: 0.88rem; font-family: var(--font-body); width: 100%;">
            <button type="submit" class="btn btn-primary" style="padding: 10px 18px; white-space: nowrap;"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
        </form>

    </div>
</div>

<!-- Shop Banner -->
<div class="shop-hero-banner">
    <div class="container text-center">
        <span class="badge" style="color: #38bdf8;">Shami Hardware Store</span>
        <h1 style="font-family: var(--font-heading); font-weight: 800; font-size: 2.1rem; margin-top: 5px; margin-bottom: 10px; color: #ffffff !important; text-shadow: 0 2px 10px rgba(0,0,0,0.5);">
            @if($currentCategory)
                Category: {{ $currentCategory->name }}
            @else
                Computers, Cables & Accessories Shop
            @endif
        </h1>
        <p style="color: rgba(255, 255, 255, 0.9); font-size: 0.95rem; max-width: 600px; margin: 0 auto;">Select from premium brand products, converters, high-speed cables, and storage devices. Order directly via WhatsApp invoice generation.</p>
    </div>
</div>

<!-- Shop Catalog Content (Full Width - Sidebar Removed) -->
<section class="shop-content-section" style="padding-bottom: 80px;">
    <div class="container">
        
        <div class="shop-layout-full">

            <!-- Admin Floating Control Banner (Visible ONLY when Admin is logged in) -->
            @if(session()->has('admin_logged_in'))
                <div class="admin-shop-bar">
                    <div style="font-weight: 700; color: var(--secondary-color); font-size: 0.9rem;">
                        <i class="fa-solid fa-user-shield" style="color: var(--primary-color); margin-right: 6px;"></i> Admin Control Active: You can edit or delete products directly from this catalog.
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm" style="font-weight: 700;">
                            <i class="fa-solid fa-plus-circle"></i> + Add New Product
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline btn-sm">
                            <i class="fa-solid fa-list-check"></i> Manage in Dashboard
                        </a>
                    </div>
                </div>
            @endif
            
            <!-- Catalog Header -->
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border-color); padding-bottom: 15px; margin-bottom: 30px; flex-wrap: wrap; gap: 15px;">
                <div style="font-size: 0.9rem; color: var(--text-muted); font-weight: 550;">
                    Showing {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} Products
                </div>
                
                @if(request('search'))
                    <div style="font-size: 0.9rem; color: var(--text-color);">
                        Search result for: "<strong>{{ request('search') }}</strong>" | <a href="{{ route('shop.index') }}" style="color: var(--primary-color); font-weight: 600; text-decoration: none;">Clear Search Filter</a>
                    </div>
                @endif
            </div>

            <!-- Product Cards Grid (3 Columns Full Width) -->
            <div class="grid grid-3" style="gap: 30px;">
                @forelse($products as $p)
                    @php
                        $fallbackUrl = 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=500&q=80'; // Laptop fallback
                        $catLower = Str::lower($p->category->name);
                        if (Str::contains($catLower, 'cable') || Str::contains($catLower, 'wire')) {
                            $fallbackUrl = 'https://images.unsplash.com/photo-1601524909162-be87252be298?auto=format&fit=crop&w=500&q=80';
                        } elseif (Str::contains($catLower, 'usb') || Str::contains($catLower, 'storage')) {
                            $fallbackUrl = 'https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?auto=format&fit=crop&w=500&q=80';
                        } elseif (Str::contains($catLower, 'speaker') || Str::contains($catLower, 'sound')) {
                            $fallbackUrl = 'https://images.unsplash.com/photo-1545454675-3531b543be5d?auto=format&fit=crop&w=500&q=80';
                        } elseif (Str::contains($catLower, 'converter') || Str::contains($catLower, 'adapter')) {
                            $fallbackUrl = 'https://images.unsplash.com/photo-1591488320449-011701bb6704?auto=format&fit=crop&w=500&q=80';
                        } elseif (Str::contains($catLower, 'charger') || Str::contains($catLower, 'power')) {
                            $fallbackUrl = 'https://images.unsplash.com/photo-1583863788434-e58a36330cf0?auto=format&fit=crop&w=500&q=80';
                        } elseif (Str::contains($catLower, 'keyboard')) {
                            $fallbackUrl = 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=500&q=80';
                        } elseif (Str::contains($catLower, 'mouse')) {
                            $fallbackUrl = 'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?auto=format&fit=crop&w=500&q=80';
                        } elseif (Str::contains($catLower, 'headphone')) {
                            $fallbackUrl = 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=500&q=80';
                        }
                    @endphp
                    <div class="product-card" style="box-shadow: var(--shadow-sm); border: 1px solid var(--border-color); border-radius: var(--radius-md); overflow: hidden; background: var(--bg-white); transition: var(--transition-smooth); display: flex; flex-direction: column;" onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='var(--shadow-lg)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)';">
                        
                        <div class="product-img-box" style="height: 200px; overflow: hidden; background-color: var(--bg-light); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; justify-content: center; position: relative;">
                            <span class="product-badge" style="position: absolute; top: 12px; left: 12px; font-size: 0.7rem; background: var(--secondary-color); color: var(--bg-white); padding: 4px 10px; border-radius: var(--radius-sm); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">{{ $p->category->name }}</span>
                            <img src="{{ $p->image_path ? asset($p->image_path) : $fallbackUrl }}" alt="{{ $p->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>

                        <div class="product-info" style="padding: 20px; flex: 1; display: flex; flex-direction: column;">
                            <h3 class="product-title" style="font-family: var(--font-heading); font-size: 1.05rem; color: var(--secondary-color); font-weight: 750; margin-bottom: 8px; line-height: 1.4; height: 42px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $p->name }}</h3>
                            <p style="font-size: 0.82rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 20px; height: 50px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $p->description }}</p>
                            
                            <div class="product-footer flex-between" style="border-top: 1px solid var(--border-color); padding-top: 15px; margin-top: auto; display: flex; justify-content: space-between; align-items: center;">
                                <div class="product-price" style="font-size: 1.2rem; font-weight: 800; color: var(--primary-color);">Rs. {{ number_format($p->price) }}</div>
                                <button class="btn btn-primary btn-sm btn-buy" onclick="openInvoice('{{ addslashes($p->name) }}', '{{ addslashes($p->category->name) }}')" style="padding: 8px 14px; font-size: 0.8rem; display: flex; align-items: center; gap: 6px;" title="Order via WhatsApp">
                                    <i class="fa-solid fa-cart-shopping"></i> Order
                                </button>
                            </div>

                            <!-- Admin Quick Action Toolbar on Each Card (Visible ONLY for Logged-In Admin) -->
                            @if(session()->has('admin_logged_in'))
                                <div style="margin-top: 15px; padding-top: 12px; border-top: 1px dashed var(--border-color); display: flex; align-items: center; justify-content: space-between; background: #f8fafc; margin-left: -20px; margin-right: -20px; margin-bottom: -20px; padding: 10px 20px;">
                                    <span style="font-size: 0.72rem; font-weight: 800; color: #64748b; text-transform: uppercase;"><i class="fa-solid fa-user-gear"></i> Admin:</span>
                                    <div style="display: flex; gap: 6px;">
                                        <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-sm" style="background-color: var(--primary-color); color: #fff; padding: 4px 10px; font-size: 0.75rem; font-weight: 700;">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.products.delete', $p->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            <button type="submit" class="btn btn-sm" style="background-color: #ef4444; color: #fff; padding: 4px 10px; font-size: 0.75rem; font-weight: 700; border: none;">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 60px 0; color: var(--text-muted); background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                        <i class="fa-solid fa-circle-info" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 15px; display: block;"></i>
                        <h3 style="font-family: var(--font-heading); font-size: 1.2rem; color: var(--secondary-color); font-weight: 700; margin-bottom: 5px;">No Products Found</h3>
                        <p style="font-size: 0.85rem;">Try adjusting search terms or checking another category.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div style="margin-top: 40px; display: flex; justify-content: center;">
                {{ $products->links() }}
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
        const custMessage = document.getElementById('custMessage').value;
        
        const textMessage = 
`🛒 *NEW SHOP ORDER INVOICE - SHAMI COMPUTER CARE*
----------------------------------------
*Product Name:* ${activeItem.name}
*Category:* ${activeItem.category}

*Customer Details:*
*Name:* ${custName}

*Order Instructions / Quantity:*
${custMessage}
----------------------------------------
_Generated via Shami Computer Care & CCTV Shop Page_`;

        const businessPhone = "923064565908"; 
        const waUrl = `https://wa.me/${businessPhone}?text=${encodeURIComponent(textMessage)}`;
        
        window.open(waUrl, '_blank');
        closeInvoice();
        
        const toast = document.getElementById('shopToast');
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 4000);
    }
</script>
@endsection
