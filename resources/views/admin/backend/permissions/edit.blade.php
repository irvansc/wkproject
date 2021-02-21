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
                        <h3 class="">permissions Edit</h3>
                        <a href="{{route('permissions.index')}}" class="btn btn-warning ml-auto"> <i
                                class="ni ni-bold-left"></i>
                            Batal</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name">Permission name</label>
                                <input type="text"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ $permission->name }}" required autofocus>

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
                                            name="role[]" value="{{ $role->id }}"
                                            @if($permission->roles->pluck('name')->contains($role->name)) checked
                                        @endif>
                                        <label class="custom-control-label"
                                            for="role-{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
