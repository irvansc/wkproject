<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Image;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Foto';
        $fotos = Foto::get();
        $albums = Album::all();
        return view('admin.backend.album.foto.index', compact('title', 'fotos', 'albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'gbr' => 'image|mimes:png,jpg,jpeg'
        ]);
        if ($request->file('gbr')) {
            $file = $request->file('gbr');
            $File_name = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(500, 400);
            $image_resize->save(public_path('album_foto/foto/' . $File_name));
        }
        $foto = new Foto;
        $foto->title = $request->title;
        $foto->url_video = $request->video;
        $foto->album_id = $request->album;
        $foto->gbr = $File_name;
        $foto->user_id = Auth::id();

        $foto->save();
        Session::flash('sukses', 'Foto berhasil dipost');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $foto = Foto::findOrFail($id);
            $request->validate([
                'gbr' => 'image|mimes:png,jpg,jpeg'
            ]);
            $file_name = $foto->gbr;
            $file_path = public_path('album_foto/foto/' . $file_name);
            if ($request->hasFile('gbr')) {
                unlink($file_path);
                $file = $request->file('gbr');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(500, 400);
                $image_resize->save(public_path('album_foto/foto/' . $filename));
                $foto->gbr = $filename;
            }
            $foto->title = $request->title;
            $foto->album_id = $request->album;
            $foto->url_video = $request->video;
            $foto->save();
            Session::flash('sukses', 'Foto berhasil diupdate');
        } catch (\Exception $e) {
            Session::flash('error', $e);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $avatar = Foto::where('id', $id)->first();
        File::delete('album_foto/foto/' . $avatar->gbr);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Foto Berhasil Dihapus');
    }
}
