<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Vm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VmController extends Controller
{

    public function index()
    {
        $title = 'Visi-Misi';
        $vm = DB::table('vimi')->first();
        return view('admin.backend.vm.index', compact('title', 'vm'));
    }

    public function update(Request $request, $id)
    {
        $vm = Vm::find($id);
        $vm->visi = $request->visi;
        $vm->misi = $request->misi;
        $vm->tujuan = $request->tujuan;
        $vm->save();
        return redirect()->back()->with('sukses', 'Berhasil Update');
    }
}
