<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'okky_genre_lagu';
    protected $primaryKey = 'idGenre';
    public $timestamps = false;
    protected $fillable = ['namaGenre'];
}
