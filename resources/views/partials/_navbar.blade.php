<header>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top shadow-sm px-0">
        <div class="d-flex w-100 justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center ps-0" href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Expresso Express" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end me-0" id="navbarNav">
                <ul class="navbar-nav ms-auto">
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
.navbar .container {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    width: 100%;
    padding-left: 0 !important;
    padding-right: 0 !important;
}
.navbar-brand {
    margin-left: 0 !important;
}
#navbarNav {
    margin-right: 0 !important;
}
</style>
