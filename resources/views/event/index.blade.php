@extends('layouts.main')

@section('content')

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="display-4">Event</h2>
        <hr>
    <p class="lead">Event merupakan fitur Dorah untuk menyebarkan event mengenai donor darah <a class="btn btn-sm btn-secondary" href="{{route('event_map')}}">Cek Peta Event</a></p>
    </div>
    <div class="row">
        @foreach($events as $event)
        <div class="col-sm-6 col-lg-4 mb-3">
        <div class="card">
            <img class="card-img-top" src="/storage/event-images/{{$event->event_picture}}" alt="Gambar Event">
            <div class="card-body">
                <h4 class="card-title">{{$event->title}}</h4>
                <h5 class="text-muted">{{$event->from->format('D, d M Y')}}</h5>
                <p>Waktu: {{$event->from->format('g:ia')}} - {{$event->to->format('g:ia')}}</p>
                <p>Lokasi: {{$event->address}}</p>
            </div>
            <div class="card-footer">
                <a class="card-link" href="event/{{$event->id}}">Cek Lokasi</a>
                <a class="card-link" href="#">Sebarkan ke Facebook</a>
            </div>
        </div>
        </div>
        @endforeach
        {{$events->links()}}
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.fb-share').click(function(e) {
            e.preventDefault();
            window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
            return false;
        });
    });
</script>
@endsection