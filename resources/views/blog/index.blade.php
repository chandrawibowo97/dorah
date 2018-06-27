@extends('layouts.main')

@section('content')

<div class="container py-5">
	@foreach($posts as $post)
	<div class="card mb-2">
		<div class="card-body p-5">
			<div class="row">
				@if($post->cover_image != NULL)
				<div class="col-sm-3">
					<img class="img-fluid" src="/storage/post-images/{{$post->cover_image}}">
				</div>
				<div class="col-sm-8">
					<h1><a href="blog/{{$post->id}}">{{$post->title}}</a></h1>
					<small class="text-muted">Ditulis pada {{$post->created_at}}</small>
				</div>
				@else
				<div class="col-sm-12">
					<h1><a href="blog/{{$post->id}}">{{$post->title}}</a></h1>
					<small class="text-muted">Ditulis pada {{$post->created_at}}</small>
				</div>
				@endif
			</div>
		</div>
	</div>
	@endforeach
	{{$posts->links()}}
</div>

@endsection
