@extends('layouts.base')

@section('body')
<section class="jumbotron jumbotron-fluid text-center mb-0" style="background-color: #fff;">
    <div class="container p-5">
        <h1 class="display-4">403</h1>
        <p class="lead">{{ $exception->getMessage() }}</p>
        <p>
            <a class="btn btn-lg btn-danger" href="{{ route('index') }}">Return to home</a>
        </p>
    </div>
</section>
@endsection
