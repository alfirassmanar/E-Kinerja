<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class m_laporan_kinerja extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_laporan_kinerja';
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'nama_pekerja',
        'no_pekerja',
        'role',
        'nilai_mingguan',
        'penilaian',
        'tanggal_penilaian',
    ];

    // protected $hidden = [
    //     'no_pekerja',
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
