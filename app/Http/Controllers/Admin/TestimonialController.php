<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Testimonial;
use Illuminate\Http\Request;
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
                // Get file from request
                $file = $request->file('foto');
                // Get filename with extension
                $filenameWithExt = $file->getClientOriginalName();
                // Get file path
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Remove unwanted characters
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                // Get the original image extension
                $extension = $file->getClientOriginalExtension();
                // Create unique file name
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Resize image
                $resize = Image::make($file)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                $image = $fileNameToStore;
                // Put image to storage
                $save = Storage::put("public/images/testimoni/{$fileNameToStore}", $resize->__toString());
                $testimoni->foto = $image;
            }
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
                Storage::disk('local')->delete('public/images/testimoni/' . $testimoni->foto);
                $file = $request->file('foto');
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
                $save = Storage::put("public/images/testimoni/{$fileNameToStore}", $resize->__toString());
                $testimoni->foto = $image;
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
        Storage::disk('local')->delete('public/images/testimoni/' . $avatar->foto);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Testimoni Berhasil Dihapus');
    }
}
