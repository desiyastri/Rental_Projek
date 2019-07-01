<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan_Model extends Model
{
  public static function disp_detail()
  {
    $table = 'pelanggan';
    $res_detail=DB::table($table)->get();

    return $res_detail;
  }

  public static function add_pelanggan($request)
  {
      if ($request->r1=="Pria") {
          # code...
          $jekel="Pria";
      }
      else
      {
          $jekel="Wanita";
      }
    DB::table('pelanggan')->insert([
    'id_pelanggan'=>$request->id_pelanggan,
    'nama'=>$request->nama,
    'alamat'=>$request->alamat,
    'jk'=>$jekel,
    'no_telp'=>$request->no_telp,
    'email'=>$request->email
  ]);
  }

  public static function update_pelanggan($request)
  {
      if ($request->r1=="Pria") {
          # code...
          $jekel="Pria";
      }
      else
      {
          $jekel="Wanita";
      }
      DB::table('pelanggan')->where('id_pelanggan',$request->id_pelanggan)->update([
          'id_pelanggan'=>$request->id_pelanggan,
          'nama'=>$request->nama,
          'alamat'=>$request->alamat,
          'jk'=>$jekel,
          'no_telp'=>$request->no_telp,
          'email'=>$request->email
      ]);
  }

  public static function delete_pelanggan($id)
  {
    DB::table('pelanggan')->where('id_pelanggan',$id)->delete();
  }

}
