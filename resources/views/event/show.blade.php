@extends('layouts.main')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('event.index')}}">Event</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$event->title}}</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <iframe id="modalmap" width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q={{$event->lat}},{{$event->lng}}&key=AIzaSyBDxQBvSn1BtzShvuE3hpJZgBPQ-1MVKmw" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <img class="img-thumbnail img-fluid mb-3" src="/storage/event-images/{{$event->event_picture}}">
            <h3>{{$event->title}}</h3>
            <h5 class="text-muted">{{$event->from->format('D, d M Y')}}</h5>
            <p class="text-muted pt-2 pb-0 mb-0">Waktu: {{$event->from->format('g:iA')}} - {{$event->to->format('g:iA')}}</p>
            <p class="text-muted">Lokasi: {{$event->address}}</p>
            {{-- 
            echo '<a target="_blank" class="fb-share btn btn-primary btn-block" href="https://www.facebook.com/sharer/sharer.php?p[url]=http://www.dorah.co.id&p[title]=Event+Donor+Darah+&p[summary]=Recent+events">' , 'Sebarkan ke Facebook</a>';
             --}}
            <a class="btn btn-block btn-danger" target="_blank" href="https://www.google.com/maps/dir//{{$event->lat}},{{$event->lng}}">Dapatkan Direksi</a>
            <a class="btn btn-block btn-primary" href="#">Sebarkan ke Facebook</a>
        </div>
    </div>
</div>


@endsection