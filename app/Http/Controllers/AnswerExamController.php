<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question_Option;
use App\Models\Exam_Answer;
use Auth;
use DB;
class AnswerExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $jawaban = $request->all();
        $soal = Question_Option::find($request->id_question);

        if ($request->question_type == 'true_or_false') {
            Exam_Answer::updateOrCreate(
                [   
                    'id_user'=>Auth::user()->id,
                    'exam_id' => $request->exam_id,
                    'id_exam_question' => $request->id_question
                ]
                ,[
                    'id_user'=>Auth::user()->id,
                    'exam_id' => $request->exam_id,
                    'id_exam_question' => $request->id_question,
                    'answer_question_option_id' =>$request->multiple_choice,
                    'created_by' => Auth::user()->id
                ]
            );
        } elseif ($request->question_type == 'multiple_choice') {
            Exam_Answer::updateOrCreate(
                [   
                    'id_user'=>Auth::user()->id,
                    'exam_id' => $request->exam_id,
                    'id_exam_question' => $request->id_question
                ]
                ,[
                    'id_user'=>Auth::user()->id,
                    'exam_id' => $request->exam_id,
                    'id_exam_question' => $request->id_question,
                    'answer_question_option_id' =>$request->multiple_choice,
                    'created_by' => Auth::user()->id
                ]
            );
        }elseif ($request->question_type == 'complex_multiple_choice') {
            for ($i=0; $i < sizeof($request->complex_multiple_box); $i++) { 
                $model = Exam_Answer::all()->where('id_exam_question',$request->id_question)->where('id_user',Auth::user()->id)->first();
                if($model){
                    $model->delete();
                }
            }

            for ($i=0; $i < sizeof($request->complex_multiple_box); $i++) { 
                Exam_Answer::Create(
                    [
                        'id_user'=>Auth::user()->id,
                        'exam_id' => $request->exam_id,
                        'id_exam_question' => $request->id_question,
                        'answer_question_option_id' =>$request->complex_multiple_box[$i],
                        'created_by' => Auth::user()->id
                    ]
                );
            }
        }elseif ($request->question_type == 'matching') {
            for ($i=0; $i < sizeof($request->matching); $i++) { 
                $model = Exam_Answer::all()->where('id_exam_question',$request->id_question)->where('id_user',Auth::user()->id)->first();
                if($model){
                    $model->delete();
                }
            }

            for ($i=0; $i < sizeof($request->matching); $i++) { 
                Exam_Answer::Create(
                    [
                        'id_user'=>Auth::user()->id,
                        'exam_id' => $request->exam_id,
                        'id_exam_question' => $request->id_question,
                        'answer_question_option_id' =>$request->left_matching[$i],
                        'answer_right_option_id' => $request->matching[$i],
                        'created_by' => Auth::user()->id
                    ]
                );
            }
        }
        return back()->with('success','Jawaban berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
