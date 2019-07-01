<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mobil_Model extends Model
{
  public static function disp_detail()
  {
    $table = 'mobil';
    $res_detail=DB::table($table)->get();


    return $res_detail;
  }
}
