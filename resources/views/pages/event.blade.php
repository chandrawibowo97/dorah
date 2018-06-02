@extends('layouts.main')

@section('content')

<div class="jumbotron jumbotron-fluid custom-default">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4">Event</h2>
            <hr class="display-4">
            <p class="lead">Event merupakan fitur Dorah untuk menyebarkan event mengenai donor darah</p>
         </div>
        <div class="card-columns">

            {{-- Cards here --}}
            
        </div>
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