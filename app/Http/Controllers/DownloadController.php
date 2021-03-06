<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $title = 'Download File';
        $download = Download::get();
        return view('frontend.download.index', compact('title', 'download'));
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