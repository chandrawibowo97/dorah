@extends('layouts.main')

@section('content')

<div class="jumbotron jumbotron-fluid custom-default">
    <div class="container">
        <a class="btn btn-secondary mb-3" href="/event">Kembali</a>
        <div class="row">
            <div class="col col-sm-8">
                {{-- <iframe id="modalmap" width="100%" height="500" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:<php echo $row['event_place_id']?>&key=AIzaSyBDxQBvSn1BtzShvuE3hpJZgBPQ-1MVKmw" allowfullscreen></iframe> --}}
            </div>

            <div class="col col-sm-4">
                <img class="img-thumbnail img-fluid mb-3" src="eventimages/">
                {{-- 
                echo '<h4>' , $row['event_title'] , '</h4>';
                echo '<h5 class="text-muted mb-3">' , $row['event_date'] , '</h5>';
                echo '<p class="mb-1">' , date('H:i', strtotime($row['event_starttime'])) , ' - ' , date('H:i', strtotime($row['event_downtime'])) , '</p>';
                echo '<p>Lokasi: ' , $row['event_location'] , '</p>';
                echo '<a target="_blank" class="fb-share btn btn-primary btn-block" href="https://www.facebook.com/sharer/sharer.php?p[url]=http://www.dorah.co.id&p[title]=Event+Donor+Darah+&p[summary]=Recent+events">' , 'Sebarkan ke Facebook</a>';
                 --}}
            </div>
        </div>
    </div>
</div>

@endsection