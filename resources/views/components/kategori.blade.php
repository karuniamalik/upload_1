<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
@foreach ($kategori as $kat )
<li><a class="dropdown-item" href="{{ url('view_kategori/'.$kat->id) }}">{{ $kat->kategori }}</a></li>   
@endforeach                 
</div>