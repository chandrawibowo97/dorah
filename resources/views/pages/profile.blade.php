@extends('layouts.main')

@section('content')

<div class="container py-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col col-md-6">
            <h3 class="text-muted">Edit Profil</h3>
            <div class="card mb-3">
                <div class="card-body">
                    <form method="post" action="{{route('change_profile')}}">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="inputPhone">No Telp</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="No Telp" value="{{$user->phone}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="province">Provinsi</label>
                            <select id="province" name="province" class="custom-select">
                                <option value="0">- Pilih Provinsi -</option>
                                @foreach($provinces as $province)
                                <option value="{{$province->id}}" @if($user->province_id == $province->id) selected @endif>{{$province->name}}</option>
                                @endforeach
                            </select>  
                        </div>

                        <div class="form-group">
                            <label for="blood_type">Golongan Darah</label>
                            <select id="blood_type" name="blood_type" class="custom-select">
                                <option value="0">(Opsional)</option>
                                @foreach($blood_types as $blood_type)
                                <option value="{{$blood_type->id}}" @if($user->blood_type_id == $blood_type->id) selected @endif>{{$blood_type->label}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kartu_donor">No Kartu Donor Darah</label>
                            <input type="text" class="form-control" id="kartu_donor" name="kartu_donor" placeholder="No Kartu Donor" value="{{$user->kartu_donor_id}}">
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

@endsection