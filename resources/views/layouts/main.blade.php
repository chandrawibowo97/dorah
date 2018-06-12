@extends('layouts.base')

@section('head')
    <title>{{ $title }}</title>
@endsection

@section('body')
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
@endsection
