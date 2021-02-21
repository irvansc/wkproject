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
                        <h3 class="">Add the {{ $role->name }}</h3>
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-primary ml-auto"> <i
                                class="ni ni-bold-left"></i> Batal</a>
                    </div>
                </div>
                <div class="card-body">
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

                    <form action="{{ route('roles.add', $role->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <button type="submit" class="btn btn-lg btn-block btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
