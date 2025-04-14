@extends('layouts.app')

@section('title', 'Access Denied')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0"><i class="bi bi-exclamation-triangle-fill me-2"></i>Access Denied</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="bi bi-lock-fill text-danger" style="font-size: 5rem;"></i>
                    </div>
                    <h5 class="text-center mb-3">You don't have permission to access this resource.</h5>
                    <p class="text-center text-muted">{{ $exception->getMessage() ?: 'Unauthorized action.' }}</p>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary me-2">
                            <i class="bi bi-house-door me-1"></i> Go to Dashboard
                        </a>
                        <a href="javascript:history.back()" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Go Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection