<div class="row g-4">

    {{-- LEFT SIDE --}}
    <div class="col-lg-8">
        <div class="row g-3">

            {{-- Category Name --}}
            <div class="col-md-6">
                <label class="form-label fw-bold text-navy small text-uppercase">
                    Category Name <span class="text-danger">*</span>
                </label>
                <input type="text"
                       name="name"
                       id="nameInput"
                       class="form-control form-control-lg bg-light border-0"
                       placeholder="e.g. Electronics, Women’s Clothing"
                       value="{{ old('name', $category->name ?? '') }}"
                       required>
                <div class="form-text small">
                    Should be unique within the store.
                </div>
            </div>

            {{-- Slug --}}
            <div class="col-md-6">
                <label class="form-label fw-bold text-navy small text-uppercase">
                    Slug / URL Code <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0 text-muted">/</span>
                    <input type="text"
                           name="slug"
                           id="slugInput"
                           class="form-control form-control-lg bg-light border-0"
                           placeholder="electronics"
                           value="{{ old('slug', $category->slug ?? '') }}"
                           required>
                </div>
                <div class="form-text small">
                    URL-friendly identifier (no spaces).
                </div>
            </div>

            {{-- Description --}}
            <div class="col-12">
                <label class="form-label fw-bold text-navy small text-uppercase">
                    Description
                </label>
                <textarea name="description"
                          rows="4"
                          class="form-control bg-light border-0"
                          placeholder="Short explanation of what products belong here...">{{ old('description', $category->description ?? '') }}</textarea>
                <div class="form-text small">
                    Useful for customers and SEO purposes.
                </div>
            </div>

            {{-- Extra Section --}}
            <div class="col-12">
                <div class="p-3 rounded-3 bg-light border border-light-subtle mt-2">
                    <h6 class="text-navy fw-bold mb-3">
                        <i class="bi bi-diagram-3 me-2"></i>
                        Hierarchy & Organization
                    </h6>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small text-uppercase fw-bold text-muted">
                                Sort Order
                            </label>
                            <input type="number"
                                   name="sort_order"
                                   class="form-control border-0 shadow-sm"
                                   value="{{ old('sort_order', $category->sort_order ?? 0) }}">
                            <div class="form-text small">
                                Lower numbers appear first.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- RIGHT SIDE --}}
    <div class="col-lg-4">

        {{-- Status --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <label class="form-label fw-bold text-navy small text-uppercase mb-2">
                    Visibility Status
                </label>
                <select name="status"
                        class="form-select bg-light border-0 text-navy">
                    <option value="active"
                        {{ old('status', $category->status ?? '') === 'active' ? 'selected' : '' }}>
                        Active (Visible)
                    </option>
                    <option value="inactive"
                        {{ old('status', $category->status ?? '') === 'inactive' ? 'selected' : '' }}>
                        Inactive (Hidden)
                    </option>
                </select>

                <div class="mt-2 text-muted small">
                    <i class="bi bi-info-circle me-1"></i>
                    Controls visibility in the store.
                </div>
            </div>
        </div>

        {{-- Image Upload --}}
        <label class="form-label fw-bold text-navy small text-uppercase mb-2">
            Category Thumbnail
        </label>

        <div class="image-upload-box text-center p-4 border-2 border-dashed rounded-4 position-relative hover-effect bg-white"
             style="border-color:#dee2e6;">

            <input type="file"
                   name="image"
                   class="position-absolute top-0 start-0 w-100 h-100 opacity-0"
                   onchange="previewImage(event)"
                   style="cursor:pointer; z-index:10;">

            {{-- Preview --}}
            <div id="imagePreview"
                 class="mb-2 {{ isset($category) && $category->image ? '' : 'd-none' }}">
                <img id="previewImg"
                     src="{{ isset($category) && $category->image ? asset('storage/'.$category->image) : '#' }}"
                     class="img-fluid rounded-3 shadow-sm"
                     style="max-height:150px; width:100%; object-fit:cover;">
            </div>

            {{-- Placeholder --}}
            <div id="uploadPlaceholder"
                 class="{{ isset($category) && $category->image ? 'd-none' : '' }}">
                <div class="mb-2 text-primary bg-primary-subtle rounded-circle d-inline-flex p-3">
                    <i class="bi bi-cloud-arrow-up fs-3"></i>
                </div>
                <p class="small text-muted mb-0">Click to upload image</p>
                <small class="text-secondary" style="font-size:10px;">
                    JPG, PNG max 2MB
                </small>
            </div>

        </div>
    </div>
</div>

{{-- JS --}}
<script>
document.getElementById('nameInput').addEventListener('input', function () {
    let slug = this.value.toLowerCase()
        .replace(/[^\w ]+/g, '')
        .replace(/ +/g, '-');
    document.getElementById('slugInput').value = slug;
});

function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
        document.getElementById('previewImg').src = reader.result;
        document.getElementById('imagePreview').classList.remove('d-none');
        document.getElementById('uploadPlaceholder').classList.add('d-none');
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

{{-- UI Enhancements --}}
<style>
.form-control:focus,
.form-select:focus {
    border-color: #1F2B5B;
    box-shadow: 0 0 0 .25rem rgba(31,43,91,.1);
}
.hover-effect {
    transition: all .2s ease;
}
.hover-effect:hover {
    border-color: #1F2B5B !important;
    background-color: #f8f9fa;
}
</style>
