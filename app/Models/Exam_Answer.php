<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_Answer extends Model
{
    use HasFactory;
    protected $table = 'exam_answers';
    protected $fillable = [
        'id' ,'id_user','exam_id', 'id_exam_question', 'answer_question_option_id','answer_right_option_id','created_at','updated_at','created_by','updated_by'
    ];
}
