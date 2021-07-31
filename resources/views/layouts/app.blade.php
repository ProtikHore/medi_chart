<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap-minty.min.css') }}" rel="stylesheet" type="text/css">
{{--    <link href="{{ asset('css/bootstrap.min-material.css') }}" rel="stylesheet" type="text/css">--}}
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery-ui.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/font-awesome.all.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.toaster.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/jquery-editable-select.min.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/jquery-editable-select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sketch.min.js') }}" type="text/javascript"></script>

    <style>
        .table td, .table th {
            padding: .4rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        thead{
            padding: .5rem;
        }
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
            right: 0.5em;
            content: "\2193";
        }
        body {
            margin: 0;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            font-size: .8rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }
    </style>
</head>
<body style="background: url('{{asset('images/back.jpg')}}');background-repeat: repeat; margin: 0 auto;width: 100%;height: 100%" class="container-fluid">


<div class="row mt-2">
    <div class="col">
        <a href="{{ url('position') }}" class="btn btn-sm btn-success">Position</a>
    </div>
    <div class="col">
        <a href="{{ url('medicine_list') }}" class="btn btn-sm btn-success">Medicine List</a>
    </div>
    <div class="col">
        <a href="{{ url('medicine_chart') }}" class="btn btn-sm btn-success">Medicine Chart</a>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        @yield('content')
    </div>
</div>
<script>
    $body = $("body");
    function loadingBar(isLoad) {
        if (isLoad === true){
            $(document).on({
                ajaxStart: function() {
                    var zIndex = 999;
                    if ($('body').hasClass('modal-open')) {
                        zIndex = parseInt($('div.modal').css('z-index')) + 1;
                    }
                    $(".ajax_loading_modal").css({
                        'z-index': zIndex
                    });
                    $body.addClass("loading");
                    $('body.loading .ajax_loading_modal').css({
                        'overflow': 'hidden',
                        'display': 'block'
                    });
                },
                ajaxStop: function() {
                    $('body.loading .ajax_loading_modal').css({
                        'overflow': 'visible',
                        'display': 'none'
                    });
                    $body.removeClass("loading");

                }
            });
        }
    }
    </script>

    <div class="ajax_loading_modal">

        </div>
<style type="text/css">
    .ajax_loading_modal {
        display:    none;
        position:   fixed;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        background: rgba( 255, 255, 255, .8 )
        url('{{ asset('images/loading.gif') }}')
        50% 50%
        no-repeat;
    }
</style>
</body>
</html>
