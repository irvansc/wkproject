<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SejarahController extends Controller
{

    public function index()
    {
        $title = 'Sejarah';
        $sj = DB::table('sejarah')->first();
        return view('admin.backend.sejarah.index', compact('title', 'sj'));
    }

    public function update(Request $request, $id)
    {
        $sj = Sejarah::find($id);
        $sj->title = $request->title;
        $sj->deskripsi = $request->deskripsi;
        $sj->save();
        return redirect()->back()->with('sukses', 'Data berhasil diupdate');
    }
}
