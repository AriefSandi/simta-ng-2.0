<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelAddMhs;

class controllerAddMhs extends Controller
{
    /* public function tampilmhs()
    {
        return view('tambahmhs');
    } */

    public function tambahmhs()
    {
        return view('tambahmhs');
    }

    public function simpanmhs(Request $request)
    {
        
        /* if ($request->hasfile('file')){ */

            $file = $request->file;
            $filenameWithExt = $request->file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file->getClientOriginalExtension();
            $filenameSimpan = (int) $filename.'.'.$extension;
            $destinationPath = 'images';
            /* $path = $request->file->storeAs('images', $filenameSimpan); */
            $file->move($destinationPath,(int)$file->getClientOriginalName());

            $mhs = modelAddMhs::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'status' =>'diajukan',
                'file' => $filenameSimpan,
                'detail' => ' ', 
            ]);
            
            
        /* }  */
        
        
        

        return redirect()->route('tambahmhs');
    }
}
