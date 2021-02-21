<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function index()
    {
        $title = 'Comment';
        $comment = Comment::all();
        // $comment = Comment::select('Comment.*')
        //     ->join('post', 'post.id', '=', 'Comment.commentable_id')
        //     ->orderBy('created_at', 'desc')->get();

        return view('admin.backend.komentar.index', compact('title', 'comment'));
    }
    public function publikasi($id)
    {
        $publikasi = Comment::findorFail($id);
        $publikasi->status = 'y';
        $publikasi->update();
        return redirect()->back()->with('sukses', 'komentar berhasil di publikasikan');
    }

    public function create($id)
    {
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('sukses', 'komentar berhasil dihapus');
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

        return back()->with('sukses', 'Komentar balasan terkirim');
    }
}
