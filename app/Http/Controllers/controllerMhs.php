<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerMhs extends Controller
{
    

    public function index(){
        $data_mhs = \App\Models\modelAddMhs::all()->where('status', "diajukan");
        /* $data_mhs = \App\Models\modelAddMhs::all(); */
        return view('verifikasi',['data_mhs' => $data_mhs]);
    }
    public function indexvalid(){
        $data_mhs = \App\Models\modelAddMhs::all()->where('status', "tervalidasi");
        return view('verifikasiSetuju',['data_mhs' => $data_mhs]);
    }
    public function indextolak(){
        $data_mhs = \App\Models\modelAddMhs::all()->where('status', "ditolak");
        return view('verifikasiDitolak',['data_mhs' => $data_mhs]);
    }

    public function cek($id_mhs){
        $data_mhs = \App\Models\modelAddMhs::find($id_mhs);
        return view('detail',['data_mhs' => $data_mhs]);
    }
    
    public function update(Request $a, $id_mhs){
        $karyawan = \App\Models\modelAddmhs::find($id_mhs);
        $karyawan->update(array(
            'status' => $a->status,
            'detail' =>$a->detail
        ));
        return redirect('/verifikasi')/* ->with('sukses','Data Berhasil Di Update') */;
    }
    

}
