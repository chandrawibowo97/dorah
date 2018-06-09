@extends('layouts.main')

@section('content')

<div class="container py-5">
    <a class="btn btn-secondary mb-2" href="{{route('event.index')}}">Kembali</a>
    <div class="row">
        <div class="col-md-8">
            <iframe id="modalmap" width="100%" height="500" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:{{$event->place_id}}&key=AIzaSyBDxQBvSn1BtzShvuE3hpJZgBPQ-1MVKmw" allowfullscreen></iframe>
        </div>

        <div class="col-md-4">
            <img class="img-thumbnail img-fluid mb-3" src="/storage/event-images/{{$event->event_picture}}">
            <h4>{{$event->title}}</h4>
            <h5 class="text-muted">{{$event->from->format('D, d M Y')}}</h5>
            <p>Waktu: {{$event->from->format('g:ia')}} - {{$event->to->format('g:ia')}}</p>
            <p>Lokasi: {{$event->address}}</p>
            {{-- 
            echo '<a target="_blank" class="fb-share btn btn-primary btn-block" href="https://www.facebook.com/sharer/sharer.php?p[url]=http://www.dorah.co.id&p[title]=Event+Donor+Darah+&p[summary]=Recent+events">' , 'Sebarkan ke Facebook</a>';
             --}}
            <a class="btn btn-block btn-primary" href="#">Sebarkan ke Facebook</a>
        </div>
    </div>
</div>


@endsection