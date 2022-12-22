<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    
    <link rel="shortcut icon" href="{{ asset('images/houses-logo-vector-24291977.jpg') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<style>
      .bg-image {
        width: 100%;
        min-height: 100%;
        background: url('{{ asset('images/get-money-down-payment-house.jpg')}}');
        background-position: center;
        background-size: cover;

         /* -webkit-filter: blur(10px); /* Safari 6.0 - 9.0 */
      /* filter: blur(10px);  */
    }
</style>
<body class="font-sans antialiased container bg-image">

    <div class="row ">
    @include('admin.layouts.navigation')

        <div class="col-md-2 mt-4 bg-light rounded-3 ">
            @include('admin.layouts.left')
        </div>

        <div class="col-md-10">
        @include('sweetalert::alert')

        <main>
                {{ $slot }}
        </main>
            
        </div>

        <!-- jquery -->



    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>