<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Im;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            $image = Im::findOrFail($id);
            $file_name = $image->img;
            $file_path = public_path('web_photo/' . $file_name);
            if ($request->hasFile('img')) {
                unlink($file_path);
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $location = public_path('/web_photo');
                $file->move($location, $filename);
                $image->img = $filename;
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
