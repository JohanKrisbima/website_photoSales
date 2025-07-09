<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PhotoController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $photos = Photo::all();
            return view('admin.galeriFoto', compact('photos'));
        }else{
            return redirect()->route('login');
        }
    }

    public function input(){
        if(Auth::check()){
            return view('admin.tambahFoto');
        }else{
            return redirect()->route('login');
        }
    }

    public function store(Request $request){
        $request->validate([
            'title'=> 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required',
            'image' => 'required|image',
        ]);

        $file = $request->file('image');

         // Buat nama file unik
        $filename = time() . '_' . $file->getClientOriginalName();

        // Simpan ke folder public/assets/imageProduct
        $file->move(public_path('assets/imageProduct'), $filename);

        // Simpan path ke database jika perlu
        $path = $filename;

        Photo::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $path,
        ]);

        return redirect()->route('galeriAdmin')->with('success','Foto Berhasil diUpload.');
    }

}
