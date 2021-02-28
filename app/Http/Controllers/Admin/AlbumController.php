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
                // Get file from request
                $file = $request->file('cover');
                // Get filename with extension
                $filenameWithExt = $file->getClientOriginalName();
                // Get file path
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Remove unwanted characters
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                // Get the original image extension
                $extension = $file->getClientOriginalExtension();
                // Create unique file name
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Resize image
                $resize = Image::make($file)->resize(500, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                $image = $fileNameToStore;
                // Put image to storage
                $save = Storage::put("public/images/album/{$fileNameToStore}", $resize->__toString());
                $album->cover = $image;
            }

            $album->save();
            Session::flash('sukses', 'Album created successfully');
        } catch (\Exception $e) {
            Session::flash('sukses', $e->getMessage());
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
                Storage::disk('local')->delete('public/images/album/' . $album->cover);
                $file = $request->file('cover');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $resize = Image::make($file)->resize(500, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                $image = $fileNameToStore;
                $save = Storage::put("public/images/album/{$fileNameToStore}", $resize->__toString());
                $album->cover = $image;
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
        Storage::disk('local')->delete('public/images/album/' . $avatar->cover);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Album deleted successfully');
    }
}
