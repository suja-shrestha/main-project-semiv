@extends('layouts.app')
@section('aboutus')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        line-height: 1.6;
        color: #2d3748;
        background: #ffffff;
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* Animated background particles */
    .particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(102, 126, 234, 0.3);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 1;
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
            opacity: 0.8;
        }
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 2;
    }

    /* Enhanced Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 100px 0;
        text-align: center;
        margin: 60px 20px;
        border-radius: 32px;
        box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: conic-gradient(from 0deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: rotate 20s linear infinite;
    }

    .hero-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.05) 50%, transparent 70%);
        animation: shimmer 3s ease-in-out infinite;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes shimmer {

        0%,
        100% {
            transform: translateX(-100%);
        }

        50% {
            transform: translateX(100%);
        }
    }

    .hero-content {
        position: relative;
        z-index: 3;
    }

    .hero-section h1 {
        font-size: 4.5rem;
        font-weight: 800;
        margin-bottom: 24px;
        background: linear-gradient(135deg, #ffffff, #f8f9ff, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: fadeInUp 1s ease-out;
        text-shadow: 0 0 40px rgba(255, 255, 255, 0.3);
    }

    .hero-section .subtitle {
        font-size: 1.5rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 40px;
        animation: fadeInUp 1s ease-out 0.2s both;
        font-weight: 400;
    }

    .hero-stats {
        display: flex;
        justify-content: center;
        gap: 60px;
        margin-top: 50px;
        animation: fadeInUp 1s ease-out 0.4s both;
    }

    .stat-item {
        text-align: center;
        color: rgba(255, 255, 255, 0.95);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        display: block;
        margin-bottom: 8px;
        background: linear-gradient(135deg, #ffffff, #f8f9ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-label {
        font-size: 1rem;
        opacity: 0.8;
        font-weight: 500;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Enhanced Content Sections */
    .content-section {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        margin: 60px 20px;
        padding: 80px 50px;
        border-radius: 32px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        transform: translateY(0);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .content-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .content-section:hover::before {
        left: 100%;
    }

    .content-section:hover {
        transform: translateY(-8px);
        box-shadow:
            0 25px 80px rgba(0, 0, 0, 0.15);
    }

    .content-section h2 {
        font-size: 3rem;
        margin-bottom: 40px;
        color: #2d3748;
        text-align: center;
        position: relative;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .content-section h2::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 2px;
    }

    .content-section p {
        font-size: 1.2rem;
        margin-bottom: 24px;
        color: #4a5568;
        text-align: justify;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
    }

    /* Enhanced Values Grid */
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 40px;
        margin-top: 60px;
    }

    .value-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 50px 35px;
        border-radius: 24px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .value-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .value-card:hover::before {
        transform: scaleX(1);
    }

    .value-card:hover {
        transform: translateY(-12px);
        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.15);
        background: #f8f9fa;
    }

    .value-icon {
        font-size: 4rem;
        margin-bottom: 24px;
        display: block;
        filter: drop-shadow(0 0 20px rgba(102, 126, 234, 0.3));
    }

    .value-card h3 {
        font-size: 1.8rem;
        margin-bottom: 20px;
        color: #2d3748;
        font-weight: 600;
    }

    .value-card p {
        color: #4a5568;
        font-size: 1.1rem;
        line-height: 1.6;
        text-align: left;
    }

    /* Enhanced Team Section */
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
        margin-top: 60px;
    }

    .team-member {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 40px 30px;
        border-radius: 24px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .team-member:hover {
        transform: translateY(-8px);
        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .member-avatar {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea, #764ba2);
        margin: 0 auto 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        color: white;
        font-weight: 700;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
    }

    .member-avatar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.2) 50%, transparent 70%);
        animation: shimmer 3s ease-in-out infinite;
    }

    .member-name {
        font-size: 1.6rem;
        margin-bottom: 12px;
        color: #2d3748;
        font-weight: 600;
    }

    .member-role {
        color: #a78bfa;
        font-weight: 500;
        margin-bottom: 20px;
        font-size: 1.1rem;
    }

    .member-bio {
        color: #4a5568;
        font-size: 1rem;
        line-height: 1.6;
        text-align: left
    }

    /* New Partners Section */
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        margin-top: 60px;
    }

    .partner-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 40px 30px;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .partner-card:hover {
        transform: translateY(-5px);
        box-shadow:
            0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .partner-logo {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, #667eea, #764ba2, #f093fb);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        font-weight: 700;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .partner-name {
        font-size: 1.3rem;
        margin-bottom: 12px;
        color: #2d3748;
        font-weight: 600;
    }

    .partner-description {
        color: #4a5568;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    /* Enhanced CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        margin: 60px 20px;
        padding: 80px 50px;
        border-radius: 32px;
        text-align: center;
        box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: rotate 15s linear infinite;
    }

    .cta-section h2 {
        font-size: 3.5rem;
        margin-bottom: 24px;
        font-weight: 700;
        position: relative;
        z-index: 1;
    }

    .cta-section p {
        font-size: 1.4rem;
        margin-bottom: 40px;
        opacity: 0.9;
        position: relative;
        z-index: 1;
    }

    .cta-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
        position: relative;
        z-index: 1;
    }

    .cta-button {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        padding: 18px 36px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .cta-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .cta-button:hover::before {
        left: 100%;
    }

    .cta-button:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .cta-button.primary {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
    }

    .cta-button.primary:hover {
        background: linear-gradient(135deg, #5a67d8, #6b46c1);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 3rem;
        }

        .hero-section .subtitle {
            font-size: 1.2rem;
        }

        .hero-stats {
            flex-direction: column;
            gap: 30px;
        }

        .content-section h2 {
            font-size: 2.2rem;
        }

        .hero-section,
        .content-section,
        .team-section,
        .cta-section {
            margin: 30px 10px;
            padding: 50px 25px;
        }

        .values-grid,
        .team-grid,
        .partners-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
    }

    /*
============================================================
    CSS for Scroll-Triggered Animations
============================================================
*/

    /* The initial, hidden state of the elements */
    .content-section,
    .value-card,
    .team-member,
    .partner-card {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    /* The final, visible state of the elements (triggered by JavaScript) */
    .content-section.is-visible,
    .value-card.is-visible,
    .team-member.is-visible,
    .partner-card.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Add a slight delay for cards inside a grid for a pleasant "stagger" effect */
    .values-grid .value-card:nth-child(2),
    .team-grid .team-member:nth-child(2),
    .partners-grid .partner-card:nth-child(2) {
        transition-delay: 0.1s;
    }

    .values-grid .value-card:nth-child(3),
    .team-grid .team-member:nth-child(3),
    .partners-grid .partner-card:nth-child(3) {
        transition-delay: 0.2s;
    }

    .values-grid .value-card:nth-child(4),
    .team-grid .team-member:nth-child(4),
    .partners-grid .partner-card:nth-child(4) {
        transition-delay: 0.3s;
    }

    .partners-grid .partner-card:nth-child(5) {
        transition-delay: 0.4s;
    }

    .partners-grid .partner-card:nth-child(6) {
        transition-delay: 0.5s;
    }
</style>



    <!-- Animated Background Particles -->
    <div class="particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 1.5s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 2.5s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 3.5s;"></div>
    </div>

    <div class="container">
        <!-- Enhanced Hero Section -->
        <section class="hero-section">
            <div class="hero-content">
                <h1>About YourStore</h1>
                <p class="subtitle">Crafting extraordinary experiences through innovation and passion</p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">50K+</span>
                        <span class="stat-label">Happy Customers</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Premium Products</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">99.9%</span>
                        <span class="stat-label">Satisfaction Rate</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Enhanced Story Section -->
        <section class="content-section">
            <h2>Our Story</h2>
            <p>Founded in 2020 with a revolutionary vision, YourStore emerged from a simple yet powerful idea: to
                democratize access to premium quality products while maintaining the highest standards of customer
                service. What began as a passionate project in a small garage has evolved into a global destination
                trusted by discerning customers worldwide.</p>
            <p>Our journey is driven by an unwavering commitment to excellence, sustainability, and human connection.
                Every product we curate tells a story of craftsmanship, innovation, and the relentless pursuit of
                perfection. We believe that shopping should be an experience that inspires, delights, and creates
                lasting memories.</p>
            <p>Today, we're proud to serve customers across 50+ countries, partnering with world-class brands and
                artisans who share our vision of making the extraordinary accessible to everyone.</p>
        </section>

        <!-- Enhanced Values Section -->
        <section class="content-section">
            <h2>Our Values</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">🌟</div>
                    <h3>Uncompromising Quality</h3>
                    <p>We meticulously curate every product, ensuring it meets our rigorous standards for excellence,
                        durability, and design. Quality isn't just a promise—it's our foundation.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">💝</div>
                    <h3>Customer Obsession</h3>
                    <p>Your satisfaction drives everything we do. We listen, adapt, and go above and beyond to create
                        experiences that exceed your expectations at every touchpoint.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🌱</div>
                    <h3>Sustainable Future</h3>
                    <p>We're committed to environmental stewardship through eco-conscious packaging, carbon-neutral
                        shipping, and partnerships with sustainable brands worldwide.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🚀</div>
                    <h3>Innovation First</h3>
                    <p>We embrace cutting-edge technology and forward-thinking approaches to bring you tomorrow's
                        solutions today, constantly pushing the boundaries of what's possible.</p>
                </div>
            </div>
        </section>

        <!-- Enhanced Team Section -->
        <section class="content-section">
            <h2>Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-avatar">JS</div>
                    <div class="member-name">Jane Smith</div>
                    <div class="member-role">Founder & CEO</div>
                    <div class="member-bio">Visionary leader with 15+ years in e-commerce innovation. Jane's passion for
                        exceptional customer experiences and sustainable business practices has transformed YourStore
                        into a global phenomenon.</div>
                </div>
                <div class="team-member">
                    <div class="member-avatar">MJ</div>
                    <div class="member-name">Mike Johnson</div>
                    <div class="member-role">Head of Operations</div>
                    <div class="member-bio">Operations mastermind ensuring seamless logistics and supply chain
                        excellence. Mike's expertise in global commerce keeps our customers delighted with
                        lightning-fast, reliable service.</div>
                </div>
                <div class="team-member">
                    <div class="member-avatar">SL</div>
                    <div class="member-name">Sarah Lee</div>
                    <div class="member-role">Customer Experience Lead</div>
                    <div class="member-bio">Customer happiness champion dedicated to creating magical moments. Sarah
                        leads our world-class support team, ensuring every interaction leaves you feeling valued and
                        heard.</div>
                </div>
                <div class="team-member">
                    <div class="member-avatar">DK</div>
                    <div class="member-name">David Kim</div>
                    <div class="member-role">Head of Technology</div>
                    <div class="member-bio">Tech visionary building the future of online shopping. David's innovative
                        solutions power our platform, creating seamless, intuitive experiences that delight our
                        customers.</div>
                </div>
            </div>
        </section>

        <!-- New Partners Section -->
        <section class="content-section">
            <h2>Our Partners</h2>
            <p>We collaborate with industry leaders and innovative brands to bring you the best products and services.
                Our partnership network spans the globe, ensuring access to premium quality and cutting-edge solutions.
            </p>
            <div class="partners-grid">
                <div class="partner-card">
                    <div class="partner-logo">AP</div>
                    <div class="partner-name">Apple Inc.</div>
                    <div class="partner-description">Authorized retailer of premium Apple products and accessories
                        worldwide</div>
                </div>
                <div class="partner-card">
                    <div class="partner-logo">NK</div>
                    <div class="partner-name">Nike</div>
                    <div class="partner-description">Official partner for athletic footwear and performance apparel
                    </div>
                </div>
                <div class="partner-card">
                    <div class="partner-logo">SM</div>
                    <div class="partner-name">Samsung</div>
                    <div class="partner-description">Strategic alliance for cutting-edge electronics and smart devices
                    </div>
                </div>
                <div class="partner-card">
                    <div class="partner-logo">AD</div>
                    <div class="partner-name">Adidas</div>
                    <div class="partner-description">Premium sportswear and lifestyle brand partnership</div>
                </div>
                <div class="partner-card">
                    <div class="partner-logo">DL</div>
                    <div class="partner-name">Dell</div>
                    <div class="partner-description">Authorized distributor of professional computing solutions</div>
                </div>
                <div class="partner-card">
                    <div class="partner-logo">LG</div>
                    <div class="partner-name">LG Electronics</div>
                    <div class="partner-description">Home appliances and consumer electronics partnership</div>
                </div>
            </div>
        </section>

        <!-- Enhanced CTA Section -->
        <section class="cta-section">
            <h2>Ready to Experience Excellence?</h2>
            <p>Join thousands of satisfied customers who've discovered the YourStore difference</p>
            <div class="cta-buttons">
                <a href={{route('homes')}} class="cta-button primary">
                    <span>🛍️</span>
                    Browse Products
                </a>
                <a href="#" class="cta-button">
                    <span>💬</span>
                    Contact Us
                </a>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        // --- 1. Animate Statistics Counter ---
        // This function makes the numbers in the hero section count up.
        const stats = document.querySelectorAll('.stat-number');
        stats.forEach(stat => {
            const targetText = stat.textContent;
            // Use a regex to get only the number part for calculation
            const numericTarget = parseInt(targetText.replace(/[^\d.]/g, ''));
            
            let current = 0;
            // The increment determines the speed of the animation
            const increment = numericTarget / 100;

            const timer = setInterval(() => {
                current += increment;
                if (current >= numericTarget) {
                    // When the count is done, set the final text and stop
                    stat.textContent = targetText;
                    clearInterval(timer);
                } else {
                    // This logic correctly formats the number during the animation
                    if (targetText.includes('K')) {
                        stat.textContent = Math.floor(current) + 'K+';
                    } else if (targetText.includes('%')) {
                        // Use toFixed(1) for smooth decimal animation
                        stat.textContent = current.toFixed(1) + '%';
                    } else {
                        stat.textContent = Math.floor(current) + '+';
                    }
                }
            }, 20); // Update every 20 milliseconds for a smooth effect
        });


        // --- 2. Animate Sections on Scroll ---
        // This uses the Intersection Observer API for high performance.
        // It's much more efficient than using scroll event listeners.
        const observerOptions = {
            root: null, // Observes intersections relative to the viewport
            rootMargin: '0px',
            threshold: 0.1 // Triggers when 10% of the element is visible
        };

        // The function that runs when an observed element enters the screen
        const observerCallback = (entries, observer) => {
            entries.forEach(entry => {
                // If the element is intersecting (i.e., on screen)
                if (entry.isIntersecting) {
                    // Add the 'is-visible' class to trigger the CSS animation
                    entry.target.classList.add('is-visible');
                    // Stop observing the element so the animation only runs once
                    observer.unobserve(entry.target);
                }
            });
        };

        // Create the observer
        const observer = new IntersectionObserver(observerCallback, observerOptions);

        // Select all the sections you want to animate
        const elementsToAnimate = document.querySelectorAll('.content-section, .value-card, .team-member, .partner-card');
        
        // Tell the observer to watch each of these elements
        elementsToAnimate.forEach(el => {
            observer.observe(el);
        });
    });
    </script>
    @endsection