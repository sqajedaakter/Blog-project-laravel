<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('/frontend/') }}/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('/frontend/') }}/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('frontend.includes.nav')
        <!-- Page header with logo and tagline-->
        @include('frontend.includes.header')
        <!-- Page content-->
        <div class="container">
           @yield('content')
        </div>
        <!-- Footer-->
        @include('frontend.includes.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('/frontend/') }}/js/scripts.js"></script>
    </body>
</html>
