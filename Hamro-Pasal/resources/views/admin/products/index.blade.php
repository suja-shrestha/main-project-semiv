@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <a href="{{ route('productv2.create') }}">Add New Product</a>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Price</th><th>Stock</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <form action="{{ route('productv2.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5">No products yet.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
