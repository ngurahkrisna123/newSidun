<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = "keluargas";

    protected $fillable = [
        'noKK','kepalaKeluarga','jmlKeluarga'
    ];

    protected $primaryKey = 'idKeluarga';
}
