@extends('layouts.admin_layout')

@section('admin_content')
<div>
    <!-- Header row -->
    <div style="margin-bottom: 35px;">
        <span class="badge" style="margin-bottom: 8px;">Overview</span>
        <h2 style="font-family: var(--font-heading); font-size: 2rem; color: var(--secondary-color); font-weight: 800; margin: 0;">Dashboard</h2>
        <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 5px;">Manage your retail catalog, update stock items, define categories, and manage showcase projects.</p>
    </div>

    @if(session('success'))
        <div style="background-color: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; padding: 15px; border-radius: var(--radius-sm); font-size: 0.9rem; margin-bottom: 30px; display: flex; align-items: center; gap: 10px;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.1rem;"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <!-- Stats Grid -->
    <div class="grid grid-3" style="gap: 25px; margin-bottom: 40px;">
        
        <!-- Products Stat Card -->
        <a href="{{ route('admin.products.index') }}" style="text-decoration: none; color: inherit;">
            <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 25px; box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 20px; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="width: 55px; height: 55px; background: rgba(14, 165, 233, 0.1); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--primary-color); font-size: 1.6rem;">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </div>
                <div>
                    <h4 style="font-size: 0.8rem; text-transform: uppercase; color: var(--text-muted); letter-spacing: 0.5px; margin: 0;">Active Products</h4>
                    <p style="font-size: 1.8rem; font-weight: 800; color: var(--secondary-color); font-family: var(--font-heading); margin: 2px 0 0 0;">{{ $productsCount }}</p>
                </div>
            </div>
        </a>

        <!-- Categories Stat Card -->
        <a href="{{ route('admin.categories.index') }}" style="text-decoration: none; color: inherit;">
            <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 25px; box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 20px; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="width: 55px; height: 55px; background: rgba(15, 23, 42, 0.05); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--secondary-color); font-size: 1.6rem;">
                    <i class="fa-solid fa-tags"></i>
                </div>
                <div>
                    <h4 style="font-size: 0.8rem; text-transform: uppercase; color: var(--text-muted); letter-spacing: 0.5px; margin: 0;">Categories</h4>
                    <p style="font-size: 1.8rem; font-weight: 800; color: var(--secondary-color); font-family: var(--font-heading); margin: 2px 0 0 0;">{{ $categoriesCount }}</p>
                </div>
            </div>
        </a>

        <!-- Projects Stat Card -->
        <a href="{{ route('admin.projects.index') }}" style="text-decoration: none; color: inherit;">
            <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 25px; box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 20px; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="width: 55px; height: 55px; background: rgba(56, 189, 248, 0.15); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: #0284c7; font-size: 1.6rem;">
                    <i class="fa-solid fa-diagram-project"></i>
                </div>
                <div>
                    <h4 style="font-size: 0.8rem; text-transform: uppercase; color: var(--text-muted); letter-spacing: 0.5px; margin: 0;">Showcase Projects</h4>
                    <p style="font-size: 1.8rem; font-weight: 800; color: var(--secondary-color); font-family: var(--font-heading); margin: 2px 0 0 0;">{{ $projectsCount }}</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Quick Links Panel -->
    <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 35px 30px; box-shadow: var(--shadow-sm);">
        <h3 style="font-family: var(--font-heading); font-size: 1.25rem; color: var(--secondary-color); font-weight: 700; margin-top: 0; margin-bottom: 25px;">Quick Actions</h3>
        
        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 22px; font-size: 0.9rem;">
                <i class="fa-solid fa-circle-plus"></i> Add New Product
            </a>

            <a href="{{ route('admin.categories.create') }}" class="btn btn-outline" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 22px; font-size: 0.9rem;">
                <i class="fa-solid fa-folder-plus"></i> Add New Category
            </a>

            <a href="{{ route('admin.projects.create') }}" class="btn btn-outline" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 22px; font-size: 0.9rem; border-color: #0284c7; color: #0284c7;">
                <i class="fa-solid fa-diagram-project"></i> Add New Project
            </a>
        </div>
    </div>
</div>
@endsection
