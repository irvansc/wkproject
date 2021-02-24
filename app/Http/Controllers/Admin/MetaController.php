<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title  = 'Meta';
        $metas = Meta::get();
        return view('admin.backend.meta.index', compact('title', 'metas'));
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
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function show(Meta $meta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function edit(Meta $meta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $meta = Meta::findOrFail($id);
            $request->validate([
                'description' => 'required',
                'keywords' => 'required',
                'author' => 'required',
            ]);

            $meta->description = $request->description;
            $meta->keywords = $request->keywords;
            $meta->author = $request->author;
            $meta->save();
            Session::flash('sukses', 'Meta berhasil diupdate');
        } catch (\Exception $e) {
            Session::flash('error', $e);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meta $meta)
    {
        //
    }
}
