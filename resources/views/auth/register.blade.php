@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="text-center mb-5">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 70px; height: 70px; background-color: var(--primary); color: white;">
                    <i class="bi bi-person-plus fs-1"></i>
                </div>
                <h2 class="fw-bold">Create Account</h2>
                <p class="text-muted">Join MuscleHub to get started</p>
            </div>
            
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bi bi-person"></i></span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus 
                                       placeholder="John Doe">
                            </div>
                            @error('name')
                            <div class="invalid-feedback d-block mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email" 
                                       placeholder="your@email.com">
                            </div>
                            @error('email')
                            <div class="invalid-feedback d-block mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bi bi-lock"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="new-password" 
                                       placeholder="••••••••">
                            </div>
                            @error('password')
                            <div class="invalid-feedback d-block mt-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent"><i class="bi bi-shield-lock"></i></span>
                                <input id="password-confirm" type="password" class="form-control" 
                                       name="password_confirmation" required autocomplete="new-password" 
                                       placeholder="••••••••">
                            </div>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary py-2">
                                <i class="bi bi-person-plus-fill me-2"></i>Create Account
                            </button>
                        </div>
                        
                        <div class="text-center">
                            <p class="mb-0">Already have an account? 
                                <a href="{{ route('auth.view_login') }}" class="text-decoration-none fw-medium">
                                    Sign in
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
