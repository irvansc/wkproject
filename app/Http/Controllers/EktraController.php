<?php

namespace App\Http\Controllers;

use App\Models\Ektra;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EktraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Ekstrakulikuler';
        $ekstra = Ektra::paginate(2);
        $postsWeek = Post::with('categories')
            ->where('updated_at', '>=', Carbon::now()->startOfWeek())
            ->orderBy('weekly_views', 'desc')
            ->limit(4)
            ->get();
        return view('frontend.ekstra.index', compact('title', 'ekstra', 'postsWeek'));
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
     * @param  \App\Ektra  $ektra
     * @return \Illuminate\Http\Response
     */
    public function show(Ektra $ektra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ektra  $ektra
     * @return \Illuminate\Http\Response
     */
    public function edit(Ektra $ektra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ektra  $ektra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ektra $ektra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ektra  $ektra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ektra $ektra)
    {
        //
    }
}