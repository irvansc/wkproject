<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ph;
use Illuminate\Http\Request;

class PhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pengumuman Harian';
        $pengha = Ph::get();
        return view('admin.backend.ph.index', compact('title', 'pengha'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $ph = new Ph;
        $request->validate([
            'body' => 'required|max:255'
        ]);
        $ph['body'] = $request->body;
        $ph->save();
        return redirect()->back()->with('sukses', 'Pengumuman harian added successfuly');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $title = 'Edit';
        $ph = Ph::findOrFail($id);
        return view('admin.backend.ph.edit', compact('title', 'ph'));
    }


    public function update(Request $request, $id)
    {
        $kelas = Ph::findOrFail($id);
        $kelas->body = $request->body;
        $kelas->save();
        return redirect()->route('ph.index')->with('sukses', 'Pengumuman Harian updated successfully');
    }


    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $avatar = Ph::where('id', $id)->first();
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Pengumuman Harian deleted successfully');
    }
}