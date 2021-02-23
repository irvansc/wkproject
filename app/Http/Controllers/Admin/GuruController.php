<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Guru';
        $gurus = Guru::get();
        $kelas = Kelas::get();
        return view('admin.backend.guru.index', compact('title', 'gurus', 'kelas'));
    }
    public function data(Request $request)
    {
        $orderBy = 'guru.id';
        switch ($request->input('order.0.dir')) {

            case "1":
                $orderBy = 'guru.nip';
                break;
            case "2":
                $orderBy = 'guru.nama_guru';
                break;
            case "3":
                $orderBy = 'guru.jenkel';
                break;
            case "4":
                $orderBy = 'guru.mapel';
                break;
            case "5":
                $orderBy = 'kelas.nama_kelas';
                break;
        }
        // dd($request->input('order.0.dir'));
        $data = Guru::select([
            'guru.*',
            'kelas.nama_kelas as kelas',
        ])
            ->join('kelas', 'kelas.id', '=', 'guru.kelas_id');

        if ($request->input('search.value') != null) {
            $data = $data->where(function ($q) use ($request) {
                $q->whereRaw('LOWER(guru.id) like ? ', ['%' . strtolower($request->input('search.value')) . '%'])
                    ->orWhereRaw('LOWER(guru.nip) like ? ', ['%' . strtolower($request->input('search.value')) . '%'])
                    ->orWhereRaw('LOWER(guru.nama_guru) like ? ', ['%' . strtolower($request->input('search.value')) . '%'])
                    ->orWhereRaw('LOWER(guru.mapel) like ? ', ['%' . strtolower($request->input('search.value')) . '%'])
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
        $title = 'Create Guru';
        $kelas = Kelas::all();
        return view('admin.backend.guru.create', compact('title', 'kelas'));
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
            'nip' => 'unique:guru,nip',
            'nama_guru' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenkel' => 'required',
        ], [

            'nip.unique' => 'Nip sudah ada',
            'nama_guru.required' => 'Nama wajib diisi',
            'tmp_lahir.required' => 'Tempat lahir wajib diisi',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi',
            'jenkel.required' => 'Jenis Kelamin wajib diisi',
        ]);
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $Filename = time() . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(750, 750);
            $image_resize->save(public_path('guru_photo/' . $Filename));
            // $location = public_path('guru_photo' . $image_resize);
            // $file->move($location, $Filename);
            // $siswa->photo = $Filename;
        }
        $siswa = new Guru;
        $siswa->nip = $request->nip;
        $siswa->nama_guru = $request->nama_guru;
        $siswa->kelas_id = $request->kelas;
        $siswa->jenkel = $request->jenkel;
        $siswa->alamat = $request->alamat;
        $siswa->telp = $request->telp;
        $siswa->tmp_lahir = $request->tmp_lahir;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->mapel = $request->mapel;
        $siswa->photo = $Filename;

        $siswa->save();
        return redirect('aguru')->with('sukses', 'Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit guru';
        $guru = Guru::find($id);
        $kelas = Kelas::all();
        return view('admin.backend.guru.edit', compact('title', 'guru', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Guru::findOrFail($id);
        $siswa->nip = $request->nip;
        $siswa->nama_guru = $request->nama_guru;
        $siswa->kelas_id = $request->kelas;
        $siswa->jenkel = $request->jenkel;
        $siswa->alamat = $request->alamat;
        $siswa->telp = $request->telp;
        $siswa->tmp_lahir = $request->tmp_lahir;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->mapel = $request->mapel;
        $old_image = $request->hidden_file;
        $file = $request->file('photo');
        if ($file != '') {
            $file_name = $old_image;
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(750, 750);
            $image_resize->save(public_path('guru_photo/' . $file_name));
            // $file->move(public_path('guru_photo'), $file_name);
        } else {
            $file_name = $old_image;
        }
        $siswa->save();
        return redirect('aguru')->with('sukses', 'Data berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $avatar = Guru::where('id', $id)->first();
        File::delete('guru_photo/' . $avatar->photo);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
