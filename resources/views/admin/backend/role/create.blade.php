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
                    <h3 class="">Add Roles</h3>
                    <a href="{{ route('roles.index') }}" class="btn btn-primary ml-auto">
                        <i class="fas fa-arrow-circle-left"></i> Batal</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form action="{{ route('roles.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Role name</label>
                                <input type="text"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
                                    name="name" required autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                @foreach ($permissions as $permission)
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                            id="permission-{{ $permission->id }}" name="permission[]"
                                            value="{{ $permission->id }}">
                                        <label class="custom-control-label"
                                            for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
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
</div>
@endsection
