@extends('layouts.main')

@section('container')
    {{-- carousel --}}
    <div id="carouselExampleControls" class="carousel slide mt-4 ba bg-dark text-white" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="container">
                <div class="carousel-item active">
                    <div class="row pt-5 justify-content-center">
                        <div class="col-9 col-sm-4 col-md-6 col-lg-5">
                            <h1 class="mb-4">Spesial Eid Lebaran</h1>
                            <p class="mb-4">Jadikan hari pertama lebaranmu meriah dan memorible</p>
                            <a href="" class="btn btn-warning text-white">Get It Now</a>
                        </div>

                        <div class=" d-none d-sm-block col-3 col-sm-6 col-md-4 col-lg-4 offset-1">
                            <img src="{{ asset('img/slideshow/slide1.png') }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row pt-5 justify-content-center">
                        <div class="col-9 col-sm-4 col-md-6 col-lg-5">
                            <h1 class="mb-4">Spesial Eid Lebaran</h1>
                            <p class="mb-4">Jadikan hari pertama lebaranmu meriah dan memorible</p>
                            <a href="" class="btn btn-warning text-white">Get It Now</a>
                        </div>

                        <div class=" d-none d-sm-block col-3 col-sm-6 col-md-4 col-lg-4 offset-1">
                            <img src="{{ asset('img/slideshow/slide1.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row pt-5 justify-content-center">
                        <div class="col-9 col-sm-4 col-md-6 col-lg-5">
                            <h1 class="mb-4">Spesial Eid Lebaran</h1>
                            <p class="mb-4">Jadikan hari pertama lebaranmu meriah dan memorible</p>
                            <a href="" class="btn btn-warning text-white">Get It Now</a>
                        </div>

                        <div class=" d-none d-sm-block col-3 col-sm-6 col-md-4 col-lg-4 offset-1">
                            <img src="{{ asset('img/slideshow/slide1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="row mt-3">
        <div class="col-md-2">
            <select class="form-select mb-3" aria-label="Default select example">
                <option selected>Atur Berdasarkan</option>
                <option value="1">Popularitas</option>
                <option value="2">Harga Terendah</option>
                <option value="3">Produk Terbaru</option>
            </select>

            <x-filter jenis="Pakaian Atasan">

            </x-filter>

            <x-filter jenis="Pakaian Bawahan">

            </x-filter>

            <x-filter jenis="Warna">

            </x-filter>

        </div>
        <div class="col-md-10">
            <div class="row" id="produk">

                @foreach ($data as $item)
                    @if (!empty($id))
                        <div class="col-md-4 mb-4">
                            <div class="card ">
                                <img class="img-thumbnail" style="width:100%; height:200px; object-fit: contain"
                                    src="{{ asset('storage/' . $item->barang->gambar) }}" alt="k">
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $item->barang->nama_barang }}</h5>

                                    <p class="card-text">{{ $item->barang->harga }}</p>

                                    <form action="{{ url('tambah_keranjang') }}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        <input type="hidden" value="{{ $item->barang->id }}" name="id">
                                        <input type="hidden" value="{{ $item->barang->nama_barang }}" name="name">
                                        <input type="hidden" value="1" name="quantity">
                                        <input type="hidden" value="{{ $item->barang->harga }}" name="price">
                                        <input type="hidden" value="{{ $item->barang->gambar }}" name="image">

                                        <div class="tambah_keranjang">
                                            <button class="btn btn-primary">Beli Sekarang</button>
                                        </div>
                                    </form>
                                    {{-- <a class="tambah_keranjang" href="#" class="btn btn-primary">Beli Sekarang</a> --}}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (empty($id))
                        <div class="col-md-4 mb-4">
                            <div class="card ">
                                <img class="img-thumbnail" style="width:100%; height:200px; object-fit: contain"
                                    src="{{ asset('storage/' . $item->gambar) }}" alt="k">
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $item->nama_barang }}</h5>

                                    <p class="card-text">{{ $item->harga }}</p>

                                    <form action="{{ url('tambah_keranjang') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <input type="hidden" value="{{ $item->nama_barang }}" name="name">
                                        <input type="hidden" value="1" name="quantity">
                                        <input type="hidden" value="{{ $item->harga }}" name="price">
                                        <input type="hidden" value="{{ $item->gambar }}" name="image">

                                        <div class="tambah_keranjang">
                                            <button class="btn btn-primary">Beli Sekarang</button>
                                        </div>
                                    </form>
                                    {{-- <a class="tambah_keranjang" href="#" class="btn btn-primary">Beli Sekarang</a> --}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            {{-- <div>
                <x-pagination>

                </x-pagination>
            </div> --}}

            <div style="float: right" id="pagination">
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
            {{-- <div style="float: right" id="page">

            </div> --}}

        </div>

    </div>
@endsection
