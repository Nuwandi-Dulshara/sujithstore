@extends('admin.layouts.app')
@section('title','Edit Product')

@section('content')

<style>
    :root {
        --primary-navy: #1e293b;
        --primary-hover: #334155;
        --accent-blue: #3b82f6;
        --border-color: #e2e8f0;
        --bg-input: #f8fafc;
        --text-muted: #64748b;
        --danger: #ef4444;
    }

    .admin-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--border-color);
    }

    .admin-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .admin-card-header h5 {
        margin: 0;
        font-weight: 700;
        color: var(--primary-navy);
    }

    .admin-card-body {
        padding: 24px;
    }

    .btn-admin-primary {
        background-color: var(--primary-navy);
        color: white;
        padding: 10px 24px;
        border-radius: 8px;
        border: none;
    }

    .btn-admin-cancel {
        background-color: white;
        color: var(--text-muted);
        border: 1px solid var(--border-color);
        padding: 10px 24px;
        border-radius: 8px;
        margin-right: 10px;
        text-decoration: none;
    }
</style>

<div class="container-fluid py-4" style="margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">

            <form action="{{ route('admin.products.update', $product) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="admin-card">

                    <!-- Header -->
                    <div class="admin-card-header">
                        <h5>Edit Product</h5>
                        <a href="{{ route('admin.products.index') }}"
                           class="btn-sm text-decoration-none text-muted">
                            &larr; Back to list
                        </a>
                    </div>

                    <!-- Body -->
                    <div class="admin-card-body">

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Select category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">SKU</label>
                            <input type="text" name="sku" value="{{ $product->sku }}" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Discount Price</label>
                                <input type="number" name="discount_price" value="{{ $product->discount_price }}" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="4" class="form-control">{{ $product->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Images (Upload additional)</label>
                            <input type="file" name="images[]" multiple class="form-control">
                        </div>

                        @if($product->images->count())
                            <div class="mb-3">
                                <label class="form-label">Existing Images</label>
                                <div class="d-flex gap-2 flex-wrap">
                                    @foreach($product->images as $img)
                                        <div style="width:96px;height:96px;overflow:hidden;border-radius:8px;border:1px solid #e2e8f0;">
                                            <img src="{{ asset('storage/'.$img->image_path) }}"
                                                 style="width:100%;height:100%;object-fit:cover;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="available" {{ $product->status === 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="out_of_stock" {{ $product->status === 'out_of_stock' ? 'selected' : '' }}>Out of stock</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Featured</label>
                                <select name="featured" class="form-control">
                                    <option value="0" {{ !$product->featured ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $product->featured ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-light px-4 py-3 d-flex justify-content-end border-top">
                        <a href="{{ route('admin.products.index') }}" class="btn-admin-cancel">
                            Cancel
                        </a>
                        <button type="submit" class="btn-admin-primary">
                            Update Product
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

@endsection
