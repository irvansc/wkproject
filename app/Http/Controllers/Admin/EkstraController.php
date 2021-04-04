<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ektra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class EkstraController extends Controller
{
    public function index()
    {
        $title = 'Ektrakulikuler';
        $ektra = Ektra::all();
        return view('admin.backend.ektra.index', compact('title', 'ektra'));
    }
    public function create()
    {
        abort(404);
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'img' => 'image|mimes:png,jpg,jpeg',
            ],
            ['nama.required' => 'nama wajib diisi!']
        );
        $ektra = new Ektra;
        $ektra->nama = $request->nama;
        $ektra->status = $request->status;
        $ektra->keterangan = $request->keterangan;
        if ($request->file('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(1024, 768);
            $image_resize->save('images/foto/ekstra/' . $filename);
        }
        $ektra->img = $filename;
        $ektra->save();
        Session::flash('suskes', 'Extracurricular has been successfully added');

        return redirect()->back();
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
            $ekstra = Ektra::findOrFail($id);
            $request->validate([
                // 'title' => 'required',
                'img' => 'image|mimes:png,jpg,jpeg',
            ]);
            if ($request->file('img')) {
                File::delete('images/foto/ekstra/' . $ekstra->img);
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(1024, 768);
                $image_resize->save('images/foto/ekstra/' . $filename);
                $ekstra->img = $filename;
            }
            $ekstra->nama = $request->nama;
            $ekstra->status = $request->status;
            $ekstra->keterangan = $request->keterangan;
            $ekstra->save();
            Session::flash('sukses', 'Extracurricular successfully edited');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->back();
    }
    public function destroy($id)
    {
        abort(404);
    }
    public function delete($id)
    {
        $ekstra = Ektra::find($id);
        File::delete('images/foto/ekstra/' . $ekstra->img);
        $ekstra->delete();
        return redirect()->back()->with('sukses', 'Extracurricular has been successfully removed');
    }
}