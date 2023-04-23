<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exam;
use App\Models\exam_attemp;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;


class UjianPesertaController extends Controller
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
        $listUjian = DB::table('vw_list_peserta_ujian')->where('id_user',Auth::user()->id)->get();
        return view('peserta.listUjian',['listUjian'=>$listUjian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $soals = DB::table('vw_question_exam')->where('id','1')->paginate(1);
        foreach ($soals as $soal) {
            $soal->jawaban = Question_Option::all()->where('exam_question_id',$soal->question_id);
        }
        
        return view('livewire.exam', [
            'soals' => $soals
        ]);
    }
    public function selesaikanUjian($id){
        // Menghapus data ujian pada session
        Session::forget('ujian_id');
        Session::forget('waktu_mulai');
        Session::forget('durasi');

        $exam_attemp = Exam_Attemp::all()->where('id_user',Auth::user()->id)->where('exam_id',$id)->first();
        $exam_attemp->update([
            'finish' => 1
        ]);

        $listUjian = DB::table('vw_list_peserta_ujian')->where('id_user',Auth::user()->id)->get();
        return view('peserta.listUjian',['listUjian'=>$listUjian]);
    }
    public function kerjakanUjian($id)
    {

        $listUjian = DB::table('vw_list_peserta_ujian')->where('id',Session::get('ujian_id'))->where('id_user',Auth::user()->id)->get();
        return view('peserta.pengerjaanSoal' , [
            'listUjian'=>$listUjian[0],
            'id_ujian' => $listUjian[0]->id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = exam::all()->where('token',$request->token)->first();
        if($token){
            $attemp_token = exam_attemp::all()->where('exam_id',$token->id)->first();
            if($attemp_token){
                if($attemp_token->total_attemp >= 3){
                    return redirect()->route('pengerjaan.index')->with('error','penggunaan token anda sudah melebhi 3x');;
                }
                // Menyimpan data ujian pada session
                Session::put('ujian_id', $token->id);
                Session::put('waktu_mulai', now());
                Session::put('durasi', $token->duration);

                $attemp_token->update([
                    'exam_id' => $token->id,
                    'total_attemp' => (int)$attemp_token->total_attemp + 1
                ]);
                return redirect()->route('pengerjaan.kerjakanUjian',$token->id);
            }else{
                // Menyimpan data ujian pada session
                Session::put('ujian_id', $token->id);
                Session::put('waktu_mulai', now());
                Session::put('durasi', $token->duration);

                exam_attemp::create([
                    'id_user' => Auth::user()->id,
                    'exam_id' => $token->id,
                    'total_attemp' => 1
                ]);
                return redirect()->route('pengerjaan.kerjakanUjian',$token->id);
            }
        }else{
            return redirect()->route('pengerjaan.index')->with('error','tidak ada ujian dengan token "'.$request->token.'"');;
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
        $key = DB::table('vw_list_peserta_ujian')->where('id_user',Auth::user()->id)->where('id',$id)->get();
        if(date('Y-m-d H:i:s') >= $key[0]->start_at  &&  date('Y-m-d H:i:s') <= date('Y-m-d H:i:s',strtotime($key[0]->duration.' minutes',strtotime($key[0]->start_at)))){
            return view('peserta.ujianPeserta');
        }else{
            return redirect()->route('pengerjaan.index')->with('error','Maaf Diluar Waktu Pengerjaan');
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
        //
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
