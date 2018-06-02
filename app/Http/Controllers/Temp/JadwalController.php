<?php

namespace App\Http\Controllers\Akademis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\JamMaster;
use App\Models\KelasDetail;
use App\Models\KelasMaster;
use App\Models\MataPelajaran;
use App\Models\User;
use App\Models\krs;
use App\Repositories\UserRepository;
use App\Repositories\JamMasterRepository;
use Carbon\Carbon;
use DB;

class JadwalController extends Controller
{
  private $repoUser;
  private $repoJamMaster;

  public function __construct () {
    $this->repoUser = new UserRepository();
    $this->repoJamMaster = new JamMasterRepository();
  }

  protected function tambahJadwal (Request $request) {
    $this->validate($request,[
      'kelas_master' => 'required',
      'jam_masuk' => 'required',
      'instruktur' => 'required',
      'mata_pelajaran' => 'required',
      'lab'=>'required',
      'tahun_ajaran'=>'required',
      'lab'=>'required'
    ]);

    $this->saveJadwalModel($request);
    
    flash('Jadwal berhasil ditambahkan.')->success();
    return redirect()->back();
  }

  protected function saveJadwalModel ($form) {
    $data = new Jadwal();

    $data->periode = 1;
    
    $data->hari = $form->input('hari');
    $data->id_lab = $form->input('lab');
    $data->id_asisten = $form->input('asisten');
    $data->id_jam_masuk = $form->input('jam_masuk');
    $data->id_instruktur = $form->input('instruktur');
    $data->tahun_ajaran = $form->input('tahun_ajaran');
    $data->periode_waktu = $form->input('periode_waktu');
    $data->id_kelas_master = $form->input('kelas_master');
    $data->id_mata_pelajaran = $form->input('mata_pelajaran');

    $data->created_at = Carbon::now()->toDateTimeString();
    $data->updated_at = Carbon::now()->toDateTimeString();

    $data->save();
  }

  protected function tampilJadwal() {
    $romawi = ['VII','VIII','IX','X','XI','XII'];
    $hari = ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"];

    $lessons = MataPelajaran::select('id','nama')->get();

    $jams = $this->repoJamMaster->getDataOrderByJamMulai();
    $instructors = $this->repoUser->getDataInstructurs();
    $assistants = $this->repoUser->getDataAssistants();

    $classes = DB::table('kelas_masters')
      ->select('*')
      ->get();

    $lab = DB::table('lab_masters')
      ->select('*')
      ->get();

    return view('Akademis/jadwal.jadwal')
      ->with(array(
        'lessons'=>$lessons,
        'jams'=>$jams,
        'instructors'=>$instructors,
        'assistants'=>$assistants,
        'classes'=>$classes,
        'romawi'=>$romawi,
        'haris'=>$hari,
        'labs'=>$lab
      ));
    }

    protected function tampilKRS() {
        $jadwals = DB::table('jadwals as jd')
          ->select('jd.id as id',
                   'jd.hari as hari',
                   'mp.nama as nama',
                   'jd.periode as periode',
                   'jm.jam_mulai as jam_mulai',
                   'km.tingkat as tingkat',
                   'km.nomor as nomor',
                   'km.peminatan as peminatan',
                   'km.tipe as tipe',
                   'lab.nomor as lab',
                    DB::raw("count(krs.id) as kapasitas")
          )
          ->join('mata_pelajarans as mp','mp.id','=','jd.id_mata_pelajaran')
          ->join('jam_masters as jm','jm.id','=','jd.id_jam_masuk')
          ->join('kelas_masters as km','km.id','=','jd.id_kelas_master')
          ->join('lab_masters as lab','lab.id','=','jd.id_lab')
          ->leftjoin('krs','krs.id_jadwal','=','jd.id')
          ->groupBy('jd.id')
          ->get();
        $romawi = ['VII','VIII','IX','X','XI','XII'];
        return view('akademis/jadwal.daftar_jadwal')
                ->with(array(
                  'jadwals'=>$jadwals,
                  'romawi'=>$romawi
                ));
    }

