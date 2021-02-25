<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Fav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
            $image = Fav::findOrFail($id);
            $file_name = $image->favicon;
            $file_path = public_path('web_photo/' . $file_name);
            if ($request->hasFile('favicon')) {
                unlink($file_path);
                $file = $request->file('favicon');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $location = public_path('/web_photo');
                $file->move($location, $filename);
                $image->favicon = $filename;
            }
            $image->title = $request->title;
            $image->save();
            Session::flash('sukses', 'Image Berhasil diUpdate');
        } catch (\Exception $e) {
            Session::flash('error', $e);
            //throw $th;
        }
        return redirect()->back();
    }
}
