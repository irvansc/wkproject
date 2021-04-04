<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Str;

class KelasController extends Controller
{
    public function index()
    {
        abort(404);
    }


    public function create()
    {
        abort(404);
    }


    public function store(Request $request)
    {
        abort(404);
    }


    public function show($alias)
    {
        $title = 'Siswa kelas';
        $kelas = Kelas::where('alias', Str::slug($alias))
            ->firstOrFail();
        $siswas = Kelas::find($kelas->id)
            ->siswa()
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('frontend.siswa.index', compact('title', 'siswas'));
    }


    public function edit($id)
    {
        abort(404);
    }


    public function update(Request $request, $id)
    {
        abort(404);
    }

    public function destroy($id)
    {
        abort(404);
    }
}