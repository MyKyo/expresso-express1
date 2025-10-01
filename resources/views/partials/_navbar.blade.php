<header>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top px-0" id="mainNav">
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
                        <a class="nav-link text-center py-2" href="{{ url('/#menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center py-2" href="{{ url('/#how-to-order') }}">How to Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center py-2" href="{{ url('/#about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center py-2" href="{{ url('/#blog') }}">Blog</a>
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

/* Styling untuk navbar saat di-scroll */
#mainNav {
    transition: all 0.3s ease-in-out;
    padding: 1rem 0;
}   

#mainNav.navbar-scrolled {
    padding: 0.5rem 0;
    background-color: #670103;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.6);
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 1rem;
    margin: 1rem auto 0;
    width: 90%;
    max-width: 1305px;
}

@media (max-width: 991.98px) {
    #mainNav.navbar-scrolled {
        margin: 0.5rem auto 0;
        width: 95%;
    }
}
</style>

<script>
window.addEventListener('scroll', function() {
    const mainNav = document.getElementById('mainNav');
    if (window.scrollY > 50) {
        mainNav.classList.add('navbar-scrolled');
    } else {
        mainNav.classList.remove('navbar-scrolled');
    }
});
</script>