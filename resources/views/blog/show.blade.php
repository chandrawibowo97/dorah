@extends('layouts.main')

@section('content')

<div class="container py-5">
	<div class="row">
		<div class="col-md-9">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('blog.index')}}">Berita</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
				</ol>
			</nav>

			<div class="card my-2">
				<div class="card-body">
					<h1 class="mb-4">{{$post->title}}</h1>
					@if($post->cover_image != NULL)
					<img class="rounded img-fluid mb-4" src="/storage/post-images/{{$post->cover_image}}">
					@endif
					{!!$post->body!!}
					<hr class="mt-5">
					<p class="text-right"><small class="muted">Ditulis pada {{$post->created_at}}</small></p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<h4 class="mt-4">Post Terbaru</h4>
			<ul class="list-unstyled">
			@foreach($posts as $post)
			<li><a href="/blog/{{$post->id}}">{{$post->title}}</a></li>
			@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection
