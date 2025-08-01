<div class="product-card" data-product-id="{{ $product->id }}">
    <div class="product-image">
        <img src="{{ $product->image_url ?? 'https://via.placeholder.com/150' }}"
             alt="{{ $product->name }}"
             style="width: 100%; height: 100%; object-fit: cover;">
        <div class="product-badge">
            {{ $product->stock > 0 ? 'Available' : 'Out of Stock' }}
        </div>
    </div>

    <div class="product-info">
        <h3 class="product-title">{{ $product->name }}</h3>
        <p class="product-description">{{ $product->description }}</p>
        <div class="product-price">Rs. {{ number_format($product->price) }}</div>

        <div class="product-rating">
            <div class="stars">
                @php $rating = isset($product->rating) ? (int) $product->rating : 0; @endphp
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $rating)
                        <i class="fas fa-star"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
            </div>
            <span>({{ is_array($product->reviews) ? count($product->reviews) : 0 }} reviews)</span>
        </div>

        <button class="add-to-cart">Add to Cart</button>
        <button class="view-info-btn"
                data-name="{{ $product->name }}"
                data-description="{{ $product->description }}"
                data-price="Rs. {{ number_format($product->price) }}"
                data-image="{{ $product->image_url ?? 'https://via.placeholder.com/150' }}">
            View Info
        </button>
    </div>
</div>
