<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Mobil_Model;

class MobilController extends Controller
{
    //
    public function mobil()
    {
      $result=Mobil_Model::disp_detail();

      return view('/admin/mobil', ['tb_mobil' => $result]);
    }
}
