<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';
    protected $fillable = [
        'id' ,'title', 'description', 'start_at','nilai_benar','nilai_salah','duration','token','created_at','updated_at',
    ];
}
