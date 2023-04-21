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
        return view('admin.createUjian');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = exam::all()->where('token',null);
        $allData = exam::all();
        return view('admin.buatToken' , ['data'=>$data , 'allData'=>$allData]);
       
        
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
            'duration' => $request->txtDurasiUjian
        ]);

        return redirect()->route('ujianAdmin.index')->with('success','Jadwal Ujian Baru Berhasil Dibuat');
    }

    public function storeToken(Request $request){

       $exam = exam::all()->where('id', $request->jadwal_exam)->first();
        if ($exam) {
            $exam->update([
                'token' => $request->token,
            ]);
            return redirect()->route('ujianAdmin.create')->with('success','Token Berhasil Dibuat untuk ujian '.$exam->title);
        } else {
            return redirect()->route('ujianAdmin.create')->with('error','Tidak Ada Ujian Untuk Pengesetan Token');
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
                return redirect()->route('ujianAdmin.create')->with('error','Tidak ada yang dihapus , token sudah kosong');
            }
            $exam->update([
                'token' => null
            ]);
            return redirect()->route('ujianAdmin.create')->with('success','Token Berhasil Dihapus');
        }elseif($request->btn === 'update'){
            if($exam->token == null){
                return redirect()->route('ujianAdmin.create')->with('error','Silahkan buat token terlebih dahulu');
            }
            $randomString = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = substr(str_shuffle($randomString),0,8);            
            $exam->update([
                'token' => $randomString
            ]);
            return redirect()->route('ujianAdmin.create')->with('success','Token Berhasil Diubah '.$randomString);
            
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
