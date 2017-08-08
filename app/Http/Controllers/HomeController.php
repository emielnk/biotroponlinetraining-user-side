<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $project;
    public function __construct()
    {
       $this->middleware(function ($request, $next) {
            $this->projects = Auth::user()->projects;
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getUserInfo() {
        $userInfo = $this->LoginController->$this->getUserId;
        dd($userInfo);
    }
}
