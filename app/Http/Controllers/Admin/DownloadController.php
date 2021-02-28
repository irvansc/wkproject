<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function index()
    {
        $title = 'Download';
        $download = Download::get();
        return view('admin.backend.download.index', compact('title', 'download'));
    }


    public function create()
    {
        abort(404);
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'data' => 'mimes:pdf,doc,xlsx,ppt,csv,xls,docx',
                'title' => 'required|unique:download,title,except,id'
            ]);
            $download = new Download;
            $download->title = $request->title;
            $download->keterangan = $request->keterangan;
            $download->author = $request->author;


            if ($request->hasFile('data')) {
                $file = $request->file('data');
                $name = time() . '.' . $file->getClientOriginalExtension();
                Storage::putFileAs('public/file', $request->file('data'), $name);
                $download->data = $name;
            }
            $download->save();
            Session::flash('sukses', 'File Uploaded Successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return response()->json(['success' => 'File Uploaded Successfully']);
    }


    public function show(Download $download)
    {
        abort(404);
    }

    public function edit($id)
    {
        $title = 'Edit File';
        $d = Download::findOrFail($id);
        return view('admin.backend.download.edit', compact('title', 'd'));
    }

    public function update(Request $request, $id)
    {

        try {
            $download = Download::find($id);
            $request->validate([
                'data' => 'mimes:pdf,doc,xlsx,ppt,csv,xls,docx',
                'title' => 'required',
            ]);
            if ($request->hasFile('data')) {
                Storage::disk('local')->delete('public/file/' . $download->data);
                $file = $request->file('data');
                $name = time() . '.' . $file->getClientOriginalExtension();
                Storage::putFileAs('public/file', $request->file('data'), $name);
                $download->data = $name;
            }

            if ($download->title != $request->title) {
                $request->validate([
                    'title' => 'unique:download,title,except,id'
                ]);
            }
            $download->title = $request->title;
            $download->keterangan = $request->keterangan;
            $download->author = $request->author;

            $download->save();
            Session::flash('sukses', 'File Updated Successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('adownload.index');
    }

    public function File($data)
    {
        try {
            return Storage::download('public/file/' . $data);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
    public function destroy(Download $download)
    {
        abort(404);
    }
    public function delete($id)
    {
        $avatar = Download::where('id', $id)->first();
        Storage::disk('local')->delete('public/file/' . $avatar->data);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
