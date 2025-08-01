@extends('layouts.app')

@section('content')
<div class="contact-us-page">
    <!-- ================== NEW DYNAMIC HEADER ================== -->
    <div class="page-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Get In Touch</h1>
            <p class="lead">We're here to help and eager to hear from you. Reach out to us!</p>
        </div>
        <!-- SVG Wave for a smooth transition -->
        <div class="header-wave">
            <svg viewBox="0 0 1440 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,100 C240,30 480,30 720,100 S960,170 1200,100 S1440,30 1440,100 L1440,100 L0,100 Z"></path>
            </svg>
        </div>
    </div>
    
    <!-- ================== MAIN CONTENT WITH OVERLAP ================== -->
    <div class="main-content">
        <div class="container">
            <div class="row gx-lg-5 gy-5 align-items-center">
                <!-- Contact Form Section -->
                <div class="col-lg-7">
                    <div class="contact-form-wrapper p-4 p-md-5 rounded-4 shadow-lg">
                        <h3 class="fw-bold mb-4 text-center">Send Us a Message</h3>
                        <form action="#" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="you@example.com" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea id="message" name="message" rows="6" class="form-control" placeholder="Let us know how we can help..." required></textarea>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm px-5 py-2">
                                    <i class="fas fa-paper-plane me-2"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Info Cards Section -->
                <div class="col-lg-5">
                    <div class="info-cards-wrapper">
                        <a href="https://www.google.com/maps/place/Kathmandu" target="_blank" rel="noopener noreferrer" class="text-decoration-none">
                            <div class="info-card">
                                <div class="icon-wrapper"><i class="fas fa-map-marker-alt fa-lg"></i></div>
                                <div>
                                    <h5 class="fw-bold mb-0">Our Location</h5>
                                    <p class="mb-0 text-muted">Kathmandu, Nepal</p>
                                </div>
                            </div>
                        </a>
                        <a href="mailto:support@hamropasal.com" class="text-decoration-none">
                            <div class="info-card">
                                <div class="icon-wrapper"><i class="fas fa-envelope fa-lg"></i></div>
                                <div>
                                    <h5 class="fw-bold mb-0">Email Us</h5>
                                    <p class="mb-0 text-muted">support@hamropasal.com</p>
                                </div>
                            </div>
                        </a>
                        <a href="tel:+9779800000000" class="text-decoration-none">
                            <div class="info-card">
                                <div class="icon-wrapper"><i class="fas fa-phone fa-lg"></i></div>
                                <div>
                                    <h5 class="fw-bold mb-0">Call Us</h5>
                                    <p class="mb-0 text-muted">+977-9810129627</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================== NEW EMBEDDED MAP SECTION ================== -->
    <div class="container my-5">
        <div class="map-wrapper shadow-lg rounded-4">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113032.64222143934!2d85.2553928172925!3d27.708942337722425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2C%20Nepal!5e0!3m2!1sen!2sus!4v1668888888888"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>

<!-- Styling for the Enhanced Page -->
<style>
    .contact-us-page {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', 'Nunito', sans-serif;
    }

    /* --- New Header Styling --- */
    .page-header {
        background: linear-gradient(135deg, #757BDA 0%, #5a63d8 100%);
        color: white;
        padding: 6rem 0 10rem; /* Increased bottom padding for the wave */
        position: relative;
        overflow: hidden;
    }

    .page-header h1, .page-header p {
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }
    
    .header-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100px; /* Adjust height of wave */
    }

    .header-wave svg {
        fill: #f8f9fa; /* Color must match the page background */
        width: 100%;
        height: 100%;
    }

    /* --- Main Content with Overlap --- */
    .main-content {
        margin-top: -100px; /* This pulls the content up over the wave */
        position: relative;
        z-index: 2;
    }

    /* Form & Info Card Styling (Slightly modified) */
    .contact-form-wrapper {
        background: #ffffff;
        border: 1px solid #e9ecef;
    }

    .form-label {
        font-weight: 600;
        color: #495057;
    }

    .form-control {
        padding: 0.85rem 1rem;
        font-size: 1rem;
        border: 1px solid #ced4da;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-control:focus {
        border-color: #757BDA;
        box-shadow: 0 0 0 0.25rem rgba(117, 123, 218, 0.2);
    }

    .input-group-text {
        background-color: #e9ecef;
        border: 1px solid #ced4da;
        color: #757BDA;
    }

    .btn-primary {
        background-color: #757BDA;
        border-color: #757BDA;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #5a63d8;
        transform: translateY(-2px);
    }

    .info-cards-wrapper .info-card {
        display: flex;
        align-items: center;
        background-color: #ffffff;
        padding: 1.5rem;
        border-radius: 1rem;
        margin-bottom: 1.5rem;
        border: 1px solid #e9ecef;
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .info-cards-wrapper .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border-color: #757BDA;
    }
    
    .info-card .icon-wrapper {
        flex-shrink: 0;
        width: 50px;
        height: 50px;
        display: grid;
        place-items: center;
        background-color: rgba(117, 123, 218, 0.1);
        color: #757BDA;
        border-radius: 50%;
        margin-right: 1.5rem;
    }

    /* --- New Map Wrapper Styling --- */
    .map-wrapper {
        overflow: hidden; /* This is crucial to make border-radius work on the iframe */
    }

    .map-wrapper iframe {
        display: block; /* Removes any default bottom spacing */
    }
</style>
@endsection