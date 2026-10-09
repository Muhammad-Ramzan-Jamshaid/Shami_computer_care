@extends('layouts.admin_layout')

@section('admin_content')
<div style="max-width: 600px; margin: 0 auto;">
    
    <!-- Header Backlink -->
    <div style="margin-bottom: 25px;">
        <a href="{{ route('admin.categories.index') }}" style="color: var(--primary-color); font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: 0.9rem;">
            <i class="fa-solid fa-arrow-left"></i> Back to Categories
        </a>
    </div>

    <div style="margin-bottom: 30px;">
        <h2 style="font-family: var(--font-heading); font-size: 1.8rem; color: var(--secondary-color); font-weight: 800; margin: 0;">Add Category</h2>
        <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 5px;">Create a new hierarchy path to group similar retail items.</p>
    </div>

    <!-- Category Form -->
    <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 35px; box-shadow: var(--shadow-sm);">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <!-- Category Name -->
            <div class="form-group" style="margin-bottom: 25px;">
                <label for="name" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="e.g. HDMI Converters" value="{{ old('name') }}" required style="width: 100%;">
                @error('name')
                    <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <!-- Parent Category -->
            <div class="form-group" style="margin-bottom: 30px;">
                <label for="parent_id" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Parent Category (Optional)</label>
                <select name="parent_id" id="parent_id" class="form-control" style="width: 100%; height: 42px; padding: 0 15px;">
                    <option value="">None (Create as Root Category)</option>
                    @foreach($parentCategories as $parent)
                        <option value="{{ $parent['id'] }}" {{ old('parent_id') == $parent['id'] ? 'selected' : '' }}>{{ $parent['name'] }}</option>
                    @endforeach
                </select>
                @error('parent_id')
                    <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
                <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 6px;">Select a parent category if you want to nest this category (e.g. Cables -> HDMI Cables).</p>
            </div>

            <!-- Submit buttons -->
            <div style="display: flex; gap: 15px; justify-content: flex-end; border-top: 1px solid var(--border-color); padding-top: 25px;">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline" style="padding: 10px 24px; text-decoration: none;">Cancel</a>
                <button type="submit" class="btn btn-primary" style="padding: 10px 30px; font-weight: 700;">Create Category</button>
            </div>
        </form>
    </div>

</div>
@endsection
