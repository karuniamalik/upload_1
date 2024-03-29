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
                    <a class="nav-link active" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang kami</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Belanja
                    </a>
                    <ul class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown">

                        <x-kategori>

                        </x-kategori>

                    </ul>
                </li>

                <form class="d-flex">
                    <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                    {{-- <button class="btn btn-outline-success" type="submit">Search</button>  --}}
                </form>
            </ul>

            <ul class="navbar-nav ms-auto text-uppercase my-2  ">
                <li class="nav-item">
                    @if (Auth::user())
                        <a class="nav-link" href="{{ url('detail_keranjang') }}"><img src="{{ asset('img/cart.png') }}"
                                alt="">{{ Cart::session(Auth::user()->id)->getContent()->count() }}</a>
                    @endif
                </li>

                @guest
                    <a class="nav-link" href="{{ url('detail_keranjang') }}"><img src="{{ asset('img/cart.png') }}"
                            alt="">{{ Cart::getContent()->count() }}</a>
                    <li class="nav-item ">
                        <a class="nav-link btn btn-dark border-light px-4" href="{{ url('login') }}">MASUK</a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="nav-link btn btn-dark px-4 border-light" href="{{ url('register') }}">DAFTAR</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->jabatan == 'admin')
                                <li>
                                <li><a class="dropdown-item" href="{{ url('/barang') }}">Dashboard</a></li>

                    </li>
                @else
                    <li>
                    <li><a class="dropdown-item" href="{{ url('/user') }}">Dashboard</a></li>

                    </li>
                    @endif

                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="dropdown-item">LOGOUT</button>
                        </form>
                    </li>

                </ul>
                </li>
            @endguest
            </ul>
        </div>
    </div>
</nav>
