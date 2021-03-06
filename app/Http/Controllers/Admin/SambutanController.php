<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Sambutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SambutanController extends Controller
{
    public function index()
    {
        $title = 'sambutan';
        $sambutan = DB::table('sambutan')->first();
        return view('admin.backend.sambutan.index', compact('title', 'sambutan'));
    }
    public function update(Request $request, $id)
    {
        $sambutan = Sambutan::findOrFail($id);
        $request->validate([
            'photo' => 'image|mimes:png,jpg,jpeg'
        ]);


        if ($request->file('photo')) {
            File::delete('images/' . $sambutan->photo);
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(600, 600);
            $image_resize->save('images/' . $filename);
            $sambutan->photo = $filename;
        }
        $sambutan->title = $request->title;
        $sambutan->deskripsi = $request->deskripsi;
        $sambutan->save();
        Session::flash('sukses', 'Sambutan updated successfully');

        return redirect('/sambutan');
    }
}