    protected function tampilKRSDetail(Request $request, $jadwal_id)
    {
      $kelas_siswa = $request->input('kelas_siswa');

      var_dump($kelas_siswa);
    
       
      $jadwal = DB::table('jadwals as jd')
        ->select('jd.id as id',
                 'mp.nama as nama',
                 'jd.periode as periode',
                 'jd.periode_waktu as periode_waktu',
                 'jd.hari as hari',
                 'jd.tahun_ajaran as tahun_ajaran',
                 'jm.jam_mulai as jam_mulai',
                 'km.tingkat as tingkat',
                 'km.nomor as nomor',
                 'km.peminatan as peminatan',
                 'km.tipe as tipe',
                 'it.name as nama_instruktur',
                 'ast.name as nama_asisten',
                 'jd.hari as hari',
                 'lab.nomor as lab'
                 )
        ->join('mata_pelajarans as mp','mp.id','=','jd.id_mata_pelajaran')
        ->join('jam_masters as jm','jm.id','=','jd.id_jam_masuk')
        ->join('kelas_masters as km','km.id','=','jd.id_kelas_master')
        ->join('users as it','it.id','=','jd.id_instruktur')
        ->join('lab_masters as lab','lab.id','=','jd.id_lab')
        ->leftjoin('users as ast','ast.id','=','jd.id_asisten')
        ->where('jd.id','=',$jadwal_id)
        ->first();

      $kapasitas_jadwal = DB::table('krs')
        ->select('*')
        ->join('users as us','us.id','=','krs.model_id')
        ->join('jadwals as jd','jd.id','=','krs.id_jadwal')
        ->where('jd.id','=',$jadwal_id)
        ->COUNT();

      $romawi = ['VII','VIII','IX','X','XI','XII'];

      $classes = DB::table('kelas_siswas')
        ->select('*')
        ->get();

        $filteredClass = DB::table('kelas_siswas as ks')
          ->select('*')
          ->where('ks.id','=',$kelas_siswa)
          ->first();

      $array_murid = DB::table('users as us')
        ->select( 'us.id as id',
                  'us.nis_nik as nis_nik',
                  'us.email as email',
                  'us.username as username',
                  'us.name as name',
                  'us.jenis_kelamin as jenis_kelamin')
        ->join('user_details as ud','ud.model_id','=','us.id')
        ->join('kelas_siswas as ks','ks.id','=','ud.id_kelas_siswa')
        ->leftjoin('krs','krs.model_id','=','us.id')
        ->where('krs.id', '=' , null)
        ->Where('ud.id_kelas_siswa','=',$kelas_siswa)
        ->get();

        $daftar_siswa = [];

          $array_murid2 = DB::table('users as us')
            ->select('us.id as id',
                      'us.nis_nik as nis_nik',
                      'us.email as email',
                      'us.username as username',
                      'us.name as name',
                      'us.jenis_kelamin as jenis_kelamin')
            ->join('krs', 'krs.model_id', '=', 'us.id')
            ->join('user_Details as ud', 'ud.model_id', '=', 'us.id')
            ->where('krs.id_jadwal', '!=', $jadwal_id)
            ->where('ud.id_kelas_siswa','=',$kelas_siswa)
            ->get();

            foreach ($array_murid as $value) {
              array_push($daftar_siswa, $value);
            }

          foreach ($array_murid2 as $temp) {
            array_push($daftar_siswa, $temp);
          }
        $this->globalJadwal = $jadwal;

        return view('Akademis/jadwal.tambah_KRS')
                ->with(array(
                  'users'=>$daftar_siswa,
                  'jadwal'=>$jadwal,
                  'romawi'=>$romawi,
                  'kapasitas'=>$kapasitas_jadwal,
                  'classes' => $classes,
                  'filter'=>$filteredClass
              ));
    }

    protected function filterKelasKRS(Request $request) {
      $jadwal_id = $request->input('id_jadwal');
      return $this->tampilKRSDetail($jadwal_id,$kelas_siswa);
    }

    protected function isiKRS(Request $request) {
        $id_jadwal = $request->input('id_jadwal');
        $data = DB::table('jadwals as jd')
        ->select('*')
        ->where('jd.id','=',$id_jadwal)
        ->first();
        $murid = $request->input('idMurid');
        $array_selected =  $request->input('selected');
        $tahun_ajaran = $request->input('tahun_ajaran');

        foreach($array_selected as $selected) {
            $krs = new krs;
            $krs->model_id = $murid[$selected];
            $krs->id_jadwal = $id_jadwal;
            $krs->tahun_ajaran = $tahun_ajaran;
            $krs->kode = 1;
            $krs->is_active = true;
            $krs->created_at = Carbon::now()->toDateTimeString();
            $krs->updated_at = Carbon::now()->toDateTimeString();
            $krs->save();
        }
        $jadwal_id = $request->input('id_jadwal');
        return $this->tampilKRSDetail($jadwal_id,0);
    }

    protected function tampilMuridDalamJadwal($jadwal_id) {
      $array_murid = DB::table('users as us')
        ->select( 'krs.id as id',
                  'us.nis_nik as nis_nik',
                  'us.email as email',
                  'us.username as username',
                  'us.name as name',
                  'us.jenis_kelamin as jenis_kelamin')
        ->join('krs','krs.model_id','=','us.id')
        ->join('jadwals as jd','jd.id','=','krs.id_jadwal')
        ->where('krs.id_jadwal','=',$jadwal_id)
        ->get();

        return view('Akademis/jadwal.daftar_murid')
                ->with(array(
                  'users'=>$array_murid
              ));
    }

    protected function hapusJadwalMurid($id_jadwal_murid) {
        $data = krs::where('id',$id_jadwal_murid) -> delete();
        return redirect()->back();
    }
}
