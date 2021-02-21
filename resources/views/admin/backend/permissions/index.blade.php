@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Role</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="font-weight-bold text-primary">List Role</h6>
                        <a href="{{ route('roles.create') }}" class="btn btn-primary ml-auto"> <i
                                class="fas fa-plus-circle"></i>
                            Add a
                            Roles</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if ($permissions->isNotEmpty())
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions->sortByDesc('created_at') as $e=>$permission)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$permission->id}}</td>
                                    <td>
                                        {{$permission->name}}
                                        @if ($permission->roles->isNotEmpty())
                                        <div>
                                            @foreach ($permission->roles as $role)
                                            <a href="{{ route('roles.show', $role->id) }}"
                                                class="badge badge-primary">{{ $role->name }}</a>
                                            @endforeach
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center my-2">
                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                class="btn btn-sm btn-light mr-2 border">Edit</a>
                                            <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <span class="text-danger">Not found</span>
                        @endif

                    </div>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $permissions->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="font-weight-bold text-primary">List Role</h6>
                        <a href="{{ route('roles.create') }}" class="btn btn-primary ml-auto"> <i
                                class="fas fa-plus-circle"></i>
                            Add a
                            Roles</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('permissions.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Permission name</label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                id="name" name="name" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @foreach ($roles as $role)
                            <div class="form-check form-check-inline">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="role-{{ $role->id }}"
                                        name="role[]" value="{{ $role->id }}">
                                    <label class="custom-control-label"
                                        for="role-{{ $role->id }}">{{ $role->name }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-lg btn-block btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
