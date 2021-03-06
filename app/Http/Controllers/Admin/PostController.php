<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

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

    public function store(Request $request)
    {
        try {
            $post = $request->validate([
                'title' => 'required|unique:posts',
                'content' => 'required|min:5',
                'img' => 'image|mimes:png,jpg,jpeg'
            ]);
            $post = new Post;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->user_id = Auth::user()->id;
            $post->alias = Str::slug($request->title);
            if ($request->file('img')) {
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(1024, 768);
                $image_resize->save('images/foto/post/' . $filename);
            }
            $post->img = $filename;
            $post->save();
            $post->categories()
                ->attach($request->category);
            Session::flash('sukses', 'Post Uploaded Successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $title = 'Artikel';
        $post = Post::find($id);
        $user = User::get();
        return view('admin.backend.post.show', compact('post', 'title', 'user'));
    }


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

    public function update(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
            // if (Gate::none(['update', 'update-posts'], $post)) {
            //     abort(403);
            // }
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'img' => 'image|mimes:png,jpg,jpeg'
            ]);
            if ($request->file('img')) {
                File::delete('images/foto/post/' . $post->img);
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(1024, 768);
                $image_resize->save('images/foto/post/' . $filename);
                $post->img = $filename;
            }
            if ($post->title != $request->title) {
                $request->validate([
                    'title' => 'unique:posts'
                ]);
            }
            $post->title = $request->title;
            $post->content = $request->content;
            $post->alias = Str::slug($request->title);
            $post->save();
            $post->categories()
                ->sync($request->category);
            Session::flash('sukses', 'Artikel Updated SuccessFuly');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('post.index');
    }


    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        $avatar = Post::where('id', $id)->first();
        File::delete('images/foto/post/' . $avatar->img);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}