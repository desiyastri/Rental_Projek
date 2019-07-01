<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pegawai_Model extends Model
{
    //
    public static function disp_pegawai()
    {
    	$table = 'tb_pegawai';
    	$res_table = DB::table($table)->get();

    	return $res_table;
    }

    public static function add_pegawai($request)
    {	
        if ($request->r1=="Pria") {
            # code...
            $jekel="Pria";
        }
        else
        {
            $jekel="Wanita";
        }
    	DB::table('tb_pegawai')->insert([
			'id_pegawai'=>$request->id_pegawai,
			'nama_depan'=>$request->nama_depan,
			'nama_belakang'=>$request->nama_belakang,
			'jk'=>$jekel,
			'no_telp'=>$request->phone,
			'pekerjaan'=>$request->pekerjaan
		]);
    }

    public static function delete_pegawai($id)
    {
        DB::table('tb_pegawai')->where('id_pegawai',$id)->delete();
    }

    public static function edit_pegawai($id)
    {
        $tb_pegawai=DB::table('tb_pegawai')->where('id_pegawai',$id)->get();

        return $tb_pegawai;
    }

    public static function update_pegawai($request)
    {
        if ($request->r1=="Pria") {
            # code...
            $jekel="Pria";
        }
        else
        {
            $jekel="Wanita";
        }
        DB::table('tb_pegawai')->where('id_pegawai',$request->id_pegawai)->update([
            'id_pegawai'=>$request->id_pegawai,
            'nama_depan'=>$request->nama_depan,
            'nama_belakang'=>$request->nama_belakang,
            'jk'=>$jekel,
            'no_telp'=>$request->phone,
            'pekerjaan'=>$request->pekerjaan
        ]);
    }
}
