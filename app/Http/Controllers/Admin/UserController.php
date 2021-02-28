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

class UserController extends Controller
{
    public function index()
    {
        $title = 'Pengguna';
        $user = User::get();
        $roles = Role::all();
        return view('admin.backend.pengguna.index', compact('user', 'title', 'roles'));
    }
    public function create()
    {
        abort(404);
    }
    public function store(Request $request)
    {
        try {
            $user = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email,except,id',
                'image' => 'image|mimes:png,jpg,jpeg'
            ]);
            $user = new User();
            $user['name'] = $request->name;
            $user['email'] = $request->email;
            $user['password'] = bcrypt($request->password);
            $user['jenkel'] = $request->jenkel;
            $user['telp'] = $request->telp;
            $user['alamat'] = $request->alamat;
            if ($request->file('image')) {
                // Get file from request
                $file = $request->file('image');
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
                $resize = Image::make($file)->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');
                $image = $fileNameToStore;
                // Put image to storage
                $save = Storage::put("public/images/{$fileNameToStore}", $resize->__toString());
                $user->image = $image;
            }
            $user->save();
            $user->roles()
                ->sync($request->role);
            Session::flash('sukses', 'User Added Successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('pengguna.index');
    }
    public function show(Request $request, $id)
    {
        $title = 'Profile saya';
        $user = User::findOrFail($id);
        $posts = $user->posts()
            ->orderBy('created_at', 'desc')
            ->paginate(5, '*', 'post')
            ->appends($request->query());

        $count = $user->posts()->count();
        $roles = User::with('roles')->where('name')->first();
        return view('admin.backend.pengguna.show', compact(
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
        $roles = Role::get();
        return view('admin.backend.pengguna.edit', compact('user', 'title', 'roles'));
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
            $user->roles()
                ->sync($request->role);
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
    public function updatepw(UpdatePasswordRequest $request, $id)
    {
        $user['password'] = Hash::make($request->get('password'));
        User::where('id', $id)->update($user);
        return redirect()->back()->with('sukses', 'Password Berhasil direset!');
    }
    public function delete($id)
    {
        $avatar = User::where('id', $id)->first();
        Storage::disk('local')->delete('public/images/' . $avatar->image);
        $avatar->delete();
        return redirect('/pengguna')->with('sukses', 'User Deleted Successfully');
    }
}
