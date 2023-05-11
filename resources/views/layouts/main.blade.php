<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>

    <link type="text/css" rel="stylesheet" href="{{ asset('css/simplePagination.css') }}" />
    <script type="text/javascript" src="{{ asset('js/jquery.simplePagination.js') }}"></script>
    {{-- select2 --}}

    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Montserrat:wght@200;400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Halaman Utama</title>
</head>

<body>
    @include('partials.navbar')

    <div class="container">
        @yield('container')
    </div>
    <script src="{{ asset('js/front.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-KLa9RKOnh-_Zb7f5"></script>
</body>

</html>
