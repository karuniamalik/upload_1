
@if(session()->has('success'))

<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>

@elseif($errors->any())

<div class="alert alert-warning" role="alert">
 <h3>Masukkan Data dengan benar</h3>
</div>

@endif