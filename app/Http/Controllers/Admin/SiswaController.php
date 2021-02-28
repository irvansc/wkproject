<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SiswaController extends Controller
{

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
            if ($request->file('photo')) {
                // Get file from request
                $file = $request->file('photo');
                // Get filename with extension
                $filenameWithExt = $file->getClientOriginalName();
                // Get file path
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Remove unwanted characters
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                // Get the original image extension
                $extension = $file->getClientOriginalExtension();
                // Create unique file name
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Resize image
                $resize = Image::make($file)->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                $image = $fileNameToStore;
                // Put image to storage
                $save = Storage::put("public/images/siswa/{$fileNameToStore}", $resize->__toString());
                $siswa->photo = $image;
            }
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
                Storage::disk('local')->delete('public/images/siswa/' . $siswa->photo);
                $file = $request->file('photo');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $resize = Image::make($file)->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                $image = $fileNameToStore;
                $save = Storage::put("public/images/siswa/{$fileNameToStore}", $resize->__toString());
                $siswa->photo = $image;
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
        Storage::disk('local')->delete('public/images/siswa/' . $avatar->photo);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Student deleted successfully');
    }
}
