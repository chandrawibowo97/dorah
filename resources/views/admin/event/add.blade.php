@extends('layouts.main')

@section('content')

<div class="container py-5">
    <h4>Tambahkan Event</h4>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
        @endforeach
    @endif
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('admin_event_add')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Nama Event</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="address">Alamat Event</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="from">Waktu Mulai</label>
                    <input type="text" class="form-control" id="from" name="from" required>
                    <small class="form-text text-muted">Format tanggal: 2000-12-31 23:59:59</small>
                </div>
                <div class="form-group">
                    <label for="to">Waktu Selesai</label>
                    <input type="text" class="form-control" id="to" name="to" required>
                    <small class="form-text text-muted">Format tanggal: 2000-12-31 23:59:59</small>
                </div>
                <div class="form-group">
                    <label for="lat">Lat</label>
                    <input type="text" class="form-control" id="lat" name="lat" required>
                </div>
                <div class="form-group">
                    <label for="lng">Long</label>
                    <input type="text" class="form-control" id="lng" name="lng" required>
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