<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTugasUlangan extends Model
{
    use HasFactory;

    function murid()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    function tugas_ulangan()
    {
        return $this->belongsTo(TugasUlangan::class);
    }
}
