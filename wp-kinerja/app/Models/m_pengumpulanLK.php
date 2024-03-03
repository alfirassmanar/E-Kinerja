<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class m_pengumpulanLK extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_pengumpulan_lk';
    protected $primaryKey = 'id_lk';

    protected $fillable = [
        'no_pekerja',
        'nama_pekerja',
        'role',
        'kategori_laporan',
        'tugas_kerja',
        'waktu_pengumpulan',
        'tanggal_pengumpulan',
        'revisi_tugas',
        'acc_tugas',
    ];

    // protected $hidden = [
    //     'no_pekerja',
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
