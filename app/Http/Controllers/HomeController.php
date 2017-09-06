<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\training;
use App\Models\user;
use App\Models\pengumuman;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$training = Training::all()->count();
		$user = user::all()->count();
		$peng = pengumuman::all();
		$terbaru = $peng->last();
		return view('home',['jumlah'=>$training, 'pengumuman'=>$terbaru, 'jumlahuser'=>$user]);
	}

	public function pengumuman()
	{
		$peng = pengumuman::all();
		$terbaru = $peng->last();

		// dd($tanggal);
		return view('admin.pengumuman.pengumuman',['pengumuman'=>$terbaru]);
	}

	public function newpengumuman()
	{
		return view('admin.pengumuman.newpengumuman');
	}

	public function savepengumuman(request $request)
	{
		$tanggal= date('d-m-Y');
		$pengumumanbaru = new pengumuman;
		$pengumumanbaru -> isi_pengumuman  		= $request-> input('isi_pengumuman');
		$pengumumanbaru -> tanggal_publikasi  = $tanggal ;
		$pengumumanbaru -> save();

		return redirect('pengumuman');
	}

	public function editpengumuman()
	{
		$peng = pengumuman::all();
		$terbaru = $peng->last();
		return view('admin.pengumuman.editpengumuman',['pengumuman'=>$terbaru]);
	}

	public function updatepengumuman(request $request)
	{
		$tanggal= date('d-m-Y');
		// dd($request);
		$peng = pengumuman::all();
		$terbaru = $peng->last();

		$terbaru -> isi_pengumuman  	 = $request-> input('isi_pengumuman');
		$terbaru -> tanggal_publikasi  = $tanggal ;
		$terbaru -> save();

		return redirect('pengumuman');


	}

}
