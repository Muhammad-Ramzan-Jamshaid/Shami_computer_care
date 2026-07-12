@extends('layouts.app')

@section('content')
<section class="admin-dashboard-section section-padding" style="background-color: var(--bg-light); min-height: calc(100vh - 160px); padding: 50px 20px;">
    <div class="container" style="max-width: 1000px; margin: 0 auto;">
        
        <!-- Header row -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; flex-wrap: wrap; gap: 20px;">
            <div>
                <span class="badge">Control Panel</span>
                <h2 style="font-family: var(--font-heading); font-size: 2.2rem; color: var(--secondary-color); font-weight: 800; margin-top: 5px;">Dashboard</h2>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Welcome back, <strong>{{ session('admin_user') }}</strong>. Manage your inventory below.</p>
            </div>
            
            <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn btn-outline" style="border-color: #ef4444; color: #ef4444; padding: 10px 22px; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>

        @if(session('success'))
            <div style="background-color: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; padding: 15px; border-radius: var(--radius-sm); font-size: 0.9rem; margin-bottom: 30px; display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-circle-check" style="font-size: 1.1rem;"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <!-- Stats Grid -->
        <div class="grid grid-2" style="gap: 30px; margin-bottom: 40px;">
            
            <!-- Products Stat Card -->
            <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 30px; box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 25px;">
                <div style="width: 60px; height: 60px; background: rgba(14, 165, 233, 0.1); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--primary-color); font-size: 1.8rem;">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </div>
                <div>
                    <h4 style="font-size: 0.9rem; text-transform: uppercase; color: var(--text-muted); letter-spacing: 0.5px;">Active Products</h4>
                    <p style="font-size: 2.2rem; font-weight: 800; color: var(--secondary-color); font-family: var(--font-heading); margin-top: 2px;">{{ $productsCount }}</p>
                </div>
            </div>

            <!-- Categories Stat Card -->
            <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 30px; box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 25px;">
                <div style="width: 60px; height: 60px; background: rgba(15, 23, 42, 0.05); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--secondary-color); font-size: 1.8rem;">
                    <i class="fa-solid fa-tags"></i>
                </div>
                <div>
                    <h4 style="font-size: 0.9rem; text-transform: uppercase; color: var(--text-muted); letter-spacing: 0.5px;">Product Categories</h4>
                    <p style="font-size: 2.2rem; font-weight: 800; color: var(--secondary-color); font-family: var(--font-heading); margin-top: 2px;">{{ $categoriesCount }}</p>
                </div>
            </div>
        </div>

        <!-- Quick Links Panel -->
        <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 40px 30px; box-shadow: var(--shadow-sm);">
            <h3 style="font-family: var(--font-heading); font-size: 1.3rem; color: var(--secondary-color); font-weight: 700; margin-bottom: 25px;">Administration Shortcuts</h3>
            
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 26px;">
                    <i class="fa-solid fa-boxes-packing"></i> Manage Products Inventory
                </a>

                <a href="{{ route('admin.products.create') }}" class="btn btn-outline" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 26px;">
                    <i class="fa-solid fa-circle-plus"></i> Add New Product
                </a>

                <a href="{{ route('shop.index') }}" class="btn btn-outline" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 26px; border-color: var(--secondary-color); color: var(--secondary-color);">
                    <i class="fa-solid fa-shop"></i> View Shop Catalog
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
