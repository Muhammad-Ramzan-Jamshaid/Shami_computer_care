@extends('layouts.app')

@section('content')
<section class="admin-products-create-section section-padding" style="background-color: var(--bg-light); min-height: calc(100vh - 160px); padding: 50px 20px;">
    <div class="container" style="max-width: 700px; margin: 0 auto;">
        
        <!-- Header row -->
        <div style="margin-bottom: 30px;">
            <span class="badge">Inventory</span>
            <h2 style="font-family: var(--font-heading); font-size: 2rem; color: var(--secondary-color); font-weight: 800; margin-top: 5px;">Add New Product</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Fill in the details below to add a new product to the shop database.</p>
        </div>

        <!-- Form Card -->
        <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: 40px 30px; box-shadow: var(--shadow-sm);">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="name" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Dell Latitude 5420" value="{{ old('name') }}" required style="width: 100%;">
                    @error('name')
                        <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-2" style="gap: 20px; margin-bottom: 20px;">
                    <div class="form-group">
                        <label for="category_id" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Category</label>
                        <select name="category_id" id="category_id" class="form-control" required style="width: 100%; height: 45px;">
                            <option value="" disabled selected>Select Category</option>
                            @foreach($categories as $parent)
                                <optgroup label="{{ $parent->name }}">
                                    @if($parent->children->isEmpty())
                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @else
                                        @foreach($parent->children as $child)
                                            <option value="{{ $child->id }}" {{ old('category_id') == $child->id ? 'selected' : '' }}>{{ $child->name }}</option>
                                        @endforeach
                                    @endif
                                </optgroup>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Price (Rs.)</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="e.g. 135000" value="{{ old('price') }}" required min="0" style="width: 100%;">
                        @error('price')
                            <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="image" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Product Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" style="width: 100%; padding: 8px 15px;">
                    <small style="color: var(--text-muted); font-size: 0.75rem; display: block; margin-top: 5px;">Upload a high-quality picture. Max size: 2MB. Format: JPG, PNG, WEBP.</small>
                    @error('image')
                        <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="margin-bottom: 30px;">
                    <label for="description" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Product Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Provide product specifications and core features..." style="width: 100%;">{{ old('description') }}</textarea>
                    @error('description')
                        <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="border-top: 1px solid var(--border-color); padding-top: 25px; display: flex; gap: 15px; justify-content: flex-end;">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline" style="padding: 10px 24px;">Cancel</a>
                    <button type="submit" class="btn btn-primary" style="padding: 10px 30px;">Create Product</button>
                </div>
            </form>
        </div>

    </div>
</section>
@endsection
