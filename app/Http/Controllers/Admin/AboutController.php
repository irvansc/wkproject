<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function index()
    {
        $title = 'About';
        $about = DB::table('about')->first();
        return view('admin.backend.about.index', compact('title', 'about'));
    }
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $request->validate([
            'photo' => 'image|mimes:png,jpg,jpeg'
        ]);
        if ($request->file('photo')) {
            Storage::disk('local')->delete('public/images/' . $about->photo);
            $file = $request->file('photo');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $resize = Image::make($file)->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
            $image = $fileNameToStore;
            $save = Storage::put("public/images/{$fileNameToStore}", $resize->__toString());
            $about->photo = $image;
        }
        $about->title = $request->title;
        $about->deskripsi = $request->deskripsi;
        $about->save();
        Session::flash('sukses', 'About updated successfully');

        return redirect('/aabout');
    }
}
