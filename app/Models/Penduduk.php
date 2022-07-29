<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = "penduduks";

    protected $fillable = [
        'nik','noKK','namaPenduduk','jk',
        'tempatLahir','tglLahir','golDarah',
        'alamat','agama','pendidikan',
        'pekerjaan','status','kewarganegaraan',
        'dusun','tglBergabung'
    ];

    protected $primaryKey = 'idPenduduk';
}
