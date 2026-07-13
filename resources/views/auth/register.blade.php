@extends('layouts.app')

@section('content')
<section class="auth-section section-padding" style="background-color: var(--bg-light); min-height: calc(100vh - 160px); display: flex; align-items: center; justify-content: center; padding: 40px 20px;">
    <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); box-shadow: var(--shadow-xl); width: 100%; max-width: 440px; padding: 40px 30px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="width: 50px; height: 50px; background: rgba(14, 165, 233, 0.1); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--primary-color); font-size: 1.5rem; margin: 0 auto 15px auto; box-shadow: 0 4px 10px rgba(14, 165, 233, 0.15);">
                <i class="fa-solid fa-user-plus"></i>
            </div>
            <h2 style="font-family: var(--font-heading); font-size: 1.6rem; color: var(--secondary-color); font-weight: 800;">Create Account</h2>
            <p style="color: var(--text-muted); font-size: 0.85rem; margin-top: 5px;">Register to submit orders and get hardware pricing.</p>
        </div>

        @if(session('error'))
            <div style="background-color: #fee2e2; border: 1px solid #fecaca; color: #b91c1c; padding: 12px; border-radius: var(--radius-sm); font-size: 0.85rem; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            
            <div class="form-group" style="margin-bottom: 18px;">
                <label for="name" style="font-weight: 600; display: block; margin-bottom: 6px; font-size: 0.85rem;">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Hammad Khan" value="{{ old('name') }}" required style="width: 100%; height: 40px; font-size: 0.85rem;">
                @error('name')
                    <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 18px;">
                <label for="email" style="font-weight: 600; display: block; margin-bottom: 6px; font-size: 0.85rem;">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="name@domain.com" value="{{ old('email') }}" required style="width: 100%; height: 40px; font-size: 0.85rem;">
                @error('email')
                    <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 18px;">
                <label for="password" style="font-weight: 600; display: block; margin-bottom: 6px; font-size: 0.85rem;">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Min. 6 characters" required style="width: 100%; height: 40px; font-size: 0.85rem;">
                @error('password')
                    <span style="color: #b91c1c; font-size: 0.75rem; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 25px;">
                <label for="password_confirmation" style="font-weight: 600; display: block; margin-bottom: 6px; font-size: 0.85rem;">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="••••••••" required style="width: 100%; height: 40px; font-size: 0.85rem;">
            </div>

            <button type="submit" class="btn btn-primary w-full" style="padding: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 20px;">Sign Up</button>
            
            <div style="text-align: center; font-size: 0.85rem; color: var(--text-muted);">
                Already have an account? <a href="{{ route('login') }}" style="color: var(--primary-color); font-weight: 700; text-decoration: none;">Login here</a>
            </div>
        </form>
    </div>
</section>
@endsection
