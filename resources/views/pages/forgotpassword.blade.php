@extends('layouts.main')

@section('content')

<section class="jumbotron jumbotron-fluid text-center custom-heading">
    <div class="container">

        <h2 class="display-4">Lupa password?</h2>
        <p class="lead">Masukkan email anda</p>
        <div class="form-group">
            <input type="email" class="form-control form-control-lg" id="loginInputEmail" name="loginInputEmail" placeholder="Masukkan email">
        </div>
        <button id="forgotpassbutton" type="submit" class="btn btn-danger btn-lg btn-block" onclick="forgotpass()">Submit</button>
        <div id="alert" class="mt-3 alert alert-warning" role="alert" style="visibility: hidden">Silahkan cek email anda untuk instruksi berikutnya</div>
        <script>
            function forgotpass(){
                document.getElementById("alert").style.visibility = "visible";
                var button = document.getElementById("forgotpassbutton");
                button.setAttribute('disabled', 'true');
                var i = 60;
                

                var x = setInterval(function(){
                    button.innerHTML = "Ulangi (" + i + ")";
                    i--;
                    if (i == -1){
                        clearInterval(x);
                        button.removeAttribute('disabled');
                        button.innerHTML = "Ulangi";
                    }
                }, 1000);
                
            }
        </script>
    </div>
</section>