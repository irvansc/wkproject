@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Meta</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Meta Tag</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Meta Description</th>
                                    <th>Meta Keywords</th>
                                    <th>Meta Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metas as $e=>$a)

                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$a->description}}</td>
                                    <td>{{$a->keywords}}</td>
                                    <td>
                                        {{$a->author}}
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-user-edit"
                                                data-toggle="modal" data-target="#file{{$a->id}}"></i></button>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
@foreach ($metas as $d)
<div class="modal fade" id="file{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Meta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('meta.update',$d->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Meta Deskrition</label>
                        <input type="text" name="description" value="{{$d->description}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Meta Keywords</label>
                        <input type="text" name="keywords" value="{{$d->keywords}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Meta Author</label>
                        <input type="text" name="author" value="{{$d->author}}" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">
                    Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
