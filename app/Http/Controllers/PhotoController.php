<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PhotoController extends Controller
{
    //
    public function index(){
        if(Auth::check() && Auth::user()->usertype=='admin'){
            $photos = Photo::all();
            return view('admin.galeriFoto', compact('photos'));
        }else{
            return redirect()->route('login');
        }
    }

    public function input(){
        if(Auth::check() && Auth::user()->usertype=='admin'){
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
        $file->move(public_path('assets/imageProduct/'), $filename);

        // Simpan path ke database jika perlu
        $path = $filename;

        Photo::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $path,
        ]);

        return redirect()->route('galeriAdmin')->with('successUpload','Foto Berhasil diUpload.');
    }

    public function destroy($id){
        $photo = Photo::findOrFail($id);

        // hapus file gambar dari penyimpanan
        if(file_exists(public_path('assets/imageProduct/' . $photo->image))){
            unlink(public_path('assets/imageProduct/' . $photo->image));
        }

        //hapus dari database
        $photo->delete();

        return redirect()->route('galeriAdmin')->with('successDelete', 'Foto berhasil di hapus');
    }

    public function edit($id){
        if(Auth::check() && Auth::user()->usertype=='admin'){
            $photo = Photo::findOrFail($id);

        return view('admin.editFoto', compact('photo'));
        }else{
            return redirect()->route('login');
        }
    }

    public function update(Request $request, $id)
    {
        $photo = Photo::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->price = $request->price;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            $oldImagePath = public_path('assets/imageProduct/' . $photo->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload gambar baru
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/imageProduct/'), $filename);

            // Simpan nama file baru ke database
            $photo->image = $filename;
        }

        $photo->save();

        return redirect()->route('galeriAdmin')->with('successUpdate', 'Data berhasil diperbarui.');
    }

}
