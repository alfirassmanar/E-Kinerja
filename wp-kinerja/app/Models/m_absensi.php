<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class m_absensi extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_absensi';
    protected $primaryKey = 'id_absensi';

    protected $fillable = [
        'id_absensi',
        'no_pekerja',
        'nama_pekerja',
        'foto_absensi',
        'role',
        'jam_masuk',
        'tanggal_masuk',
        'tanggal_keluar',
        'waktu_kerja',
    ];

    // protected $hidden = [
    //     'no_pekerja',
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
