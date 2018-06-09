@extends('layouts.main')

@section('content')

<div class="container py-5">
    <div id="accordion" role="tablist">
            <div class="card">
            <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0">
                <a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">
                APA SYARAT SYARAT UNTUK MENDONOR DARAH ?
                </a>
            </h5>
            </div>

            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                    <ol>
                        <li>Sehat jasmani dan rohani</li>
                        <li>Usia 17 sampai dengan 65 tahun.</li>
                        <li>Berat badan minimal 45 kg.</li>
                        <li>Tekanan darah :
                            <ul>
                                <li>sistole 100 - 170</li>
                                <li>diastole 70 - 100</li>
                            </ul>
                        </li>
                        <li>Kadar haemoglobin 12,5g% s/d 17,0g%</li>
                        <li>Interval donor minimal 12 minggu atau 3 bulan sejak donor darah sebelumnya (maksimal 5 kali dalam 2 tahun)</li>
                    </ol>
            </div>
            </div>
            </div>
            <div class="card">
            <div class="card-header" role="tab" id="headingTwo">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
                JANGAN MENYUMBANGKAN DARAH JIKA :
                </a>
            </h5>
            </div>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <ol>
                <li>Mempunyai penyakit jantung dan paru paru</li>
                <li>Menderita kanker</li>
                <li>Menderita tekanan dara tinggi (hipertensi)</li>
                <li>Menderita kencing manis (diabetes militus)</li>
                <li>Memiliki kecenderungan perdarahan abnormal atau kelainan darah lainnya.</li>
                <li>Menderita epilepsi dan sering kejang</li>
                <li>Menderita atau pernah menderita Hepatitis B atau C.</li>
                <li>Mengidap sifilis</li>
                <li>Ketergantungan Narkoba.</li>
                <li>Kecanduan Minuman Beralkohol</li>
                <li>Mengidap atau beresiko tinggi terhadap HIV/AIDS</li>
                <li>Dokter menyarankan untuk tidak menyumbangkan darah karena alasan kesehatan.</li>
            </ol>
            </div>
            </div>
            </div>
            <div class="card">
            <div class="card-header" role="tab" id="headingThree">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
                BEBERAPA PANDUAN DONOR DARAH 
                </a>
            </h5>
            </div>
            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <ul>
                    <li>Tidur minimal 4 jam sebelum donor.</li>
                    <li>Makanlah 3 - 4 jam sebelum menyumbangkan darah. jangan menyumbangkan darah dengan perut kosong.</li>
                    <li>Minum lebih banyak dari biasanya pada hari mendonorkan darah (paling sedikit 3 gelas)</li>
                    <li>Setelah donor beristirahat paling sedikit 10 menit sambil menikmati makanan donor, sebelum kembali beraktifitas.</li>
                    <li>Kembali bekerja setelah donor darah tidak berbahaya untuk kesehatan.</li>
                    <li>Untuk menghindari bengkak di lokasi bekas jarum, hindari mengangkat benda berat selama 12 jam.</li>
                    <li>Banyak minum sampai 72 jam ke depan untuk mengembalikan stamina.</li>
                </ul>
            </div>
            </div>
            </div>

            <div class="card">
            <div class="card-header" role="tab" id="headingFour">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">
                Kriteria umum yang ditetapkan PMI adalah antara lain: 
                </a>
            </h5>
            </div>
            <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">
                    <ol>
                    <li>calon donor harus berusia 17-60 tahun</li>
                    <li>berat badan minimal 45 kg</li>
                    <li>tekanan darah 100-180 (sistole) dan 60-100 (diastole).</li>
                    <li>Jika berminat, calon donor dapat mengambil dan menandatangani formulir pendaftaran; lalu menjalani pemeriksaan pendahuluan seperti kondisi berat badan, HB, golongan darah; serta dilanjutkan dengan pemeriksaan dokter.</li>
                    <li>Jika lulus, barulah darah dan contoh darah diambil.</li>
                    <li>Namun, harus diingat, demi menjaga kesehatan dan keamanan darah, individu yang antara lain memiliki kondisi seperti alkoholik, penyakit hepatitis, diabetes militus, epilepsi, atau kelompok masyarakat risiko tinggi mendapatkan AIDS serta mengalami sakit seperti demam atau influensa; baru saja dicabut giginya kurang dari tiga hari; pernah menerima transfusi kurang dari setahun; begitu juga untuk yang belum setahun menato, menindik, atau akupunktur; hamil; atau sedang menyusui untuk sementara waktu tidak dapat menjadi donor.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection