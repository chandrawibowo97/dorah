@extends('layouts.main')

@section('content')

<div class="container py-4">
<h5 class="text-right">Halo, {{$name}}</h5>
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div id="maps" style="height: 450px"></div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="custom-select">
                            <option selected>Sumatera Utara</option>
                            {{-- <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option> --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="custom-select">
                            <option selected>Medan</option>
                            {{-- <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option> --}}
                        </select>
                    </div>
                    <canvas id="bar_chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <h3>Event Terbaru</h3>
    <div class="row mb-5">
        @foreach($events as $event)
        <div class="col-sm-6 col-lg-4">
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
    </div>    
</div>

@endsection


@section('script')
<script type="text/javascript">
    var myBarChart;
    var chartWidth = 30; chartHeight= 15;
    function initChart(data){

        var bar_chart = document.getElementById('bar_chart');
        bar_chart.width = chartWidth;
        bar_chart.height = chartHeight;
        var ctx_bar = bar_chart.getContext("2d");
        // destroy last created chart
        if(myBarChart != undefined){
            myBarChart.destroy();
        }
        myBarChart = new Chart(ctx_bar,{
            type: 'bar',
            data: data,
            options:{
                legend: {
                    display: false
                },
                scales:{
                    yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                    }]
                }
            }
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
                        label: 'Stok Darah',
                        data: stocks,
                        backgroundColor: ['rgba(244,67,54 ,0.5)','rgba(156,39,176 ,0.5)','rgba(63,81,181 ,0.5)','rgba(3,169,244 ,0.5)','rgba(0,150,136 ,0.5)','rgba(139,195,74 ,0.5)','rgba(255,152,0 ,0.5)', 'rgba(121,85,72 ,0.5)'],
                        borderColor: ['rgba(244,67,54 ,0.6)','rgba(156,39,176 ,0.6)','rgba(63,81,181 ,1)','rgba(3,169,244 ,1)','rgba(0,150,136 ,1)','rgba(139,195,74 ,1)','rgba(255,152,0 ,1)', 'rgba(121,85,72 ,1)'],
                        borderWidth: 1
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDxQBvSn1BtzShvuE3hpJZgBPQ-1MVKmw&callback=initMap"></script>

@endsection
