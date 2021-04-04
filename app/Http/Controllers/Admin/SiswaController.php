<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{

    public function index()
    {
        $title = 'Siswa';
        $siswass = Siswa::get();
        $kelas = Kelas::get();
        return view('admin.backend.siswa.index', compact('title', 'siswass', 'kelas'));
    }
    public function filter(Request $request)
    {
        $kelas = Kelas::get();
        $siswass = Siswa::get();
        // $siswa = DB::table('siswa')->select('kelas_id')->distinct()->get()->pluck('nama_kelas')->sort();

        $data = Siswa::query();
        if ($request->filled('kelas_id')) {
            $data->where('kelas_id', $request->kelas_id);
        }
        return view('admin.backend.siswa.index', [
            // 'siswa' => $siswa,
            'siswass' => $siswass,
            'kelas' => $kelas,
            'data' => $data->get()

        ]);
    }
    public function data(Request $request)
    {
        $orderBy = 'siswa.id';
        switch ($request->input('order.0.dir')) {

            case "2":
                $orderBy = 'siswa.nis';
                break;
            case "3":
                $orderBy = 'siswa.nama';
                break;
            case "4":
                $orderBy = 'siswa.jenkel';
                break;
            case "5":
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

    public function create()
    {
        $title = 'create siswa';
        $kelas = Kelas::all();
        return view('admin.backend.siswa.create', compact('title', 'kelas'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'nis' => 'required|unique:siswa,nis',
                'nama' => 'required'
            ], [

                'nis.required' => 'Nis Wajib diisi',
                'nis.unique' => 'Nis sudah ada',
                'nama.required' => 'Nama wajib diisi'
            ]);
            $siswa = new Siswa;
            $siswa->nis = $request->nis;
            $siswa->nama = $request->nama;
            $siswa->kelas_id = $request->kelas;
            $siswa->jenkel = $request->jenkel;
            $siswa->alamat = $request->alamat;
            $siswa->telp = $request->telp;
            $siswa->tgl_lahir = $request->tgl_lahir;
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(600, 600);
                $image_resize->save('images/foto/siswa/' . $filename);
            }
            $siswa->photo = $filename;
            $siswa->save();
            Session::flash('sukses', 'Student added successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('asiswa.index');
    }


    public function show(Siswa $siswa)
    {
        abort(404);
    }


    public function edit($id)
    {
        $title = 'Edit Siswa';
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        return view('admin.backend.siswa.edit', compact('title', 'siswa', 'kelas'));
    }


    public function update(Request $request, $id)
    {
        try {
            $siswa = Siswa::findOrFail($id);
            $request->validate([
                'nis' => 'required',
                'photo' => 'image|mimes:png,jpg,jpeg'
            ]);
            if ($request->file('photo')) {
                File::delete('images/foto/siswa/' . $siswa->photo);
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(600, 600);
                $image_resize->save('images/foto/siswa/' . $filename);
                $siswa->photo = $filename;
            }
            if ($siswa->nis != $request->nis) {
                $request->validate([
                    'nis' => 'unique:siswa,nis,except,id'
                ]);
            }
            $siswa->nis = $request->nis;
            $siswa->nama = $request->nama;
            $siswa->kelas_id = $request->kelas;
            $siswa->jenkel = $request->jenkel;
            $siswa->alamat = $request->alamat;
            $siswa->telp = $request->telp;
            $siswa->tgl_lahir = $request->tgl_lahir;

            $siswa->save();
            Session::flash('sukses', 'Student updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('asiswa.index');
    }

    public function delete($id)
    {
        $avatar = Siswa::where('id', $id)->first();
        File::delete('images/foto/siswa/' . $avatar->photo);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Student deleted successfully');
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Siswa::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['status' => true, 'message' => "Student deleted successfully."]);
    }
    public function siswaimport(Request $request)
    {
        try {
            $request->validate([
                'data_siswa' => 'mimes:xlsx,csv,xls'
            ]);
            Excel::import(new SiswaImport, $request->file('data_siswa'));
            Session::flash('sukses', 'Import data siswa berhasil');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return response()->json(['success' => 'Import data siswa berhasil']);
    }
}