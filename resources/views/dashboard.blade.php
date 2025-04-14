@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">{{\App\Helpers\Helpers::translate('Dashboard')}}</h2>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-primary">
                <i class="bi bi-download me-2"></i>Export
            </button>
            <button class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>New Report
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="text-muted mb-1">Total Sales</h6>
                            <h3 class="fw-bold mb-0">$24,780</h3>
                        </div>
                        <div class="rounded-circle p-2" style="background-color: rgba(79, 70, 229, 0.1);">
                            <i class="bi bi-cart-check fs-4" style="color: var(--primary);"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-success me-2">+12.5%</span>
                        <span class="text-muted small">from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="text-muted mb-1">Total Orders</h6>
                            <h3 class="fw-bold mb-0">1,482</h3>
                        </div>
                        <div class="rounded-circle p-2" style="background-color: rgba(16, 185, 129, 0.1);">
                            <i class="bi bi-box-seam fs-4" style="color: var(--success);"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-success me-2">+8.2%</span>
                        <span class="text-muted small">from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="text-muted mb-1">New Customers</h6>
                            <h3 class="fw-bold mb-0">382</h3>
                        </div>
                        <div class="rounded-circle p-2" style="background-color: rgba(59, 130, 246, 0.1);">
                            <i class="bi bi-people fs-4" style="color: var(--info);"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-success me-2">+5.7%</span>
                        <span class="text-muted small">from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h6 class="text-muted mb-1">Conversion Rate</h6>
                            <h3 class="fw-bold mb-0">3.42%</h3>
                        </div>
                        <div class="rounded-circle p-2" style="background-color: rgba(245, 158, 11, 0.1);">
                            <i class="bi bi-graph-up-arrow fs-4" style="color: var(--warning);"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-danger me-2">-1.2%</span>
                        <span class="text-muted small">from last month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Sales Overview</h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            This Month
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">This Week</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Product Categories</h5>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-three-dots"></i>
                    </button>
                </div>
                <div class="card-body">
                    <canvas id="categoryChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Orders</h5>
                    <a href="#" class="btn btn-sm btn-link text-decoration-none">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD-7843</td>
                                    <td>John Smith</td>
                                    <td>Protein Powder</td>
                                    <td>Aug 12, 2023</td>
                                    <td>$59.99</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>#ORD-7842</td>
                                    <td>Emma Johnson</td>
                                    <td>Resistance Bands</td>
                                    <td>Aug 11, 2023</td>
                                    <td>$24.99</td>
                                    <td><span class="badge bg-warning text-dark">Processing</span></td>
                                </tr>
                                <tr>
                                    <td>#ORD-7841</td>
                                    <td>Michael Brown</td>
                                    <td>Creatine Monohydrate</td>
                                    <td>Aug 10, 2023</td>
                                    <td>$34.99</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>#ORD-7840</td>
                                    <td>Sarah Davis</td>
                                    <td>Yoga Mat</td>
                                    <td>Aug 09, 2023</td>
                                    <td>$29.99</td>
                                    <td><span class="badge bg-danger">Cancelled</span></td>
                                </tr>
                                <tr>
                                    <td>#ORD-7839</td>
                                    <td>David Wilson</td>
                                    <td>Pre-Workout</td>
                                    <td>Aug 08, 2023</td>
                                    <td>$39.99</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Top Selling Products</h5>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-repeat"></i>
                    </button>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="rounded bg-light p-2 me-3">
                                    <i class="bi bi-capsule"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Whey Protein Isolate</h6>
                                    <small class="text-muted">2.5k units sold</small>
                                </div>
                            </div>
                            <span class="badge bg-soft-primary text-primary rounded-pill">$12,500</span>
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="rounded bg-light p-2 me-3">
                                    <i class="bi bi-capsule"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Pre-Workout Formula</h6>
                                    <small class="text-muted">1.8k units sold</small>
                                </div>
                            </div>
                            <span class="badge bg-soft-primary text-primary rounded-pill">$9,200</span>
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="rounded bg-light p-2 me-3">
                                    <i class="bi bi-capsule"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">BCAA Supplement</h6>
                                    <small class="text-muted">1.2k units sold</small>
                                </div>
                            </div>
                            <span class="badge bg-soft-primary text-primary rounded-pill">$6,800</span>
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="rounded bg-light p-2 me-3">
                                    <i class="bi bi-capsule"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Creatine Monohydrate</h6>
                                    <small class="text-muted">950 units sold</small>
                                </div>
                            </div>
                            <span class="badge bg-soft-primary text-primary rounded-pill">$4,750</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Sales',
                data: [12500, 15000, 17500, 14000, 18000, 19500, 22000, 24000, 23000, 25000, 27000, 24500],
                borderColor: '#4f46e5',
                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [2, 4],
                        drawBorder: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Category Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Proteins', 'Pre-Workout', 'Vitamins', 'Weight Loss', 'Accessories'],
            datasets: [{
                data: [35, 25, 15, 15, 10],
                backgroundColor: [
                    '#4f46e5',
                    '#10b981',
                    '#3b82f6',
                    '#f59e0b',
                    '#64748b'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            cutout: '70%'
        }
    });
</script>

<style>
    .bg-soft-primary {
        background-color: rgba(79, 70, 229, 0.1) !important;
    }

    .text-primary {
        color: var(--primary) !important;
    }
</style>
@endpush
