@extends('layouts.app')

@section('title', 'Edit Language')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('admin.languages.index') }}" class="btn btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <h2 class="fw-bold mb-0">Edit Language</h2>
            </div>
            
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.languages.update', $language->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Language Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent"><i class="bi bi-translate"></i></span>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $language->name) }}" required>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="code" class="form-label">Language Code</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent"><i class="bi bi-code-slash"></i></span>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" 
                                           id="code" name="code" value="{{ old('code', $language->code) }}" required>
                                </div>
                                <div class="form-text">ISO 639-1 language code (e.g. en, fr, es)</div>
                                @error('code')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="flag" class="form-label">Flag Image</label>
                                @if($language->flag_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $language->flag_path) }}" alt="{{ $language->name }}" class="rounded border" style="height: 40px;">
                                </div>
                                @endif
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent"><i class="bi bi-flag"></i></span>
                                    <input type="file" class="form-control @error('flag') is-invalid @enderror" 
                                           id="flag" name="flag" accept="image/*">
                                </div>
                                <div class="form-text">Leave empty to keep current flag. Max size: 1MB</div>
                                @error('flag')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox" 
                                           id="status" name="status" value="1" {{ old('status', $language->status) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                                <div class="form-text">Enable or disable this language</div>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input @error('is_default') is-invalid @enderror" type="checkbox" 
                                           id="is_default" name="is_default" value="1" {{ old('is_default', $language->is_default) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_default">Set as Default</label>
                                </div>
                                <div class="form-text">If checked, this will become the default language</div>
                                @error('is_default')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Add this after the is_default checkbox -->
                            <div class="col-md-12 mt-3">
                                <label for="direction" class="form-label">Text Direction</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent"><i class="bi bi-text-left"></i></span>
                                    <select class="form-select @error('direction') is-invalid @enderror" id="direction" name="direction" required>
                                        <option value="ltr" {{ old('direction', $language->direction) == 'ltr' ? 'selected' : '' }}>Left to Right (LTR)</option>
                                        <option value="rtl" {{ old('direction', $language->direction) == 'rtl' ? 'selected' : '' }}>Right to Left (RTL)</option>
                                    </select>
                                </div>
                                <div class="form-text">Select the text direction for this language</div>
                                @error('direction')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mt-4 d-flex gap-2">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-save me-2"></i>Update Language
                                </button>
                                <a href="{{ route('admin.languages.index') }}" class="btn btn-outline-secondary px-4">
                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    // Configure Toastr
    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right",
        timeOut: 5000
    };
    
    // Display Toastr messages for validation errors
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
        @endforeach
    @endif
    
    // Display Toastr messages for success
    @if (session('success'))
        toastr.success('{{ session('success') }}');
    @endif
    
    // Display Toastr messages for error
    @if (session('error'))
        toastr.error('{{ session('error') }}');
    @endif
</script>
@endpush

@push('styles')
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush