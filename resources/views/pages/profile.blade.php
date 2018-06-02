@extends('layouts.main')

@section('content')

<div class="jumbotron jumbotron-fluid custom-default">
    <div class="container">
        <div class="row">
            <div class="col col-md-6">
                <h3 class="text-muted">Edit Profil</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="changeprofile.php">
                            <div class="form-group">
                                <label for="inputName">Nama Lengkap</label>
                                <input type="text" class="form-control" id="inputName" name="inputName" minlength="10" placeholder="Nama Lengkap" value="Nama">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="Email">
                            </div>
                            <div class="form-group">
                                <label for="inputPhone">No Telp</label>
                                <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="No Telp" value="Telepon">
                            </div>
                            
                            <div class="form-group">
                                <label for="inputProvinsi">Provinsi</label>
                                <select id="inputProvinsi" name="inputProvinsi" class="form-control">

                                    {{-- Belum diset ke value user --}}
                                    
                                    <option value="0" selected>- Pilih Provinsi -</option>
                                    <option value="1"> Aceh</option>
                                    <option value="2"> Bali</option>
                                    <option value="3"> Bangka Belitung</option>
                                    <option value="4"> Banten</option>
                                    <option value="5"> Bengkulu</option>
                                    <option value="6"> Daerah Istimewa Yogyakarta</option>
                                    <option value="7"> DKI Jakarta</option>
                                    <option value="8"> Gorontalo</option>
                                    <option value="9"> Jawa Barat</option>
                                    <option value="10"> Jawa Tengah</option>
                                    <option value="11"> Jawa Timur</option>
                                    <option value="12"> Kalimantan Barat</option>
                                    <option value="13"> Kalimantan Selatan</option>
                                    <option value="14"> Kalimantan Tengah</option>
                                    <option value="15"> Kalimantan Timur</option>
                                    <option value="16"> Kepulauan Riau</option>
                                    <option value="17"> Lampung</option>
                                    <option value="18"> Maluku</option>
                                    <option value="19"> Maluku Utara</option>
                                    <option value="20"> Nusa Tenggara Barat</option>
                                    <option value="21"> Nusa Tenggara Timur</option>
                                    <option value="22"> Papua Barat</option>
                                    <option value="23"> Papua Tengah</option>
                                    <option value="24"> Papua Timur</option>
                                    <option value="25"> Riau</option>
                                    <option value="26"> Sulawesi Barat</option>
                                    <option value="27"> Sulawesi Selatan</option>
                                    <option value="28"> Sulawesi Tengah</option>
                                    <option value="29"> Sulawesi Tenggara</option>
                                    <option value="30"> Sulawesi Utara</option>
                                    <option value="31"> Sumatera Barat</option>
                                    <option value="32"> Sumatera Selatan</option>
                                    <option value="33"> Sumatera Utara</option>
                                </select>  

                            </div>

                            <div class="form-group">
                                <label for="inputGolongan">Golongan Darah</label>
                                <select id="inputGolongan" name="inputGolongan" class="form-control">
                                    {{-- Belum diset value user --}}
                                    <option value="0">(Opsional)</option>
                                    <option value="1">Golongan A</option>
                                    <option value="2">Golongan B</option>
                                    <option value="3">Golongan AB</option>
                                    <option value="4">Golongan O</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputRhesus">Rhesus</label>
                                <select id="inputRhesus" name="inputRhesus" class="form-control">

                                // Belum diselect ke value user

                                    <option value="0">(Opsional)</option>
                                    <option value="1">+</option>
                                    <option value="2">-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputNoKartuDonor">No Kartu Donor Darah</label>
                                <input type="text" class="form-control" id="inputNoKartuDonor" name="inputNoKartuDonor" placeholder="No Kartu Donor" value="No kartu Donor">
                            </div>
                            <button type="submit" class="btn btn-warning btn-block">Ubah Profil</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col col-md-6">
                <h3 class="text-muted">Ubah Password</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="changepassword.php">
                            <div class="form-group">
                                <label for="inputPassBaru">Password Baru</label>
                                <input type="password" class="form-control" id="inputPassBaru" name="inputPassBaru" placeholder="Password Baru">
                            </div>
                            <div class="form-group">
                                <label for="inputUlangiPassBaru">Ulangi Password Baru</label>
                                <input type="password" class="form-control" id="inputUlangiPassBaru" name="inputUlangiPassBaru" placeholder="Ulangi Password Baru">
                            </div>
                            <div class="form-group">
                                <label for="inputPassLama">Password Lama</label>
                                <input type="password" class="form-control" id="inputPassLama" name="inputPassLama" placeholder="Password Lama">
                            </div>
                            
                            <button type="submit" class="btn btn-warning btn-block">Ubah Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection