<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Im;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImController extends Controller
{

    public function index()
    {
        $title = 'Favicon';
        $ims = Im::get();
        return view('admin.backend.im.index', compact('title', 'ims'));
    }

    public function update(Request $request, $id)
    {
        try {
            $top = Im::findOrFail($id);
            if ($request->file('img')) {
                Storage::disk('local')->delete('public/images/web_foto/' . $top->img);
                $file = $request->file('img');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $resize = Image::make($file)->resize(807, 199, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('Png');
                $image = $fileNameToStore;
                $save = Storage::put("public/images/web_foto/{$fileNameToStore}", $resize->__toString());
                $top->img = $image;
            }
            $top->title = $request->title;
            $top->save();
            Session::flash('sukses', 'Image Berhasil diUpdate');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            //throw $th;
        }
        return redirect()->back();
    }
}
