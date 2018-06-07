@extends('layouts.main')

@section('content')

<div class="container pt-5">
@foreach($posts as $post)
	<div class="card my-2">
		<div class="card-body">
			<h5><a href="blog/{{$post->id}}">{{$post->title}}</a></h5>
			<p>{{$post->body}}</p>
		</div>
	</div>

@endforeach
</div>

@endsection
