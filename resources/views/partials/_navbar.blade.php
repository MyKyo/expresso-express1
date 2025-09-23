<header>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top shadow-sm px-0">
        <div class="container-fluid px-3">
            <!-- Logo kiri -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Expresso Express" height="40">
            </a>

            <!-- Tombol toggle (kanan pada mobile) -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu kanan -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-center py-2" href="#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center py-2" href="#how-to-order">How to Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center py-2" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center py-2" href="#blog">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<style>
/* Logo selalu rapat kiri */
.navbar-brand {
    margin-left: 0 !important;
    padding-left: 0 !important;
}

/* Supaya menu rapi */
.navbar-nav .nav-link {
    padding-left: 1rem;
    padding-right: 1rem;
}

/* Saat mobile, menu turun full width */
@media (max-width: 991.98px) {
    .navbar-nav {
        text-align: center;
        width: 100%;
    }
}
</style>