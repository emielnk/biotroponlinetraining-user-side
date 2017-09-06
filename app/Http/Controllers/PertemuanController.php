<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Training;
use App\Models\Pertemuan;
use App\Models\Bahan;
use App\Models\Test;

class PertemuanController extends Controller
{
  public function showpertemuan($id_training)
  {
        $carijudul = Training::find($id_training);
        $caripertemuan = Pertemuan::where('id_training',$id_training)->orderBy('tanggal_pelaksanaan')->get();
        $caritest = Test::where('id_training',$id_training)->get();
        $caribahan = Bahan::all();

        // dd($simpenbahan);
        return view('admin.training.detailtraining', ['cari' => $caripertemuan, 'judul' => $carijudul, 'test'=>$caritest, 'bahan'=>$caribahan ]);
  }

  public function newpertemuan($id_training)
  {
    $carijudul = Training::find($id_training);
    // dd($carijudul);
    return view('admin.pertemuan.newpertemuan', ['cari'=>$carijudul]);
  }

  public function savepertemuan(Request $request)
  {
    $this->validate($request, [
    'filebahan' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,rtf',
    ]);

    $newpertemuan = new Pertemuan;
    $newpertemuan -> id_training           = $request-> input('id_training');
    $newpertemuan -> tanggal_pelaksanaan   = $request-> input('tanggal_pelaksanaan');
    $newpertemuan -> deskripsi_pertemuan   = $request-> input('deskripsi_pertemuan');

    $newpertemuan->save();

    $Bahanajar = new Bahan;

    $file = $request->file('filebahan');
    $filename = $file->getClientOriginalName();
    $request->file('filebahan')->move("bahan/", $filename);


    $Bahanajar-> nama_bahan   = $filename;
    $Bahanajar-> id_pertemuan = $newpertemuan-> id_pertemuan ;

    $Bahanajar->save();

    return redirect()->action(
          'PertemuanController@showpertemuan', ['id_training' => $request->id_training]
      );
  }

  public function editpertemuan($id_train, $id_temu)
  {
      $judultraining = Training::find($id_train);
      $caritemuan = Pertemuan::find($id_temu);
      // dd($judultraining, $caritemuan);
      return view('admin.pertemuan.editpertemuan', ['judul' => $judultraining, 'temuan'=>$caritemuan ]);
  }

  public function updatepertemuan(Request $request, $id_training, $id_pertemuan)
  {
    $updatepertemuan = Pertemuan::find($id_pertemuan);
    // dd($id_training);
    $updatepertemuan -> tanggal_pelaksanaan   = $request-> input('tanggal_pelaksanaan');
    $updatepertemuan -> deskripsi_pertemuan   = $request-> input('deskripsi_pertemuan');

    $updatepertemuan->save();

    return redirect()->action(
          'PertemuanController@showpertemuan', ['id_training' => $id_training]
      );
  }

  public function destroytemu($id_train,$id_temu)
  {
      // dd($id_train,$id_temu);
      Pertemuan::destroy($id_temu);
      return redirect()->action(
            'PertemuanController@showpertemuan', ['id_training' => $id_train]
      );
  }

}
