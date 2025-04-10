@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="text-center mb-5">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 70px; height: 70px; background-color: var(--primary); color: white;">
                    <i class="bi bi-shop fs-1"></i>
                </div>
                <h2 class="fw-bold">Welcome Back</h2>
                <p class="text-muted">Sign in to your account to continue</p>
            </div>
            
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                                       placeholder="your@email.com">
                            </div>
                            @error('email')
                            <div class="invalid-feedback d-block mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label">Password</label>
                                @if (Route::has('password.request'))
                                <a class="text-decoration-none small" href="{{ route('auth.forgot-password') }}">
                                    Forgot password?
                                </a>
                                @endif
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bi bi-lock"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="current-password" placeholder="••••••••">
                            </div>
                            @error('password')
                            <div class="invalid-feedback d-block mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary py-2">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </button>
                        </div>
                        
                        <div class="text-center">
                            <p class="mb-0">Don't have an account? 
                                <a href="{{ route('auth.view_register') }}" class="text-decoration-none fw-medium">
                                    Create an account
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
