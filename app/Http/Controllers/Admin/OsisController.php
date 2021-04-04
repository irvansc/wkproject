<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Osis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class OsisController extends Controller
{

    public function index()
    {
        $title = 'osis';
        $osis = DB::table('osis')->first();
        return view('admin.backend.osis.index', compact('title', 'osis'));
    }


    public function create()
    {
        abort(404);
    }


    public function store(Request $request)
    {
        abort(404);
    }


    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        abort(404);
    }

    public function update(Request $request, $id)
    {
        try {
            $foto = Osis::findOrFail($id);
            $request->validate([
                // 'title' => 'required',
                'img' => 'image|mimes:png,jpg,jpeg',
            ]);
            if ($request->file('img')) {
                File::delete('images/foto/osis/' . $foto->img);
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(1024, 768);
                $image_resize->save('images/foto/osis/' . $filename);
                $foto->img = $filename;
            }
            $foto->title = $request->title;
            $foto->ket = $request->ket;

            $foto->save();
            Session::flash('sukses', 'Osis updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->back();
    }


    public function destroy($id)
    {
        abort(404);
    }
}