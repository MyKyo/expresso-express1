<!-- =================================================================
9. FOOTER SECTION (Bagian Kaki Website)
================================================================== -->
<footer class="footer pt-5">
    <div class="container">
        <div class="row g-4">
            <!-- Brand & Address -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Expresso Express" height="40" class="me-2">
                    <h5 class="m-0">Expresso Express</h5>
                </div>
                <p class="mb-2">Jl. Karet Pasar Baru Barat VII No.8, Karet Tengsin, Tanah Abang, Jakarta Pusat 10250</p>
                <p class="mb-0"><i class="bi bi-envelope me-2"></i>support@expressoexpress.com</p>
                <p class="mb-0"><i class="bi bi-telephone me-2"></i>+62 812-3456-7890</p>
            </div>

            <!-- Company Links -->
            <div class="col-lg-2 col-md-6">
                <h6 class="text-uppercase fw-bold mb-3">Company</h6>
                <ul class="list-unstyled m-0">
                    <li class="mb-2"><a class="text-decoration-none" href="#about">About us</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="#blog">Blog</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="#">Careers</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="#">Privacy</a></li>
                    <li><a class="text-decoration-none" href="#">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Support Links -->
            <div class="col-lg-2 col-md-6">
                <h6 class="text-uppercase fw-bold mb-3">Support</h6>
                <ul class="list-unstyled m-0">
                    <li class="mb-2"><a class="text-decoration-none" href="#how-to-order">How it Works</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="mailto:support@expressoexpress.com">Email</a></li>
                    <li><a class="text-decoration-none" href="https://wa.me/6281234567890">WhatsApp</a></li>
                </ul>
            </div>

            <!-- Opening Hours -->
            <div class="col-lg-2 col-md-6">
                <h6 class="text-uppercase fw-bold mb-3">Opening Hours</h6>
                <ul class="list-unstyled m-0">
                    <li class="d-flex justify-content-between mb-1"><span>Mon - Fri</span><span>08:00 - 21:00</span></li>
                    <li class="d-flex justify-content-between mb-1"><span>Sat</span><span>09:00 - 21:00</span></li>
                    <li class="d-flex justify-content-between"><span>Sun</span><span>09:00 - 19:00</span></li>
                </ul>
            </div>

            <!-- Newsletter / Apps -->
            <div class="col-lg-2 col-md-6">
                <h6 class="text-uppercase fw-bold mb-3">Stay Updated</h6>
                <div class="d-flex flex-column align-items-start gap-2">
                    <div class="d-flex gap-2 mb-2">
                        <a href="#" aria-label="App Store">
                            <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store" style="height:32px;">
                        </a>
                    </div>
                    <div>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=https://expressoexpress.com" alt="QR Code" style="height:48px;">
                    </div>
                </div>
            </div>
        </div>

        <hr class="border-light opacity-25 mt-4">

        <!-- Bottom Bar -->
        <div class="row align-items-center py-3">
            <div class="col-md-6">
                <p class="mb-0">&copy; {{ date('Y') }} Expresso Express. All rights reserved.</p>
            </div>  
            <div class="col-md-6 text-md-end">
                <div class="social-icons d-inline-flex gap-3">
                    <a href="#" aria-label="Instagram" class="text-white"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="#" aria-label="LinkedIn" class="text-white"><i class="bi bi-linkedin fs-5"></i></a>
                    <a href="#" aria-label="Facebook" class="text-white"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" aria-label="TikTok" class="text-white"><i class="bi bi-tiktok fs-5"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
