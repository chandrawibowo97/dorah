@extends('layouts.main')

@section('content')

<div class="jumbotron jumbotron-fluid custom-default">
    <div class="container">
        
        <a href="/" class="btn btn-secondary">Kembali Ke Awal</a>

        <div class="mt-3 mb-4 row">
            <div class="col">
                <select id="inputGolongan" class="form-control">
                    <option>- Pilih Golongan -</option>
                    <option>Golongan A+</option>
                    <option>Golongan A-</option>
                    <option>Golongan B+</option>
                    <option>Golongan B-</option>
                    <option>Golongan AB+</option>
                    <option>Golongan AB-</option>
                    <option>Golongan O+</option>
                    <option>Golongan O-</option>
                </select>
            </div>
            <div class="col">
                <select id="inputKomponen" class='form-control'>
                    <option value='*' selected>- Pilih Komponen -</option>
                    <option value='AHF' >AHF</option><option value='BC' >BC</option>
                    <option value='FFP' >FFP</option><option value='FP' >FP</option>
                    <option value='Lekosit Aferesis' >Lekosit Aferesis</option>
                    <option value='Leucodepleted' >Leucodepleted</option>
                    <option value='Leucodepletet' >Leucodepletet</option>
                    <option value='Leucoreduced' >Leucoreduced</option>
                    <option value='LP' >LP</option>
                    <option value='LP Aferesis' >LP Aferesis</option>
                    <option value='PCL' >PCL</option>
                    <option value='PCLs' >PCLs</option>
                    <option value='PRC' >PRC</option>
                    <option value='PRC Aferesis' >PRC Aferesis</option>
                    <option value='PRP' >PRP</option>
                    <option value='TC' >TC</option>
                    <option value='TC Aferesis' >TC Aferesis</option>
                    <option value='TC Apheresi' >TC Apheresi</option>
                    <option value='TC APR' >TC APR</option>
                    <option value='TC-APH' >TC-APH</option>
                    <option value='TCP' >TCP</option>
                    <option value='WB' >WB</option>
                    <option value='WB FRESH' >WB FRESH</option>
                    <option value='WE' >WE</option>
                </select>
            </div>
            <div class="col">
                <select class='form-control'>
                    <option value='*' selected>- Pilih Provinsi -</option>
                    <option value='Aceh'> Aceh</option>
                    <option value='Bali'> Bali</option>
                    <option value='Bangka Belitung'> Bangka Belitung</option>
                    <option value='Banten'> Banten</option>
                    <option value='Bengkulu'> Bengkulu</option>
                    <option value='Daerah Istimewa Yogyakarta'> Daerah Istimewa Yogyakarta</option>
                    <option value='DKI Jakarta'> DKI Jakarta</option>
                    <option value='Gorontalo'> Gorontalo</option>
                    <option value='Jawa Barat'> Jawa Barat</option>
                    <option value='Jawa Tengah'> Jawa Tengah</option>
                    <option value='Jawa Timur'> Jawa Timur</option>
                    <option value='Kalimantan Barat'> Kalimantan Barat</option>
                    <option value='Kalimantan Selatan'> Kalimantan Selatan</option>
                    <option value='Kalimantan Tengah'> Kalimantan Tengah</option>
                    <option value='Kalimantan Timur'> Kalimantan Timur</option>
                    <option value='Kepulauan Riau'> Kepulauan Riau</option>
                    <option value='Lampung'> Lampung</option>
                    <option value='Maluku'> Maluku</option>
                    <option value='Maluku Utara'> Maluku Utara</option>
                    <option value='Nusa Tenggara Barat'> Nusa Tenggara Barat</option>
                    <option value='Nusa Tenggara Timur'> Nusa Tenggara Timur</option>
                    <option value='Papua Barat'> Papua Barat</option>
                    <option value='Papua Tengah'> Papua Tengah</option>
                    <option value='Papua Timur'> Papua Timur</option>
                    <option value='Riau'> Riau</option>
                    <option value='Sulawesi Barat'> Sulawesi Barat</option>
                    <option value='Sulawesi Selatan'> Sulawesi Selatan</option>
                    <option value='Sulawesi Tengah'> Sulawesi Tengah</option>
                    <option value='Sulawesi Tenggara'> Sulawesi Tenggara</option>
                    <option value='Sulawesi Utara'> Sulawesi Utara</option>
                    <option value='Sumatera Barat'> Sumatera Barat</option>
                    <option value='Sumatera Selatan'> Sumatera Selatan</option>
                    <option value='Sumatera Utara'> Sumatera Utara</option>
                </select>
            </div>
        </div>

        <div class="row">
                <div class="col col-md-12">
                    <div id="maps" style="height: 500px; background-image:url('images/background-map.jpg'); background-size: cover"></div>
                </div>
                <div class="col col-md-12">
                    <img class="img-fluid mt-5" src="images/bar-chart.png"/>
                </div>
                <div class="col col-md-6">
                    <img class="img-fluid mt-5" style="width: 100%" src="images/pie-chart.png"/>
                </div>
                <div class="col col-md-6">
                    <img class="img-fluid mt-5" style="width: 100%" src="images/line-chart.png"/>
                </div>
            </div>
            
    </div>
</div>

@endsection

@section('script')
{{-- GMap script --}}
<script src="js/maplabel.js"></script>
<script src="js/googlemaps.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDxQBvSn1BtzShvuE3hpJZgBPQ-1MVKmw&callback=initMap"></script>
        
@endsection