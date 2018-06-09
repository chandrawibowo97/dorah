@extends('layouts.main')

@section('content')

<div class="container py-5">
	<a class="btn btn-secondary" href="{{route('blog.index')}}">Kembali</a>
	<div class="card my-2">
		<div class="card-body">
			<h1>{{$post->title}}</h1>
			<p class="lead">{!!$post->body!!}</p>
			<hr>
			<small class="muted">{{$post->created_at}}</small>
		</div>
	</div>
</div>

@endsection
