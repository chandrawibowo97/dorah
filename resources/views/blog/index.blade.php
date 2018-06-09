@extends('layouts.main')

@section('content')

<div class="container py-5">
	@foreach($posts as $post)
	<div class="card mb-2">
		<div class="card-body p-5">
			<h2><a href="blog/{{$post->id}}">{{$post->title}}</a></h2>
			<p>{!!$post->body!!}</p>
		</div>
	</div>
	@endforeach
</div>

@endsection
