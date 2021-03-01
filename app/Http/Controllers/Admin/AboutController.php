<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
            File::delete('images/' . $about->photo);
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(600, 600);
            $image_resize->save('images/' . $filename);
            $about->photo = $filename;
        }
        $about->title = $request->title;
        $about->deskripsi = $request->deskripsi;
        $about->save();
        Session::flash('sukses', 'About updated successfully');

        return redirect('/aabout');
    }
}
