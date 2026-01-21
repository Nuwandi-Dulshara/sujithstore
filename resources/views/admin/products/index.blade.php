@extends('admin.layouts.app')
@section('title','Products')

@section('content')

<style>
:root {
    --navy: #1F2B5B;
    --navy-light: #2e3c7a;
    --danger: #e63946;
    --soft-bg: #f4f6fb;
}

.product-page {
    margin-top: 90px;
    padding: 30px;
    background: linear-gradient(135deg, #eef1f8, #f9fbff);
    border-radius: 18px;
}

.page-header {
    background: linear-gradient(135deg, var(--navy), var(--navy-light));
    color: #fff;
    border-radius: 16px;
    padding: 22px 26px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-card {
    background: #fff;
    margin-top: 30px;
    border-radius: 16px;
    box-shadow: 0 15px 40px rgba(0,0,0,.08);
    overflow: hidden;
}

.product-thumb {
    width: 56px;
    height: 56px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}
</style>

<div class="product-page">

    <div class="page-header">
        <h4>Products</h4>
        <a href="{{ route('admin.products.create') }}" class="btn btn-light">
            + Add Product
        </a>
    </div>

    <div class="table-card">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if($product->images->first())
                            <img src="{{ asset('storage/'.$product->images->first()->image_path) }}"
                                 class="product-thumb">
                        @else
                            <div style="width:56px;height:56px;background:#f1f3fa;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                {{ strtoupper(substr($product->name,0,1)) }}
                            </div>
                        @endif
                    </td>

                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? '—' }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ number_format($product->price,2) }}</td>
                    <td>{{ $product->quantity }}</td>

                    <td>
                        <span class="badge {{ $product->status === 'available' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($product->status) }}
                        </span>
                    </td>

                    <td class="d-flex gap-2">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary">
                            Edit
                        </a>

                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                              onsubmit="return confirm('Delete product?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-5 text-muted">
                        No products found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>

</div>

@endsection
