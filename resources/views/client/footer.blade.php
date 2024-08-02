<footer class="footer">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-3 mb-3">
                <img src="/assets/images/logo.png" alt="Logo" class="footer-logo">
            </div>
            <div class="col-md-3 mb-3">
                <h5>Address and Contact Us</h5>
                <p>Address: Purok San Juan, Buñao Dumaguete City, Negros Oriental</p>
                <p>Email: info@barangay.com</p>
                <p>Phone: (035) 225 6369</p>
            </div>
            <div class="col-md-3 mb-3">
                <h5>Follow Us</h5>
                <ul class="list-unstyled">
                    <li><a href="https://www.facebook.com/barangay.bunao" class="text-light"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                    <li><a href="#" class="text-light"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="#" class="text-light"><i class="fab fa-instagram"></i> Instagram</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-light"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-light"><i class="fas fa-info-circle"></i> About</a></li>
                    <li><a href="#" class="text-light"><i class="fas fa-users"></i> Officials</a></li>
                    <li><a href="#" class="text-light"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <p>&copy; {{ date('Y') }} Barangay. All rights reserved.</p>
    </div>
</footer>
