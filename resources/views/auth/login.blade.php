@extends('layouts.main')

@section('content')
<section class="jumbotron jumbotron-fluid text-center custom-heading">
    <div class="container">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <h2 class="display-4">Selamat datang</h2>
            <p class="lead">Silahkan masuk</p>
            <div class="form-group">
                <input id="email" type="email" class="form-control-lg form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control-lg form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-check float-left">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                </label>
            </div>
            <a class="float-right" href="forgotpass.php">Lupa Password?</a>
            <button type="submit" class="btn btn-danger btn-lg btn-block">Submit</button>
        </form>
    </div>
</section>

@endsection
