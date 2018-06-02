@extends('layouts.main')

@section('content')



<!-- Jumbotron Heading -->
<section class="jumbotron jumbotron-fluid text-center custom-heading">
    <div class="container">
        <h1 class="display-4">Cek Stok Darah Indonesia Hanya dengan Peta</h1>
        <p class="lead text-muted">Sekarang kamu bisa mendapatkan informasi stok darah yang akurat dengan cepat hanya melalui peta</p>
        <p>
            <a class="btn btn-danger" href="/map">Cek Stok Darah Sekarang</a>
        </p>
    </div>
</section>

<!-- Signup Form -->
<div class="jumbotron jumbotron-fluid custom-default" id="registerform">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col text-center">
                <h2 class="text-muted">Darah Anda, Nyawa Seseorang</h2>
                <p class="lead text-muted">1 kantong darah anda dapat menyelamatkan 3 orang</p>
                <image class="rounded img-fluid" src="images/donor-darah.jpg"></image>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="signupInputName">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-lg" id="signupInputName" name="signupInputName" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                    <label for="signupInputEmail">Email</label>
                                    <input type="email" class="form-control form-control-lg" id="signupInputEmail" name="signupInputEmail"placeholder="Email">
                                </div>
                            <div class="form-group">
                                <label for="signupInputPassword">Password</label>
                                <input type="password" class="form-control form-control-lg" id="signupInputPassword" name="signupInputPassword" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="signupInputGolongan">Golongan Darah</label>
                                <select id="signupInputGolongan" name="signupInputGolongan" class="form-control form-control-lg">
                                    <option value="0">(Opsional)</option>
                                    <option value="1">Golongan A</option>
                                    <option value="2">Golongan B</option>
                                    <option value="3">Golongan AB</option>
                                    <option value="4">Golongan O</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-lg btn-warning btn-block">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Login Modal -->

@endsection