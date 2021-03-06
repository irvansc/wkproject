<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SejarahController extends Controller
{

    public function index()
    {
        $title = 'Sejarah';
        $sj = DB::table('sejarah')->first();
        return view('admin.backend.sejarah.index', compact('title', 'sj'));
    }

    public function update(Request $request, $id)
    {
        $sj = Sejarah::find($id);
        $request->validate([
            'photo' => 'image|mimes:png,jpg,jpeg'
        ]);


        if ($request->file('foto')) {
            File::delete('images/' . $sj->foto);
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(600, 600);
            $image_resize->save('images/' . $filename);
            $sj->foto = $filename;
        }
        $sj->title = $request->title;
        $sj->deskripsi = $request->deskripsi;
        $sj->save();
        return redirect()->back()->with('sukses', 'Data berhasil diupdate');
    }
}