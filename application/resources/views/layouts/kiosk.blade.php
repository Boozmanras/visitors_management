<!doctype html>
<html lang="{{ app()->getLocale() }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/img/yala-favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/img/yala-favicon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/img/yala-favicon.png') }}">
    <title>Yala Visitors management</title>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/dark-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/animatecss/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/select2-bootstrap-5/select2-bootstrap-5-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/kiosk.css') }}">
    @yield('styles')
</head>
<body>
    <img src="{{ asset('/assets/images/img/kiosk.png') }}" class="creative-bg">
    <div class="wrapper">
        <div id="body">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var url = "{{ url('/') }}";
    </script>
    <script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/momentjs/moment.js') }}"></script>
    <script src="{{ asset('/assets/vendor/momentjs/moment-timezone-with-data.js') }}"></script>
    <script src="{{ asset('/assets/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/assets/js/form-validator.js') }}"></script>
    @yield('scripts')
</body>
</html>