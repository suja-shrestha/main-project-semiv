@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <div class="form-header">
        <div class="header-text">
            <h1>Add New Product</h1>
            <p>Fill out the details below to add a new product to your catalog.</p>
        </div>
        <a href="{{ route('productv2.index') }}" class="btn btn-outline">
            <i class="fas fa-list"></i> See All Products
        </a>
    </div>

    <!-- ========================================================== -->
    <!--     NEW: THIS BLOCK WILL DISPLAY VALIDATION ERRORS         -->
    <!-- ========================================================== -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <h5 class="alert-heading">Please fix the following errors:</h5>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('productv2.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <!-- Left Column: Main Details -->
            <div class="form-main-column">
                <div class="form-card">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="e.g., Modern T-Shirt" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="6"
                            placeholder="Describe the product, its features, materials, etc.">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="price">Price (Rs.)</label>
                            <input type="number" id="price" step="0.01" name="price" value="{{ old('price') }}"
                                class="form-control" placeholder="e.g., 1500.00" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock Quantity</label>
                            <input type="number" id="stock" name="stock" value="{{ old('stock') }}" class="form-control"
                                placeholder="e.g., 100" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Metadata & Image -->
            <div class="form-secondary-column">
                <div class="form-card">
                    <div class="form-group">
                        <label for="image_url">Image URL</label>
                        <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}"
                            class="form-control" placeholder="https://..." onkeyup="previewImage()">
                        <img id="image-preview"
                            src="{{ old('image_url', 'https://via.placeholder.com/400x300.png?text=Image+Preview') }}"
                            alt="Image Preview">
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category">
                            <option value="Electronics" {{ old('category')=='Electronics' ? 'selected' : '' }}>
                                Electronics</option>
                            <option value="Fashion" {{ old('category')=='Fashion' ? 'selected' : '' }}>Fashion</option>
                            <option value="Home & Garden" {{ old('category')=='Home & Garden' ? 'selected' : '' }}>Home
                                & Garden</option>
                            <option value="Sports" {{ old('category')=='Sports' ? 'selected' : '' }}>Sports</option>
                            <option value="Books" {{ old('category')=='Books' ? 'selected' : '' }}>Books</option>
                            <option value="Gaming" {{ old('category')=='Gaming' ? 'selected' : '' }}>Gaming</option>
                        </select>
                    </div>
                </div>
            <!-- In create.blade.php, this card holds the gender selection -->
<div class="form-card">
    <div class="form-group">
        <label>Gender Category</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_men" value="men" {{ old('gender') == 'men' ? 'checked' : '' }}>
            <label class="form-check-label" for="gender_men">Men</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_women" value="women" {{ old('gender') == 'women' ? 'checked' : '' }}>
            <label class="form-check-label" for="gender_women">Women</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_kids" value="kids" {{ old('gender') == 'kids' ? 'checked' : '' }}>
            <label class="form-check-label" for="gender_kids">Kids</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_unisex" value="unisex" {{ old('gender', 'unisex') == 'unisex' ? 'checked' : '' }}>
            <label class="form-check-label" for="gender_unisex">Unisex / Not Applicable</label>
        </div>
    </div>
</div>

                <div class="form-card">
                    <h5 class="card-subtitle">Product Flags</h5>
                    <div class="toggle-switch-group">
                        <label for="is_new" class="toggle-switch">
                            <input type="checkbox" id="is_new" name="is_new" value="1" {{ old('is_new') ? 'checked' : ''
                                }}>
                            <span class="slider"></span>
                        </label>
                        <label for="is_new">New Arrival</label>
                    </div>
                    <div class="toggle-switch-group">
                        <label for="is_featured" class="toggle-switch">
                            <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured')
                                ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                        <label for="is_featured">Featured</label>
                    </div>
                    <div class="toggle-switch-group">
                        <label for="is_hot_sale" class="toggle-switch">
                            <input type="checkbox" id="is_hot_sale" name="is_hot_sale" value="1" {{ old('is_hot_sale')
                                ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                        <label for="is_hot_sale">Hot Sale</label>
                    </div>
                    <div class="toggle-switch-group">
                        <label for="is_best_deal" class="toggle-switch">
                            <input type="checkbox" id="is_best_deal" name="is_best_deal" value="1" {{
                                old('is_best_deal') ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                        <label for="is_best_deal">Recommended</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Product</button>
            <a href="{{ route('productv2.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<!-- ================== STYLES ================== -->
<style>
    :root {
        --primary-color: #667eea;
        --secondary-color: #764ba2;
        --danger-color: #ff4d4f;
        --bg-color: #f4f7fa;
        --card-bg: #ffffff;
        --text-dark: #2c3e50;
        --text-light: #8492a6;
        --border-color: #e0e6ed;
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    /* --- NEW: Alert Box for Errors --- */
    .alert {
        padding: 1.5rem;
        margin-bottom: 2rem;
        border-radius: 12px;
        border: 1px solid transparent;
    }

    .alert-danger {
        background-color: #fbebee;
        border-color: #f6d2d2;
        color: #c0392b;
    }

    .alert-danger .alert-heading {
        color: inherit;
        font-weight: 700;
        margin-top: 0;
    }

    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 1.5rem;
    }

    .product-form-container {
        max-width: 1200px;
        margin: 2rem auto;
        font-family: 'Inter', sans-serif;
    }

    .form-header {
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .form-header h1 {
        color: var(--text-dark);
        font-weight: 700;
        font-size: 2rem;
        margin: 0;
    }

    .form-header p {
        color: var(--text-light);
        font-size: 1rem;
        margin: 0;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
    }

    @media (max-width: 992px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    }

    .form-card {
        background: var(--card-bg);
        border-radius: 12px;
        padding: 2rem;
        box-shadow: var(--shadow);
        margin-bottom: 2rem;
    }

    .card-subtitle {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 1.5rem;
        border-bottom: 1px solid var(--border-color);
        padding-bottom: 0.75rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--text-dark);
        font-size: 0.9rem;
    }

    .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .form-row {
        display: flex;
        gap: 1.5rem;
    }

    .form-row .form-group {
        width: 100%;
    }

    #image-preview {
        width: 100%;
        margin-top: 1rem;
        border-radius: 8px;
        border: 1px dashed var(--border-color);
        object-fit: cover;
        aspect-ratio: 16 / 9;
    }

    .toggle-switch-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .toggle-switch-group:last-child {
        margin-bottom: 0;
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 28px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        border-radius: 28px;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        border-radius: 50%;
        transition: .4s;
    }

    input:checked+.slider {
        background: var(--primary-color);
    }

    input:checked+.slider:before {
        transform: translateX(22px);
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 1rem;
    }

    .btn {
        padding: 0.8rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .btn-secondary {
        background-color: #e0e6ed;
        color: var(--text-dark);
    }

    .btn-secondary:hover {
        background-color: #d3dce6;
    }

    .btn-outline {
        background: transparent;
        border: 1px solid var(--border-color);
        color: var(--text-dark);
    }

    .btn-outline:hover {
        background: #f8f9fa;
        border-color: #d3dce6;
    }
</style>

<!-- ================== SCRIPTS ================== -->
<script>
    function previewImage() {
        const imageUrl = document.getElementById('image_url').value;
        const imagePreview = document.getElementById('image-preview');
        const defaultImage = 'https://via.placeholder.com/400x300.png?text=Image+Preview';
        if (imageUrl) {
            imagePreview.src = imageUrl;
            imagePreview.onerror = function() { imagePreview.src = defaultImage; };
        } else {
            imagePreview.src = defaultImage;
        }
    }
</script>
@endsection