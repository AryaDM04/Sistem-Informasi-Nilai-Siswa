<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    public function role() {
        return $this->belongsTo(Role::class);
    }
    public function murid() {
        return $this->hasOne(Murid::class);
    }
    public function wali_murid() {
        return $this->hasOne(WaliMurid::class);
    }

    public function guru() {
        return $this->hasOne(Guru::class);
    }
}
