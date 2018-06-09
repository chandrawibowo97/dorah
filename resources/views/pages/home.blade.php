@extends('layouts.main')

@section('content')

<div class="container py-5">
    <div class="row mb-5">
        <div class="row col col-md-8">
            <h3 class="text-muted col-md-12">Event Terbaru</h3>
            <div class="col col-md-6">

            </div>
        </div>

        <div class="col col-md-4">
            <h3 class="text-muted">Selamat Datang, {{ $name }}</h3>
            <div class="card">
                <div class="card-header">Notifikasi</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Tidak ada notifikasi</li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

    <div class="mt-5 mb-2 row">
        <div class="col">
            <h3 class="text-muted">Cek Stok Darah</h3>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-12">
            <div id="maps" style="height: 500px"></div>
        </div>
        <div class="col col-md-6">
            <canvas id="pie_chart"></canvas>
        </div>
    </div>
</div>

@endsection


@section('script')
<script type="text/javascript">
    var myPieChart;
    var chartWidth = 30; chartHeight= 30;
    function initChart(data){

        var pie_chart = document.getElementById('pie_chart');
        pie_chart.width = chartWidth;
        pie_chart.height = chartHeight;
        var ctx_pie = pie_chart.getContext("2d");
        // destroy last created chart
        if(myPieChart != undefined){
            myPieChart.destroy();
        }
        myPieChart = new Chart(ctx_pie,{
            type: 'pie',
            data: data,
        });
    }

</script>

<script type="text/javascript">
    var marker_icon = {
        HIGH: 'http://www.millawi.com.au/wp-content/uploads/2016/02/img_Circle_Green.jpg',
        LOW: 'http://www.millawi.com.au/wp-content/uploads/2016/02/img_Circle_Red.jpg',
        DEFAULT: 'http://www.millawi.com.au/wp-content/uploads/2016/02/img_Circle_Blue.jpg'
    }

    function getStock(branch_id){
        let stock_list = {
            branch_id: branch_id,
            alert: '',
            stock_darah: []
        }
        let quantity = 0;

        for(let j = 0; j < stock.length; j++) {
            if(stock[j].pmi_branch_id == branch_id){
                stock_list.stock_darah.push(stock[j]);
                quantity += stock[j].stock;
            }
        }

        if (quantity >= 400) stock_list.alert = 'HIGH';
        else stock_list.alert = 'LOW';

        return stock_list;
    }

    function initMap() {
        var map = new google.maps.Map(document.getElementById('maps'), {
          zoom: 14,
          center: {lat: branchs[0].lat, lng : branchs[0].lng }
        });

        var infowindow = new google.maps.InfoWindow();
        var marker, i;

        for (i = 0; i < branchs.length; i++) {
            let stock = getStock(branchs[i].id) != undefined ? getStock(branchs[i].id) : undefined;
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(branchs[i].lat, branchs[i].lng),
                icon: {
                    url: stock != undefined ? marker_icon[stock.alert] : marker_icon['DEFAULT'],
                    scaledSize: new google.maps.Size(20, 20)
                },
                map: map
            });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            let address = branchs[i].address+', '+branchs[i].district+', '+branchs[i].city+', '+branchs[i].province+' kode pos '+branchs[i].postcode;
            console.log(branchs[i]);

            return function() {
                let stock_darah = stock.stock_darah;
                let labels = [], stocks = [];

                stock_darah.forEach((item)=>{
                    labels.push(item.label);
                    stocks.push(item.stock);
                })

                initChart({
                    datasets: [{
                        data: stocks,
                        backgroundColor: ['#f00','#0f0','#00f','#ff0','#0ff','#f0f','#000','#fff']
                    }],

                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: labels
                });

              infowindow.setContent(address);
              infowindow.open(map, marker);
            }
          })(marker, i));
        }
    }
</script>
<script type="text/javascript">
    var branchs = {!! json_encode($branches->toArray()) !!};
    var stock = {!! json_encode($stocks->toArray()) !!};
</script>

<script src="{{ asset('js/chart.bundle.min.js') }}"></script>
<script src='js/googlemaps.js'></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDxQBvSn1BtzShvuE3hpJZgBPQ-1MVKmw&callback=initMap"></script>

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
