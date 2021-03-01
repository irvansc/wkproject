<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AlbumController extends Controller
{

    public function index()
    {
        $title = 'Album';
        $albums = Album::get();
        return view('admin.backend.album.index', compact('title', 'albums'));
    }

    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'cover' => 'image|mimes:jpg,jpeg,png'
            ]);
            $album = new Album;
            $album->nama = $request->nama;
            $album->user_id = Auth::id();
            if ($request->file('cover')) {
                $file = $request->file('cover');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(600, 600);
                $image_resize->save('images/foto/album/' . $filename);
            }
            $album->cover = $filename;
            $album->save();
            Session::flash('sukses', 'Album created successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->back();
    }

    public function show(Album $album)
    {
        abort(404);
    }

    public function edit(Album $album)
    {
        abort(404);
    }

    public function update(Request $request, $id)
    {
        try {
            $album = Album::findOrFail($id);
            $request->validate([
                'cover' => 'image|mimes:jpg,jpeg,png'
            ]);
            if ($request->file('cover')) {
                File::delete('images/foto/album/' . $album->cover);
                $file = $request->file('cover');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(600, 600);
                $image_resize->save('images/foto/album/' . $filename);
                $album->cover = $filename;
            }
            $album->nama = $request->nama;
            $album->save();
            Session::flash('sukses', 'The album was updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->back();
    }


    public function delete($id)
    {
        $avatar = Album::where('id', $id)->first();
        File::delete('images/foto/album/' . $avatar->cover);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Album deleted successfully');
    }
}
