<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//Import Model
use App\Detail_Model;

class DetailtiketController extends Controller
{
    public function detail()
    {

    
    /* N O T I C E 

    *	Desi, sekarang kita bikin querynya di Model
    *	Model ada di folder App\
    *	Untuk tb_detail, aku dah bikin Model namanya Detail_Model

    */

    // Query di Model
    
    //CALL MODEL
    $result=Detail_Model::disp_detail();

    return view('/admin/content', ['tb_detail' => $result]);
	
	// End of Query di Model
	//


    /*
    // Query di Controller	//
    
    //mengambil data dari table tb_detail
    $tb_detail = DB::table('tb_detail')->get();
    
    //mengirim data ke view content-detail
    return view('admin/content', ['tb_detail' => $tb_detail]);
    
    // End of Query di Controller test test
    //
    */
	}


	/* C R E A T E  D A T A */
	public function add_Detail(Request $data_input)
	{
		
		Detail_Model::add_detail($data_input);

		return redirect('/admin/detail');
	}
	/****/

	/* D E L E T E  D A T A */
	public function delete_Detail($id)
	{
		Detail_Model::delete_detail($id);

		return redirect('/admin/detail');
	}
	/******/

	/* E D I T  D A T A */
	public function edit_Detail($id)
	{
	 	$tb_detail_lagi = DB::table('tb_detail')->where('id_tiket',$id)->get();

	 	return view('/admin/content', ['tb_detail_lagi' => $tb_detail_lagi]);
	}
	
	public function detail_Update(Request $request)
	{

		Detail_Model::detail_update($request);

        return redirect('/admin/detail');
	}
}