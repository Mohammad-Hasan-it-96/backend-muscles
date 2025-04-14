@extends('layouts.app')

@section('title', 'Manage Products')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-4">
        <h3>Product Management</h3>
        <div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary me-2">
                <i class="bi bi-plus-lg me-2"></i>Add New Product
            </a>
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-file-excel me-1"></i> Excel
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="dropdown-header">Export</li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.products.export') }}">
                            <i class="bi bi-file-earmark-excel me-2"></i> 
                            @if(Auth::user()->role === 'admin')
                                Export All Products
                            @else
                                Export Your Products
                            @endif
                        </a>
                    </li>
                    @if(Auth::user()->role === 'admin')
                        <li><hr class="dropdown-divider"></li>
                        <li class="dropdown-header">Export by User</li>
                        @foreach($users as $user)
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.products.export', ['user_id' => $user->id]) }}">
                                    <i class="bi bi-person me-2"></i> {{ $user->name }}'s Products
                                </a>
                            </li>
                        @endforeach
                    @endif
                    <li><hr class="dropdown-divider"></li>
                    <li class="dropdown-header">Import</li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.products.import') }}">
                            <i class="bi bi-file-earmark-arrow-up me-2"></i> Import Products
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header bg-light py-3">
            <h6 class="m-0 font-weight-bold">Filter Options</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="user_filter" class="form-label">Filter by User</label>
                    <select name="user_id" id="user_filter" class="form-select">
                        <option value="">All Users</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->role }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-filter me-1"></i> Apply Filters
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary ms-2">
                        <i class="bi bi-x-circle me-1"></i> Clear Filters
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Created By</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @forelse($products as $product)
                        <tr class="py-3">
                            <td class="ps-4 fw-medium">{{ $product->id }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light rounded p-2">
                                        <i class="bi bi-box-seam text-primary fs-5"></i>
                                    </div>
                                    <span>{{ $product->name }}</span>
                                </div>
                            </td>
                            <td>{{ Str::limit($product->details, 40) }}</td>
                            <td class="text-success fw-medium">${{ number_format($product->price, 2) }}</td>
                            <td>
                                <span class="badge bg-{{ $product->quantity > 10 ? 'success' : 'warning' }}">
                                    {{ $product->quantity }} in stock
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle bg-primary text-white me-2">
                                        {{ substr($product->user->name ?? 'Unknown', 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-medium">{{ $product->user->name ?? 'Unknown' }}</div>
                                        <small class="text-muted">{{ $product->user->role ?? '' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" 
                                       class="btn btn-sm btn-light rounded-circle p-2">
                                        <i class="bi bi-pencil-square text-primary"></i>
                                    </a>
                                    <form action="{{ route('admin.products.delete', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light rounded-circle p-2">
                                            <i class="bi bi-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-database-exclamation fs-1"></i>
                                <p class="mt-3">No products found in database</p>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}
</style>
@endsection