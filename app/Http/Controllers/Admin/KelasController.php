<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Str;

class KelasController extends Controller
{
    public function index()
    {
        $title = 'Kelas';
        $kelass = Kelas::get();
        return view('admin.backend.kelas.index', compact('title', 'kelass'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas'
        ], [
            'nama_kelas.required' => 'Nama kelas wajib di isi !',
            'nama_kelas.unique' => 'Maaf nama kelas sudah ada'
        ]);

        $kelas = new Kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->keterangan = $request->keterangan;
        $kelas->alias = Str::slug($request->nama_kelas);
        $kelas->save();
        return redirect()->back()->with('sukses', 'Kelas berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas'
        ], [
            'nama_kelas.required' => 'Nama kelas wajib di isi !',
            'nama_kelas.unique' => 'Maaf nama kelas sudah ada'
        ]);

        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->keterangan = $request->keterangan;

        $kelas->save();
        return redirect()->back()->with('sukses', 'Kelas berhasil diupdate');
    }
    public function delete($id)
    {
        $avatar = Kelas::where('id', $id)->first();
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Data Kelas Berhasil Dihapus');
    }
}