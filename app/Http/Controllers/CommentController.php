<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function addComment(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required',

        ], [
            'name.required' => 'Nama wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Email tidak valid!',
            'body.required' => 'Komentar wajib diisi!',

        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $comment = new Comment;
            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->body = $request->body;
            $post->comments()->save($comment);
            return response()->json(['status' => 1, 'pesan' => 'Komentar terkirim, Menunggu Moderasi']);
        }


        return back()->with('pesan', 'Komentar terkirim, Menunggu Moderasi');
    }
    // public function store(Request $request, $id)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'content' => 'required'
    //     ], [
    //         'name.required' => 'Nama Wajib diisi',
    //         'email.required' => 'Email Wajib diisi',
    //         'content.required' => 'Komentar Wajib diisi',
    //     ]);

    //     $comment = new Comments();

    //     $comment->post_id = $id;
    //     $comment->parent_id = $request->parent ? $request->parent : null;
    //     $comment->name = $request->name;
    //     $comment->email = $request->email;
    //     $comment->content = $request->content;

    //     $comment->save();

    //     return back()->with('pesan', 'Komentar berhasil dikirim, Menunggu Moderasi');
    // }
}