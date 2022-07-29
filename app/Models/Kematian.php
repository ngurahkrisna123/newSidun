<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;

    protected $table = "kematians";

    protected $fillable = [
        'nik','nama','jk','tempatLahir','tglLahir','tempatMeninggal','tglMeninggal',
        'sebabMeninggal','kewarganegaraan'
    ];

    protected $primaryKey = 'idKematian';
}
