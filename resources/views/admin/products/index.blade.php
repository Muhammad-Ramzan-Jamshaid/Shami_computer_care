@extends('layouts.app')

@section('content')
<section class="admin-products-section section-padding" style="background-color: var(--bg-light); min-height: calc(100vh - 160px); padding: 50px 20px;">
    <div class="container" style="max-width: 1000px; margin: 0 auto;">
        
        <!-- Header row -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap; gap: 20px;">
            <div>
                <span class="badge">Inventory</span>
                <h2 style="font-family: var(--font-heading); font-size: 2rem; color: var(--secondary-color); font-weight: 800; margin-top: 5px;">Manage Products</h2>
                <p style="color: var(--text-muted); font-size: 0.9rem;">View, search, edit, and delete products in your store.</p>
            </div>
            
            <div style="display: flex; gap: 12px; align-items: center;">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline" style="padding: 10px 20px;"><i class="fa-solid fa-arrow-left"></i> Dashboard</a>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary" style="padding: 10px 20px; display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-plus"></i> Add Product
                </a>
            </div>
        </div>

        <!-- Session Success alert -->
        @if(session('success'))
            <div style="background-color: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; padding: 15px; border-radius: var(--radius-sm); font-size: 0.9rem; margin-bottom: 25px; display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-circle-check" style="font-size: 1.1rem;"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <!-- Filter & Search Bar -->
        <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 20px; box-shadow: var(--shadow-sm); margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
            <form action="{{ route('admin.products.index') }}" method="GET" style="display: flex; gap: 10px; width: 100%; max-width: 450px; margin: 0;">
                <input type="text" name="search" class="form-control" placeholder="Search by name or description..." value="{{ request('search') }}" style="flex: 1; padding: 10px 15px; font-size: 0.9rem;">
                <button type="submit" class="btn btn-primary" style="padding: 10px 20px;"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            @if(request('search'))
                <a href="{{ route('admin.products.index') }}" style="color: var(--primary-color); font-size: 0.9rem; font-weight: 600;"><i class="fa-solid fa-rotate-left"></i> Clear Search</a>
            @endif
        </div>

        <!-- Products Table Card -->
        <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; min-width: 700px; text-align: left;">
                <thead>
                    <tr style="background-color: var(--bg-light); border-bottom: 1px solid var(--border-color);">
                        <th style="padding: 18px 20px; font-weight: 700; color: var(--secondary-color); font-size: 0.9rem; width: 80px;">Image</th>
                        <th style="padding: 18px 20px; font-weight: 700; color: var(--secondary-color); font-size: 0.9rem;">Product Name</th>
                        <th style="padding: 18px 20px; font-weight: 700; color: var(--secondary-color); font-size: 0.9rem; width: 180px;">Category</th>
                        <th style="padding: 18px 20px; font-weight: 700; color: var(--secondary-color); font-size: 0.9rem; width: 130px;">Price</th>
                        <th style="padding: 18px 20px; font-weight: 700; color: var(--secondary-color); font-size: 0.9rem; width: 160px; text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $p)
                        <tr style="border-bottom: 1px solid var(--border-color); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='rgba(14, 165, 233, 0.02)'" onmouseout="this.style.backgroundColor='transparent'">
                            <td style="padding: 15px 20px; vertical-align: middle;">
                                <div style="width: 50px; height: 50px; border-radius: var(--radius-sm); overflow: hidden; border: 1px solid var(--border-color); background-color: var(--bg-light); display: flex; align-items: center; justify-content: center;">
                                    @if($p->image_path)
                                        <img src="{{ asset($p->image_path) }}" alt="{{ $p->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <i class="fa-solid fa-image" style="color: var(--text-muted); font-size: 1.2rem;"></i>
                                    @endif
                                </div>
                            </td>
                            <td style="padding: 15px 20px; vertical-align: middle;">
                                <div style="font-weight: 700; color: var(--secondary-color); font-size: 0.95rem;">{{ $p->name }}</div>
                                <div style="font-size: 0.8rem; color: var(--text-muted); max-width: 320px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $p->description }}</div>
                            </td>
                            <td style="padding: 15px 20px; vertical-align: middle; font-size: 0.9rem; color: var(--text-color);">
                                <span style="background: rgba(15, 23, 42, 0.05); padding: 4px 10px; border-radius: var(--radius-sm); font-size: 0.8rem; font-weight: 600;">
                                    {{ $p->category->name }}
                                </span>
                            </td>
                            <td style="padding: 15px 20px; vertical-align: middle; font-weight: 700; color: var(--primary-color); font-size: 0.95rem;">
                                Rs. {{ number_format($p->price) }}
                            </td>
                            <td style="padding: 15px 20px; vertical-align: middle; text-align: center;">
                                <div style="display: flex; gap: 8px; justify-content: center;">
                                    <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-outline btn-sm" style="padding: 6px 12px; font-size: 0.8rem;" title="Edit Product">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </a>
                                    
                                    <form action="{{ route('admin.products.delete', $p->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')" style="margin: 0;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm" style="padding: 6px 12px; font-size: 0.8rem; background-color: #fee2e2; border: 1px solid #fecaca; color: #b91c1c;" title="Delete Product">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 40px; color: var(--text-muted); font-size: 0.95rem;">
                                <i class="fa-solid fa-folder-open" style="font-size: 2.2rem; color: #cbd5e1; margin-bottom: 12px; display: block;"></i>
                                No products found. Click "Add Product" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div style="margin-top: 25px; display: flex; justify-content: center;">
            {{ $products->links() }}
        </div>

    </div>
</section>
@endsection
