<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Testimoni';
        $testimoni = Testimonial::all();
        return view('admin.backend.testimoni.index', compact('title', 'testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'mimes:jpg,jpeg,png,tif,svg'
        ]);
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $File_name = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('testimoni_foto/' . $File_name));
        }
        $foto = new Testimonial;
        $foto->nama = $request->nama;
        $foto->ket = $request->ket;
        $foto->pesan = $request->pesan;
        $foto->foto = $File_name;

        $foto->save();
        Session::flash('sukses', 'Testimoni berhasil dipost');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about = Testimonial::findOrFail($id);
        $request->validate([
            'foto' => 'mimes:jpg,jpeg,png,tif,svg'
        ]);
        $file_name = $about->foto;
        $file_path = public_path('testimoni_foto/' . $file_name);
        if ($request->hasFile('foto')) {
            unlink($file_path);
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('testimoni_foto/' . $filename));
        }
        $about->foto = $filename;
        $about->nama = $request->nama;
        $about->ket = $request->ket;
        $about->pesan = $request->pesan;

        $about->save();
        Session::flash('sukses', 'Testimoni berhasil diupdate');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $avatar = Testimonial::where('id', $id)->first();
        File::delete('testimoni_foto/' . $avatar->foto);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Testimoni Berhasil Dihapus');
    }
}
