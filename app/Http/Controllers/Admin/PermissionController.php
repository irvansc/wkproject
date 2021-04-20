<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{

    public function index()
    {
        $title = 'Permissions';
        $permissions = Permission::with('roles')
            ->get();
        $roles = Role::all();

        return view('admin.backend.permissions.index', compact('permissions', 'title', 'roles'));
    }


    public function create()
    {
        //
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:permissions'
    //     ]);

    //     $permission = new Permission();

    //     $permission->name = Str::slug($request->name);

    //     $permission->save();
    //     $permission->roles()
    //         ->sync($request->role);

    //     return redirect()
    //         ->back()
    //         ->with('sukses', 'The permission added successfully!');
    // }


    // public function show(Permission $permission)
    // {
    //     //
    // }


    // public function edit($id)
    // {
    //     $title = 'Edit Permissions';
    //     $permission = Permission::find($id);
    //     $roles = Role::all();
    //     return view('admin.backend.permissions.edit', compact('permission', 'title', 'roles'));
    // }


    // public function update(Request $request, $id)
    // {

    //     // $request->validate([
    //     //     'name' => 'required|unique:permissions'
    //     // ]);

    //     $permission = Permission::findOrFail($id);

    //     $permission->name = Str::slug($request->name);

    //     $permission->save();
    //     $permission->roles()
    //         ->sync($request->role);

    //     return redirect()
    //         ->route('permissions.index')
    //         ->with('sukses', 'The permission updated successfully!');
    // }


    // public function destroy($id)
    // {
    //     $permission = Permission::findOrFail($id);
    //     $permission->delete();

    //     return redirect()
    //         ->back()->with('sukses', 'Permission berhasil dihapus');
    // }
}