{{-- FILE: resources/views/women.blade.php --}}

@php use Illuminate\Support\Str; @endphp
@extends('layouts.app')

@section('content')

<style>
    .page-header { text-align: center; padding: 3rem 1rem; background-color: #f8f9fa; margin-bottom: 2rem; border-bottom: 1px solid #e9ecef; }
    .page-header h1 { font-size: 2.8rem; font-weight: 700; color: #333; }
    .products-grid-filtered { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem; padding: 2rem 0; }
    .pagination-links { display: flex; justify-content: center; margin-top: 2rem; }
    .product-card { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); transition: all 0.3s ease; position: relative; padding: 0 0.2rem !important; height: auto; box-sizing: border-box; }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2); }
    .product-image { width: 100%; height: 200px; background: linear-gradient(45deg, #f0f0f0, #e0e0e0); position: relative; overflow: hidden; border-radius: 15px 15px 0 0; }
    .product-image img { width: 100%; height: 100%; object-fit: cover; }
    .product-badge { position: absolute; top: 10px; right: 10px; background: #ff4757; color: white; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }
    .product-info { padding: 1.5rem; }
    .product-title { font-size: 1.2rem; font-weight: 600; margin-bottom: 0.5rem; color: #333; }
    .product-description { overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-overflow: ellipsis; max-height: 3em; }
    .product-price { font-size: 1.5rem; font-weight: 700; color: #667eea; margin-bottom: 1rem; }
    .product-rating { display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem; }
    .stars { color: #ffd700; }
    .add-to-cart, .view-info-btn { width: 100%; background: linear-gradient(45deg, #667eea, #764ba2); color: white; border: none; padding: 0.8rem; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; }
    .view-info-btn { margin-top: 0.5rem; }
    #product-modal { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.6); backdrop-filter: blur(5px); display: none; justify-content: center; align-items: center; z-index: 9999; padding: 1rem; }
    #product-modal .modal-content { background: #fff; border-radius: 12px; max-width: 600px; width: 100%; padding: 2rem; position: relative; }
    .close-modal { position: absolute; top: 1rem; right: 1rem; font-size: 1.5rem; cursor: pointer; border: none; }
</style>

<div class="page-header">
    <h1>{{ $pageTitle }}</h1>
</div>

<div class="container">
    <section class="filtered-products-section">
        @if($products->isEmpty())
            <div style="text-align: center; padding: 4rem 1rem;">
                <h3>No products found for Women.</h3>
                <p>Please check back later!</p>
            </div>
        @else
            <div class="products-grid-filtered">
                @foreach ($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ $product->image_url ?? 'https://via.placeholder.com/150' }}" alt="{{ $product->name }}">
                            <div class="product-badge">{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <p class="product-description">{{ Str::limit($product->description, 60) }}</p>
                            <div class="product-price">Rs. {{ number_format($product->price) }}</div>
                            <div class="product-rating">
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= ($product->rating ?? 0) ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                            <button class="add-to-cart">Add to Cart</button>
                            <button class="view-info-btn" data-name="{{ $product->name }}" data-description="{{ $product->description }}" data-price="{{ number_format($product->price) }}" data-image="{{ $product->image_url ?? 'https://via.placeholder.com/150' }}">View Info</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-links">{{ $products->links() }}</div>
        @endif
    </section>
</div>

<div id="product-modal" style="display:none;"><div class="modal-content"><span class="close-modal">×</span><img id="modal-image" src="" alt="Product Image" style="width:100%; border-radius: 8px; margin-bottom: 1rem;"><h3 id="modal-name"></h3><p id="modal-description"></p><div id="modal-price" style="font-size: 1.5rem; font-weight: bold; color: #667eea;"></div></div></div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('product-modal');
    if (modal) {
        const modalImage = document.getElementById('modal-image'), modalName = document.getElementById('modal-name'), modalDescription = document.getElementById('modal-description'), modalPrice = document.getElementById('modal-price'), closeModalBtn = modal.querySelector('.close-modal');
        document.querySelectorAll('.view-info-btn').forEach(button => { button.addEventListener('click', () => { modalImage.src = button.dataset.image; modalName.textContent = button.dataset.name; modalDescription.textContent = button.dataset.description; modalPrice.textContent = 'Rs. ' + button.dataset.price; modal.style.display = 'flex'; }); });
        closeModalBtn.addEventListener('click', () => { modal.style.display = 'none'; });
        window.addEventListener('click', (e) => { if (e.target === modal) { modal.style.display = 'none'; } });
    }
});
</script>

@endsection
