<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class m_kategori extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_kategori_laporan';
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'id_kategori',
        'no_kategori',
        'nama_kategori',
    ];

    // protected $hidden = [
    //     'no_pekerja',
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
