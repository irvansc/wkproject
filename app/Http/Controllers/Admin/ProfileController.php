<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class profileController extends Controller
{

    public function index()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }


    public function show(Request $request, $id)
    {
        $title = 'profile saya';
        $user = User::findOrFail($id);
        $posts = $user->posts()
            ->orderBy('created_at', 'desc')
            ->paginate(5, '*', 'post')
            ->appends($request->query());

        $count = $user->posts()->count();
        $roles = User::with('roles')->where('name')->first();
        return view('admin.backend.profile.show', compact(
            'title',
            'user',
            'posts',
            'count',
            'roles'
        ));
    }

    public function edit($id)
    {
        $title = 'Edit Pengguna';

        $user = User::find($id);
        return view('admin.backend.profile.edit', compact('user', 'title'));
    }


    public function update(Request $request, $id)
    {

        try {
            $user = User::findOrFail($id);
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg'
            ]);
            if ($request->file('image')) {
                Storage::disk('local')->delete('public/images/' . $user->image);
                $file = $request->file('image');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $resize = Image::make($file)->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                $image = $fileNameToStore;
                $save = Storage::put("public/images/{$fileNameToStore}", $resize->__toString());
                $user->image = $image;
            }

            if ($user->email != $request->email) {
                $request->validate([
                    'email' => 'unique:users,email,except,id'
                ]);
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->jenkel = $request->jenkel;
            $user->telp = $request->telp;
            $user->alamat = $request->alamat;
            $user->save();
            Session::flash('sukses', 'User Updated Successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('pengguna.index');
    }

    public function destroy($id)
    {
        abort(404);
    }
}
