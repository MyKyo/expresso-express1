<header>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#" style="margin-left: -100px;">
    <img src="{{ asset('img/logo/logo.png') }}" alt="Expresso Express" height="40">
</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                {{-- Ikon hamburger telah diganti dengan ikon panah ke bawah --}}
                <i class="bi bi-chevron-down"></i>
            </button>

            {{-- Tambahkan class justify-content-end di sini --}}
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                {{-- Hapus class ms-auto dari sini --}}
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-center py-2" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center py-2" href="#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center py-2" href="#how-to-order">How to Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center py-2" href="#blog">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
