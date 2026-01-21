@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="container-fluid p-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
        <div>
            <h3 class="fw-bold text-navy">Dashboard Overview</h3>
            <p class="text-muted mb-0">Here is what's happening at <span class="text-danger fw-bold">Sujith Stores</span> today.</p>
        </div>
        <div>
            <button class="btn btn-primary btn-wave shadow-sm">
                <i class="bi bi-download me-2"></i> Generate Report
            </button>
        </div>
    </div>

    <div class="row g-4 mb-4">


        <div class="col-12 col-sm-6 col-xxl-3">
            <div class="card border-0 shadow-sm overflow-hidden h-100 card-hover">
                <div class="card-body p-4 position-relative" style="background: linear-gradient(135deg, #E63946 0%, #ff6b6b 100%);">
                    <div class="d-flex align-items-center justify-content-between text-white">
                        <div>
                            <p class="mb-1 opacity-75 text-uppercase fw-bold small">New Orders</p>
                            <h3 class="fw-bold mb-0">{{ $stats['orders'] ?? 0 }}</h3>
                        </div>
                        <div class="icon-box bg-white bg-opacity-25 rounded-circle text-white">
                            <i class="bi bi-bag-check-fill"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-white bg-opacity-25 text-white border border-white border-opacity-25">
                            <i class="bi bi-dash"></i> 0%
                        </span>
                        <small class="text-white opacity-50 ms-2">vs yesterday</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xxl-3">
            <div class="card border-0 shadow-sm h-100 card-hover bg-white">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-1 text-muted text-uppercase fw-bold small">Active Products</p>
                            <h3 class="fw-bold text-navy mb-0">{{ $stats['products'] ?? 0 }}</h3>
                        </div>
                        <div class="icon-box bg-light text-primary rounded-circle">
                            <i class="bi bi-box-seam"></i>
                        </div>
                    </div>
                    <div class="mt-3 text-muted small">
                        <span class="text-danger fw-bold">2</span> low stock alerts
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xxl-3">
            <div class="card border-0 shadow-sm h-100 card-hover bg-white">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="mb-1 text-muted text-uppercase fw-bold small">Total Customers</p>
                            <h3 class="fw-bold text-navy mb-0">{{ $stats['users'] ?? 0 }}</h3>
                        </div>
                        <div class="icon-box bg-light text-info rounded-circle">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex align-items-center">
                            <div class="d-flex ms-1">
                                <div class="avatar-sm bg-secondary rounded-circle border border-white"></div>
                                <div class="avatar-sm bg-primary rounded-circle border border-white" style="margin-left: -10px;"></div>
                                <div class="avatar-sm bg-danger rounded-circle border border-white" style="margin-left: -10px;"></div>
                            </div>
                            <small class="text-muted ms-2">+5 joined today</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold text-navy mb-0">Sales Analytics</h6>
                    <select class="form-select form-select-sm w-auto border-0 bg-light">
                        <option>This Week</option>
                        <option>Last Month</option>
                    </select>
                </div>
                <div class="card-body">
                    <div id="salesChart" style="min-height: 300px;"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="fw-bold text-navy mb-0">Recent Orders</h6>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @forelse($recent_orders as $order)
                        <div class="list-group-item border-0 d-flex align-items-center px-4 py-3 hover-bg">
                            <div class="avatar-initial rounded bg-light text-primary fw-bold me-3">
                                {{ isset($order['user']) ? substr($order['user'], 0, 1) : 'U' }}
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 text-navy font-14">{{ $order['user'] ?? 'Unknown' }}</h6>
                                <small class="text-muted">{{ $order['date'] ?? '' }}</small>
                            </div>
                            <div class="text-end">
                                <div class="fw-bold text-dark">{{ $order['amount'] ?? '' }}</div>
                                @if(($order['status'] ?? '') == 'Completed')
                                    <span class="badge bg-success-subtle text-success rounded-pill" style="font-size: 10px">Paid</span>
                                @elseif(($order['status'] ?? '') == 'Pending')
                                    <span class="badge bg-warning-subtle text-warning rounded-pill" style="font-size: 10px">Pending</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger rounded-pill" style="font-size: 10px">Failed</span>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="list-group-item border-0 px-4 py-3 text-muted">No recent orders found.</div>
                        @endforelse
                    </div>
                    <div class="p-3 text-center border-top border-light">
                        <a href="#" class="text-decoration-none text-primary small fw-bold">View All Orders <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="fw-bold text-navy mb-0">Recent Products</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recent_products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ isset($product->price) ? '$'.number_format($product->price,2) : '-' }}</td>
                                    <td>{{ $product->created_at ? $product->created_at->diffForHumans() : '' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-muted">No recent products found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    /* Colors */
    .text-navy { color: #1F2B5B; }
    .bg-navy { background-color: #1F2B5B; }
    
    /* Icons */
    .icon-box {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    /* Cards */
    .card {
        border-radius: 16px; /* Smooth corners */
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important;
    }

    /* Avatars */
    .avatar-sm { width: 24px; height: 24px; }
    .avatar-initial {
        width: 40px; height: 40px; 
        display: flex; align-items: center; justify-content: center;
    }
    
    /* List Item Hover */
    .hover-bg:hover {
        background-color: #f8f9fa;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var options = {
            series: [{
                name: 'Sales',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'Revenue',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],
            chart: {
                height: 300,
                type: 'area',
                toolbar: { show: false },
                fontFamily: 'inherit'
            },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 2 },
            // Uses your Brand Colors: Navy and Red
            colors: ['#1F2B5B', '#E63946'], 
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
            },
            tooltip: { x: { format: 'dd/MM/yy HH:mm' } },
            fill: {
                type: 'gradient',
                gradient: { shadeIntensity: 1, opacityFrom: 0.7, opacityTo: 0.9, stops: [0, 90, 100] }
            }
        };

        var chart = new ApexCharts(document.querySelector("#salesChart"), options);
        chart.render();
    });
</script>
@endsection