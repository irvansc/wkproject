<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DownloadController extends Controller
{
    public function index()
    {
        $title = 'Download File';
        $download = Download::get();
        $postsWeek = Post::with('categories')
            ->where('updated_at', '>=', Carbon::now()->startOfWeek())
            ->orderBy('weekly_views', 'desc')
            ->limit(4)
            ->get();
        return view('frontend.download.index', compact('title', 'download', 'postsWeek'));
    }


    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }


    public function show($id)
    {
        abort(404);
    }


    public function edit($id)
    {
        abort(404);
    }


    public function update(Request $request, $id)
    {
        abort(404);
    }

    public function destroy($id)
    {
        abort(404);
    }
}