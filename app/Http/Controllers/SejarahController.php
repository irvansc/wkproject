<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SejarahController extends Controller
{
    public function index()
    {
        $title = 'Sejarah';
        $sj = DB::table('sejarah')->first();
        return view('frontend.sejarah.index', compact('title', 'sj'));
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