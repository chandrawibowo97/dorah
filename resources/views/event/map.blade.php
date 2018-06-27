@extends('layouts.main')

@section('content')

<div class="container py-5">
    <a class="btn btn-secondary mb-2" href="{{route('event.index')}}">Kembali Ke Daftar Event</a>
    <div id="map" style="width: 100%; height: 550px;"></div>
</div>

@endsection


@section('script')

<script type="text/javascript">
    var events = {!! json_encode($events->toArray()) !!};
    
    
    function initMap(){
        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14, //default zoom medan = 10
        center: new google.maps.LatLng(3.597031, 98.678513), //center untuk medan
        mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < events.length; i++) {  
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(events[i].lat, events[i].lng),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
            infowindow.setContent('<h4><a target="_blank" href="/event/' + events[i].id + '">' + events[i].title + '</a></h4><img class="my-2" style="height: 120px" src="/storage/event-images/' + events[i].event_picture + '"><br>' + events[i].address + '<br><small><a target="_blank" href="/event/' + events[i].id + '">Cek lokasi event >></a></small>');
            infowindow.open(map, marker);
            }
        })(marker, i));
        }
    }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDxQBvSn1BtzShvuE3hpJZgBPQ-1MVKmw&callback=initMap" type="text/javascript"></script>

@endsection