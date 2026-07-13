@extends('layouts.admin_layout')

@section('admin_content')
<div>
    <!-- Header Row -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px; margin-bottom: 35px;">
        <div>
            <span class="badge" style="margin-bottom: 8px;">Inventory Control</span>
            <h2 style="font-family: var(--font-heading); font-size: 2rem; color: var(--secondary-color); font-weight: 800; margin: 0;">Manage Products</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 5px;">View, edit, filter, and add computer systems or hardware devices.</p>
        </div>
        <div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 22px;">
                <i class="fa-solid fa-plus-circle"></i> Add New Product
            </a>
        </div>
    </div>

    <!-- Feedback Alerts -->
    @if(session('success'))
        <div style="background-color: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; padding: 15px; border-radius: var(--radius-sm); font-size: 0.9rem; margin-bottom: 30px; display: flex; align-items: center; gap: 10px;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.1rem;"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <!-- Search & Filter Controls -->
    <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 25px; box-shadow: var(--shadow-sm); margin-bottom: 30px;">
        <form action="{{ route('admin.products.index') }}" method="GET" style="display: flex; gap: 15px; flex-wrap: wrap; align-items: center; margin: 0;">
            <div style="flex: 1; min-width: 250px;">
                <input type="text" name="search" class="form-control" placeholder="Search by product name, description..." value="{{ request('search') }}" style="width: 100%; height: 42px;">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" style="padding: 11px 22px; height: 42px; display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-magnifying-glass"></i> Search
                </button>
                @if(request('search'))
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline" style="padding: 10px 20px; display: inline-flex; align-items: center; gap: 8px; margin-left: 8px; text-decoration: none;">Clear</a>
                @endif
            </div>
        </form>
    </div>

    <!-- Products Table -->
    <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); overflow: hidden;">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.9rem;">
                <thead>
                    <tr style="background-color: var(--bg-light); border-bottom: 1px solid var(--border-color); font-family: var(--font-heading); color: var(--secondary-color); font-weight: 700;">
                        <th style="padding: 15px 20px;">Image</th>
                        <th style="padding: 15px 20px;">Product Name</th>
                        <th style="padding: 15px 20px;">Category</th>
                        <th style="padding: 15px 20px;">Price</th>
                        <th style="padding: 15px 20px;">Description</th>
                        <th style="padding: 15px 20px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $p)
                        @php
                            $fallbackUrl = 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=150&q=80';
                            $catLower = Str::lower($p->category->name);
                            if (Str::contains($catLower, 'cable') || Str::contains($catLower, 'wire')) {
                                $fallbackUrl = 'https://images.unsplash.com/photo-1601524909162-be87252be298?auto=format&fit=crop&w=150&q=80';
                            } elseif (Str::contains($catLower, 'usb') || Str::contains($catLower, 'storage')) {
                                $fallbackUrl = 'https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?auto=format&fit=crop&w=150&q=80';
                            }
                        @endphp
                        <tr style="border-bottom: 1px solid var(--border-color); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='rgba(14, 165, 233, 0.02)'" onmouseout="this.style.backgroundColor='transparent'">
                            <td style="padding: 15px 20px;">
                                <img src="{{ $p->image_path ? asset($p->image_path) : $fallbackUrl }}" alt="{{ $p->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: var(--radius-sm); border: 1px solid var(--border-color);">
                            </td>
                            <td style="padding: 15px 20px; font-weight: 700; color: var(--secondary-color);">{{ $p->name }}</td>
                            <td style="padding: 15px 20px;">
                                <span style="font-size: 0.75rem; background: var(--bg-light); border: 1px solid var(--border-color); padding: 4px 10px; border-radius: var(--radius-sm); font-weight: 700; color: var(--text-color);">
                                    {{ $p->category->name }}
                                </span>
                            </td>
                            <td style="padding: 15px 20px; font-weight: 800; color: var(--primary-color);">Rs. {{ number_format($p->price) }}</td>
                            <td style="padding: 15px 20px; color: var(--text-muted); max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $p->description }}</td>
                            <td style="padding: 15px 20px; text-align: right; white-space: nowrap;">
                                <div style="display: inline-flex; gap: 8px;">
                                    <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-outline btn-sm" style="padding: 6px 12px; font-size: 0.8rem; text-decoration: none;" title="Edit Product"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    
                                    <form action="{{ route('admin.products.delete', $p->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" style="margin: 0; display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-outline btn-sm" style="padding: 6px 12px; font-size: 0.8rem; border-color: #ef4444; color: #ef4444;" title="Delete Product"><i class="fa-solid fa-trash-can"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding: 50px; text-align: center; color: var(--text-muted);">
                                <i class="fa-solid fa-folder-open" style="font-size: 2.5rem; margin-bottom: 10px; display: block; color: #cbd5e1;"></i>
                                No products cataloged yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($products->hasPages())
            <div style="padding: 20px; border-top: 1px solid var(--border-color); display: flex; justify-content: center;">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
