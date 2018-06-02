@extends('layouts.main')

@section('content')

<!-- Jumbotron Heading -->
<section class="jumbotron jumbotron-fluid text-center custom-heading">
    <div class="container">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <h2 class="display-4">Daftarkan diri anda</h2>
            <div class="form-group">
                <input id="name" type="text" class="form-control-lg form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nama Lengkap" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                    <input id="email" type="email" class="form-control-lg form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required>
            </div>
            <div class="form-group">
                <select id="signupInputGolongan" name="signupInputGolongan" class="form-control form-control-lg">
                    <option value="0">Golongan Darah (Opsional)</option>
                    <option value="1">Golongan A</option>
                    <option value="2">Golongan B</option>
                    <option value="3">Golongan AB</option>
                    <option value="4">Golongan O</option>
                </select>
            </div>
            <button type="submit" class="btn btn-lg btn-warning btn-block">Daftar</button>
        </form>
    </div>
</section>
@endsection
