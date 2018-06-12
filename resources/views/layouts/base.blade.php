<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">

        @section('head')
        @show

    </head>


    <body class="d-flex flex-column justify-content-between">
        @section('body')
        @show
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>