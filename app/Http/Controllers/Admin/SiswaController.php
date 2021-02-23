<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Image;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Siswa';
        $siswass = Siswa::get();
        $kelas = Kelas::get();
        return view('admin.backend.siswa.index', compact('title', 'siswass', 'kelas'));
    }
    public function data(Request $request)
    {
        $orderBy = 'siswa.id';
        switch ($request->input('order.0.dir')) {

            case "1":
                $orderBy = 'siswa.nis';
                break;
            case "2":
                $orderBy = 'siswa.nama';
                break;
            case "3":
                $orderBy = 'siswa.jenkel';
                break;
            case "4":
                $orderBy = 'kelas.nama_kelas';
                break;
        }
        // dd($request->input('order.0.dir'));
        $data = Siswa::select([
            'siswa.*',
            'kelas.nama_kelas as kelas',
        ])
            ->join('kelas', 'kelas.id', '=', 'siswa.kelas_id');

        if ($request->input('search.value') != null) {
            $data = $data->where(function ($q) use ($request) {
                $q->whereRaw('LOWER(siswa.id) like ? ', ['%' . strtolower($request->input('search.value')) . '%'])
                    ->orWhereRaw('LOWER(siswa.nis) like ? ', ['%' . strtolower($request->input('search.value')) . '%'])
                    ->orWhereRaw('LOWER(siswa.nama) like ? ', ['%' . strtolower($request->input('search.value')) . '%'])
                    ->orWhereRaw('LOWER(kelas.nama_kelas) like ? ', ['%' . strtolower($request->input('search.value')) . '%']);
            });
        }

        if ($request->input('kelas') != null) {
            $data = $data->where('kelas_id', $request->kelas);
        }
        // if ($request->input('prodi') != null) {
        //     $data = $data->where('prodi_id', $request->prodi);
        // }
        $recordsFiltered = $data->get()->count();
        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy, $request->input('order.0.dir'))->get();
        $recordsTotal = $data->count();
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'create siswa';
        $kelas = Kelas::all();
        return view('admin.backend.siswa.create', compact('title', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required'
        ], [

            'nis.required' => 'Nis Wajib diisi',
            'nis.unique' => 'Nis sudah ada',
            'nama.required' => 'Nama wajib diisi'
        ]);
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $Filename = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(750, 750);
            $image_resize->save(public_path('siswa_photo/' . $Filename));
            // $location = public_path('guru_photo' . $image_resize);
            // $file->move($location, $Filename);
            // $siswa->photo = $Filename;
        }
        $siswa = new Siswa;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->kelas_id = $request->kelas;
        $siswa->jenkel = $request->jenkel;
        $siswa->alamat = $request->alamat;
        $siswa->telp = $request->telp;
        $siswa->photo = $Filename;
        $siswa->save();
        return redirect('asiswa')->with('sukses', 'Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Siswa';
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        return view('admin.backend.siswa.edit', compact('title', 'siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->kelas_id = $request->kelas;
        $siswa->jenkel = $request->jenkel;
        $siswa->alamat = $request->alamat;
        $siswa->telp = $request->telp;
        $old_image = $request->hidden_file;
        $file = $request->file('photo');
        if ($file != '') {
            $file_name = $old_image;
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(750, 750);
            $image_resize->save(public_path('siswa_photo/' . $file_name));
            // $file->move(public_path('guru_photo'), $file_name);
        } else {
            $file_name = $old_image;
        }
        $siswa->save();
        return redirect('asiswa')->with('sukses', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $avatar = Siswa::where('id', $id)->first();
        File::delete('siswa_photo/' . $avatar->photo);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
