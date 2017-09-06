<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\training;
use App\Models\Pertemuan;
use App\Models\Partisipan;

class AdminTrainingController extends Controller
{
    public function listtraining()
    {
        $list = Training::all();
        return view('admin.training.listtraining', ['list'=>$list]);
    }

    public function newtraining()
    {
      return view('admin.training.newtraining');
    }

    public function savetraining(Request $request)
    {
      $newtraining = new Training;
      // dd($request);
      $newtraining -> nama_training       = $request-> input('nama_training');
      $newtraining -> tanggal_mulai       = $request-> input('tanggal_mulai');
      $newtraining -> tanggal_akhir       = $request-> input('tanggal_akhir');
      $newtraining -> deskripsi_training  = $request-> input('deskripsi_training');
      $newtraining -> banyak_pertemuan    = $request-> input('banyak_pertemuan');

      $newtraining->save();

      return redirect('listtraining');
    }

    public function edittraining($id_training)
    {
        $caritraining = Training::find($id_training);
        // dd($caritraining);
        return view('admin.training.edittraining', ['cari' => $caritraining]);
    }

    public function updatetraining(Request $request, $id_training)
    {
      $updateTraining = Training::find($id_training);
      // dd($request);

      $updateTraining -> nama_training      = $request->input('nama_training');
      $updateTraining -> tanggal_mulai      = $request->input('tanggal_mulai');
      $updateTraining -> tanggal_akhir      = $request->input('tanggal_akhir');
      $updateTraining -> deskripsi_training = $request->input('deskripsi_training');
      $updateTraining -> banyak_pertemuan   = $request->input('banyak_pertemuan');

      $updateTraining->save();
      $updateTraining=Training::all();

      return redirect('listtraining');
    }

    public function destroy($id_training)
    {
        Training::destroy($id_training);
        return redirect('listtraining');
    }

    public function showtraining($id_training)
    {
      $caritraining = Training::find($id_training);
      $caripeserta = Partisipan::where('id_training',$id_training)->where('status',1)->get();
      $jumlah = $caripeserta->count();

      return view('admin.training.showtraining', ['cari' => $caritraining, 'jumlahpeserta'=>$jumlah]);
    }


    public function data(Request $request)
    {
          // cek ajax request
          if($request->ajax())
          {
              $listtraining = Training::select('nama_training', 'tanggal_mulai', 'tanggal_akhir', 'deskripsi_training', 'banyak_pertemuan')->get();
              return Datatables::of($listtraining)
                      // tambah kolom untuk aksi edit dan hapus
                      ->addColumn('action',
                      '<a href="#" title="Edit" class="btn-sm btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                      <form style="display: inline">
                          <input name="_method" type="hidden" value="DELETE">
                          <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                          <button class="btn-sm btn-danger" type="button" style="border: none"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                      </form>')
                      ->make(true);
          }
          else
          {
              exit("Not an AJAX request -_-");
          }
      }
}
