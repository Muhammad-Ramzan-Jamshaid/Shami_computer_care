@extends('layouts.admin_layout')

@section('admin_content')
<div style="max-width: 700px; margin: 0 auto;">
    
    <!-- Header Backlink -->
    <div style="margin-bottom: 25px;">
        <a href="{{ route('admin.products.index') }}" style="color: var(--primary-color); font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: 0.9rem;">
            <i class="fa-solid fa-arrow-left"></i> Back to Products
        </a>
    </div>

    <div style="margin-bottom: 30px;">
        <h2 style="font-family: var(--font-heading); font-size: 1.8rem; color: var(--secondary-color); font-weight: 800; margin: 0;">Edit Product</h2>
        <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 5px;">Update pricing, descriptions, and categories for the selected item.</p>
    </div>

    <!-- Product Form -->
    <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 35px; box-shadow: var(--shadow-sm);">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Product Name -->
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="name" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Dell Latitude 5490 Core i5" value="{{ old('name', $product->name) }}" required style="width: 100%;">
                @error('name')
                    <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-2" style="gap: 20px; margin-bottom: 20px;">
                <!-- Category ID -->
                <div class="form-group">
                    <label for="category_id" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Product Category</label>
                    <select name="category_id" id="category_id" class="form-control" required style="width: 100%; height: 42px; padding: 0 15px;">
                        <option value="">Select Category</option>
                        @foreach($categories as $parent)
                            @if($parent->children->isNotEmpty())
                                <optgroup label="{{ $parent->name }}">
                                    @foreach($parent->children as $child)
                                        <option value="{{ $child->id }}" {{ old('category_id', $product->category_id) == $child->id ? 'selected' : '' }}>{{ $child->name }}</option>
                                    @endforeach
                                </optgroup>
                            @else
                                <option value="{{ $parent->id }}" {{ old('category_id', $product->category_id) == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                        <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Price (Rs.)</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="e.g. 45000" value="{{ old('price', $product->price) }}" required style="width: 100%;">
                    @error('price')
                        <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="description" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Description & Specs</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter full specifications, memory capacity, SSD, or cable length..." style="width: 100%;">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image File Upload -->
            <div class="form-group" style="margin-bottom: 30px;">
                <label for="image" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Product Image (Optional)</label>
                
                @if($product->image_path)
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px; border: 1px solid var(--border-color); padding: 10px; border-radius: var(--radius-sm); background: var(--bg-light); max-width: fit-content;">
                        <img src="{{ asset($product->image_path) }}" alt="Current Product Image" style="width: 60px; height: 60px; object-fit: cover; border-radius: var(--radius-sm);">
                        <div style="font-size: 0.8rem; color: var(--text-muted);">
                            <strong>Current Image</strong><br>
                            Will be overwritten if you select a new file.
                        </div>
                    </div>
                @endif

                <input type="file" name="image" id="image" class="form-control" style="width: 100%; padding: 8px;" accept="image/*">
                @error('image')
                    <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
                <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 6px;">Supported file formats: JPEG, PNG, JPG, WEBP. Max size: 2MB.</p>
            </div>

            <!-- Submit buttons -->
            <div style="display: flex; gap: 15px; justify-content: flex-end; border-top: 1px solid var(--border-color); padding-top: 25px;">
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline" style="padding: 10px 24px; text-decoration: none;">Cancel</a>
                <button type="submit" class="btn btn-primary" style="padding: 10px 30px; font-weight: 700;">Update Product</button>
            </div>
        </form>
    </div>

</div>
@endsection
