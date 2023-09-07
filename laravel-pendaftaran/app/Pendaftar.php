<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'foto',
        'nik',
        'nisn',
        'nama',
        'tempatlahir',
        'tgllahir',
        'alamat',
        'jeniskelamin',
        'agama',
        'email',
        'kode',
        'telp',
        'status',
        'image',
        'sekolahasal',
    ];
}
