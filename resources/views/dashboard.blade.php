@extends('layouts.app')

@section('content')
<section class="user-dashboard-section section-padding" style="background-color: var(--bg-light); min-height: calc(100vh - 160px); display: flex; align-items: center; justify-content: center; padding: 40px 20px;">
    <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); box-shadow: var(--shadow-xl); width: 100%; max-width: 500px; padding: 40px 30px;">
        <div style="text-align: center; margin-bottom: 30px; border-bottom: 1px solid var(--border-color); padding-bottom: 25px;">
            <div style="width: 70px; height: 70px; background: rgba(14, 165, 233, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-color); font-size: 2.2rem; margin: 0 auto 15px auto; box-shadow: 0 4px 12px rgba(14, 165, 233, 0.2);">
                <i class="fa-solid fa-circle-user"></i>
            </div>
            <h2 style="font-family: var(--font-heading); font-size: 1.8rem; color: var(--secondary-color); font-weight: 800;">My Account</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 5px;">Welcome back, <strong>{{ session('user_name') }}</strong>!</p>
        </div>

        @if(session('success'))
            <div style="background-color: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; padding: 12px; border-radius: var(--radius-sm); font-size: 0.85rem; margin-bottom: 25px; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-circle-check"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <!-- Profile Details Card -->
        <div style="background: var(--bg-light); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 25px; margin-bottom: 30px;">
            <h3 style="font-family: var(--font-heading); font-size: 1.1rem; color: var(--secondary-color); font-weight: 700; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-address-card" style="color: var(--primary-color);"></i> Personal Information
            </h3>
            <div style="font-size: 0.95rem; line-height: 2; color: var(--text-color);">
                <p style="display: flex; justify-content: space-between;"><strong>Name:</strong> <span>{{ session('user_name') }}</span></p>
                <p style="display: flex; justify-content: space-between;"><strong>Email Address:</strong> <span>{{ session('user_email') }}</span></p>
                <p style="display: flex; justify-content: space-between;"><strong>Account Status:</strong> <span style="color: #10b981; font-weight: 700;">Active Client</span></p>
            </div>
        </div>

        <div style="display: flex; gap: 15px; justify-content: space-between; align-items: center;">
            <a href="{{ route('shop.index') }}" class="btn btn-outline" style="flex: 1; text-align: center; display: inline-flex; align-items: center; justify-content: center; gap: 8px;">
                <i class="fa-solid fa-bag-shopping"></i> Continue Shopping
            </a>
            
            <form action="{{ route('logout') }}" method="POST" style="margin: 0; flex: 1;">
                @csrf
                <button type="submit" class="btn btn-primary w-full" style="background-color: #ef4444; border-color: #ef4444; display: inline-flex; align-items: center; justify-content: center; gap: 8px; transition: all 0.2s;" onmouseover="this.style.backgroundColor='#dc2626'; this.style.borderColor='#dc2626';" onmouseout="this.style.backgroundColor='#ef4444'; this.style.borderColor='#ef4444';">
                    <i class="fa-solid fa-right-from-bracket"></i> Sign Out
                </button>
            </form>
        </div>

    </div>
</section>
@endsection
