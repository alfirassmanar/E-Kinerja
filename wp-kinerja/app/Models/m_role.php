<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class m_role extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_role';
    protected $primaryKey = 'id_role';

    protected $fillable = [
        'nama_role',
        'keterangan_role',
    ];

    // protected $hidden = [
    //     'no_pekerja',
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
