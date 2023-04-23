<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_Attemp extends Model
{
    use HasFactory;
    protected $table = 'exam_attemps';
    protected $fillable = [
        'id' ,'id_user', 'exam_id', 'total_attemp','finish','created_at','updated_at',
    ];
}
