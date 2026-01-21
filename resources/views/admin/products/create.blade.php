@extends('admin.layouts.app')
@section('title', 'Create Product')

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

    .form-label {
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--text-muted);
        margin-bottom: 6px;
    }

    .form-control,
    .form-select {
        font-size: 14px;
        background-color: var(--bg-input);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 10px 14px;
        color: var(--primary-navy);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    .image-upload-wrapper {
        width: 150px;
        height: 150px;
        border: 2px dashed var(--border-color);
        border-radius: 12px;
        background: var(--bg-input);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .image-preview {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid var(--border-color);
    }

    .upload-placeholder {
        text-align: center;
        color: var(--text-muted);
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
        <div class="col-lg-10 col-xl-8">

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="admin-card">

                    <!-- Header -->
                    <div class="admin-card-header">
                        <h5>Create New Product</h5>
                        <a href="{{ route('admin.products.index') }}"
                           class="btn-sm text-decoration-none text-muted">
                            &larr; Back to list
                        </a>
                    </div>

                    <!-- Body -->
                    <div class="admin-card-body">

                        {{-- Row 1: Name & Category --}}
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Product Name *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Category *</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">Select category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Row 2: SKU --}}
                        <div class="mb-4">
                            <label class="form-label">SKU *</label>
                            <input type="text" name="sku" class="form-control" required>
                        </div>

                        {{-- Row 3: Pricing --}}
                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Price *</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Discount Price</label>
                                <input type="number" name="discount_price" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Quantity *</label>
                                <input type="number" name="quantity" class="form-control" required>
                            </div>
                        </div>

                        {{-- Row 4: Description --}}
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="4" class="form-control"></textarea>
                        </div>

                        {{-- Row 5: Product Images (Category-style) --}}
                        <div class="mb-4">
                            <label class="form-label">Product Images</label>

                            <input type="file" name="images[]" id="imagesInput" multiple class="d-none" accept="image/*">

                            <div class="d-flex gap-3 flex-wrap align-items-start">
                                <div class="image-upload-wrapper"
                                     onclick="document.getElementById('imagesInput').click()">
                                    <div class="upload-placeholder">
                                        <i class="bi bi-cloud-upload fs-4"></i><br>
                                        <span class="small">Click to Upload</span>
                                    </div>
                                </div>

                                <div id="imagePreviewContainer" class="d-flex gap-3 flex-wrap"></div>
                            </div>
                        </div>

                        {{-- Row 6: Status & Featured --}}
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="available">Available</option>
                                    <option value="out_of_stock">Out of stock</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Featured</label>
                                <select name="featured" class="form-select">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-light px-4 py-3 d-flex justify-content-end border-top">
                        <a href="{{ route('admin.products.index') }}" class="btn-admin-cancel">Cancel</a>
                        <button type="submit" class="btn-admin-primary">Save Product</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<script>
document.getElementById('imagesInput').addEventListener('change', function (e) {
    const container = document.getElementById('imagePreviewContainer');
    container.innerHTML = '';

    Array.from(e.target.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function (ev) {
            const img = document.createElement('img');
            img.src = ev.target.result;
            img.className = 'image-preview';
            container.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
});
</script>

@endsection
