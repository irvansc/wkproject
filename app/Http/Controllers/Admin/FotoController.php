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
                // Get file from request
                $file = $request->file('gbr');
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
                $save = Storage::put("public/images/foto/{$fileNameToStore}", $resize->__toString());
                $foto->gbr = $image;
            }
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
                Storage::disk('local')->delete('public/images/foto/' . $foto->gbr);
                $file = $request->file('gbr');
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
                $save = Storage::put("public/images/foto/{$fileNameToStore}", $resize->__toString());
                $foto->gbr = $image;
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
        Storage::disk('local')->delete('public/images/foto/' . $avatar->gbr);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Photo deleted successfully');
    }
}
