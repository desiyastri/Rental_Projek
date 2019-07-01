<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Detail_Model extends Model
{
    //
    
    public static function disp_detail()
    {
	    $table = 'tb_detail';	//buat variable yang mewakili tabel
    	//$res_detail=DB::table($table)->where('Tujuan','Tasikmalaya')->get()		//Contoh penggunaan WHERE
    	$res_detail=DB::table($table)->get();

    	
    	return $res_detail;
    }

    public static function add_detail($data_input)
    {	
    	DB::table('tb_detail')->insert([
			'id_tiket'=>$data_input->id_tiket,
			'harga'=>$data_input->harga,
			'tujuan'=>$data_input->tujuan,
			'kode_tiket'=>$data_input->kode_tiket
		]);
    }

    public static function delete_detail($id)
    {
    	DB::table('tb_detail')->where('id_tiket',$id)->delete();
    }


    public static function detail_update($request)
    {

        DB::table('tb_detail')->where('id_tiket',$request->id_tiket)->update([
            'id_tiket'=>$request->id_tiket,
            'harga'=>$request->harga, 
            'tujuan'=>$request->tujuan, 
            'kode_tiket'=>$request->kode_tiket
        ]);
        
    }
}
