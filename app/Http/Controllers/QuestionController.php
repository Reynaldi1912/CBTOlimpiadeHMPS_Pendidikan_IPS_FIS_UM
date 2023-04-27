<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\exam;
use App\Models\exam_question;
use App\Models\question_option;
use App\Models\question_type;
use DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $exam = exam::all();
        $total_question = exam_question::all();
        $question_type = question_type::all();
        return view('admin.createSoalIndex' , ['exam'=>$exam , 'total_question'=>$total_question,'question_type'=>$question_type]);
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
        $question_type_id = $request->question_type;
        if($question_type_id == 1){
            $examQuestion = exam_question::create([
                'exam_id' => $request->exam_id,
                'question' => $request->editordata,
                'question_type_id' => 1
            ]);
            
            $examQuestionId = $examQuestion->id; // mendapatkan ID terakhir yang diinputkan pada tabel exam_question
            
            for ($i=0; $i <  sizeOf($request->true_answer); $i++) { 
                question_option::create([
                    'exam_question_id' => $examQuestionId,
                    'option_text' => $request->option_answer[$i],
                    'value' => $request->true_answer[$i]
                ]);
            }
        return back();
            
        }elseif($question_type_id == 2){
            $examQuestion = exam_question::create([
                'exam_id' => $request->exam_id,
                'question' => $request->editordata,
                'question_type_id' => 2
            ]);
            
            $examQuestionId = $examQuestion->id; // mendapatkan ID terakhir yang diinputkan pada tabel exam_question
            for ($i=0; $i <  sizeOf($request->true_answer); $i++) { 
                question_option::create([
                    'exam_question_id' => $examQuestionId,
                    'option_text' => $request->option_answer[$i],
                    'value' => $request->true_answer[$i]
                ]);
            }
            return back();
        }elseif($question_type_id == 3){
            $examQuestion = exam_question::create([
                'exam_id' => $request->exam_id,
                'question' => $request->editordata,
                'question_type_id' => 3
            ]);
            
            $examQuestionId = $examQuestion->id; // mendapatkan ID terakhir yang diinputkan pada tabel exam_question
            if($request->status == 1){
                question_option::create([
                    'exam_question_id' => $examQuestionId,
                    'option_text' => 'Benar',
                    'value' => 1
                ]);
                question_option::create([
                    'exam_question_id' => $examQuestionId,
                    'option_text' => 'Salah',
                    'value' => 0
                ]);
            }else if($request->status == 0){
                question_option::create([
                    'exam_question_id' => $examQuestionId,
                    'option_text' => 'Benar',
                    'value' => 0
                ]);
                question_option::create([
                    'exam_question_id' => $examQuestionId,
                    'option_text' => 'Salah',
                    'value' => 1
                ]);
            }
            return back();
        }elseif($question_type_id == 4){
            $examQuestion = exam_question::create([
                'exam_id' => $request->exam_id,
                'question' => $request->editordata,
                'question_type_id' => 4
            ]);
            
            $examQuestionId = $examQuestion->id; // mendapatkan ID terakhir yang diinputkan pada tabel exam_question
            $newIds = [];
            for ($i=0; $i <  sizeOf($request->right_option); $i++) { 
                $question_option  = question_option::create([
                    'exam_question_id' => $examQuestionId,
                    'option_text' => $request->right_option[$i],
                    'value' => 0,
                    'type_matching' =>'right',
                ]);
                $newIds[] = $question_option[$i]->id;

            }

            for ($i=0; $i <  sizeOf($request->option_answer); $i++) { 
                question_option::create([
                    'exam_question_id' => $examQuestionId,
                    'option_text' => $request->option_answer[$i],
                    'type_matching' => 'left',
                    'value' => 0,
                    'var1' => $newIds[$i]
                ]);
            }
          
            return back();
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
        $exam = exam::find($id);
        $question_type = question_type::all();
        return view('admin.createSoalcreate' , ['question_type'=>$question_type , 'id_exam'=>$exam]);
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
