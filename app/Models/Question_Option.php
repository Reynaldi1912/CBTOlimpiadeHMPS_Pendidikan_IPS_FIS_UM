<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_Option extends Model
{
    use HasFactory;
    protected $table = 'question_options';
    protected $fillable = [
        'id' ,'exam_question_id', 'option_text', 'value', 'type_matching','var1','created_at','updated_at',
    ];
}
