<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_Question extends Model
{
    use HasFactory;
    protected $table = 'exam_questions';
    protected $fillable = [
        'id', 'exam_id', 'question','question_type_id','created_at','updated_at',
    ];
}
