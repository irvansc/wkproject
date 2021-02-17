<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'kategori';
        $kategories = Category::all();
        return view('admin.backend.kategori.index', compact('title', 'kategories'));
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
        $category = $request->validate([
            'name' => 'required|unique:categories,name|max:100',
        ], [
            'name.required' => 'Nama Kategori Tidak Boleh kosong',
            'name.unique' => 'Nama Kategori sudah ada',
            'name.max' => 'Nama Kategori terlalu panjang',
        ]);
        $category = new Category();

        $category->name = $request->name;
        $category->alias = Str::slug($request->name);

        $category->save();

        Cache::forget('category');
        return redirect()->back()->with('sukses', 'Kategori Berhasil dibuat');
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
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);

        if ($category->name != $request->name) {
            $request->validate([
                'name' => 'unique:categories'
            ], [
                'name' => 'Nama Kategori sudah ada!'
            ]);
        }

        $category->name = $request->name;

        $category->save();
        return redirect()->back()->with('sukses', 'Kategori Berhasil dibuat');
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
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('sukses', 'Kategori Berhasil di hapus');
    }
}
