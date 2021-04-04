<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use SebastianBergmann\Environment\Console;

class SaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Sarana';
        $sarana = Sarana::get();
        return view('admin.backend.sarana.index', compact('title', 'sarana'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'img' => 'required|image|mimes:png,jpg,jpeg',

        ], [
            'title.required' => 'Title wajib diisi',
            'img.required' => 'Image wajib diisi',
            'img.image' => 'Image tidak valid',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $sarana = new Sarana;
            $sarana->title = $request->title;
            $sarana->ket = $request->ket;
            if ($request->file('img')) {
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(1024, 768);
                $image_resize->save('images/foto/sarana/' . $filename);
            }
            $sarana->img = $filename;
            $sarana->save();
            return response()->json(['status' => 1, 'sukses' => 'Sarana Has been Createad']);
            // return redirect()->back()->with('sukses', 'Sarana Has been Createad');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $foto = Sarana::findOrFail($id);
            $request->validate([
                // 'title' => 'required',
                'img' => 'image|mimes:png,jpg,jpeg',
            ]);
            if ($request->file('img')) {
                File::delete('images/foto/sarana/' . $foto->img);
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(1024, 768);
                $image_resize->save('images/foto/sarana/' . $filename);
                $foto->img = $filename;
            }
            $foto->title = $request->title;
            $foto->ket = $request->ket;

            $foto->save();
            Session::flash('sukses', 'Sarana updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $avatar = Sarana::where('id', $id)->first();
        File::delete('images/foto/sarana/' . $avatar->img);

        $avatar->delete();
        return redirect()->back()->with('sukses', 'Sarana deleted successfully');
    }
    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        $avatar = Sarana::whereIn('id', explode(",", $ids))->first();
        File::delete('images/foto/sarana/' . $avatar->img);
        $avatar->delete();
        return response()->json(['status' => true, 'message' => "Sarana deleted successfully."]);
    }
}