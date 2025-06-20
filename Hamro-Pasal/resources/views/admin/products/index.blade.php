@extends('layouts.app')

@section('content')
    <h1>All Products</h1>

    <a href="{{ route('productv2.create') }}" style="display: inline-block; margin-bottom: 15px; padding: 8px 16px; background: #667eea; color: white; border-radius: 6px; text-decoration: none;">
        Add New Product
    </a>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: #f0f0f0;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category }}</td>
                    <td>Rs. {{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <form action="{{ route('productv2.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this product?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #ff4d4f; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No products available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
