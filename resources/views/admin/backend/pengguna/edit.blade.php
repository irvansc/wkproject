@extends('admin.backend.layouts.master')

@section('content')
<style>
    .img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
</style>
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Edit profile </h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{route('pengguna.index')}}" class="btn btn-sm btn-warning"> <i
                                class="ni ni-bold-left"></i> Batal</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('pengguna.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h6 class="heading-small text-muted mb-4">User Image</h6>
                    <br>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mt-4">
                                    <div class="col-lg-3 order-lg-2">
                                        <div class="card-profile-image">
                                            <img src="{{asset('images/foto/user/'.$user->image)}}" class="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Username</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Username"
                                        name="name" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email address</label>
                                    <input type="email" id="input-email" class="form-control" name="email"
                                        value="{{$user->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Role : </label>
                                    <div>
                                        @foreach ($roles as $role)
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="role-{{ $role->id }}" name="role" value="{{ $role->id }}"
                                                    @if($user->roles->pluck('name')->contains($role->name))
                                                checked @endif>
                                                <label class="custom-control-label"
                                                    for="role-{{ $role->id }}">{{ $role->name }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">New Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Address</label>
                                    <textarea name="alamat" id="" class="form-control">{{$user->alamat}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">No Hp</label>
                                    <input type="text" id="input-username" class="form-control" placeholder="Username"
                                        name="telp" value="{{$user->telp}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Jenis Kelamin</label>
                                    <select name="jenkel" id="" class="form-control">
                                        <option value="L" @if ($user->jenkel == 'L')
                                            selected
                                            @endif>Laki Laki</option>
                                        <option value="P" @if ($user->jenkel == 'P')
                                            selected
                                            @endif>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
