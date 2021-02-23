@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Agenda</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Show Agenda</h6>
                    <a href="{{route('aagenda.index')}}" class="btn btn-warning ml-auto"><i
                            class="fas fa-arrow-alt-circle-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-agenda-list"
                                    data-toggle="list" href="#list-agenda" role="tab" aria-selected="true">Agenda</a>
                                <a class="list-group-item list-group-item-action" id="list-deskripsi-list"
                                    data-toggle="list" href="#list-deskripsi" role="tab"
                                    aria-selected="false">Deskripsi</a>
                                <a class="list-group-item list-group-item-action" id="list-dibuat-list"
                                    data-toggle="list" href="#list-dibuat" role="tab" aria-selected="false">Dibuat</a>
                                <a class="list-group-item list-group-item-action" id="list-mulai-list"
                                    data-toggle="list" href="#list-mulai" role="tab" aria-selected="false">Mulai
                                    -
                                    Selesai</a>
                                <a class="list-group-item list-group-item-action" id="list-tempat-list"
                                    data-toggle="list" href="#list-tempat" role="tab" aria-selected="false">Tempat &
                                    Waktu</a>
                                <a class="list-group-item list-group-item-action" id="list-ket-list" data-toggle="list"
                                    href="#list-ket" role="tab" aria-selected="false">Keterangan &
                                    Pembuat</a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="list-agenda" role="tabpanel"
                                    aria-labelledby="list-agenda-list">
                                    {{$row->name}}
                                </div>
                                <div class="tab-pane fade" id="list-deskripsi" role="tabpanel"
                                    aria-labelledby="list-deskripsi-list">
                                    {!!$row->deskripsi!!}
                                </div>
                                <div class="tab-pane fade" id="list-dibuat" role="tabpanel"
                                    aria-labelledby="list-dibuat-list">
                                    {{date("d F Y", strtotime($row->tanggal))}}
                                </div>

                                <div class="tab-pane fade" id="list-mulai" role="tabpanel"
                                    aria-labelledby="list-mulai-list">
                                    {{date("d F Y", strtotime($row->mulai))}} -
                                    {{date("d F Y", strtotime($row->selesai))}}
                                </div>
                                <div class="tab-pane fade" id="list-tempat" role="tabpanel"
                                    aria-labelledby="list-tempat-list">
                                    {{$row->tempat}} - {{$row->waktu}}
                                </div>
                                <div class="tab-pane fade" id="list-ket" role="tabpanel"
                                    aria-labelledby="list-ket-list">
                                    {{$row->keterangan}} - {{$row->author}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
