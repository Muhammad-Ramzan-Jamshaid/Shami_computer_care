@extends('layouts.admin_layout')

@section('admin_content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h1 style="font-family: var(--font-heading); font-weight: 800; font-size: 1.7rem; color: var(--secondary-color);">Edit Project</h1>
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
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Project Title *</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Project Category</label>
                    <input type="text" name="category" value="{{ old('category', $project->category) }}" style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">
                </div>
                <div>
                    <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Client / Location</label>
                    <input type="text" name="client" value="{{ old('client', $project->client) }}" style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Main Description *</label>
                <textarea name="description" rows="4" required style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">{{ old('description', $project->description) }}</textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Technical Scope / Details (Optional)</label>
                <textarea name="details" rows="3" style="width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">{{ old('details', $project->details) }}</textarea>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; font-weight: 700; margin-bottom: 8px; color: var(--secondary-color);">Project Cover Image</label>
                @if($project->image_path)
                    <div style="margin-bottom: 12px; display: flex; align-items: center; gap: 15px;">
                        <img src="{{ asset($project->image_path) }}" alt="Current Image" style="width: 80px; height: 60px; object-fit: cover; border-radius: 6px; border: 1px solid var(--border-color);">
                        <span style="font-size: 0.85rem; color: var(--text-muted);">Current Image uploaded</span>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" style="width: 100%; padding: 8px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.9rem;">
                <small style="color: var(--text-muted); margin-top: 5px; display: block;">Leave blank if you don't want to change the image.</small>
            </div>

            <div style="display: flex; gap: 15px; justify-content: flex-end;">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline" style="padding: 10px 24px;">Cancel</a>
                <button type="submit" class="btn btn-primary" style="padding: 10px 28px; font-weight: 700;">Update Project</button>
            </div>
        </form>
    </div>
</div>
@endsection
