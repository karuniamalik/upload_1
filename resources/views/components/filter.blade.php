<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    @if ($jenis == 'PakaianAtasan')
        <h5 data-bs-toggle="collapse" data-bs-target="#collapse{{ $jenis }}" name="pakaian">Pakaian Atas
            <i class="bi bi-arrow-down-up"></i>
        </h5>
    @elseif ($jenis == 'PakaianBawahan')
        <h5 data-bs-toggle="collapse" data-bs-target="#collapse{{ $jenis }}" name="pakaian">Pakaian Bawah <i
                class="bi bi-arrow-down-up"></i>
        </h5>
    @else
        <h5 data-bs-toggle="collapse" data-bs-target="#collapse{{ $jenis }}" name="pakaian">Warna <i
                class="bi bi-arrow-down-up"></i>
        </h5>
    @endif


    <div class="collapse" id="collapse{{ $jenis }}">
        @isset($kategori)
            @foreach ($kategori as $pakaian)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $pakaian->kategori }}"
                        id="{{ $pakaian->kategori }}" onclick="ambil_id({{ $pakaian->id }})">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $pakaian->kategori }}
                    </label>
                </div>
            @endforeach
        @endisset

    </div>
</div>
