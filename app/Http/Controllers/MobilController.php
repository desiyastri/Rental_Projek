<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Mobil;
use File;

class MobilController extends Controller
{
    //
    public function mobil()
    {
      $mobil = Mobil::get();

      return view('admin/mobil',['mobil' => $mobil]);
    }

    public function proses_upload(Request $request)
    {
      $this->validate($request, [
        'no_polisi' => 'required',
        'merk_mobil' => 'required',
        'jenis_mobil' => 'required',
        'harga' => 'required',
        'deskripsi' => 'required',
        'img' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      // menyimpan data file yang diupload ke variabel $file
      $file = $request->file('img');

      $nama_file = time()."_".$file->getClientOriginalName();

                  // isi dengan nama folder tempat kemana file diupload
      $tujuan_upload = 'img_rental';
      $file->move($tujuan_upload,$nama_file);

      Mobil::create([
        'no_polisi' => $request->no_polisi,
        'merk_mobil' => $request->merk_mobil,
        'jenis_mobil' => $request->jenis_mobil,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
        'img' => $nama_file,
      ]);

      

      return redirect('admin/mobil');
    }

    public function hapus($id)
    {
      // hapus file
      $gambar = Mobil::where('id',$id)->first();
      File::delete('img_rental/'.$gambar->img);

      // hapus data
      Mobil::where('id',$id)->delete();

      return redirect('admin/mobil');
    }
}
