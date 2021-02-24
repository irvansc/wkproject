<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Image;

class AlbumController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Album';
        $albums = Album::get();
        return view('admin.backend.album.index', compact('title', 'albums'));
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
        $request->validate([
            'cover' => 'mimes:jpg,jpeg,png,tif,svg'
        ]);
        if ($request->file('cover')) {
            $file = $request->file('cover');
            $Filename = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(500, 400);
            $image_resize->save(public_path('album_foto/' . $Filename));
        }
        $download = new Album;
        $download->nama = $request->nama;
        $download->cover = $Filename;
        $download->user_id = Auth::id();

        $download->save();
        Session::flash('sukses', 'Album berhasil dibuat');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $foto = Album::findOrFail($id);
            $request->validate([
                'cover' => 'mimes:jpg,jpeg,png,tif,svg'
            ]);

            $file_name = $foto->cover;
            $file_path = public_path('album_foto/' . $file_name);
            if ($request->hasFile('cover')) {
                unlink($file_path);
                $file = $request->file('cover');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(500, 400);
                $image_resize->save(public_path('album_foto/' . $filename));
            }
            $foto->cover = $filename;
            $foto->nama = $request->nama;
            $foto->save();
            Session::flash('sukses', 'Album berhasil diupdate');
        } catch (\Exception $e) {
            Session::flash('error', $e);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $avatar = Album::where('id', $id)->first();
        File::delete('album_foto/' . $avatar->cover);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Album Berhasil Dihapus');
    }
}
