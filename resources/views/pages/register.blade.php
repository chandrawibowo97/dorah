@extends('layouts.main')

@section('content')

<!-- Jumbotron Heading -->
<section class="jumbotron jumbotron-fluid text-center custom-heading">
    <div class="container">
        <?php
        if(isset($error)){
            echo '<div class="alert alert-warning" role="alert">', $error ,'</div>';
            unset($error);
        }
        if(isset($success)){
            echo '<div class="alert alert-primary" role="alert">', $success ,'</div>';
            unset($success);
        }
        ?>
        <form action="/register" method="post">
            <h2 class="display-4">Daftarkan diri anda</h2>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" id="signupInputName" name="signupInputName" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="signupInputEmail" name="signupInputEmail" placeholder="Email">
                </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="signupInputPassword" name="signupInputPassword" placeholder="Password">
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