<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Foot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FootController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Profile';
        $foot = DB::table('foot')->first();
        return view('admin.backend.foot.index', compact('title', 'foot'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Foot  $foot
     * @return \Illuminate\Http\Response
     */
    public function show(Foot $foot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Foot  $foot
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Profile';
        $f = Foot::find($id);
        return view('admin.backend.foot.edit', compact('title', 'f'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foot  $foot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $f = Foot::findOrFail($id);
            $f->alamat = $request->alamat;
            $f->email = $request->email;
            $f->phone = $request->phone;
            $f->maps = $request->maps;
            $f->save();
            Session::flash('sukses', 'Data berhasil diUpdate');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect('/aprofile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foot  $foot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foot $foot)
    {
        //
    }
}
