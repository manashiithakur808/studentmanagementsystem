@extends('layouts.app')

@section('title', 'Login')
@section('body-class', 'login-page d-flex align-items-center justify-content-center min-vh-100')

@push('styles')
<style>
    body.login-page {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    }
    .glass-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        color: #fff;
    }
    .glass-card label,
    .glass-card h2,
    .glass-card p,
    .glass-card a { color: #fff; }
    .form-control {
        background: rgba(255, 255, 255, 0.25) !important;
        border: 1px solid rgba(255, 255, 255, 0.4) !important;
        color: #fff !important;
        border-radius: 10px;
    }
    .form-control::placeholder { color: rgba(255, 255, 255, 0.65) !important; }
    .form-control:focus {
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3) !important;
    }
    .btn-main {
        background: #fff;
        color: #764ba2;
        font-weight: 700;
        border: none;
        border-radius: 10px;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .btn-main:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        color: #764ba2;
    }
    .divider { border-color: rgba(255,255,255,0.3); }
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-9 col-md-7 col-lg-5">

            <div class="glass-card p-4 p-md-5">

                {{-- Header --}}
                <div class="text-center mb-4">
                    <div style="font-size: 52px;">🔐</div>
                    <h2 class="fw-bold mt-2 fs-3">Welcome Back</h2>
                    <p class="opacity-75 mb-0">Sign in to your account</p>
                </div>

                {{-- Success Message (after logout/register) --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Error Message --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Login Form --}}
                <form method="POST" action="/login">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-envelope-fill me-1"></i> Email Address
                        </label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="you@example.com"
                            value="{{ old('email') }}"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-lock-fill me-1"></i> Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Your password"
                        >
                    </div>

                    <button type="submit" class="btn btn-main w-100 py-2 fs-5">
                        Login
                    </button>
                </form>

                <hr class="divider my-4">
                <p class="text-center mb-0" style="opacity:0.9;">
                    Don't have an account?
                    <a href="/register" class="fw-bold">Register</a>
                </p>

            </div>
        </div>
    </div>
</div>
@endsection