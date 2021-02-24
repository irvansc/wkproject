<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'About';
        $about = DB::table('about')->first();
        return view('admin.backend.about.index', compact('title', 'about'));
    }
    public function edit($id)
    {
        $title = 'Edit About';
        $about = About::find($id);
        return view('admin.backend.about.edit', compact('title', 'about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $request->validate([
            'photo' => 'image|mimes:png,jpg,jpeg'
        ]);
        $file_name = $about->photo;
        $file_path = public_path('web_photo/' . $file_name);
        if ($request->hasFile('photo')) {
            unlink($file_path);
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(500, 400);
            $image_resize->save(public_path('web_photo/' . $filename));
            $about->photo = $filename;
        }
        $about->title = $request->title;
        $about->deskripsi = $request->deskripsi;

        $about->save();
        Session::flash('sukses', 'About berhasil diupdate');

        return redirect('/aabout');
    }
}
