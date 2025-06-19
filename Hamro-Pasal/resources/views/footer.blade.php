<style>
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

      </style>
       <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Hamro Pasal</h3>
                    <p>Your trusted online shopping destination in Nepal. We bring you the best products at the best prices.</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <a href="#">About Us</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">FAQ</a>
                </div>
                <div class="footer-section">
                    <h3>Categories</h3>
                    <a href="#">Electronics</a>
                    <a href="#">Fashion</a>
                    <a href="#">Home & Garden</a>
                    <a href="#">Sports</a>
                    <a href="#">Books</a>
                </div>
                <div class="footer-section">
                    <h3>Customer Service</h3>
                    <a href="#">Track Your Order</a>
                    <a href="#">Shipping Info</a>
                    <a href="#">Returns</a>
                    <a href="#">Size Guide</a>
                    <a href="#">Help Center</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Hamro Pasal. All rights reserved. | Designed with ❤️ in Nepal</p>
            </div>
        </div>
    </footer>