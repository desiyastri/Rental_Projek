<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\SupporPelangganades\DB;

use App\Pelanggan_Model;

class PelangganController extends Controller
{
    //
    public function pelanggan()
    {
      $result=Pelanggan_Model::disp_detail();

      return view('/admin/pelanggan', ['tb_pelanggan' => $result]);
    }

    public function add_Pelanggan(Request $request)
  	{

  		Pelanggan_Model::add_pelanggan($request);

  		return redirect('/admin/pelanggan');
  	}

    public function pelanggan_Update(Request $request)
  	{

  		Pelanggan_Model::update_pelanggan($request);

          return redirect('/admin/pelanggan');
  	}

    public function delete_Pelanggan($id)
  	{

  		Pelanggan_Model::delete_pelanggan($id);

  		return redirect('/admin/pelanggan');
  	}
}
