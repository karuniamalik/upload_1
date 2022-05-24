{{-- navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">M SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-uppercase  ">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang kami</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Belanja
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Baju</a></li>
                        <li><a class="dropdown-item" href="#">Celana</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Diskon</a></li>
                        <li><a class="dropdown-item" href="#">Promo</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kategori</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto text-uppercase my-2 ">
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{ asset('img/cart.png') }}" alt=""></a>
                </li>
                <li class="nav-item ">
                    {{-- <a class="nav-link" href="#">MASUK</a> --}}
                    <input class="btn btn-dark border-light px-4" type="submit" value="Masuk">
                </li>
                <li class="nav-item me-0">
                    {{-- <a class="nav-link" href="#">DAFTAR</a> --}}
                    <input class="btn btn-light px-4" type="submit" value="Daftar">
                </li>
            </ul>
        </div>
    </div>
</nav>
