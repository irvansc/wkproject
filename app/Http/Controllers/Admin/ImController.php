<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Im;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
                File::delete('images/foto/web/' . $top->img);
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(807, 199);
                $image_resize->save('images/foto/web/' . $filename);
                $top->img = $filename;
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
