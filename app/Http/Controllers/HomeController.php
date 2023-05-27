<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\exam;
use App\Models\hasil_akhir_ujian;

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
        $data = exam::all()->where('tampil',1)->first();
        if($data){
            $hasil = hasil_akhir_ujian::all()->where('id_user',Auth::user()->id)->where('exam_id',$data->id)->first();
        }else{
            $hasil = null;
        }
        return view('peserta.dashboard' , ['hasil'=>$hasil]);
    }
    public function updatePengumuman(Request $request, $id)
    {
        exam::query()->update(['tampil' => 0]);

        if($id != 0){
            $exam = exam::findOrFail($id);
            $exam->update(['tampil' => 1]);    
        }
        return back()->with('success', 'Berhasil Memperbarui Pengumuman');
    }
    

}
