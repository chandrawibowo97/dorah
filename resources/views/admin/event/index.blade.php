@extends('layouts.main')

@section('content')

<div class="container py-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <p>
        <a class="btn btn-secondary" href="/admin">Kembali ke Dashboard</a>
        <a class="btn btn-primary" href="/admin/event/add">Tambah Event</a>
    </p>
	@foreach($events as $event)
	<div class="card mb-2">
		<div class="card-body p-3">
			<h2><a target="_blank" href="/event/{{$event->id}}">{{$event->title}}</a></h2>
            <p>{!!$event->address!!}</p>
            <a class="btn btn-sm btn-primary" href="/admin/event/edit/{{$event->id}}">Edit</a>
            <form class="float-right" action="/admin/event/delete/{{$event->id}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
		</div>
	</div>
    @endforeach
    {{$events->links()}}
</div>

@endsection
