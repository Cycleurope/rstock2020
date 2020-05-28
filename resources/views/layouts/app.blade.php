<!DOCTYPE html>
<html lang="en">
<head>
    @trixassets
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <link href="{{ asset("adminto/assets/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("adminto/assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("adminto/assets/css/app.css") }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>RStock</title>
    <style>
        .dataTables_filter {
            width: 100%;
        }
        .dataTables_filter label {
            box-sizing: border-box;
            width: 100%;
            display: block;
            text-align: left;
            padding: 0.5em 0 !important;
            font-weight: 600;
        }
        .dataTables_filter input {
            box-sizing: border-box;
            padding: 0.5em;
            width: 100%;
            display: block;
            margin: 0 !important;
            border: 1px solid #dddddd;
            background: #fafafa;
            border: radius: 0.15em;
            outline: none;
            font-size: 2em;
            font-weight: 600;
        }
    </style>
</head>
<body>
    @include('layouts.header.header')
    <div class="wrapper">
        <div class="container-fluid">
        @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>