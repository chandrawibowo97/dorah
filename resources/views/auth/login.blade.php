@extends('layouts.main')

@section('content')
<section class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <form class="col-md-4 mx-auto" action="{{ route('login') }}" method="post">
            @csrf
            <h6 class="lead">Silahkan masuk</h6>
            <div class="form-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
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
            <div class="form-group clearfix">
                <div class="form-check float-left">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                </div>
                <a class="float-right" href="forgotpass.php">Lupa Password?</a>
            </div>
            <button type="submit" class="btn btn-danger btn-block">Submit</button>
        </form>
    </div>
</section>

@endsection
