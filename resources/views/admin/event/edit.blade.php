@extends('layouts.main')

@section('content')

<div class="container py-5">
    <h4>Tambahkan Event</h4>
    <div class="card">
        <div class="card-body">
        <form method="post" action="/admin/event/edit/{{$event->id}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="title">Nama Event</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$event->title}}">
                </div>
                <div class="form-group">
                    <label for="address">Alamat Event</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$event->address}}">
                </div>
                <div class="form-group">
                    <label for="from">Waktu Mulai</label>
                    <input type="text" class="form-control" id="from" name="from" value="{{$event->from}}">
                    <small class="form-text text-muted">Format tanggal: 2000-12-31 23:59:59</small>
                </div>
                <div class="form-group">
                    <label for="to">Waktu Selesai</label>
                    <input type="text" class="form-control" id="to" name="to" value="{{$event->to}}">
                    <small class="form-text text-muted">Format tanggal: 2000-12-31 23:59:59</small>
                </div>
                <div class="form-group">
                    <label for="lat">Lat</label>
                    <input type="text" class="form-control" id="lat" name="lat" value="{{$event->lat}}">
                </div>
                <div class="form-group">
                    <label for="lng">Long</label>
                    <input type="text" class="form-control" id="lng" name="lng" value="{{$event->lng}}">
                </div>
                {{-- <div class="form-group">
                    <label for="event_">Upload Gambar:</label>
                    <input type="file" class="form-control" name="uploadGambar" id="uploadGambar">
                </div> --}}
                <button type="submit" class="btn btn-block btn-warning">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection