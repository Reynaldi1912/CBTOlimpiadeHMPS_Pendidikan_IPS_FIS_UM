<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil_Uraian extends Model
{
    use HasFactory;
    protected $table = 'hasil_uraian';
    protected $fillable = [
        'id' ,'exam_id', 'id_user', 'question_id', 'nilai','created_by','created_at','updated_at'
    ];
}
