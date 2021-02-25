<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{

    public function index()
    {
        $title = 'kontak';
        $kontaks = Kontak::all();
        return view('admin.backend.kontak.index', compact('title', 'kontaks'));
    }
    public function edit($id)
    {
        $publikasi = Kontak::findorFail($id);
        $publikasi->status = '1';
        $publikasi->update();
        return redirect()->back()->with('sukses', 'Pesan sudah dibaca');
    }

    public function delete($id)
    {
        $comment = Kontak::find($id);
        $comment->delete();
        return redirect()->back()->with('sukses', 'Pesan berhasil dihapus');
    }
}
