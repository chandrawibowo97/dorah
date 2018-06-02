<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}"> {{-- bootstrap --}}
        <title>{{ $title }}</title>

    </head>
    <body>

        @include('layouts.menu')
        
        @section('content')
        @show

        <footer>
            <div class="container">
                <p><span class="float-left text-muted">Dorah diberdayakan oleh Tim Motivator</span></p>
                <p class="float-right"><a href="#">Kembali ke atas</a></p>
            </div>
        </footer>

        {{-- <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script> --}}

        @section('script')
        @show

        <script src="{{asset('js/app.js')}}"></script> {{-- bootstrap --}}
    </body>
</html>
