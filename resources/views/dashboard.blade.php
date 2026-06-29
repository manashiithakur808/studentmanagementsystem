@extends('layouts.app')

@section('title', 'Dashboard')
@section('body-class', 'dashboard-page d-flex align-items-center justify-content-center min-vh-100')

@push('styles')
<style>
    body.dashboard-page {
        background: linear-gradient(135deg, #f7971e 0%, #ff6b6b 50%, #c471ed 100%);
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
    .glass-card h2,
    .glass-card p,
    .glass-card strong { color: #fff; }
    .info-box {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
    }
    .btn-logout {
        background: #fff;
        color: #ff6b6b;
        font-weight: 700;
        border: none;
        border-radius: 10px;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .btn-logout:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        color: #ff6b6b;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-7 col-lg-5">

            <div class="glass-card p-4 p-md-5 text-center">

                <div style="font-size: 64px;">🎉</div>
                <h2 class="fw-bold mt-2 fs-3">
                    Hello, {{ session('username') }}!
                </h2>
                <p class="opacity-75">You are successfully logged in.</p>

                <div class="info-box p-3 my-4 text-start">
                    <p class="mb-2 text-white">
                        <i class="bi bi-person-fill me-2"></i>
                        <strong>Username:</strong> {{ session('username') }}
                    </p>
                    <p class="mb-2 text-white">
                        <i class="bi bi-envelope-fill me-2"></i>
                        <strong>Email:</strong> {{ session('email') }}
                    </p>
                    <p class="mb-0 text-white">
                        <i class="bi bi-shield-check-fill me-2"></i>
                        <strong>Status:</strong> Active Session
                    </p>
                </div>

                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-logout w-100 py-2 fs-5">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection