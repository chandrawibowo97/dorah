@extends('layouts.main')

@section('content')

<div class="container pt-5">
	<a href="/blog">Kembali</a>
	<div class="card my-2">
		<div class="card-body">
			<h1>{{$post->title}}</h1>
			<p class="lead">{{$post->body}}</p>
			<hr>
			<small class="muted">{{$post->created_at}}</small>
		</div>
	</div>
</div>

@endsection
