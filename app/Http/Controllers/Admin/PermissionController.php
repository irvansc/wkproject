<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Permissions';
        $permissions = Permission::with('roles')
            ->paginate(5);
        $roles = Role::all();

        return view('admin.backend.permissions.index', compact('permissions', 'title', 'roles'));
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
        $request->validate([
            'name' => 'required|unique:permissions'
        ]);

        $permission = new Permission();

        $permission->name = Str::slug($request->name);

        $permission->save();
        $permission->roles()
            ->sync($request->role);

        return redirect()
            ->back()
            ->with('sukses', 'The permission added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Permissions';
        $permission = Permission::find($id);
        $roles = Role::all();
        return view('admin.backend.permissions.edit', compact('permission', 'title', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'name' => 'required|unique:permissions'
        // ]);

        $permission = Permission::findOrFail($id);

        $permission->name = Str::slug($request->name);

        $permission->save();
        $permission->roles()
            ->sync($request->role);

        return redirect()
            ->route('permissions.index')
            ->with('sukses', 'The permission updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()
            ->back()->with('sukses', 'Permission berhasil dihapus');
    }
}
