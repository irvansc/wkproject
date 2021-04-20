<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{

    public function index()
    {
        $title = 'Roles';
        $roles = Role::with('permissions')
            ->paginate();

        return view('admin.backend.role.index', compact('roles', 'title'));
    }


    // public function create()
    // {
    //     $title = 'Create Roles';

    //     $permissions = Permission::all();

    //     return view('admin.backend.role.create', compact('permissions', 'title'));
    // }


    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required|unique:roles'
    //     ]);

    //     $role = new Role();

    //     $role->name = Str::lower($request->name);

    //     $role->save();
    //     $role->permissions()
    //         ->sync($request->permission);

    //     return redirect()
    //         ->route('roles.index')
    //         ->with('sukses', 'The role added successfully!');
    // }


    // public function show($id)
    // {
    //     $title = 'Show Roles';

    //     $role = Role::find($id);
    //     $users = $role->users()
    //         ->paginate();

    //     return view('admin.backend.role.show', compact('users', 'title', 'role'));
    // }


    // public function edit($id)
    // {
    //     $title = 'Edit Roles';

    //     $role = Role::find($id);
    //     $permissions = Permission::all();
    //     return view('admin.backend.role.edit', compact('permissions', 'title', 'role'));
    // }


    // public function update(Request $request, $id)
    // {
    //     // $request->validate([
    //     //     'name' => 'required|unique:roles'
    //     // ]);

    //     $role = Role::findOrFail($id);

    //     $role->name = Str::lower($request->name);

    //     $role->save();
    //     $role->permissions()
    //         ->sync($request->permission);

    //     return redirect()
    //         ->route('roles.index')
    //         ->with('sukses', 'The role updated successfully!');
    // }


    // public function destroy($id)
    // {
    //     $role = Role::findOrFail($id);
    //     $role->delete();

    //     return redirect()
    //         ->back()->with('sukses', 'The role Deleted successfully!');;
    // }
    // function add(Request $request, $id)
    // {
    //     $title = 'add';
    //     $role = Role::find($id);

    //     if ($request->isMethod('post')) {
    //         $user = User::where('name', $request->name)->first();

    //         $check = $role->users()
    //             ->syncWithoutDetaching($user->id);

    //         if (empty($check['attached'])) {
    //             return back()
    //                 ->withErrors('The user already added');
    //         }

    //         return back()
    //             ->with('status', 'The user added successfully!');
    //     }

    //     $users = User::all();

    //     return view('admin.backend.role.add', compact('title', 'role', 'users'));
    // }
}