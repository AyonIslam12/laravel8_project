<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/assets/frontend/css/blog-home.css') }}" rel="stylesheet">

</head>

<body>

@include('admin.components.header')

<!-- Page Content -->
<div class="container" style="min-height: 550px">



        @yield('content')


    <!-- /.row -->

</div>
<!-- /.container -->

@include('admin.components.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('/assets/frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>

