<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question_Option;
use App\Models\Exam_Answer;
use DB;
use Auth;

class Exam extends Component
{
    public $examId;

    public function mount($id)
    {
        $this->examId = $id;
    }

    public function render()
    {
        $soals = DB::table('vw_question_exam')->where('id', $this->examId)->paginate(1);
        foreach ($soals as $soal) {
            $soal->jawaban = Question_Option::all()->where('exam_question_id', $soal->question_id);
        }

        $exist_answer = Exam_Answer::all()->where('id_user',Auth::user()->id)->where('exam_id', $this->examId);
        
        return view('livewire.exam', [
            'soals' => $soals,
            'id' => $soals[0]->id,
            'existing_answer' => $exist_answer
        ]);
    }
}
