@extends('admin.backend.layouts.master')
@section('content')
<div class="section-header">
    <h1>Role</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Role</h6>
                    {{-- <a href="{{ route('roles.create') }}" class="btn btn-primary ml-auto"> <i
                        class="fas fa-plus-circle"></i>
                    Add a
                    Roles</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if ($roles->isNotEmpty() )
                        <div class="card-body">
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
                                    @foreach ($roles->sortByDesc('created_at') as $e=>$role)
                                    <tr>
                                        <td>{{$e+1}}</td>
                                        <td>{{$role->id}}</td>
                                        <td>
                                            <a href="{{ route('roles.show', $role->id) }}">
                                                {{ $role->name }}
                                            </a>
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('roles.edit', $role->id) }}"
                                            class="btn btn-sm btn-warning mr-2">Edit</a>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $roles->links() }}
                        </div>
                        @else
                        <span class="text-danger">Not found</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
