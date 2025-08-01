{{-- /resources/views/admin/products/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <div class="form-header">
        <div class="header-text">
            <h1>Edit Product</h1>
            {{-- Changed Title --}}
            <p>Update the details for: <strong>{{ $product->name }}</strong></p>
        </div>
        <a href="{{ route('productv2.index') }}" class="btn btn-outline">
            <i class="fas fa-list"></i> Back to All Products
        </a>
    </div>

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

    {{-- IMPORTANT: The form action and method are different --}}
    <form action="{{ route('productv2.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- This tells Laravel it's an UPDATE request --}}

        <div class="form-grid">
            <!-- Left Column: Main Details -->
            <div class="form-main-column">
                <div class="form-card">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        {{-- Pre-filled with existing product data --}}
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="6">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="price">Price (Rs.)</label>
                            <input type="number" id="price" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock Quantity</label>
                            <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Metadata & Image -->
            <div class="form-secondary-column">
                <div class="form-card">
                    <div class="form-group">
                        <label for="image_url">Image URL</label>
                        <input type="text" id="image_url" name="image_url" value="{{ old('image_url', $product->image_url) }}" class="form-control" onkeyup="previewImage()">
                        <img id="image-preview" src="{{ old('image_url', $product->image_url) ?? 'https://via.placeholder.com/400x300.png?text=Image+Preview' }}" alt="Image Preview">
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category">
                            {{-- Logic to pre-select the correct category --}}
                            <option value="Electronics" {{ old('category', $product->category) == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                            <option value="Fashion" {{ old('category', $product->category) == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                            <option value="Home & Garden" {{ old('category', $product->category) == 'Home & Garden' ? 'selected' : '' }}>Home & Garden</option>
                            <option value="Sports" {{ old('category', $product->category) == 'Sports' ? 'selected' : '' }}>Sports</option>
                            <option value="Books" {{ old('category', $product->category) == 'Books' ? 'selected' : '' }}>Books</option>
                            <option value="Gaming" {{ old('category', $product->category) == 'Gaming' ? 'selected' : '' }}>Gaming</option>
                        </select>
                    </div>
                </div>

                <div class="form-card">
                    <h5 class="card-subtitle">Product Flags</h5>
                    {{-- Logic to pre-check the existing flags --}}
                    <div class="toggle-switch-group">
                        <label for="is_new" class="toggle-switch">
                            <input type="checkbox" id="is_new" name="is_new" value="1" {{ old('is_new', $product->is_new) ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                        <label for="is_new">New Arrival</label>
                    </div>
                     <div class="toggle-switch-group">
                        <label for="is_featured" class="toggle-switch">
                            <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                        <label for="is_featured">Featured</label>
                    </div>
                     <div class="toggle-switch-group">
                        <label for="is_hot_sale" class="toggle-switch">
                            <input type="checkbox" id="is_hot_sale" name="is_hot_sale" value="1" {{ old('is_hot_sale', $product->is_hot_sale) ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                        <label for="is_hot_sale">Hot Sale</label>
                    </div>
                     <div class="toggle-switch-group">
                        <label for="is_best_deal" class="toggle-switch">
                            <input type="checkbox" id="is_best_deal" name="is_best_deal" value="1" {{ old('is_best_deal', $product->is_best_deal) ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                        <label for="is_best_deal">Recommended</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-actions">
            {{-- Changed Button Text --}}
            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('productv2.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<!-- STYLES and SCRIPTS from create.blade.php can be copied here -->
<style>
    :root {
        --primary-color: #667eea;
        --secondary-color: #764ba2;
        --bg-color: #f4f7fa;
        --card-bg: #ffffff;
        --text-dark: #2c3e50;
        --text-light: #8492a6;
        --border-color: #e0e6ed;
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }
    .product-form-container { max-width: 1200px; margin: 2rem auto; font-family: 'Inter', sans-serif; }
    .form-header { margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: flex-start; }
    .form-header h1 { color: var(--text-dark); font-weight: 700; font-size: 2rem; margin: 0; }
    .form-header p { color: var(--text-light); font-size: 1rem; margin-top: 0.25rem; }
    .form-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; }
    @media (max-width: 992px) { .form-grid { grid-template-columns: 1fr; } }
    .form-card { background: var(--card-bg); border-radius: 12px; padding: 2rem; box-shadow: var(--shadow); margin-bottom: 2rem; }
    .form-group { margin-bottom: 1.5rem; }
    .form-group:last-child { margin-bottom: 0; }
    .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--text-dark); font-size: 0.9rem; }
    .form-control { width: 100%; padding: 0.8rem 1rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem; transition: border-color 0.2s ease, box-shadow 0.2s ease; }
    .form-control:focus { outline: none; border-color: var(--primary-color); box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2); }
    #image-preview { width: 100%; margin-top: 1rem; border-radius: 8px; border: 1px dashed var(--border-color); object-fit: cover; aspect-ratio: 16 / 9; }
    .toggle-switch-group { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem; }
    .form-actions { display: flex; justify-content: flex-end; gap: 1rem; margin-top: 1rem; }
    .btn { padding: 0.8rem 1.5rem; border: none; border-radius: 8px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; }
    .btn-primary { background: linear-gradient(45deg, var(--primary-color), var(--secondary-color)); color: white; }
    .btn-secondary { background-color: #e0e6ed; color: var(--text-dark); }
    .btn-outline { background: transparent; border: 1px solid var(--border-color); color: var(--text-dark); }
</style>

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
    // To show preview on page load
    document.addEventListener('DOMContentLoaded', previewImage);
</script>
@endsection