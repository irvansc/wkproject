<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $siswa = DB::table('siswa')->count();
        $guru = DB::table('guru')->count();
        $user = DB::table('users')->count();
        $post = DB::table('posts')->count();
        $jenisG = DB::table('guru')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when jenkel = 'L' then 1 end) as Laki")
            ->selectRaw("count(case when jenkel = 'P' then 1 end) as Perempuan")
            ->first();
        $jenisI = DB::table('siswa')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when jenkel = 'L' then 1 end) as Laki")
            ->selectRaw("count(case when jenkel = 'P' then 1 end) as Perempuan")
            ->first();
        $postsWeek = Post::with('categories')
            ->orderBy('views', 'desc')
            ->limit(3)
            ->get();
        $total = Post::sum('views');
        return view('admin.backend.dashboard.index', compact(
            'title',
            'siswa',
            'guru',
            'user',
            'post',
            'jenisI',
            'jenisG',
            'postsWeek',
            'total',
        ));
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