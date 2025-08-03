@extends('layouts.app')

@section('content')

<style>
    /* Global Styles for About Us Page */
    .about-us-container {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background-color: #f8f9fa;
        color: #4a5568;
        padding-bottom: 60px;
    }

    .container-about {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Hero Section with Gradient and Stats */
    .hero-section-about {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 80px 20px;
        border-radius: 0 0 32px 32px;
        text-align: center;
        margin-bottom: 60px;
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
    }
    .hero-section-about h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 16px;
        animation: fadeInUp 1s ease-out;
    }
    .hero-section-about p.subtitle {
        font-size: 1.25rem;
        max-width: 700px;
        margin: 0 auto 40px;
        opacity: 0.9;
        animation: fadeInUp 1s ease-out 0.2s both;
    }
    .hero-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        max-width: 800px;
        margin: 0 auto;
        animation: fadeInUp 1s ease-out 0.4s both;
    }
    .stat-item {
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 16px;
        backdrop-filter: blur(5px);
    }
    .stat-number { font-size: 2.5rem; font-weight: 700; display: block; }
    .stat-label { font-size: 0.9rem; opacity: 0.8; text-transform: uppercase; letter-spacing: 1px; }

    /* General Content Section Styling */
    .content-section {
        background: #ffffff;
        margin: 0 20px 60px;
        padding: 60px 40px;
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    .content-section.is-visible { opacity: 1; transform: translateY(0); }
    .content-section h2 {
        font-size: 2.5rem;
        color: #2d3748;
        text-align: center;
        margin-bottom: 40px;
        position: relative;
    }
    .content-section h2::after {
        content: ''; position: absolute; bottom: -10px; left: 50%;
        transform: translateX(-50%); width: 70px; height: 4px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 2px;
    }
    .content-section .section-subtitle {
        font-size: 1.1rem; line-height: 1.7; max-width: 800px;
        margin: -20px auto 40px; text-align: center;
    }

    /* === NEW: Redesigned Partners Section === */
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }
    .partner-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 30px;
        background: #f8f9fa;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .partner-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    .partner-logo {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-bottom: 20px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .partner-logo .logo-text {
        font-size: 1.8rem;
        font-weight: 700;
        color: #4a5568;
    }
    .partner-name {
        font-size: 1.25rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 8px;
    }
    .partner-description {
        font-size: 0.95rem;
        flex-grow: 1; /* Ensures cards have same height in a row */
    }

    /* === NEW: Customer Reviews Section === */
    .reviews-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }
    .review-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        padding: 30px;
        border-radius: 16px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    .review-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    .review-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-right: 15px;
        object-fit: cover;
    }
    .review-author-info {
        flex-grow: 1;
    }
    .review-author-name {
        font-weight: 600;
        color: #2d3748;
        margin: 0;
    }
    .review-rating {
        color: #f6ad55; /* A gold/yellow color for stars */
    }
    .review-text {
        font-style: italic;
        color: #4a5568;
        line-height: 1.6;
        border-left: 3px solid #667eea;
        padding-left: 15px;
    }
    
    /* CTA Section */
    .cta-button-about {
        display: inline-block; background: white; color: #667eea;
        padding: 14px 28px; border-radius: 50px; text-decoration: none;
        font-weight: 600; transition: transform 0.3s ease;
    }
    .cta-button-about:hover { transform: scale(1.05); }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="about-us-container">

    <section class="hero-section-about">
        <h1>About Hamro Pasal</h1>
        <p class="subtitle">Your trusted partner in online retail, bringing quality products to your doorstep with speed, reliability, and a commitment to excellence.</p>
        <div class="hero-stats">
            <div class="stat-item">
                <span id="stat-customers" class="stat-number">0</span>
                <span class="stat-label">Happy Customers</span>
            </div>
            <div class="stat-item">
                <span id="stat-products" class="stat-number">0</span>
                <span class="stat-label">Products Sold</span>
            </div>
            <div class="stat-item">
                <span id="stat-brands" class="stat-number">0</span>
                <span class="stat-label">Brands Partnered</span>
            </div>
        </div>
    </section>

    <div class="container-about">
        <section class="content-section">
            <h2>Our Story</h2>
            <p class="section-subtitle">Founded in 2020, Hamro Pasal emerged from a simple yet powerful idea: to revolutionize the online shopping experience in Nepal. We began with a passionate commitment to providing authentic, high-quality products and have since grown into a trusted destination for thousands of shoppers nationwide. Our journey is one of continuous innovation and unwavering dedication to our customers.</p>
        </section>

        <!-- === UPDATED: Our Partners Section === -->
        <section class="content-section">
            <h2>Our Esteemed Partners</h2>
            <p class="section-subtitle">We believe in the power of collaboration. We are proud to partner with industry-leading brands to bring you an unparalleled selection of authentic, premium products.</p>
            <div class="partners-grid">
                <div class="partner-card">
                    <div class="partner-logo"><div class="logo-text">Nike</div></div>
                    <h3 class="partner-name">Nike</h3>
                    <p class="partner-description">Official partner for the latest in athletic footwear and performance apparel.</p>
                </div>
                <div class="partner-card">
                    <div class="partner-logo"><div class="logo-text">Apple</div></div>
                    <h3 class="partner-name">Apple Inc.</h3>
                    <p class="partner-description">Authorized retailer of premium Apple products and accessories worldwide.</p>
                </div>
                <div class="partner-card">
                    <div class="partner-logo"><div class="logo-text">Samsung</div></div>
                    <h3 class="partner-name">Samsung</h3>
                    <p class="partner-description">Strategic alliance for cutting-edge electronics and smart home devices.</p>
                </div>
                 <div class="partner-card">
                    <div class="partner-logo"><div class="logo-text">Adidas</div></div>
                    <h3 class="partner-name">Adidas</h3>
                    <p class="partner-description">A global leader in sportswear, offering premium apparel and footwear.</p>
                </div>
                <div class="partner-card">
                    <div class="partner-logo"><div class="logo-text">Dell</div></div>
                    <h3 class="partner-name">Dell</h3>
                    <p class="partner-description">Authorized distributor of professional computing solutions for work and play.</p>
                </div>
                <div class="partner-card">
                    <div class="partner-logo"><div class="logo-text">LG</div></div>
                    <h3 class="partner-name">LG Electronics</h3>
                    <p class="partner-description">Innovative home appliances and consumer electronics partnership.</p>
                </div>
            </div>
        </section>

        <!-- === NEW: Customer Reviews Section === -->
        <section class="content-section">
            <h2>What Our Customers Say</h2>
            <p class="section-subtitle">Your satisfaction is our motivation. Here’s what some of our happy customers have to share about their experience with Hamro Pasal.</p>
            <div class="reviews-grid">
                <div class="review-card">
                    <div class="review-header">
                        <img src="https://i.pravatar.cc/150?img=1" alt="Avatar of Anjali K." class="review-avatar">
                        <div class="review-author-info">
                            <h4 class="review-author-name">Anjali K.</h4>
                            <div class="review-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="review-text">"The delivery was incredibly fast, and the product quality exceeded my expectations. The customer service team was also very helpful. I'll definitely be shopping here again!"</p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <img src="https://i.pravatar.cc/150?img=5" alt="Avatar of Bikram S." class="review-avatar">
                        <div class="review-author-info">
                            <h4 class="review-author-name">Bikram S.</h4>
                            <div class="review-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="review-text">"A great selection of genuine products that are hard to find elsewhere in Nepal. The website is easy to navigate, and the whole process was seamless. Highly recommended."</p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <img src="https://i.pravatar.cc/150?img=8" alt="Avatar of Sunita T." class="review-avatar">
                        <div class="review-author-info">
                            <h4 class="review-author-name">Sunita T.</h4>
                            <div class="review-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="review-text">"I was hesitant to shop online, but Hamro Pasal has completely changed my mind. Secure payments, authentic products, and fantastic support. It's my go-to store now."</p>
                </div>
            </div>
        </section>
        
        <section class="content-section" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white; text-align:center;">
            <h2 style="color:white;">Ready to Start Shopping?</h2>
            <p style="color:rgba(255,255,255,0.9);">Discover our curated collections and find exactly what you're looking for.</p>
            <div style="margin-top: 30px;">
                <a href="{{ route('welcome') }}" class="cta-button-about">
                    Browse All Products <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </section>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    function animateCounter(element, target, duration = 2000) {
        if (!element) return;
        let start = 0;
        const finalTarget = parseInt(target.toString().replace(/,/g, ''));
        const startTime = performance.now();

        function updateCounter(currentTime) {
            const elapsedTime = currentTime - startTime;
            if (elapsedTime >= duration) {
                element.textContent = finalTarget.toLocaleString() + '+';
                return;
            }
            const progress = elapsedTime / duration;
            const currentVal = Math.floor(progress * finalTarget);
            element.textContent = currentVal.toLocaleString();
            requestAnimationFrame(updateCounter);
        }
        requestAnimationFrame(updateCounter);
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains('hero-section-about')) {
                    animateCounter(document.getElementById('stat-customers'), 10000);
                    animateCounter(document.getElementById('stat-products'), 50000);
                    animateCounter(document.getElementById('stat-brands'), 200);
                }
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.hero-section-about, .content-section').forEach(section => {
        observer.observe(section);
    });

});
</script>

@endsection