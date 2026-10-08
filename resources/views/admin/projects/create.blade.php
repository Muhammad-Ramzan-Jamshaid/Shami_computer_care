@extends('layouts.admin_layout')

@section('admin_content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h1 style="font-family: var(--font-heading); font-weight: 800; font-size: 1.7rem; color: var(--secondary-color);">Add New Project</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline btn-sm"><i class="fa-solid fa-arrow-left"></i> Back to List</a>
    </div>

    @if ($errors->any())
        <div style="background-color: #fee2e2; color: #991b1b; padding: 14px 20px; border-radius: var(--radius-sm); margin-bottom: 25px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="background: var(--bg-white); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 30px; box-shadow: var(--shadow-sm);">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Project Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. Commercial Plaza CCTV & NVR Installation" style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Project Category</label>
                    <input type="text" name="category" value="{{ old('category') }}" placeholder="e.g. CCTV Surveillance, IT Lab Setup" style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">
                </div>
                <div>
                    <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Client / Location</label>
                    <input type="text" name="client" value="{{ old('client') }}" placeholder="e.g. Shami Commercial Center, Farooqabad" style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Main Description *</label>
                <textarea name="description" rows="4" required placeholder="Provide a summary of the completed project..." style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">{{ old('description') }}</textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Technical Scope / Details (Optional)</label>
                <textarea name="details" rows="3" placeholder="e.g. Installed 32 Dahua 4MP IP cameras, CAT6 cable roll, 8TB Western Digital Purple HDD..." style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">{{ old('details') }}</textarea>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Project Cover Image</label>
                <input type="file" name="image" accept="image/*" style="width: 100%; padding: 8px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">
                <small style="color: var(--text-muted); margin-top: 5px; display: block;">Recommended resolution: 800x500px (Max file size: 4MB)</small>
            </div>

            <div style="display: flex; gap: 15px; justify-content: flex-end;">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline" style="padding: 10px 24px;">Cancel</a>
                <button type="submit" class="btn btn-primary" style="padding: 10px 28px; font-weight: 700;">Save Project</button>
            </div>
        </form>
    </div>
</div>
@endsection
