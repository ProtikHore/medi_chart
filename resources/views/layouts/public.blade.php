<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap-minty.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link href="{{ asset('css/font-awesome.all.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>
{{--<body style="background: url('{{asset('images/login.jpg')}}') center no-repeat">--}}
    <div>
        @yield('content')
    </div>
{{--    <div class="row">--}}
{{--        <div class="col fixed-bottom text-center" style="height: 30px; background-color: #eee; padding-top: 5px;">--}}
{{--            Copyright &copy; {{ date('Y') }} Proxima Soft--}}
{{--        </div>--}}
{{--    </div>--}}
</body>
</html>