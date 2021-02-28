<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $title = 'slider';
        $slider = Slider::get();
        return view('admin.backend.slider.index', compact('slider', 'title'));
    }

    public function create()
    {
        $title = 'create slider';
        return view('admin.backend.slider.create', compact('title'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'deskripsi' => 'required',
                'img' => 'image|mimes:jpg,jpeg,png'
            ]);
            $post = new Slider;
            $post->title = $request->title;
            $post->deskripsi = $request->deskripsi;

            if ($request->file('img')) {
                // Get file from request
                $file = $request->file('img');
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
                $resize = Image::make($file)->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                $image = $fileNameToStore;
                // Put image to storage
                $save = Storage::put("public/images/web_foto/{$fileNameToStore}", $resize->__toString());
                $post->img = $image;
            }

            $post->save();
            Session::flash('sukses', 'Slider created successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'edit Slider';
        $a = Slider::find($id);
        return view('admin.backend.slider.edit', compact('title', 'a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $sldier = Slider::findOrFail($id);
            if ($request->file('img')) {
                Storage::disk('local')->delete('public/images/web_foto/' . $sldier->img);
                $file = $request->file('img');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $resize = Image::make($file)->resize(1920, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                $image = $fileNameToStore;
                $save = Storage::put("public/images/web_foto/{$fileNameToStore}", $resize->__toString());
                $sldier->img = $image;
            }
            $sldier->title = $request->title;
            $sldier->deskripsi = $request->deskripsi;
            $sldier->save();
            Session::flash('sukses', 'Slider Updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('slider.index');
    }

    public function delete($id)
    {
        $avatar = Slider::where('id', $id)->first();
        Storage::disk('local')->delete('public/images/web_foto/' . $avatar->img);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'slider Berhasil Dihapus');
    }
}
