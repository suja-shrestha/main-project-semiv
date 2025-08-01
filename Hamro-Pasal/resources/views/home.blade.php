@php use Illuminate\Support\Str; @endphp
@extends('layouts.app')
@section('content')
<style>
    /* Responsive Products Grid */
    @media (max-width: 992px) {
        .products-grid {
            flex-wrap: wrap;
            justify-content: center;
        }

        .product-card {
            width: calc(50% - 1rem);
        }
    }

    @media (max-width: 576px) {
        .product-card {
            width: 100%;
        }
    }

    /* Responsive Newsletter Form */
    @media (max-width: 576px) {
        .newsletter-form {
            flex-direction: column;
        }

        .newsletter-input,
        .newsletter-button {
            width: 100%;
        }
    }

    /* Responsive Product Modal */
    @media (max-width: 576px) {
        #product-modal .modal-content {
            padding: 1rem;
        }
    }

    /* Responsive Services */
    @media (max-width: 768px) {
        .services-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }
    }

    /* Responsive Footer */
    @media (max-width: 768px) {
        .footer-content {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }
    }

    /* Responsive Hero Content */
    @media (max-width: 576px) {
        .hero h1 {
            font-size: 2rem;
        }

        .hero p {
            font-size: 1rem;
        }

        .cta-button {
            font-size: 1rem;
            padding: 0.8rem 1.5rem;
        }
    }

    /* Responsive Categories */
    @media (max-width: 768px) {
        .categories-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

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
        margin-top: 0.5rem;
    }

    .view-info-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    #modal-image {
        max-width: 100%;
        max-height: 250px;
        /* or whatever height you prefer */
        object-fit: contain;
        display: block;
        margin: 0 auto 1rem;
        border-radius: 10px;
    }

    .product-description {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* show max 2 lines */
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
        max-height: 3em;
        /* approx 2 lines */
    }

    /* Modal background */
    #product-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(5px);
        display: none;
        /* hidden by default */
        justify-content: center;
        align-items: center;
        z-index: 9999;
        overflow-y: auto;
        /* Allow scrolling if content taller than viewport */
        padding: 1rem;
    }

    /* Modal content box */
    #product-modal .modal-content {
        background: #fff;
        border-radius: 12px;
        max-width: 600px;
        width: 100%;
        max-height: 80vh;
        /* max height 80% of viewport */
        overflow-y: auto;
        /* scroll inside modal content if needed */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        padding: 2rem;
        position: relative;
    }

    /* Close button */
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

    /* Modal image */
    #product-modal img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 1rem;
    }

    /* Modal text styling */
    #product-modal h3 {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    #product-modal p {
        color: #555;
        line-height: 1.4;
        margin-bottom: 1rem;
    }


    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        line-height: 1.6;
        color: #333;
        overflow-x: hidden;
    }

    .container {
        max-width: 100%;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Hero Section */
    .hero {
        background: transparent;
        color: white;
        padding: 4rem 0;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.1)"><polygon points="0,0 1000,100 1000,0"/></svg>');
        background-size: cover;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero h1 {
        font-size: 3.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        animation: slideInUp 1s ease-out;
    }

    .hero p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        opacity: 0.9;
        animation: slideInUp 1s ease-out 0.2s both;
    }

    .cta-button {
        display: inline-block;
        background: linear-gradient(45deg, #ff6b6b, #ff8e53);
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
        animation: slideInUp 1s ease-out 0.4s both;
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 107, 107, 0.6);
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Categories Section */
    .categories {
        padding: 4rem 0;
        background: #f8f9fa;
    }

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

    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .category-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .category-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.5s;
    }

    .category-card:hover::before {
        left: 100%;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    .category-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        background: linear-gradient(45deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .category-card h3 {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        color: #333;
    }

    .category-card p {
        color: #666;
        font-size: 0.9rem;
    }

    /* Featured Products */
    .featured-products {
        padding: 4rem 0;
        background: white;
    }

    .products-grid {
        display: flex;
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        position: relative;
        padding: 0 0.2rem !important;
        width: 350px;
        height: auto;
        box-sizing: border-box;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    .product-image {
        width: 100%;
        height: 200px;
        background: linear-gradient(45deg, #f0f0f0, #e0e0e0);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: #ccc;
        position: relative;
        overflow: hidden;
        border-radius: 15px 15px 0 0;


    }

    /* Add this for images inside product-image */
    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 15px 15px 0 0;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;

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
    }

    .product-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
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

    .add-to-cart {
        width: 100%;
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        border: none;
        padding: 0.8rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .add-to-cart:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    /* Services Section */
    .services {
        padding: 4rem 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .service-item {
        text-align: center;
        padding: 2rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .service-item:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.2);
    }

    .service-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .service-item h3 {
        font-size: 1.3rem;
        margin-bottom: 1rem;
    }

    /* Newsletter Section */
    .newsletter {
        padding: 4rem 0;
        background: #f8f9fa;
        text-align: center;
    }

    .newsletter-form {
        max-width: 500px;
        margin: 2rem auto 0;
        display: flex;
        gap: 1rem;
    }

    .newsletter-input {
        flex: 1;
        padding: 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .newsletter-input:focus {
        border-color: #667eea;
    }

    .newsletter-button {
        padding: 1rem 2rem;
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .newsletter-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    /* Footer */
    .footer {
        background: #2c3e50;
        color: white;
        padding: 3rem 0 1rem;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .footer-section h3 {
        margin-bottom: 1rem;
        color: #ecf0f1;
    }

    .footer-section a {
        color: #bdc3c7;
        text-decoration: none;
        display: block;
        margin-bottom: 0.5rem;
        transition: color 0.3s ease;
    }

    .footer-section a:hover {
        color: #667eea;
    }

    .social-icons {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(45deg, #667eea, #764ba2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-icon:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .footer-bottom {
        text-align: center;
        padding-top: 2rem;
        border-top: 1px solid #34495e;
        color: #bdc3c7;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.5rem;
        }

        .hero p {
            font-size: 1rem;
        }

        .newsletter-form {
            flex-direction: column;
        }

        .container {
            padding: 0 1rem;
        }
    }

    .heros {
        padding: 0 1rem;
        background: transparent;
        color: white;
        text-align: center;
        padding: 4rem 0;
    }

    .vanta-section {
        height: 50vh;
    }
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="s-page-1">
                <div class="s-section-1">
                    <div class="s-section vanta-section">
                        <section class="hero">
                            <div class="container">
                                <div class="hero-content">
                                    <h1>Welcome to Hamro Pasal</h1>
                                    <p>Discover amazing products at unbeatable prices. Shop from the comfort of your
                                        home with
                                        fast delivery across Nepal.</p>
                                    <a href="#featured" class="cta-button">Shop Now <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="card">


                <!-- Categories Section -->
                <section class="categories">
                    <div class="container">
                        <h2 class="section-title">Shop by Category</h2>
                        <div class="categories-grid">
                            <div class="category-card">
                                <div class="category-icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <h3>Electronics</h3>
                                <p>Latest smartphones, laptops, and gadgets</p>
                            </div>
                            <div class="category-card">
                                <div class="category-icon">
                                    <i class="fas fa-tshirt"></i>
                                </div>
                                <h3>Fashion</h3>
                                <p>Trendy clothing and accessories</p>
                            </div>
                            <div class="category-card">
                                <div class="category-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <h3>Home & Garden</h3>
                                <p>Everything for your home and garden</p>
                            </div>
                            <div class="category-card">
                                <div class="category-icon">
                                    <i class="fas fa-dumbbell"></i>
                                </div>
                                <h3>Sports</h3>
                                <p>Sports equipment and fitness gear</p>
                            </div>
                            <div class="category-card">
                                <div class="category-icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <h3>Books</h3>
                                <p>Wide collection of books and stationery</p>
                            </div>
                            <div class="category-card">
                                <div class="category-icon">
                                    <i class="fas fa-gamepad"></i>
                                </div>
                                <h3>Gaming</h3>
                                <p>Gaming consoles and accessories</p>
                            </div>
                        </div>
                    </div>
                </section>
                <spline-viewer url="https://prod.spline.design/8WosSMkHSXlP3z7V/scene.splinecode" style=" 
   
    width: 100%;
    height: 400px;
    z-index: 9999;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    overflow: hidden;
    background: white;
    margin-bottom:20px;
  ">

                </spline-viewer>

                <!-- === General Products by Category === -->
                @foreach ($productsByCategory as $category => $products)
                @if ($products->count())
                <section class="category-products" id="category-{{ \Illuminate\Support\Str::slug($category) }}">
                    <div class="container">
                        <h2 class="section-title">{{ $category }}</h2>
                        <div class="products-grid">
                            @foreach ($products as $product)
                            <div class="product-card" data-product-id="{{ $product->id }}">
                                <div class="product-image">
                                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/150' }}"
                                        alt="{{ $product->name }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                    <div class="product-badge">
                                        {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                    </div>
                                </div>

                                <div class="product-info">
                                    <h3 class="product-title">{{ $product->name }}</h3>
                                    <p class="product-description">{{ $product->description }}</p>
                                    <div class="product-price">Rs. {{ number_format($product->price) }}</div>

                                    <div class="product-rating">
                                        <div class="stars">
                                            @php $rating = isset($product->rating) ? (int) $product->rating : 0; @endphp
                                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$rating) <i class="fas fa-star"></i>
                                                @else
                                                <i class="far fa-star"></i>
                                                @endif
                                                @endfor
                                        </div>
                                        <span>({{ is_array($product->reviews) ? count($product->reviews) : 0 }}
                                            reviews)</span>
                                    </div>

                                    <button class="add-to-cart">Add to Cart</button>

                                    <button class="view-info-btn" data-name="{{ $product->name }}"
                                        data-description="{{ $product->description }}"
                                        data-price="Rs. {{ number_format($product->price) }}"
                                        data-image="{{ $product->image_url ?? 'https://via.placeholder.com/150' }}">
                                        View Info
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif
                @endforeach


                <!-- Featured Products Section -->
                @if (collect($featuredByCategory)->flatten()->count())
                <section class="featured-products" id="featured-products">
                    <div class="container">
                        <h2 class="section-title">Featured Products</h2>
                        <div class="products-grid">
                            @foreach ($featuredByCategory as $products)
                            @foreach ($products as $product)
                            @include('partials.product-card', ['product' => $product])
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif

                <!-- New Arrivals Section -->
                @if (collect($newArrivalsByCategory)->flatten()->count())
                <section class="featured-products" id="new-arrivals">
                    <div class="container">
                        <h2 class="section-title">New Arrivals</h2>
                        <div class="products-grid">
                            @foreach ($newArrivalsByCategory as $products)
                            @foreach ($products as $product)
                            @include('partials.product-card', ['product' => $product])
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif

                <!-- Hot Sales Section -->
                @if (collect($hotSalesByCategory)->flatten()->count())
                <section class="featured-products" id="hot-sales">
                    <div class="container">
                        <h2 class="section-title">Hot Sales</h2>
                        <div class="products-grid">
                            @foreach ($hotSalesByCategory as $products)
                            @foreach ($products as $product)
                            @include('partials.product-card', ['product' => $product])
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif

                <!-- Recommended Items Section -->
                @if (collect($recommendedByCategory)->flatten()->count())
                <section class="featured-products" id="recommended">
                    <div class="container">
                        <h2 class="section-title">Recommended Items</h2>
                        <div class="products-grid">
                            @foreach ($recommendedByCategory as $products)
                            @foreach ($products as $product)
                            @include('partials.product-card', ['product' => $product])
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif


                <!-- Popup Modal -->
                <div id="product-modal" class="modal-overlay" style="display:none;">
                    <div class="modal-content">
                        <span class="close-modal">&times;</span>
                        <img id="modal-image" src="" alt="Product Image" />
                        <h3 id="modal-name"></h3>
                        <p id="modal-description"></p>
                        <div id="modal-price"></div>
                    </div>
                </div>

                <!-- Services Section -->
                <section class="services">
                    <div class="container">
                        <h2 class="section-title">Why Choose Hamro Pasal?</h2>
                        <div class="services-grid">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <h3>Fast Delivery</h3>
                                <p>Quick delivery across Nepal within 2-3 business days</p>
                            </div>
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <h3>Secure Payment</h3>
                                <p>Safe and secure payment methods for your peace of mind</p>
                            </div>
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fas fa-undo"></i>
                                </div>
                                <h3>Easy Returns</h3>
                                <p>Hassle-free returns within 30 days of purchase</p>
                            </div>
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <h3>24/7 Support</h3>
                                <p>Round-the-clock customer support for all your queries</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Newsletter Section -->
                <section class="newsletter">
                    <div class="container">
                        <h2 class="section-title">Stay Updated</h2>
                        <p>Subscribe to our newsletter and get the latest deals and offers directly to your inbox</p>
                        <form class="newsletter-form">
                            <input type="email" class="newsletter-input" placeholder="Enter your email address"
                                required>
                            <button type="submit" class="newsletter-button">Subscribe</button>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('product-modal');
        const modalImage = document.getElementById('modal-image');
        const modalName = document.getElementById('modal-name');
        const modalDescription = document.getElementById('modal-description');
        const modalPrice = document.getElementById('modal-price');
        const closeModalBtn = document.querySelector('.close-modal');

        document.querySelectorAll('.view-info-btn').forEach(button => {
            button.addEventListener('click', () => {
                modalImage.src = button.getAttribute('data-image');
                modalName.textContent = button.getAttribute('data-name');
                modalDescription.textContent = button.getAttribute('data-description');
                modalPrice.textContent = button.getAttribute('data-price');
                modal.style.display = 'block';
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
    });
</script>


<script>
    // Add to cart functionality
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

    // Newsletter form
    document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const button = this.querySelector('.newsletter-button');
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
        button.style.background = '#27ae60';
        setTimeout(() => {
            button.innerHTML = originalText;
            button.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
            this.reset();
        }, 3000);
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Category card click animation
    document.querySelectorAll('.category-card').forEach(card => {
        card.addEventListener('click', function() {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });

    // Modal popup for product "View Info"
    const modal = document.getElementById('product-modal');
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
            modalPrice.textContent = 'Rs. ' + button.dataset.price;

            modal.style.display = 'flex';
        });
    });

    closeModalBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>

@endsection