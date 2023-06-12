<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Illuminate\Support\Facades\Session;
use App\Models\Exam_Attemp;
use App\Models\User;
use App\Models\Hasil_Uraian;
use App\Models\Hasil_Akhir_Ujian;
use DB;
use Auth;
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
            'nilai_salah' => $request->txtStatusSalah,
            'tampil' => false
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
    public function tambahPeserta(Request $request , $id){
        $cek = exam_attemp::where('total_attemp' ,'>',0)->where('exam_id', $id)->get();
        if($cek->isNotEmpty()){
            return back()->with('error','Tidak Bisa Tambah Peserta . Terdapat Peserta Yang Sudah Mengerjakan');
        }elseif($cek->isEmpty()){
            exam_attemp::where('finish', 0)->where('exam_id', $id)->delete();
            if($request->id_peserta){
                for ($i=0; $i < sizeof($request->id_peserta) ; $i++) { 
                    exam_attemp::updateOrCreate(
                    [
                        'id_user'=> $request->id_peserta[$i],
                        'exam_id'=> $id,
                    ],
                    [
                        'id_user'=> $request->id_peserta[$i],
                        'exam_id' => $id,
                        'total_attemp' => 0,
                        'finish' => 0
                    ]);        
                }
            }
            return back()->with('success','peserta berhasil di update');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $existing_peserta = exam_attemp::all()->where('exam_id',$id);
        $exam = exam::find($id);
        $list_peserta = user::all()->where('role','peserta');
        return view('admin.tambahPesertaUjianPage' , ['list_peserta'=>$list_peserta , 'existing_peserta'=>$existing_peserta , 'exam'=>$exam]);
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
            'nilai_salah' => $request->txtStatusSalah,
        ]);
        return back()->with('warning','Jadwal Berhasil DiUpdate');
    }

    public function input_semua_nilai(Request $request){
        $nilai_sementara = DB::table('vw_nilai_akhir_peserta')->where('exam_id',$request->exam_id)->get();

        foreach ($nilai_sementara as $key) {
            Hasil_Akhir_Ujian::updateOrCreate(
                [
                    'id_user' => $key->id_user,
                    'exam_id' => $key->exam_id
                ],
                [
                    'id_user' => $key->id_user,
                    'exam_id' => $key->exam_id,
                    'nilai_akhir' => $key->nilai,
                    'nilai_max' => $key->total_nilai,
                    'nilai_akhir_ujian' => $key->nilai,
                    'status' => false
                ]
            );
        }

        return back()->with('success','Nilai Akhir Sudah Diinputkan');
    }
    public function input_nilai_akhir(Request $request){

        Hasil_Uraian::updateOrCreate(
            [
                'id_user' => $request->id_user,
                'exam_id' => $request->exam_id,
                'question_id' => $request->question_id
            ],
            [
                'id_user' => $request->id_user,
                'exam_id' => $request->exam_id,
                'question_id' => $request->question_id,
                'nilai' => $request->nilai,
                'created_by' => Auth::user()->username
            ]
        );

        $nilai_uraian = DB::table('hasil_uraian')
                        ->where('exam_id', $request->exam_id)
                        ->where('id_user', $request->id_user)
                        ->get();
        $total_nilai = 0;
        foreach ($nilai_uraian as $item) {
            $total_nilai += $item->nilai;
        }
    
        $existing_nilai_akhir = Hasil_Akhir_Ujian::where('id_user', $request->id_user)->where('exam_id', $request->exam_id)->first();

        Hasil_Akhir_Ujian::updateOrCreate(
            [
                'id_user' => $request->id_user,
                'exam_id' => $request->exam_id
            ],
            [
                'id_user' => $request->id_user,
                'exam_id' => $request->exam_id,
                'nilai_akhir' => $existing_nilai_akhir->nilai_akhir,
                'nilai_max' => $existing_nilai_akhir->nilai_max,
                'nilai_akhir_ujian' => $existing_nilai_akhir->nilai_akhir + $total_nilai,
                'status' => false
            ]
        );
    
        
        return back()->with('success','Nilai berhasil Di Inputkan');
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
        $exam_attemps = exam_attemp::find($id);
        if($exam_attemps->finish == 1){
            return back()->with('error','Data gagal dihapus karena peserta sudah menyelesaikan ujian');
        }
        $exam_attemps->delete();

        return back()->with('success','Data Berhasil Dihapus');
    }
}
