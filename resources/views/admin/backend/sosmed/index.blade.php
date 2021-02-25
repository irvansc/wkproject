@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Sosial Media</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Sosmed</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Url Facebook</th>
                                    <th>Url Instagram</th>
                                    <th>Url Twitter</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sosmed as $e=>$a)

                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>
                                        <a href="{{$a->fb}}">{{$a->fb}}</a>
                                    </td>
                                    <td>
                                        <a href="{{$a->ig}}">{{$a->ig}}</a>
                                    </td>
                                    <td>

                                        <a href="{{$a->twitter}}">
                                            {{$a->twitter}}

                                        </a>
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
<!-- Modal -->
<div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Upload Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sosmed.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Url Facebook</label>
                        <input type="text" name="fb" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Url Instagram</label>
                        <input type="text" name="ig" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Url Twitter</label>
                        <input type="text" name="twitter" class="form-control">
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
</div>
@foreach ($sosmed as $d)
<div class="modal fade" id="file{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Sosmed</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sosmed.update',$d->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Url Facebook</label>
                        <input type="text" name="fb" value="{{$d->fb}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Url Instagram</label>
                        <input type="text" name="ig" value="{{$d->ig}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Url Twitter</label>
                        <input type="text" name="twitter" value="{{$d->twitter}}" class="form-control">
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
</div>
@endforeach
@endsection
