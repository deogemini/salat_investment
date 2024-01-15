<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Salat Invenstment</title>



    <!-- Bootstrap core CSS -->
{{-- <link href="../css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/dashboard.css')}}" rel="stylesheet">
  </head>
  <body>
@include('layouts.header')

<div class="container-fluid">
  <div class="row">

    @include('layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        @yield('content')

    </main>
  </div>
</div>


    <script src=" {{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('assets/js/dashboard.js')}}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include Chart.js from CDN -->

</body>
</html>
