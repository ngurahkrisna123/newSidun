<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    use HasFactory;

    protected $table = "kelahirans";

    protected $fillable = [
        'noAktaLahir','nama','tempatLahir','tglLahir','namaAyah', 'namaIbu','jk','kewarganegaraan'
    ];

    protected $primaryKey = 'idKelahiran';
}
