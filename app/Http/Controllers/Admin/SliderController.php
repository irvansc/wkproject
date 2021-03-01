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

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(1920, 1080);
                $image_resize->save('images/foto/web/' . $filename);
            }
            $post->img = $filename;
            $post->save();
            Session::flash('sukses', 'Slider created successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('slider.index');
    }

    public function show(Slider $slider)
    {
        abort(404);
    }

    public function edit($id)
    {
        $title = 'edit Slider';
        $a = Slider::find($id);
        return view('admin.backend.slider.edit', compact('title', 'a'));
    }


    public function update(Request $request, $id)
    {
        try {
            $sldier = Slider::findOrFail($id);
            if ($request->file('img')) {
                File::delete('images/foto/web/' . $sldier->img);
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(1920, 1080);
                $image_resize->save('images/foto/web/' . $filename);
                $sldier->img = $filename;
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
        File::delete('images/foto/web/' . $avatar->img);

        $avatar->delete();
        return redirect()->back()->with('sukses', 'slider Berhasil Dihapus');
    }
}
