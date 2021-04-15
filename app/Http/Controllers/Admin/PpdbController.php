<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Str;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'PPDB';
        $ppdb = Ppdb::get();
        return view('admin.backend.ppdb.index', compact('ppdb', 'title'));
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
        $ppdb = Ppdb::find($id);
        $ppdb['title'] = $request->title;
        $ppdb['alias'] = Str::slug($request->title);
        $ppdb['body'] = $request->body;

        $ppdb->save();
        return redirect()->back()->with('sukses', 'PPDB Updated Successfuly');
    }

    public function statusAktif(Request $request, $id)
    {
        $publikasi = Ppdb::findorFail($id);
        $publikasi->aktif = '1';
        $publikasi->update();
        return redirect()->back()->with('sukses', 'PPDB Diaktifkan');
    }
    public function statusNon(Request $request, $id)
    {
        $publikasi = Ppdb::findorFail($id);
        $publikasi->aktif = '0';
        $publikasi->update();
        return redirect()->back()->with('sukses', 'PPDB Di Non-Aktifkan');
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
}