@extends('layouts.app')

@section('title', 'Completed Projects & CCTV Installations - Shami Computer Care')

@section('content')
<style>
    .projects-hero {
        background: linear-gradient(135deg, var(--secondary-color) 0%, #0f172a 100%);
        color: var(--bg-white);
        padding: 55px 0;
        text-align: center;
        position: relative;
    }
    .projects-hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), #38bdf8);
    }
    .project-card-item {
        background: var(--bg-white);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        margin-bottom: 45px;
        transition: var(--transition-smooth);
    }
    .project-card-item:hover {
        box-shadow: var(--shadow-lg);
        border-color: rgba(14, 165, 233, 0.4);
    }
    .project-flex-row {
        display: flex;
        align-items: center;
        gap: 0;
    }
    .project-flex-row.reverse {
        flex-direction: row-reverse;
    }
    .project-img-container {
        flex: 1;
        min-height: 340px;
        max-height: 420px;
        position: relative;
        overflow: hidden;
        background: #0f172a;
    }
    .project-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .project-card-item:hover .project-img-container img {
        transform: scale(1.04);
    }
    .project-content-container {
        flex: 1;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    @media (max-width: 900px) {
        .project-flex-row, .project-flex-row.reverse {
            flex-direction: column !important;
        }
        .project-img-container {
            width: 100%;
            height: 240px;
            min-height: auto;
        }
        .project-content-container {
            padding: 25px;
        }
    }
</style>

<!-- Hero Section -->
<div class="projects-hero">
    <div class="container">
        <span class="badge" style="background: rgba(14, 165, 233, 0.15); color: #38bdf8; padding: 6px 14px; border-radius: 20px; font-weight: 700; font-size: 0.85rem;">Shami Portfolio & Contracts</span>
        <h1 style="font-family: var(--font-heading); font-weight: 800; font-size: 2.3rem; margin-top: 10px; margin-bottom: 10px; color: #ffffff !important; text-shadow: 0 2px 10px rgba(0,0,0,0.5);">Our Portfolio & Completed Projects</h1>
        <p style="color: rgba(255, 255, 255, 0.9); max-width: 650px; margin: 0 auto; font-size: 0.95rem;">Explore our successful CCTV camera installations, IT lab hardware setups, commercial network fiber cabling, and security integrations.</p>
        
        @if(session()->has('admin_logged_in'))
            <div style="margin-top: 25px;">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary" style="padding: 10px 22px; font-weight: 700; box-shadow: 0 4px 14px rgba(14, 165, 233, 0.4);">
                    <i class="fa-solid fa-plus-circle"></i> + Add New Project (Admin)
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Main Projects Content -->
<section style="padding: 60px 0; background-color: var(--bg-light);">
    <div class="container">
        
        <!-- Search & Admin Info Bar -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; flex-wrap: wrap; gap: 20px;">
            <div style="font-family: var(--font-heading); font-weight: 700; color: var(--secondary-color); font-size: 1.1rem;">
                Showing {{ $projects->total() }} Showcase Projects
            </div>

            <form action="{{ route('projects.index') }}" method="GET" style="display: flex; gap: 8px; margin: 0;">
                <input type="text" name="search" placeholder="Search projects..." value="{{ request('search') }}" style="padding: 9px 16px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-size: 0.85rem; width: 220px; background: var(--bg-white);">
                <button type="submit" class="btn btn-primary btn-sm" style="padding: 9px 16px;"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        @if(session('success'))
            <div style="background-color: #d1fae5; color: #065f46; padding: 14px 20px; border-radius: var(--radius-sm); margin-bottom: 30px; font-weight: 600; display: flex; align-items: center; justify-content: space-between;">
                <span><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</span>
                <button onclick="this.parentElement.style.display='none'" style="background: none; border: none; color: #065f46; cursor: pointer; font-size: 1.1rem;"><i class="fa-solid fa-xmark"></i></button>
            </div>
        @endif

        <!-- Projects Alternating List -->
        <div>
            @forelse($projects as $index => $project)
                @php
                    // Fallback images based on index/category
                    $fallbacks = [
                        'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=800&q=80', // CCTV cameras
                        'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=800&q=80', // Server rack / cabling
                        'https://images.unsplash.com/photo-1588702547919-26089e690ecc?auto=format&fit=crop&w=800&q=80', // Computer lab
                        'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=800&q=80', // Security access control
                    ];
                    $imageUrl = $project->image_path ? asset($project->image_path) : $fallbacks[$index % count($fallbacks)];
                    $isReverse = ($index % 2 == 1);
                @endphp

                <div class="project-card-item">
                    <div class="project-flex-row {{ $isReverse ? 'reverse' : '' }}">
                        
                        <!-- Image Column -->
                        <div class="project-img-container">
                            <img src="{{ $imageUrl }}" alt="{{ $project->title }}">
                            @if($project->category)
                                <span style="position: absolute; top: 15px; left: 15px; background: rgba(15, 23, 42, 0.85); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.3); padding: 5px 12px; border-radius: 4px; font-size: 0.75rem; font-weight: 700; backdrop-filter: blur(4px);">
                                    <i class="fa-solid fa-shield-halved"></i> {{ $project->category }}
                                </span>
                            @endif
                        </div>

                        <!-- Content Column -->
                        <div class="project-content-container">
                            
                            @if($project->client)
                                <div style="font-size: 0.82rem; color: var(--primary-color); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">
                                    <i class="fa-solid fa-location-dot" style="margin-right: 4px;"></i> {{ $project->client }}
                                </div>
                            @endif

                            <h2 style="font-family: var(--font-heading); font-size: 1.45rem; font-weight: 800; color: var(--secondary-color); margin-bottom: 12px; line-height: 1.3;">
                                {{ $project->title }}
                            </h2>

                            <p style="color: var(--text-color); font-size: 0.92rem; line-height: 1.6; margin-bottom: 15px;">
                                {{ $project->description }}
                            </p>

                            @if($project->details)
                                <div style="background-color: rgba(14, 165, 233, 0.04); border-left: 3px solid var(--primary-color); padding: 12px 16px; border-radius: 0 6px 6px 0; margin-bottom: 20px; font-size: 0.85rem; color: var(--text-muted); line-height: 1.5;">
                                    <strong style="color: var(--secondary-color);">Project Scope:</strong> {{ $project->details }}
                                </div>
                            @endif

                            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px; margin-top: auto; padding-top: 10px; border-top: 1px solid var(--border-color);">
                                <a href="https://wa.me/923064565908?text={{ urlencode('Hello Shami Computer Care, I am inquiring about project details: ' . $project->title) }}" target="_blank" class="btn btn-outline btn-sm" style="display: inline-flex; align-items: center; gap: 6px; font-weight: 700; color: #16a34a; border-color: #16a34a;">
                                    <i class="fa-brands fa-whatsapp" style="font-size: 1.05rem;"></i> Inquire Similar Project
                                </a>

                                <!-- Admin Action Controls (Visible ONLY when Admin is logged in) -->
                                @if(session()->has('admin_logged_in'))
                                    <div style="display: flex; align-items: center; gap: 8px; background: #f8fafc; padding: 6px 12px; border-radius: 6px; border: 1px dashed #cbd5e1;">
                                        <span style="font-size: 0.72rem; font-weight: 800; color: #64748b; text-transform: uppercase;">Admin:</span>
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm" style="background-color: var(--primary-color); color: #fff; padding: 4px 10px; font-size: 0.75rem; font-weight: 700;">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                            @csrf
                                            <button type="submit" class="btn btn-sm" style="background-color: #ef4444; color: #fff; padding: 4px 10px; font-size: 0.75rem; font-weight: 700; border: none;">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 60px 0; background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                    <i class="fa-solid fa-folder-open" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 15px; display: block;"></i>
                    <h3 style="font-family: var(--font-heading); font-size: 1.25rem; color: var(--secondary-color); font-weight: 700;">No Projects Found</h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">Check back later or contact us for custom project inquiries.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div style="margin-top: 40px; display: flex; justify-content: center;">
            {{ $projects->links() }}
        </div>

    </div>
</section>
@endsection
