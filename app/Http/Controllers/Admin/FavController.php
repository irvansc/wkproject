<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Fav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FavController extends Controller
{

    public function index()
    {
        $title = 'Favicon';
        $fav = Fav::get();
        return view('admin.backend.fav.index', compact('title', 'fav'));
    }


    public function update(Request $request, $id)
    {
        try {
            $fav = Fav::findOrFail($id);
            if ($request->file('favicon')) {
                Storage::disk('local')->delete('public/images/web_foto/' . $fav->favicon);
                $file = $request->file('favicon');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $resize = Image::make($file)->resize(134, 134, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('Png');
                $image = $fileNameToStore;
                $save = Storage::put("public/images/web_foto/{$fileNameToStore}", $resize->__toString());
                $fav->favicon = $image;
            }
            $fav->title = $request->title;
            $fav->save();
            Session::flash('sukses', 'Favicon successfully updated');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            //throw $th;
        }
        return redirect()->back();
    }
}
