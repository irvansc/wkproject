<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GuruController extends Controller
{

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

    public function create()
    {
        $title = 'Create Guru';
        $kelas = Kelas::all();
        return view('admin.backend.guru.create', compact('title', 'kelas'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nip' => 'unique:guru,nip',
                'nama_guru' => 'required',
                'tmp_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jenkel' => 'required',
                'photo' => 'image|mimes:png,jpg,jpeg'
            ], [

                'nip.unique' => 'Nip sudah ada',
                'nama_guru.required' => 'Nama wajib diisi',
                'tmp_lahir.required' => 'Tempat lahir wajib diisi',
                'tgl_lahir.required' => 'Tanggal lahir wajib diisi',
                'jenkel.required' => 'Jenis Kelamin wajib diisi',
            ]);

            $guru = new Guru;
            $guru->nip = $request->nip;
            $guru->nama_guru = $request->nama_guru;
            $guru->kelas_id = $request->kelas;
            $guru->jenkel = $request->jenkel;
            $guru->alamat = $request->alamat;
            $guru->telp = $request->telp;
            $guru->tmp_lahir = $request->tmp_lahir;
            $guru->tgl_lahir = $request->tgl_lahir;
            $guru->mapel = $request->mapel;
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(600, 600);
                $image_resize->save('images/foto/guru/' . $filename);
            }
            $guru->photo = $filename;

            $guru->save();
            Session::flash('sukses', 'Teacher Successfully Added');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('aguru.index');
    }

    public function show(Guru $guru)
    {
        abort(404);
    }

    public function edit($id)
    {
        $title = 'Edit guru';
        $guru = Guru::find($id);
        $kelas = Kelas::all();
        return view('admin.backend.guru.edit', compact('title', 'guru', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        try {
            $siswa = Guru::findOrFail($id);
            $request->validate([
                'nip' => 'required',
                'photo' => 'image|mimes:png,jpg,jpeg'
            ]);
            if ($request->file('photo')) {
                File::delete('images/foto/guru/' . $siswa->photo);
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(600, 600);
                $image_resize->save('images/foto/guru/' . $filename);
                $siswa->photo = $filename;
            }
            if ($siswa->nip != $request->nip) {
                $request->validate([
                    'nip' => 'unique:guru,nip,except,id'
                ]);
            }
            $siswa->nip = $request->nip;
            $siswa->nama_guru = $request->nama_guru;
            $siswa->kelas_id = $request->kelas;
            $siswa->jenkel = $request->jenkel;
            $siswa->alamat = $request->alamat;
            $siswa->telp = $request->telp;
            $siswa->tmp_lahir = $request->tmp_lahir;
            $siswa->tgl_lahir = $request->tgl_lahir;
            $siswa->mapel = $request->mapel;
            $siswa->save();
            Session::flash('sukses', 'Teacher Successfully Updated');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('aguru.index');
    }

    public function delete($id)
    {
        $avatar = Guru::where('id', $id)->first();
        File::delete('images/foto/guru/' . $avatar->photo);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Teacher Successfully Removed');
    }
}
