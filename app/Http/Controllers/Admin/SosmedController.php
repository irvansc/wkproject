<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{

    public function index()
    {
        $title = 'Sosial media';
        $sosmed = Sosmed::get();
        return view('admin.backend.sosmed.index', compact('title', 'sosmed'));
    }
    public function update(Request $request, $id)
    {
        $sosmed  = Sosmed::findOrFail($id);
        $sosmed->fb = $request->fb;
        $sosmed->ig = $request->ig;
        $sosmed->twitter = $request->twitter;
        $sosmed->save();
        return redirect()->back()->with('sukses', 'Data berhasil diUpdate');
    }
}
