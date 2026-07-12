@extends('layouts.app')

@section('content')
<section class="auth-section section-padding" style="background-color: var(--bg-light); min-height: calc(100vh - 160px); display: flex; align-items: center; justify-content: center; padding: 40px 20px;">
    <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); box-shadow: var(--shadow-xl); width: 100%; max-width: 420px; padding: 40px 30px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-color), var(--primary-hover)); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--bg-white); font-size: 1.5rem; margin: 0 auto 15px auto; box-shadow: 0 4px 10px rgba(14, 165, 233, 0.3);">
                <i class="fa-solid fa-lock"></i>
            </div>
            <h2 style="font-family: var(--font-heading); font-size: 1.6rem; color: var(--secondary-color); font-weight: 800;">Admin Login</h2>
            <p style="color: var(--text-muted); font-size: 0.85rem; margin-top: 5px;">Shami Computer Care Management Panel</p>
        </div>

        @if(session('error'))
            <div style="background-color: #fee2e2; border: 1px solid #fecaca; color: #b91c1c; padding: 12px; border-radius: var(--radius-sm); font-size: 0.85rem; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        @if(session('success'))
            <div style="background-color: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; padding: 12px; border-radius: var(--radius-sm); font-size: 0.85rem; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-circle-check"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <form action="{{ url('/admin/login') }}" method="POST">
            @csrf
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="email" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="admin@shamipc.com" value="{{ old('email') }}" required style="width: 100%;">
                @error('email')
                    <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 25px;">
                <label for="password" style="font-weight: 600; display: block; margin-bottom: 8px; font-size: 0.9rem;">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required style="width: 100%;">
                @error('password')
                    <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-full" style="padding: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Sign In</button>
        </form>
    </div>
</section>
@endsection
