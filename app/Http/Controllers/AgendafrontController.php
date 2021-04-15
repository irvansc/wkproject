<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Pengumuman;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgendafrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'agenda';
        $agendas = Agenda::orderBy('tanggal', 'desc')->paginate(3);
        $postsWeek = Post::with('categories')
            ->where('updated_at', '>=', Carbon::now()->startOfWeek())
            ->orderBy('weekly_views', 'desc')
            ->limit(4)
            ->get();
        $pengumuman = Pengumuman::all();
        return view('frontend.agenda.index', compact('title', 'agendas', 'postsWeek', 'pengumuman'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}