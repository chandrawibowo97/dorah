{{-- ADMIN PAGE, User can't see this --}}

@extends('layouts.main')

@section('content')

<div class="jumbotron jumbotron-fluid custom-heading">
    <div class="container">
        <h2 class="display-4">Tambahkan Event</h2>
        <div class="card">
            <div class="card-body">
                <form method="post" action="addevent.php" enctype="multipart/form-data">
                    <?php
                    if(isset($successmsg)){
                        echo '<div class="alert alert-primary" role="alert">', $successmsg ,'</div>';
                    }
                    ?>
                    <div class="form-group">
                        <label for="eventInputTitle">Nama Event</label>
                        <input type="text" class="form-control" id="eventInputTitle" name="eventInputTitle" placeholder="Masukkan nama event atau tempat">
                    </div>
                    <div class="form-group">
                        <label for="eventInputDate">Tanggal Event</label>
                        <input type="date" class="form-control" id="eventInputDate" name="eventInputDate">
                    </div>
                    <div class="form-group">
                        <label for="eventInputStartTime">Waktu Mulai</label>
                        <input type="time" class="form-control" id="eventInputStartTime" name="eventInputStartTime">
                    </div>
                    <div class="form-group">
                        <label for="eventInputDownTime">Waktu Selesai</label>
                        <input type="time" class="form-control" id="eventInputDownTime" name="eventInputDownTime">
                    </div>
                    <div class="form-group">
                        <label for="eventInputLocation">Alamat Event</label>
                        <input type="text" class="form-control" id="eventInputLocation" name="eventInputLocation" placeholder="Masukkan Alamat">
                    </div>
                    <div class="form-group">
                        <label for="eventInputProvinsi">Provinsi</label>
                        <select id="eventInputProvinsi" name="eventInputProvinsi" class="form-control">
                            <option value="0" selected>- Pilih Provinsi -</option>
                            <option value="1"> Aceh</option>
                            <option value="2"> Bali</option>
                            <option value="3"> Bangka Belitung</option>
                            <option value="4"> Banten</option>
                            <option value="5"> Bengkulu</option>
                            <option value="6"> Daerah Istimewa Yogyakarta</option>
                            <option value="7"> DKI Jakarta</option>
                            <option value="8"> Gorontalo</option>
                            <option value="9"> Jawa Barat</option>
                            <option value="10"> Jawa Tengah</option>
                            <option value="11"> Jawa Timur</option>
                            <option value="12"> Kalimantan Barat</option>
                            <option value="13"> Kalimantan Selatan</option>
                            <option value="14"> Kalimantan Tengah</option>
                            <option value="15"> Kalimantan Timur</option>
                            <option value="16"> Kepulauan Riau</option>
                            <option value="17"> Lampung</option>
                            <option value="18"> Maluku</option>
                            <option value="19"> Maluku Utara</option>
                            <option value="20"> Nusa Tenggara Barat</option>
                            <option value="21"> Nusa Tenggara Timur</option>
                            <option value="22"> Papua Barat</option>
                            <option value="23"> Papua Tengah</option>
                            <option value="24"> Papua Timur</option>
                            <option value="25"> Riau</option>
                            <option value="26"> Sulawesi Barat</option>
                            <option value="27"> Sulawesi Selatan</option>
                            <option value="28"> Sulawesi Tengah</option>
                            <option value="29"> Sulawesi Tenggara</option>
                            <option value="30"> Sulawesi Utara</option>
                            <option value="31"> Sumatera Barat</option>
                            <option value="32"> Sumatera Selatan</option>
                            <option value="33"> Sumatera Utara</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="eventInputPlaceId">Masukkan Place ID <a data-toggle="modal" data-target="#placeModal" href="#">Temukan Place ID</a></label>
                        <input type="text" class="form-control" id="eventInputPlaceId" name="eventInputPlaceId" placeholder="Masukkan Place ID">
                    </div>
                    <div class="form-group">
                        <label for="uploadGambar">Upload Gambar:</label>
                        <input type="file" class="form-control" name="uploadGambar" id="uploadGambar">
                    </div>
                    <button type="submit" class="btn btn-block btn-warning">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="container">
        <p><span class="float-left text-muted">Dorah diberdayakan oleh Tim Motivator</span></p>
        <p class="float-right"><a href="#">Kembali ke atas</a></p>
    </div>
</footer>

<div class="modal fade" id="placeModal" tabindex="-1" role="dialog" aria-labelledby="placeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="placeModalLabel">Temukan Place ID</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal idfinder di sini -->
                <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
                <div id="map"></div>
                    <div id="infowindow-content">
                        <span id="place-name" class="title"></span><br>
                            Copy Place ID di samping <span id="place-id"></span><br>
                        <span id="place-address"></span>
                    </div>
                </div>
                <!-- Modal idfinder di sini -->
            </div>
        </div>
    </div>
</div>

<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -33.8688, lng: 151.2195},
        zoom: 13
        });

        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
        map: map
        });
        marker.addListener('click', function() {
        infowindow.open(map, marker);
        });

        autocomplete.addListener('place_changed', function() {
        infowindow.close();
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }

        // Set the position of the marker using the place ID and location.
        marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location
        });
        marker.setVisible(true);

        infowindowContent.children['place-name'].textContent = place.name;
        infowindowContent.children['place-id'].textContent = place.place_id;
        infowindowContent.children['place-address'].textContent = place.formatted_address;
        infowindow.open(map, marker);
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDxQBvSn1BtzShvuE3hpJZgBPQ-1MVKmw&libraries=places&callback=initMap" async defer></script>

@endsection