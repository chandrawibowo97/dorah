@extends('layouts.main')

@section('content')

<div class="container py-5">
    <p>
        <a class="btn btn-secondary" href="/admin">Kembali ke Dashboard</a>
        <a class="btn btn-primary" href="/admin/post/add">Tambah Post</a>
    </p>
	@foreach($posts as $post)
	<div class="card mb-2">
		<div class="card-body p-3">
			<h2><a href="/admin/post/edit/{{$post->id}}">{{$post->title}}</a></h2>
            <a class="btn btn-sm btn-primary" href="/admin/post/edit/{{$post->id}}">Edit</a>
            <form class="float-right" action="/admin/post/delete/{{$post->id}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
		</div>
	</div>
    @endforeach
    {{$posts->links()}}
</div>

@endsection
