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
                // Get file from request
                $file = $request->file('img');
                // Get filename with extension
                $filenameWithExt = $file->getClientOriginalName();
                // Get file path
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Remove unwanted characters
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                // Get the original image extension
                $extension = $file->getClientOriginalExtension();
                // Create unique file name
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Resize image
                $resize = Image::make($file)->resize(1024, 768, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                // Create hash value
                // $hash = md5($resize->__toString());
                // Prepare qualified image name
                $image = $fileNameToStore;
                // Put image to storage
                $save = Storage::put("public/artikel/{$fileNameToStore}", $resize->__toString());
                $post->img = $image;
            }
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
                Storage::disk('local')->delete('public/artikel/' . $post->img);
                $file = $request->file('img');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $resize = Image::make($file)->resize(1024, 768, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                $image = $fileNameToStore;
                $save = Storage::put("public/artikel/{$fileNameToStore}", $resize->__toString());
                $post->img = $image;
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
        Storage::disk('local')->delete('public/artikel/' . $avatar->img);
        $avatar->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
