<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question_Option;
use DB;

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
        
        return view('livewire.exam', [
            'soals' => $soals,
            'id' => $soals[0]->id
        ]);
    }
}
