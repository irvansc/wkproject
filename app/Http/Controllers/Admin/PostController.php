<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Post';
        $posts = Post::get();
        return view('admin.backend.post.index', compact('posts', 'title'));
    }



    public function create()
    {
        $title = 'Create Artikel';
        $kategori = Category::all();
        return view('admin.backend.post.create', compact('title', 'kategori'));
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
            $post = $request->validate([
                'title' => 'required|unique:posts',
                'content' => 'required',
                'img' => 'image|mimes:png,jpg,jpeg'
            ]);
            $post = new Post;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->user_id = Auth::user()->id;
            $post->alias = Str::slug($request->title);
            if ($request->file('img')) {
                $file = $request->file('img');
                $Filename = time() . '.' . $file->getClientOriginalExtension();
                $location = public_path('/artikel');
                $file->move($location, $Filename);
                $post->img = $Filename;
            }
            $post->save();
            $post->categories()
                ->attach($request->category);
            return redirect('/post')->with('sukses', 'Post Berhasil diPublikasikan');
        } catch (\Exception $e) {
            Session::flash('error', $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Artikel';
        $post = Post::find($id);
        $user = User::get();
        return view('admin.backend.post.show', compact('post', 'title', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Artikel';
        $post = Post::findOrFail($id);
        // if (Gate::none(['edit', 'edit-posts'], $post)) {
        //     abort(403);
        // }
        $kategori = Category::all();
        return view('admin.backend.post.edit', compact('title', 'post', 'kategori'));
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
        // dd($request->all());
        $post = Post::findOrFail($id);
        // if (Gate::none(['update', 'update-posts'], $post)) {
        //     abort(403);
        // }
        // $request->validate([
        //     'title' => 'required|unique:posts',
        //     'content' => 'required',
        //     'img' => 'image|mimes:png,jpg,jpeg'
        // ]);

        if ($post->title != $request->title) {
            $request->validate([
                'title' => 'unique:posts'
            ]);
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->alias = Str::slug($request->title);

        $old_image = $request->hidden_file;
        $file = $request->file('img');
        if ($file != '') {
            $file_name = $old_image;
            $file->move(public_path('artikel'), $file_name);
        } else {
            $file_name = $old_image;
        }
        $post->save();
        $post->categories()
            ->sync($request->category);
        return redirect('post')->with('sukses', 'Artikel Berhasil diUpdate');
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
    public function delete($id)
    {
        $avatar = Post::where('id', $id)->first();
        File::delete('artikel/' . $avatar->img);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
