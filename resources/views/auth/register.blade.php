@extends('layouts.main')

@section('content')

<div class="container py-5 m-auto">
    <form class="mx-auto" style="max-width: 25em" action="{{ route('register') }}" method="post">
        @csrf
        <h4 class="text-muted text-center">Daftarkan diri anda</h4>
        <div class="form-group">
            <input id="name" type="text" class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nama Lengkap" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
                <input id="email" type="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Konfirmasi Password" required>
        </div>
        <button type="submit" class="btn btn-lg btn-warning btn-block">Daftar</button>
    </form>
</div>
@endsection
