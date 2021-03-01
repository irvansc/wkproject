<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FotoController extends Controller
{

    public function index()
    {
        $title = 'Foto';
        $fotos = Foto::get();
        $albums = Album::all();
        return view('admin.backend.album.foto.index', compact('title', 'fotos', 'albums'));
    }

    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'gbr' => 'image|mimes:png,jpg,jpeg'
            ]);

            $foto = new Foto;
            $foto->title = $request->title;
            $foto->url_video = $request->video;
            $foto->album_id = $request->album;
            $foto->user_id = Auth::id();

            if ($request->file('gbr')) {
                $file = $request->file('gbr');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(600, 600);
                $image_resize->save('images/foto/album/fotos/' . $filename);
            }
            $foto->gbr = $filename;
            $foto->save();
            Session::flash('sukses', 'Photo added successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->back();
    }

    public function show(Foto $foto)
    {
        abort(404);
    }

    public function edit(Foto $foto)
    {
        abort(404);
    }


    public function update(Request $request, $id)
    {
        try {
            $foto = Foto::findOrFail($id);
            $request->validate([
                'gbr' => 'image|mimes:png,jpg,jpeg'
            ]);
            if ($request->file('gbr')) {
                File::delete('images/foto/album/fotos/' . $foto->gbr);
                $file = $request->file('gbr');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(600, 600);
                $image_resize->save('images/foto/album/fotos/' . $filename);
                $foto->gbr = $filename;
            }
            $foto->title = $request->title;
            $foto->album_id = $request->album;
            $foto->url_video = $request->video;
            $foto->save();
            Session::flash('sukses', 'Photos updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e);
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $avatar = Foto::where('id', $id)->first();
        File::delete('images/foto/album/fotos/' . $avatar->gbr);

        $avatar->delete();
        return redirect()->back()->with('sukses', 'Photo deleted successfully');
    }
}
