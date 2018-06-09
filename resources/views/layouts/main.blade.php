<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">

        <title>{{ $title }}</title>
    </head>
    <body class="d-flex flex-column justify-content-between">
        @include('layouts.menu')
        @section('content')
        @show
        <footer class="clearfix mt-auto">
            <div class="container">
                <p><span class="float-left text-muted">Diberdayakan oleh Tim Motivator</span></p>
                <p class="float-right"><a href="#">Kembali ke atas</a></p>
            </div>
        </footer>

        @section('script')
        @show
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
