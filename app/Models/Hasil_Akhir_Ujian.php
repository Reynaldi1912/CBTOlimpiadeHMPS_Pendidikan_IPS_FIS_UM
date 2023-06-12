<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil_Akhir_Ujian extends Model
{
    use HasFactory;
    protected $table = 'hasil_akhir_ujian';
    protected $fillable = [
        'id' ,'id_user', 'exam_id', 'nilai_akhir','nilai_max','nilai_akhir_ujian','status','created_at','updated_at',
    ];
}
