<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
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
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>