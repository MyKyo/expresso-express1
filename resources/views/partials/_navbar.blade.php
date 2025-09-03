<!-- =================================================================
1. HEADER & NAVBAR (Bagian Kepala Website)
================================================================== -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                {{-- Menggunakan helper asset() untuk path gambar yang benar di Laravel --}}
                <img src="{{ asset('img/logo/logo.png') }}" alt="Expresso Express">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Tautan navigasi sekarang mengarah ke ID section -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-to-order">How to Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
