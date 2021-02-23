<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pengumuman';
        $pengumuman = Pengumuman::get();
        return view('admin.backend.pengumuman.index', compact('title', 'pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Pengumuman';
        return view('admin.backend.pengumuman.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengumuman = new Pengumuman;
        $pengumuman->title = $request->title;
        $pengumuman->body = $request->body;
        $pengumuman->user_id = Auth::id();

        $pengumuman->save();
        return redirect('apengumuman')->with('sukses', 'Penguman berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Pengumuman';
        $p = Pengumuman::findOrFail($id);
        return view('admin.backend.pengumuman.edit', compact('title', 'p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->title = $request->title;
        $pengumuman->body = $request->body;
        $pengumuman->user_id = Auth::id();

        $pengumuman->save();
        return redirect('apengumuman')->with('sukses', 'Penguman berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        //
    }
    public function delete($id)
    {
        Pengumuman::where('id', $id)->delete();

        return redirect('apengumuman')->with('sukses', 'Pengumuman berhasil dihapus');
    }
}
