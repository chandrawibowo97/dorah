@extends('layouts.main')

@section('content')

<div class="container py-5 m-auto">
    <form class="mx-auto" style="max-width: 25em" action="{{ route('login') }}" method="post">
        @csrf
        <h4 class="text-muted text-center">Silahkan masuk</h4>
        <div class="form-group">
            <input id="email" type="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
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
        <div class="form-group clearfix">
            <div class="form-check float-left">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                </label>
            </div>
            <a class="float-right" href="forgotpass.php">Lupa Password?</a>
        </div>
        <button type="submit" class="btn btn-lg btn-danger btn-block">Submit</button>
    </form>
</div>

@endsection
