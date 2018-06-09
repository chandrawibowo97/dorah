@extends('layouts.main')

@section('content')

<!-- Jumbotron Heading -->
<section class="jumbotron jumbotron-fluid text-center mb-0" style="background-color: #fff; background-image: url({{asset('image/indonesia-map.png')}}); background-repeat: no-repeat; background-size: 100% auto;">
    <div class="container p-5">
        <h1 class="display-4">Cek Stok Darah dengan Peta</h1>
        <p class="lead">Sekarang kamu bisa mendapatkan informasi stok darah yang akurat dengan cepat hanya melalui peta</p>
        <p>
            <a class="btn btn-lg btn-danger" href="{{ route('map') }}">Cek Stok Darah Sekarang</a>
        </p>
    </div>
</section>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6 text-center mb-3">
            <h2 class="text-muted">Darah Anda, Nyawa Seseorang</h2>
            <p class="lead text-muted">1 kantong darah anda dapat menyelamatkan 3 orang</p>
            <image class="rounded img-fluid" src="{{asset('image/main-image.jpg')}}"></image>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <h2 class="text-center text-muted">Daftarkan diri anda</h2>
                        <div class="form-group">
                            <label class="d-md-none d-lg-block" for="name">Nama Lengkap</label>
                            <input id="name" type="text" class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nama Lengkap" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="d-md-none d-lg-block" for="email">Alamat Email</label>
                            <input id="email" type="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="d-md-none d-lg-block" for="password">Password</label>
                            <input id="password" type="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="d-md-none d-lg-block" for="password-confirm">Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Konfirmasi Password" required>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block btn-lg">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection