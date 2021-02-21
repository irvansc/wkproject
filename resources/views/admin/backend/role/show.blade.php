@extends('admin.backend.layouts.master')
@section('content')
<div class="section-header">
    <h1>Role</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <div class="row">
                        <h3 class="">Show Roles {{$role->id}}</h3>
                        <a href="{{ route('roles.index') }}" class="btn btn-primary ml-auto"> <i
                                class="ni ni-bold-left"></i> Batal</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- Errors -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <p>Role name: {{ $role->name }}</p>
                    <p>
                        Permisssions:
                        @foreach ($role->permissions as $permission)
                        <span class="badge badge-primary">{{ $permission->name }}</span>
                        @endforeach
                    </p>

                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('roles.add', $role->id) }}" class="btn btn-lg d-block btn-info">Add
                                user</a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('roles.edit', $role->id) }}"
                                class="btn btn-lg d-block btn-light border">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
