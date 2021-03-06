<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\Environment\Console;

class CommentController extends Controller
{

    public function index()
    {
        $title = 'Comment';
        $comment = Comment::all();
        $comment = Comment::select('Comments.*')
            ->join('posts', 'posts.id', '=', 'Comments.commentable_id')->where('commentable_type', '=', 'App\Models\Post')
            ->orderBy('created_at', 'desc')->get();
        return view('admin.backend.komentar.index', compact('title', 'comment'));
    }
    public function publikasi($id)
    {
        $publikasi = Comment::findorFail($id);
        $publikasi->status = 'y';
        $publikasi->update();
        return redirect()->back()->with('sukses', 'Comment published successfully');
    }

    public function create($id)
    {
        abort(404);
    }
    public function delete($id)
    {
        $kom =  Comment::find($id);
        $parent = $kom->comment();
        if ($parent != null) {
            $parent->delete();
        }
        $kom->delete();
        return redirect()->back()->with('sukses', 'Comment deleted successfully');
    }
    public function deleteBalasan($id)
    {
        $kom =  Comment::find($id);
        $kom->delete();
        return redirect()->back()->with('sukses', 'The reply comment was successfully deleted');
    }

    public function replyComment(Request $request, Comment $Comment)
    {
        // dd($request->all());
        $reply = new Comment;
        $reply->name = $request->name;
        $reply->email = $request->email;
        $reply->status = 'y';
        $reply->body = $request->body;
        $Comment->Comment()->save($reply);

        return back()->with('sukses', 'The reply comment was successfully sent');
    }
    public function balasanAdmin()
    {

        $title = 'Komentar balasan';
        $komen = Comment::where('commentable_type', '=', 'App\Models\Comment')->get();

        return view('admin.backend.komentar.balasan', compact('title', 'komen'));
    }
    public function update(Request $request, $id)
    {
        try {
            $balas = Comment::findOrFail($id);
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'body' => 'required'
            ]);

            $balas->name = $request->name;
            $balas->email = $request->email;
            $balas->body = $request->body;
            $balas->save();
            Session::flash('sukses', 'The reply comment was updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->back();
    }
}