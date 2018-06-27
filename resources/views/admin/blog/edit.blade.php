@extends('layouts.main')

@section('content')

<div class="container py-5">
    <p>
        <a class="btn btn-secondary" href="{{route('admin_post')}}">Kembali Ke Post</a>
    </p>
    <div class="card">
        <div class="card-body">
            <form method="post" action="/admin/post/edit/{{$post->id}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="title">Judul Post</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" required>
                </div>
                <div class="form-group">
                    <label for="body">Isi Post</label>
                    <textarea id="body" name="body">{{$post->body}}</textarea>
                </div>
                <div class="form-group">
                    <label for="picture">Upload Gambar:</label>
                    <input type="file" class="form-control" name="picture" id="picture" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>
@endsection