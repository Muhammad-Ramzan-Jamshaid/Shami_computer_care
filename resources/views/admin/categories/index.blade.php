@extends('layouts.admin_layout')

@section('admin_content')
<div>
    <!-- Header Row -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px; margin-bottom: 35px;">
        <div>
            <span class="badge" style="margin-bottom: 8px;">Product Classification</span>
            <h2 style="font-family: var(--font-heading); font-size: 2rem; color: var(--secondary-color); font-weight: 800; margin: 0;">Manage Categories</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 5px;">Define parent and sub-categories to organize products in the shop front-end.</p>
        </div>
        <div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 22px;">
                <i class="fa-solid fa-plus-circle"></i> Add New Category
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

    @if(session('error'))
        <div style="background-color: #fee2e2; border: 1px solid #fecaca; color: #b91c1c; padding: 15px; border-radius: var(--radius-sm); font-size: 0.9rem; margin-bottom: 30px; display: flex; align-items: center; gap: 10px;">
            <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.1rem;"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    <!-- Categories Table -->
    <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); overflow: hidden;">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.9rem;">
                <thead>
                    <tr style="background-color: var(--bg-light); border-bottom: 1px solid var(--border-color); font-family: var(--font-heading); color: var(--secondary-color); font-weight: 700;">
                        <th style="padding: 15px 20px;">Category Name</th>
                        <th style="padding: 15px 20px;">Slug</th>
                        <th style="padding: 15px 20px;">Type / Parent</th>
                        <th style="padding: 15px 20px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $c)
                        <tr style="border-bottom: 1px solid var(--border-color); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='rgba(14, 165, 233, 0.02)'" onmouseout="this.style.backgroundColor='transparent'">
                            <td style="padding: 15px 20px; font-weight: 700; color: var(--secondary-color);">
                                @if($c->parent)
                                    <span style="color: var(--text-muted); margin-right: 8px;">—</span> {{ $c->name }}
                                @else
                                    <i class="fa-solid fa-folder" style="color: var(--primary-color); margin-right: 6px;"></i> {{ $c->name }}
                                @endif
                            </td>
                            <td style="padding: 15px 20px; color: var(--text-muted); font-family: monospace;">{{ $c->slug }}</td>
                            <td style="padding: 15px 20px;">
                                @if($c->parent)
                                    <span style="font-size: 0.75rem; background: rgba(14, 165, 233, 0.08); border: 1px solid rgba(14, 165, 233, 0.2); padding: 4px 10px; border-radius: var(--radius-sm); font-weight: 700; color: var(--primary-color);">
                                        Subcategory of <strong>{{ $c->parent->name }}</strong>
                                    </span>
                                @else
                                    <span style="font-size: 0.75rem; background: var(--bg-light); border: 1px solid var(--border-color); padding: 4px 10px; border-radius: var(--radius-sm); font-weight: 700; color: var(--secondary-color);">
                                        Root Category
                                    </span>
                                @endif
                            </td>
                            <td style="padding: 15px 20px; text-align: right; white-space: nowrap;">
                                <div style="display: inline-flex; gap: 8px;">
                                    <a href="{{ route('admin.categories.edit', $c->id) }}" class="btn btn-outline btn-sm" style="padding: 6px 12px; font-size: 0.8rem; text-decoration: none;" title="Edit Category"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    
                                    <form action="{{ route('admin.categories.delete', $c->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" style="margin: 0; display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-outline btn-sm" style="padding: 6px 12px; font-size: 0.8rem; border-color: #ef4444; color: #ef4444;" title="Delete Category"><i class="fa-solid fa-trash-can"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 50px; text-align: center; color: var(--text-muted);">
                                <i class="fa-solid fa-tags" style="font-size: 2.5rem; margin-bottom: 10px; display: block; color: #cbd5e1;"></i>
                                No categories defined yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($categories->hasPages())
            <div style="padding: 20px; border-top: 1px solid var(--border-color); display: flex; justify-content: center;">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
