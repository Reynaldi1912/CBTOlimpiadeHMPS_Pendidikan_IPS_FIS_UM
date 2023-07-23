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
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
    }
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
        try {
            // Memastikan bahwa permintaan mengandung data JSON
            if ($request->header('Content-Type') === 'application/json') {
                // Mendapatkan data dari body permintaan dalam bentuk array
                $data = $request->json()->all();
                //proses
                $soal = Question_Option::find($request->id_question);
                //Jika Jawaban yakin
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
                            'answer_question_option_id' => $request->answer,
                            'created_by' => Auth::user()->id,
                            'ragu' => $request->ragu
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
                            'answer_question_option_id' =>$request->answer,
                            'created_by' => Auth::user()->id,
                            'ragu' => $request->ragu
                        ]
                    );
                }elseif ($request->question_type == 'complex_multiple_choice') {
                    $model = Exam_Answer::all()->where('id_exam_question',$request->id_question)->where('id_user',Auth::user()->id);
                    if($model){
                        foreach($model as $m) {
                            $m->delete();
                        }
                    }
                    
                    for ($i=0; $i < sizeof($request->answer); $i++) { 
                        Exam_Answer::Create(
                            [
                                'id_user'=>Auth::user()->id,
                                'exam_id' => $request->exam_id,
                                'id_exam_question' => $request->id_question,
                                'answer_question_option_id' =>$request->answer[$i],
                                'created_by' => Auth::user()->id,
                                'ragu' => $request->ragu
                            ]
                        );
                    }
                }elseif ($request->question_type == 'matching') {
                    for ($i=0; $i < sizeof($request->answer); $i++) { 
                        $model = Exam_Answer::all()->where('id_exam_question',$request->id_question)->where('id_user',Auth::user()->id)->first();
                        if($model){
                            $model->delete();
                        }
                    }

                    for ($i=0; $i < sizeof($request->answer); $i++) { 
                        Exam_Answer::Create(
                            [
                                'id_user'=>Auth::user()->id,
                                'exam_id' => $request->exam_id,
                                'id_exam_question' => $request->id_question,
                                'answer_question_option_id' =>$request->left[$i],
                                'answer_right_option_id' => $request->answer[$i],
                                'created_by' => Auth::user()->id,
                                'ragu' => $request->ragu
                            ]
                        );
                    }
                }elseif($request->question_type == 'long_desc' || $request->question_type == 'short_desc'){
                    Exam_Answer::updateOrCreate(
                        [   
                            'id_user'=>Auth::user()->id,
                            'exam_id' => $request->exam_id,
                            'id_exam_question' => $request->id_question
                        ]
                        ,[
                            'id_user'=>Auth::user()->id,
                            'question_type' => $request->question_type,
                            'exam_id' => $request->exam_id,
                            'id_exam_question' => $request->id_question,
                            'answer_desc' => $request->answer,
                            'created_by' => Auth::user()->id,
                            'ragu' => $request->ragu
                        ]
                    );
                }else{
                    return response()->json(['message' => 'Data gagal diolah']);
                }
            } else {
                return response()->json(['error' => 'Content-Type harus berupa application/json'], 400);
            }
        } catch (\Exception $e) {
            // Tangani jika ada kesalahan saat memproses data
            return response()->json(['error' => 'Terjadi kesalahan saat memproses data'], 500);
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
