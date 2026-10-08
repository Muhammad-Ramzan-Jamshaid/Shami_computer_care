@extends('layouts.admin_layout')

@section('admin_content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap; gap: 15px;">
    <div>
        <h1 style="font-family: var(--font-heading); font-weight: 800; font-size: 1.8rem; color: var(--secondary-color); margin-bottom: 5px;">Manage Projects</h1>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Add, edit, or remove showcase projects & CCTV contracts.</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary" style="padding: 10px 20px; font-weight: 700;">
        <i class="fa-solid fa-plus-circle"></i> Add New Project
    </a>
</div>

@if(session('success'))
    <div style="background-color: #d1fae5; color: #065f46; padding: 12px 18px; border-radius: var(--radius-sm); margin-bottom: 25px; font-weight: 600;">
        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
    </div>
@endif

<div style="background: var(--bg-white); border: 1px solid var(--border-color); border-radius: var(--radius-md); box-shadow: var(--shadow-sm); overflow: hidden;">
    <div style="padding: 20px; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; background: #f8fafc;">
        <form action="{{ route('admin.projects.index') }}" method="GET" style="display: flex; gap: 10px; margin: 0;">
            <input type="text" name="search" placeholder="Search project title, client..." value="{{ request('search') }}" style="padding: 8px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.85rem; width: 260px;">
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-search"></i> Search</button>
        </form>
    </div>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.9rem;">
            <thead>
                <tr style="background: #f1f5f9; color: var(--secondary-color); font-family: var(--font-heading); font-weight: 700;">
                    <th style="padding: 14px 20px;">Image</th>
                    <th style="padding: 14px 20px;">Project Title</th>
                    <th style="padding: 14px 20px;">Category</th>
                    <th style="padding: 14px 20px;">Client / Location</th>
                    <th style="padding: 14px 20px; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $p)
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px 20px; width: 70px;">
                            <img src="{{ $p->image_path ? asset($p->image_path) : 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=150&q=80' }}" alt="{{ $p->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid var(--border-color);">
                        </td>
                        <td style="padding: 12px 20px; font-weight: 700; color: var(--secondary-color);">
                            {{ $p->title }}
                        </td>
                        <td style="padding: 12px 20px;">
                            <span style="background: rgba(14, 165, 233, 0.1); color: var(--primary-color); padding: 4px 10px; border-radius: 4px; font-size: 0.8rem; font-weight: 600;">
                                {{ $p->category ?? 'General Project' }}
                            </span>
                        </td>
                        <td style="padding: 12px 20px; color: var(--text-muted);">
                            {{ $p->client ?? 'N/A' }}
                        </td>
                        <td style="padding: 12px 20px; text-align: right;">
                            <a href="{{ route('admin.projects.edit', $p->id) }}" class="btn btn-sm" style="background-color: var(--primary-color); color: white; padding: 6px 12px; margin-right: 5px; font-size: 0.8rem;">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('admin.projects.delete', $p->id) }}" method="POST" style="display: inline-block; margin: 0;" onsubmit="return confirm('Delete this project?');">
                                @csrf
                                <button type="submit" class="btn btn-sm" style="background-color: #ef4444; color: white; padding: 6px 12px; font-size: 0.8rem; border: none;">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 40px; color: var(--text-muted);">
                            No projects found. Click "Add New Project" to create one.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="padding: 20px; display: flex; justify-content: center;">
        {{ $projects->links() }}
    </div>
</div>
@endsection
