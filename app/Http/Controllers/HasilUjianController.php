<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Exam_Answer;
use App\Models\Exam_Question;
use App\Models\Exam;
use App\Models\Hasil_Akhir_Ujian;
use App\Models\User;


class HasilUjianController extends Controller
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
        $nilai = DB::table('vw_nilai_akhir_peserta')->get();
        $soal = exam_question::all();
        $ujian = Exam::all();
        $hasil_akhir = hasil_akhir_ujian::all();
        return view('admin.hasilUjian' , ['nilai'=>$nilai , 'soal'=>$soal , 'exam'=>$ujian , 'hasil_akhir_ujian'=>$hasil_akhir]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_lolos($id){
        $hasil_akhir = hasil_akhir_ujian::all()->where('id',$id)->first();
        if($hasil_akhir->status == false){
            $hasil_akhir->update([
                'status' => true
            ]);
        }else{
            $hasil_akhir->update([
                'status' => false
            ]);
        }

        return back()->with('warning','berhasil merubah status peserta');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = DB::table('vw_nilai_akhir_peserta')->where('id',$id)->first();
        $id_user = $result->id_user;
        $exam_id = $result->exam_id;
        $data = DB::table('exam_questions as b')
                    ->leftJoin('question_type as c', 'b.question_type_id', '=', 'c.id')
                    ->select('b.id as id_question', 'b.question', 'b.exam_id', 'c.title as question_type')
                    ->get();
        $option = DB::table('question_options as a')
                ->leftJoin('exam_questions as b', 'a.exam_question_id', '=', 'b.id')
                ->leftJoin('question_type as c', 'b.question_type_id', '=', 'c.id')
                ->select('a.*', 'b.question', 'c.title as question_type')
                ->get();
        $jawaban =  DB::table('exam_answers AS a')
                    ->leftJoin('question_options AS b', 'a.answer_question_option_id', '=', 'b.id')
                    ->leftJoin('question_options AS c', 'a.answer_right_option_id', '=', 'c.id')
                    ->where('id_user',$id_user)
                    ->where('exam_id' , $exam_id)
                    ->select('a.*', 'b.option_text AS option_text_answer', 'c.option_text AS option_text_right_answer')->get();
        $option_matching = DB::table('question_options AS a')
                    ->leftJoin(DB::raw('(SELECT * FROM question_options WHERE type_matching IS NOT NULL) AS b'), 'b.var1', '=', 'a.id')
                    ->select('a.*', 'b.option_text AS option_text_left')
                    ->where('a.type_matching', 'right')
                    ->get();
        $nilai = DB::table('vw_nilai_peserta')->where('id_user',$id_user)->where('exam_id' , $exam_id)->get();
        $nilai_sementara = DB::table('vw_nilai_akhir_peserta')->where('id_user',$id_user)->where('exam_id' , $exam_id)->first();
        $nilai_akhir = DB::table('hasil_akhir_ujian')->where('id_user',$id_user)->where('exam_id' , $exam_id)->first();
        $user = User::all()->where('id',$id_user)->first();
        // echo json_encode($nilai_sementara);die();
        return view('admin.jawabanPeserta' , ['soal'=>$data , 'option'=>$option , 'jawaban'=>$jawaban , 'option_matching'=>$option_matching , 'nilai'=>$nilai , 'nilai_sementara'=>$nilai_sementara , 'nilai_akhir'=>$nilai_akhir , 'user'=>$user]);
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
