@php use Illuminate\Support\Str; @endphp
@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h2 class="section-title">Search Results for: "{{ $query }}"</h2>

            @if($results->isNotEmpty())
            <div class="products-grid">
                @foreach ($results as $product)
                @include('partials.product-card', ['product' => $product])
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $results->appends(request()->input())->links() }}
            </div>

            @else
            <div class="text-center py-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h4>No Products Found</h4>
                <p class="text-muted">We couldn't find any products matching your search. Please try again.</p>
                <a href="{{ url('/') }}" class="cta-button mt-3" style="text-decoration: none;">Back to Home</a>
            </div>
            @endif

        </div>
    </div>
</div>

<div id="product-modal" style="display:none;">
    <div class="modal-content">
        <span class="close-modal">×</span>
        <img id="modal-image" src="" alt="Product Image" />
        <h3 id="modal-name"></h3>
        <p id="modal-description"></p>
        <div id="modal-price" class="product-price"></div>
    </div>
</div>

{{--
================================================================================
STYLES & SCRIPTS (WITH CORRECTED BUTTON STYLES)
================================================================================
--}}

<style>
    /* Titles, Buttons, and Layout */
    .section-title {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 3rem;
        color: #333;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(45deg, #667eea, #764ba2);
        border-radius: 2px;
    }

    .cta-button {
        display: inline-block;
        background: linear-gradient(45deg, #ff6b6b, #ff8e53);
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
    }

    /* Flexbox grid for the products */
    .products-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        margin-top: 2rem;
        justify-content: center;
    }

    /* --- PRODUCT CARD STYLES (WITH HOVER FIXES) --- */
    .product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        position: relative;
        width: 350px;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    .product-image {
        width: 100%;
        height: 200px;
        position: relative;
        background-color: #f0f0f0;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ff4757;
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .product-info {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .product-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
    }

    .product-description {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
        max-height: 3em;
        color: #666;
        flex-grow: 1;
        margin-bottom: 1rem;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #667eea;
        margin-bottom: 1rem;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .stars {
        color: #ffd700;
    }

    /* --- THE CORRECTED BUTTON STYLES --- */
    .add-to-cart,
    .view-info-btn {
        width: 100%;
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        border: none;
        padding: 0.8rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        /* This is needed for the smooth animation */
    }

    .view-info-btn {
        margin-top: 0.5rem;
    }

    /* --- THE MISSING HOVER STYLES --- */
    .add-to-cart:hover,
    .view-info-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    /* Styles for the Modal */
    #product-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(5px);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        padding: 1rem;
    }

    #product-modal .modal-content {
        background: #fff;
        border-radius: 12px;
        max-width: 600px;
        width: 100%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        padding: 2rem;
        position: relative;
    }

    .close-modal {
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 1.5rem;
        cursor: pointer;
        background: none;
        border: none;
        color: #333;
    }

    #modal-image {
        max-width: 100%;
        max-height: 250px;
        object-fit: contain;
        display: block;
        margin: 0 auto 1rem;
        border-radius: 10px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    // --- Add to Cart Button ---
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-check"></i> Added!';
            this.style.background = '#27ae60';
            setTimeout(() => {
                this.innerHTML = 'Add to Cart';
                this.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
            }, 2000);
        });
    });

    // --- Modal Popup Logic ---
    const modal = document.getElementById('product-modal');
    if (modal) {
        const modalImage = document.getElementById('modal-image');
        const modalName = document.getElementById('modal-name');
        const modalDescription = document.getElementById('modal-description');
        const modalPrice = document.getElementById('modal-price');
        const closeModalBtn = document.querySelector('.close-modal');

        document.querySelectorAll('.view-info-btn').forEach(button => {
            button.addEventListener('click', () => {
                modalImage.src = button.dataset.image;
                modalName.textContent = button.dataset.name;
                modalDescription.textContent = button.dataset.description;
                modalPrice.textContent = button.dataset.price;
                modal.style.display = 'flex';
            });
        });

        closeModalBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', e => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    }
});
</script>

@endsection