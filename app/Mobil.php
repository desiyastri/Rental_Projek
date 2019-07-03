<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = "mobils";

    protected $fillable = ['no_polisi','merk_mobil', 'jenis_mobil', 'harga', 'deskripsi', 'img'];
}
