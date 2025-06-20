@extends('layouts.app')

@section('content')
<h1>Add Product</h1>
<form action="{{ route('productv2.store') }}" method="POST">
    @csrf

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}"><br>

    <label>Description:</label><br>
    <textarea name="description">{{ old('description') }}</textarea><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" value="{{ old('price') }}"><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" value="{{ old('stock') }}"><br>

    <label>Image URL:</label><br>
    <input type="text" name="image_url" value="{{ old('image_url') }}"><br>
{{-- categories --}}
    <div class="mb-3">
        <label for="category" class="form-label">Category:</label>
        <select class="form-select" name="category" id="category">
            <option value="Electronics" {{ old('category')=='Electronics' ? 'selected' : '' }}>Electronics</option>
            <option value="Fashion" {{ old('category')=='Fashion' ? 'selected' : '' }}>Fashion</option>
            <option value="Home & Garden" {{ old('category')=='Home & Garden' ? 'selected' : '' }}>Home & Garden
            </option>
            <option value="Sports" {{ old('category')=='Sports' ? 'selected' : '' }}>Sports</option>
            <option value="Books" {{ old('category')=='Books' ? 'selected' : '' }}>Books</option>
            <option value="Gaming" {{ old('category')=='Gaming' ? 'selected' : '' }}>Gaming</option>
        </select>
    </div>
{{-- additionally, you can add more categories as needed. --}}
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="is_new" value="1" id="is_new" {{ old('is_new') ? 'checked'
            : '' }}>
        <label class="form-check-label" for="is_new">New Arrival</label>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="is_featured" value="1" id="is_featured" {{
            old('is_featured') ? 'checked' : '' }}>
        <label class="form-check-label" for="is_featured">Featured</label>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="is_hot_sale" value="1" id="is_hot_sale" {{
            old('is_hot_sale') ? 'checked' : '' }}>
        <label class="form-check-label" for="is_hot_sale">Hot Sale</label>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="is_best_deal" value="1" id="is_best_deal" {{
            old('is_best_deal') ? 'checked' : '' }}>
        <label class="form-check-label" for="is_best_deal">Recommended</label>
    </div>


    <button type="submit">Save</button>
</form>
@endsection