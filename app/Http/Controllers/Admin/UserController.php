<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
// use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pengguna';
        $user = User::get();
        // $roles = Role::all();
        return view('admin.backend.pengguna.index', compact('user', 'title'));
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
        // dd($request->all());
        $user = new User();
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = bcrypt($request->password);
        $user['jenkel'] = $request->jenkel;
        $user['telp'] = $request->telp;
        // cek photo
        if ($request->file('image')) {
            $file = $request->file('image');
            $Filename = $file->getClientOriginalName();
            $location = public_path('/images');
            $file->move($location, $Filename);
            $user->image = $Filename;
        }
        $user->save();
        // $user->roles()
        //     ->sync($request->role);
        return redirect()->back()->with('sukses', 'User Berhasil diTambahkan');
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
        $title = 'Edit Pengguna';

        $user = User::find($id);
        // $roles = Role::get();
        return view('admin.backend.pengguna.edit', compact('user', 'title'));
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

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->jenkel = $request->jenkel;
        $user->telp = $request->telp;

        $file = $request->file('image');
        if ($file) {
            $nama_file = $file->getClientOriginalName();
            $file->move('images', $nama_file);
            $user['image'] = $nama_file;
        }

        $user->save();
        // $user->roles()
        //     ->sync($request->role);

        return redirect('/pengguna')->with('sukses', 'Data Berhasil diUpdate');
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
    public function updatepw(UpdatePasswordRequest $request, $id)
    {

        $user['password'] = Hash::make($request->get('password'));
        User::where('id', $id)->update($user);
        return redirect()->back()->with('sukses', 'Password Berhasil direset!');
    }
    public function delete($id)
    {

        User::where('id', $id)->delete();

        return redirect('/pengguna')->with('sukses', 'Data Berhasil Dihapus');
    }
}
