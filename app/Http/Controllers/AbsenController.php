<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Pertemuan;

class AbsenController extends Controller
{
    public function absenPertemuan(int $id_user, int $id_pertemuan) {
        $pertemuan = Pertemuan::where('id_pertemuan','=', $id_pertemuan);
        // dd($pertemuan);
        $training = $pertemuan->select('id_training')->first();
        $id_training = $training['id_training'];
        if($this->cekSudahAbsen($id_user, $id_pertemuan)) {
            return redirect()->action('TrainingController@getBahan',['id_pertemuan' => $id_pertemuan])->with('status','sudah_absen');
        }
        // dd($id_training);
        // $id_training = $pertemuan->id_training;
        $ceklis = New Absen;
        $ceklis->id_training = $id_training;
        $ceklis->id_user = $id_user;
        $ceklis->id_pertemuan = $id_pertemuan;
        $ceklis->save();
        return redirect()->action('TrainingController@getBahan',['id_pertemuan' => $id_pertemuan])->with('status','sudah_absen');
    }

    public  function cekSudahAbsen(int $id_user, int $id_pertemuan) {
        $isExist = Absen::where('id_user', $id_user)->where('id_pertemuan', $id_pertemuan)->exists();
        return $isExist;
    }
}
