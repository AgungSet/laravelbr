<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'E-Commerce') }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('assets/landing/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet" />
</head>

<body>
    {{-- Header --}}
    @include('umum.layouts.header')

    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('umum.layouts.footer')

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="{{ asset('assets/landing/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
