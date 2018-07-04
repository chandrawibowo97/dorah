@extends('layouts.main')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <p>
                <a class="btn btn-secondary" href="/admin/event">Tampilkan semua event</a>
                <a class="btn btn-primary" href="/admin/event/add">Tambah Event</a>
            </p>
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($events as $event)
                    <li class="list-group-item">
                        <a target="_blank" href="/event/{{$event->id}}">{{$event->title}}</a>
                        <div class="float-right">
                            <a href="/admin/event/edit/{{$event->id}}" class="btn btn-sm btn-primary">Edit</a>
                            <form class="d-inline" action="/admin/event/delete/{{$event->id}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <p>
                <a class="btn btn-secondary" href="/admin/post">Tampilkan semua post</a>
                <a class="btn btn-primary" href="/admin/post/add">Tambah Post</a>
            </p>
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($posts as $post)
                    <li class="list-group-item">
                        <a target="_blank" href="/blog/{{$post->id}}">{{$post->title}}</a>
                        <div class="float-right">
                            <a href="/admin/post/edit/{{$post->id}}" class="btn btn-sm btn-primary">Edit</a>
                            <form class="d-inline" action="/admin/post/delete/{{$post->id}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection