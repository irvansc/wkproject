<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class JurusanController extends Controller
{

    public function index()
    {
        $title = 'Jurusan';
        $jurusan = Jurusan::get();
        return view('admin.backend.jurusan.index', compact('title', 'jurusan'));
    }


    public function create(Request $request)
    {
        $title  = 'Create Jurusan';
        // $jurusan = Jurusan::find($id);
        return view('admin.backend.jurusan.create', compact('title'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'img' => 'image|mimes:png,jpg,jpeg',

        ], [
            'img.image' => 'image tidak valid',
            'title.required' => 'Jurusan wajib di isi !',
        ]);

        $jurusan = new Jurusan;
        $jurusan->title = $request->title;
        $jurusan->ket = $request->ket;
        if ($request->file('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(1024, 768);
            $image_resize->save('images/foto/jurusan/' . $filename);
        }
        $jurusan->img = $filename;
        $jurusan->save();
        return redirect()->route('ajurusan.index')->with('sukses', 'Jurusan Has been Created');
    }


    public function show($id)
    {
        abort(404);
    }


    public function edit($id)
    {
        $title = 'Edit Jurusan';
        $j = Jurusan::findOrFail($id);
        return view('admin.backend.jurusan.edit', compact('title', 'j'));
    }


    public function update(Request $request, $id)
    {
        $kelas = Jurusan::findOrFail($id);
        $request->validate([
            // 'title' => 'required',
            'img' => 'image|mimes:png,jpg,jpeg',

        ], [
            // 'title.required' => 'Jurusan wajib di isi !',
            'img.image' => 'image tidak valid'
        ]);
        if ($request->file('img')) {
            File::delete('images/foto/jurusan/' . $kelas->img);
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(1024, 768);
            $image_resize->save('images/foto/jurusan/' . $filename);
            $kelas->img = $filename;
        }
        $kelas->title = $request->title;
        $kelas->ket = $request->ket;
        $kelas->save();
        return redirect()->route('ajurusan.index')->with('sukses', 'Jurusan updated successfully');
    }


    public function delete($id)
    {
        $avatar = Jurusan::where('id', $id)->first();
        File::delete('images/foto/jurusan/' . $avatar->img);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Jurusan berhasil dihapus');
    }
}