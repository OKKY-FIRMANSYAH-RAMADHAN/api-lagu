<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lagu extends Model
{
    protected $table = 'okky_lagu';
    protected $primaryKey = 'idLagu';
    public $timestamps = false;
    protected $fillable = ['judul', 'penyanyi', 'tahun', 'genre', 'album', 'durasi'];
}
