<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exam;
use Illuminate\Support\Facades\Session;


class UjianAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $exam = exam::all()->sortBy('id');
        return view('admin.createUjian' , ['exam'=>$exam , 'data'=>$exam->where('token',null)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        exam::create([
            'title' => $request->txtNamaUjian,
            'description' => $request->txtDeskripsiUjian,
            'start_at' => $request->txtMulaiUjian,
            'duration' => $request->txtDurasiUjian,
            'nilai_benar' => $request->txtStatusBenar,
            'nilai_salah' => $request->txtStatusSalah
        ]);

        return redirect()->route('ujianAdmin.index')->with('success','Jadwal Ujian Baru Berhasil Dibuat');
    }

    public function storeToken(Request $request){

       $exam = exam::all()->where('id', $request->jadwal_exam)->first();
        if ($exam) {
            $exam->update([
                'token' => $request->token,
            ]);
            return redirect()->route('ujianAdmin.index')->with('success','Token Berhasil Dibuat untuk ujian '.$exam->title);
        } else {
            return redirect()->route('ujianAdmin.index')->with('error','Tidak Ada Ujian Untuk Pengesetan Token');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function updateJadwal(Request $request, $id){
        $exam = exam::all()->where('id', $id)->first();
        $exam->update([
            'id'=> $id,
            'title'=> $request->txtNamaUjian,
            'description'=> $request->txtDeskripsiUjian,
            'start_at'=> $request->txtMulaiUjian,
            'duration'=> $request->txtDurasiUjian,
            'nilai_benar' => $request->txtStatusBenar,
            'nilai_salah' => $request->txtStatusSalah
        ]);
        return back()->with('warning','Jadwal Berhasil DiUpdate');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = exam::all()->where('id', $id)->first();
        if($request->btn === 'delete'){
            if($exam->token == null){
                return redirect()->route('ujianAdmin.index')->with('error','Tidak ada yang dihapus , token sudah kosong');
            }
            $exam->update([
                'token' => null
            ]);
            return redirect()->route('ujianAdmin.index')->with('success','Token Berhasil Dihapus');
        }elseif($request->btn === 'update'){
            if($exam->token == null){
                return redirect()->route('ujianAdmin.index')->with('error','Silahkan buat token terlebih dahulu');
            }
            $randomString = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = substr(str_shuffle($randomString),0,8);            
            $exam->update([
                'token' => $randomString
            ]);
            return redirect()->route('ujianAdmin.index')->with('success','Token Berhasil Diubah '.$randomString);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
