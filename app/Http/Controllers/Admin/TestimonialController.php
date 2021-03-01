<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{

    public function index()
    {
        $title = 'Testimoni';
        $testimoni = Testimonial::all();
        return view('admin.backend.testimoni.index', compact('title', 'testimoni'));
    }
    public function create()
    {
        abort(404);
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'foto' => 'image|mimes:png,jpg,jpeg,svg'
            ]);

            $testimoni = new Testimonial;
            $testimoni->nama = $request->nama;
            $testimoni->ket = $request->ket;
            $testimoni->pesan = $request->pesan;
            if ($request->file('foto')) {
                $file = $request->file('foto');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, 400);
                $image_resize->save('images/foto/testi/' . $filename);
            }
            $testimoni->foto = $filename;
            $testimoni->save();
            Session::flash('sukses', 'Testimonial successfully created');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->back();
    }
    public function show(Testimonial $testimonial)
    {
        abort(404);
    }
    public function edit(Testimonial $testimonial)
    {
        abort(404);
    }
    public function update(Request $request, $id)
    {
        try {
            $testimoni = Testimonial::findOrFail($id);
            $request->validate([
                'foto' => 'image|mimes:jpg,jpeg,png,tif,svg'
            ]);
            if ($request->file('foto')) {
                File::delete('images/foto/testi/' . $testimoni->foto);
                $file = $request->file('foto');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(400, 400);
                $image_resize->save('images/foto/testi/' . $filename);
                $testimoni->foto = $filename;
            }
            $testimoni->nama = $request->nama;
            $testimoni->ket = $request->ket;
            $testimoni->pesan = $request->pesan;
            $testimoni->save();
            Session::flash('sukses', 'Testimonial updated successfully');
        } catch (\Exception $e) {
            Session::flash('errot', $e->getMessage());
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        $avatar = Testimonial::where('id', $id)->first();
        File::delete('images/foto/testi/' . $avatar->foto);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Testimoni Berhasil Dihapus');
    }
}
