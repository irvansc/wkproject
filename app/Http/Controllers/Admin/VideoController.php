<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{

    public function index()
    {
        $title = 'Video';
        $videos = Video::all();
        return view('admin.backend.album.video.index', compact('title', 'videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required'
        ]);
        $video = new Video;
        $video->title = $request->title;
        $video->url = $request->url;
        $video->save();
        return redirect()->back()->with('sukses', 'Video Berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $video->title = $request->title;
        $video->url = $request->url;

        $video->save();
        return redirect()->back()->with('sukses', 'Video Berhasil ditambahkan');
    }

    public function delete($id)
    {
        $avatar = Video::where('id', $id)->first();
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Video Berhasil Dihapus');
    }
}
