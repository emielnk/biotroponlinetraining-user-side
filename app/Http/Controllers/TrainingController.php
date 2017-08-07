<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\training;


class TrainingController extends Controller
{
    public function listtraining()
    {
        $list = Training::all();
        return view('listtraining', ['list'=>$list]);
    }

    public function destroy($id_training)
    {
        Training::destroy($id);
        return redirect('listtraining');
    }

    public function newPacket()
    {
        return view('listtraining');
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
