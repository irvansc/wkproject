<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'slider';
        $slider = Slider::get();
        return view('admin.backend.slider.index', compact('slider', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'create slider';
        return view('admin.backend.slider.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $post = $request->validate([
                'title' => 'required',
                'deskripsi' => 'required',
                'img' => 'image|mimes:jpg,jpeg'
            ]);
            $post = new Slider;
            $post->title = $request->title;
            $post->deskripsi = $request->deskripsi;
            if ($request->file('img')) {
                $file = $request->file('img');
                $Filename = time() . '.' . $file->getClientOriginalExtension();
                $location = public_path('/web_photo');
                $file->move($location, $Filename);
                $post->img = $Filename;
            }
            $post->save();
            return redirect('slider')->with('sukses', 'Slider berhasil dibuat');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
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
            $file_name = $sldier->img;
            $file_path = public_path('web_photo/' . $file_name);
            if ($request->hasFile('img')) {
                unlink($file_path);
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $location = public_path('/web_photo');
                $file->move($location, $filename);
                $sldier->img = $filename;
            }
            $sldier->title = $request->title;
            $sldier->deskripsi = $request->deskripsi;
            $sldier->save();
            return redirect('slider')->with('sukses', 'Slider Berhasil diUpdate');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $avatar = Slider::where('id', $id)->first();
        File::delete('web_photo/' . $avatar->img);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'slider Berhasil Dihapus');
    }
}
