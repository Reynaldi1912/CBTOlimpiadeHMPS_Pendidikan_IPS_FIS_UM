<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            return redirect()->route('dashboard_admin');
        }elseif(Auth::user()->role == 'peserta'){
            return redirect()->route('dashboard_user');
        }
    }
    public function dashboardAdmin(){
        $data = DB::table('users')->get();
        return view('admin.dashboard' , ['data'=>$data]);
    }
    public function dashboardUser(){
        return view('peserta.dashboard');
    }
}
