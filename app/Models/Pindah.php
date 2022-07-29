<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pindah extends Model
{
    use HasFactory;

    protected $table = "pindahs";

    protected $fillable = [
        'nik','nama','tglPindah','alamatAsal', 'alamatPindah','agama','jk','pekerjaan','status','keterangan','kewarganegaraan'
    ];

    protected $primaryKey = 'idPindah';

}
