<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Download';
        $download = Download::get();
        return view('admin.backend.download.index', compact('title', 'download'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'data' => 'mimes:pdf,doc,xlsx,ppt,txt,csv,xls,docx',
                'title' => 'required|unique:download,title,except,id'
            ]);
            $download = new Download;
            $download->title = $request->title;
            $download->keterangan = $request->keterangan;
            $download->author = $request->author;
            if ($request->file('data')) {
                $file = $request->file('data');
                $Filename = $file->getClientOriginalName();
                $location = public_path('/filedownload');
                $file->move($location, $Filename);
                $download->data = $Filename;
            }
            $download->save();
            Session::flash('sukses', 'File Uploaded Successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return response()->json(['success' => 'File Uploaded Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function show(Download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function edit(Download $download)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $download = Download::findOrFail($id);
            $request->validate([
                'data' => 'mimes:pdf,doc,xlsx,ppt,txt,csv,xls,docx'
            ]);
            $download->title = $request->title;
            $download->keterangan = $request->keterangan;
            $download->author = $request->author;
            $file_name = $download->data;
            $file_path = public_path('filedownload/' . $file_name);
            if ($request->hasFile('data')) {
                unlink($file_path);
                $file = $request->file('data');
                $filename = $file->getClientOriginalName();
                $location = public_path('/filedownload');
                $file->move($location, $filename);
                $download->data = $filename;
            }
            $download->save();
            Session::flash('sukses', 'File Updated Successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return response()->json(['success' => 'File Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy(Download $download)
    {
        //
    }
    public function delete($id)
    {
        $avatar = Download::where('id', $id)->first();
        File::delete('filedownload/' . $avatar->data);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
