@extends('admin.layouts.app')
@section('title', 'Create Category')

@section('content')

<style>
    /* ... (Same styles as before) ... */
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
        display: flex; justify-content: space-between; align-items: center;
    }
    .admin-card-header h5 { margin: 0; font-weight: 700; color: var(--primary-navy); }
    .admin-card-body { padding: 24px; }
    .form-label { font-size: 12px; text-transform: uppercase; font-weight: 600; color: var(--text-muted); margin-bottom: 6px; }
    .form-control, .form-select {
        font-size: 14px; background-color: var(--bg-input); border: 1px solid var(--border-color);
        border-radius: 8px; padding: 10px 14px; color: var(--primary-navy);
    }
    .form-control:focus { border-color: var(--accent-blue); box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1); outline: none; }
    .image-upload-wrapper {
        width: 150px; height: 150px; border: 2px dashed var(--border-color);
        border-radius: 12px; background: var(--bg-input); display: flex;
        align-items: center; justify-content: center; cursor: pointer; position: relative; overflow: hidden;
    }
    .image-preview { width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 2; }
    .upload-placeholder { text-align: center; color: var(--text-muted); }
    .btn-admin-primary { background-color: var(--primary-navy); color: white; padding: 10px 24px; border-radius: 8px; border: none; }
    .btn-admin-cancel { background-color: white; color: var(--text-muted); border: 1px solid var(--border-color); padding: 10px 24px; border-radius: 8px; margin-right: 10px; text-decoration: none; }
    .invalid-feedback { font-size: 12px; color: var(--danger); margin-top: 4px; }
</style>

<div class="container-fluid py-4" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="admin-card">
                    <div class="admin-card-header">
                        <h5>Create New Category</h5>
                        <a href="{{ route('admin.categories.index') }}" class="btn-sm text-decoration-none text-muted">&larr; Back to list</a>
                    </div>

                    <div class="admin-card-body">
                        
                        {{-- Row 1: Name & Slug --}}
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required autofocus>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                       id="slug" name="slug" value="{{ old('slug') }}" placeholder="auto-generated">
                                @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Row 2: Description --}}
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        </div>

                        {{-- Row 4: Status & Image --}}
                        <div class="row g-4 align-items-start">
                            <div class="col-md-6">
                                <label for="status" class="form-label">Visibility Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                    {{-- FIX: Using 'active'/'inactive' strings instead of 1/0 --}}
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active (Visible)</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive (Hidden)</option>
                                </select>
                                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Category Image</label>
                                <div class="d-flex align-items-start gap-3">
                                    <input type="file" name="image" id="imageInput" class="d-none" accept="image/*">
                                    <div class="image-upload-wrapper" onclick="document.getElementById('imageInput').click()">
                                        <div class="upload-placeholder" id="uploadPlaceholder">
                                            <i class="bi bi-cloud-upload fs-4"></i><br>
                                            <span class="small">Click to Upload</span>
                                        </div>
                                        <img id="previewImage" src="#" class="image-preview d-none">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer bg-light px-4 py-3 d-flex justify-content-end border-top">
                        <a href="{{ route('admin.categories.index') }}" class="btn-admin-cancel">Cancel</a>
                        <button type="submit" class="btn-admin-primary">Create Category</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // 1. Slug Generator
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        nameInput.addEventListener('input', function() {
            slugInput.value = this.value.toLowerCase().trim()
                .replace(/[^\w\s-]/g, '').replace(/[\s_-]+/g, '-').replace(/^-+|-+$/g, '');
        });

        // 2. Image Preview
        document.getElementById('imageInput').addEventListener('change', function(e) {
            if (e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    document.getElementById('previewImage').src = ev.target.result;
                    document.getElementById('previewImage').classList.remove('d-none');
                    document.getElementById('uploadPlaceholder').classList.add('d-none');
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        // On input change, find the matching ID from the datalist options
        parentInput.addEventListener('input', function() {
            const val = this.value;
            const options = dataList.childNodes;
            let matchFound = false;
            
            for (let i = 0; i < options.length; i++) {
                if (options[i].value === val) {
                    // We found a match in the list, set the Hidden ID
                    parentHidden.value = options[i].getAttribute('data-value');
                    matchFound = true;
                    break;
                }
            }
            
            // If user clears input or types something not in list, clear the ID
            if (!matchFound) {
                parentHidden.value = ''; 
            }
        });
    });
</script>

@endsection