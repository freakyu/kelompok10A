<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // Menyatakan kolom data yang dapat diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value) {
        // Mengenkripsi password user saat registrasi
        if($value != "") {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function getGambar() {
        // Mengganti gambar user dengan gambar default
        // jika tidak dimasukkan saat tambah data
        if(!$this->avatar) {
            return asset('images/default.png');
        }

        return asset('images/avatars/'.$this->avatar);
    }
}
