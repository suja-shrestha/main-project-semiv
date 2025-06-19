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

        <button type="submit">Save</button>
    </form>
@endsection
