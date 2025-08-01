@extends('layouts.app')

@section('content')
<div class="products-index-container">
    <!-- Page Header -->
    <div class="page-header">
        <h1>All Products</h1>
        <a href="{{ route('productv2.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Product
        </a>
    </div>

    <!-- Products Table -->
    <div class="table-wrapper">
        <table class="products-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>
                            <div class="product-cell">
                                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/60' }}" alt="{{ $product->name }}" class="product-thumbnail">
                                <div>
                                    <div class="product-name">{{ $product->name }}</div>
                                    <div class="product-id">ID: {{ $product->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $product->category }}</td>
                        <td>Rs. {{ number_format($product->price, 2) }}</td>
                        <td>
                            @if($product->stock > 10)
                                <span class="stock-badge in-stock">In Stock</span>
                            @elseif($product->stock > 0)
                                <span class="stock-badge low-stock">Low Stock</span>
                            @else
                                <span class="stock-badge out-of-stock">Out of Stock</span>
                            @endif
                            <span class="stock-quantity">({{ $product->stock }} left)</span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <!-- ============================================ -->
                                <!--      THIS IS THE LINE THAT WAS FIXED         -->
                                <!-- ============================================ -->
                                <a href="{{ route('productv2.edit', $product->id) }}" class="action-btn btn-edit" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('productv2.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn btn-delete" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-cell">
                            <i class="fas fa-box-open"></i>
                            <p>No products found.</p>
                            <a href="{{ route('productv2.create') }}" class="btn btn-primary">Add your first product</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ================== STYLES ================== -->
<style>
    :root {
        --primary-color: #667eea;
        --danger-color: #ff4d4f;
        --success-color: #27ae60;
        --warning-color: #f39c12;
        --bg-color: #f4f7fa;
        --card-bg: #ffffff;
        --text-dark: #2c3e50;
        --text-light: #8492a6;
        --border-color: #e0e6ed;
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .products-index-container {
        max-width: 1400px;
        margin: 2rem auto;
        font-family: 'Inter', sans-serif;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .page-header h1 {
        color: var(--text-dark);
        font-weight: 700;
        font-size: 2rem;
    }

    .btn {
        padding: 0.7rem 1.2rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background: var(--primary-color);
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .table-wrapper {
        background: var(--card-bg);
        border-radius: 12px;
        box-shadow: var(--shadow);
        overflow-x: auto; /* Makes table responsive */
    }

    .products-table {
        width: 100%;
        border-collapse: collapse;
    }

    .products-table th,
    .products-table td {
        padding: 1.25rem 1.5rem;
        text-align: left;
        vertical-align: middle;
    }

    .products-table thead {
        background-color: #f8f9fa;
    }

    .products-table th {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .products-table tbody tr {
        border-bottom: 1px solid var(--border-color);
    }
    
    .products-table tbody tr:last-child {
        border-bottom: none;
    }

    .products-table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .product-cell {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .product-thumbnail {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
    }

    .product-name {
        font-weight: 600;
        color: var(--text-dark);
    }

    .product-id {
        font-size: 0.85rem;
        color: var(--text-light);
    }

    .stock-badge {
        display: inline-block;
        padding: 0.3rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        color: white;
    }
    
    .stock-badge.in-stock { background-color: var(--success-color); }
    .stock-badge.low-stock { background-color: var(--warning-color); }
    .stock-badge.out-of-stock { background-color: var(--danger-color); }
    
    .stock-quantity {
        font-size: 0.85rem;
        color: var(--text-light);
        margin-left: 0.5rem;
    }

    .action-buttons {
        display: flex;
        gap: 0.75rem;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        color: white;
        transition: opacity 0.3s ease;
    }
    
    .action-btn:hover {
        opacity: 0.8;
    }

    .btn-edit {
        background-color: #3498db;
    }

    .btn-delete {
        background-color: var(--danger-color);
    }

    .empty-cell {
        text-align: center;
        padding: 4rem;
        color: var(--text-light);
    }
    
    .empty-cell i {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
</style>
@endsection