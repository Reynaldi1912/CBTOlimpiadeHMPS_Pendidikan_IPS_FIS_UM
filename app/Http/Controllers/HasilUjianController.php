<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\exam_answer;
class HasilUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = DB::table('vw_nilai_akhir_peserta')->get();
        return view('admin.hasilUjian' , ['nilai'=>$nilai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                    ->select('a.*', 'b.option_text AS option_text_answer', 'c.option_text AS option_text_right_answer')->get();
        $option_matching = DB::table('question_options AS a')
                    ->leftJoin(DB::raw('(SELECT * FROM question_options WHERE type_matching IS NOT NULL) AS b'), 'b.var1', '=', 'a.id')
                    ->select('a.*', 'b.option_text AS option_text_left')
                    ->where('a.type_matching', 'right')
                    ->get();
        $nilai = DB::table('vw_nilai_peserta')->get();
        // echo json_encode($data);die();
        return view('admin.jawabanPeserta' , ['soal'=>$data , 'option'=>$option , 'jawaban'=>$jawaban , 'option_matching'=>$option_matching , 'nilai'=>$nilai]);
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
