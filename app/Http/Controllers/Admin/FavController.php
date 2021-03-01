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
                $file = $request->file('favicon');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(134, 134);
                $image_resize->save('images/foto/web/' . $filename);
            }
            $fav->favicon = $filename;
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
