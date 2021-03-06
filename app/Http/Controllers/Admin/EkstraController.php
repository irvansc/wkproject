<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ektra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            ],
            ['nama.required' => 'nama wajib diisi!']
        );
        $ektra = new Ektra;
        $ektra->nama = $request->nama;
        $ektra->keterangan = $request->keterangan;
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

            $ekstra->nama = $request->nama;
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
        $ekstra->delete();
        return redirect()->back()->with('sukses', 'Extracurricular has been successfully removed');
    }
}