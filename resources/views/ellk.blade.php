@extends('layouts.app')

@section('title', 'Lembar Kerja')

@section('sub_header')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>ELLK
                {{-- <div class="page-title-subheading">This is an example dashboard created using
                    build-in elements and components.
                </div> --}}
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <button type="button" class="btn-shadow btn btn-info" data-toggle="modal" data-target="#modalAdd">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus fa-w-20"></i>
                    </span>
                    Add Data
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<!-- Add modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Lembar Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="" class="kt-form" enctype="multipart/form-data" id="m_form_create">
                @csrf
                <div class="modal-body">
                    <div class="position-relative form-group"><label class="">Nama</label>
                        <input placeholder="{{ Auth::user()->name }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="position-relative form-group"><label class="">NIP</label>
                        <input placeholder="{{ Auth::user()->nip }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="position-relative form-group"><label class="">Jabatan</label>
                        <input placeholder="{{ Auth::user()->jabatan }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="position-relative form-group"><label class="">Tanggal</label>
                        <input placeholder="{{ date('d-m-Y') }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="position-relative"><label>Jam</label></div>
                    <div class="form-group row">
                        <div class="col"> <input class="form-control" type="time" data-inputmask="'alias': 'time'"
                                name="from"> </div>
                        <small class="m-t-3" style="transform: translateY(10px);">s/d</small>
                        <div class="col"> <input class="form-control" type="time" data-inputmask="'alias': 'time'"
                                name="to"> </div>
                    </div>
                    <div class="position-relative form-group"><label class="text-area">Kegiatan</label>
                        <textarea rows="3" class="form-control" name="kegiatan"></textarea>
                    </div>
                    <div class="position-relative form-group"><label class="">Jenis Kegiatan</label>
                        <select name="jenis" class="form-control @error('Jenis Kegiatan') is-invalid @enderror col-4">
                            <option value="utama">Utama</option>
                            <option value="pendukung">Pendukung</option>
                        </select>
                    </div>
                    {{-- <div class="position-relative form-group"><label class="">Keterangan</label>
                        <input type="text" class="form-control" name="catatan">
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Update modal -->
<div class="modal fade" id="modalSee" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Lembar Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="" class="kt-form" enctype="multipart/form-data" id="m_form_update">
                @csrf
                <div class="modal-body">
                    <input class="d-none" type="text" name="" id="idData">
                    <div class="position-relative form-group"><label class="">Nama</label>
                        <input placeholder="{{ Auth::user()->name }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="position-relative form-group"><label class="">NIP</label>
                        <input placeholder="{{ Auth::user()->nip }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="position-relative form-group"><label class="">Jabatan</label>
                        <input placeholder="{{ Auth::user()->jabatan }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="position-relative form-group"><label class="">Tanggal</label>
                        <input placeholder="{{ date('d-m-Y', strtotime(Auth::user()->created_at)) }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="position-relative"><label>Jam</label></div>
                    <div class="form-group row">
                        <div class="col"> <input class="form-control" type="time" data-inputmask="'alias': 'time'"
                                name="from" id="from"> </div>
                        <small class="m-t-3" style="transform: translateY(10px);">s/d</small>
                        <div class="col"> <input class="form-control" type="time" data-inputmask="'alias': 'time'"
                                name="to" id="to"> </div>
                    </div>
                    <div class="position-relative form-group"><label class="text-area">Kegiatan</label>
                        <textarea rows="3" class="form-control" name="kegiatan" id="kegiatan"></textarea>
                    </div>
                    <div class="position-relative form-group"><label class="">Jenis Kegiatan</label>
                        <select name="jenis" id="jenis" class="form-control @error('Jenis Kegiatan') is-invalid @enderror col-4">
                            <option value="utama">Utama</option>
                            <option value="pendukung">Pendukung</option>
                        </select>
                    </div>
                    {{-- <div class="position-relative form-group"><label class="">Keterangan</label>
                        <input type="text" class="form-control" name="catatan" id="catatan">
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('content')
<div class="card-body">
    <h4 class="card-title ">Example</h4>
    <!---->
    <div class="table-responsive-md">
        <table id="data_activity" style="width:100%" aria-colcount="3" class="table b-table">
            <thead>
                <tr>
                    <th class="b-t-0">#</th>
                    <th class="b-t-0">Tanggal</th>
                    
                    <th class="b-t-0">Jam</th>
                    <th class="b-t-0">Kegiatan</th>
                    <th class="b-t-0">Jenis</th>
                    <th class="b-t-0">Status</th>
                    <th class="b-t-0">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($lks as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><b>{{date('d-m-Y', strtotime($item->created_at))}}</b></td>
                        <td>{{ $item->jam }}</td>
                        <td>{{ $item->kegiatan }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>
                            @if($item->verified == 0)
                                <div class="badge badge-pill badge-secondary">Belum terverifikasi</div>
                            @else
                                <div class="badge badge-pill badge-primary">Terverifikasi</div>
                            @endif
                        </td>
                        <td>
                            <div role="group" class="btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-warning" data-id="{{ $item->id }}" id="m_update"
                                    data-toggle="modal" data-target="#modalSee">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-edit fa-w-20"></i>
                                    </span>
                                </label>
                                <label class="btn btn-danger" data-id="{{ $item->id }}" id="m_deleted">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-trash fa-w-20"></i>
                                    </span>
                                </label>
                            </div>
                        </td>
                    </tr>

                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection


@section('page_styles')
<style type="text/css">
    .card-body {
        background-color: #FFF;
    }

    .b-0 {
        border: 0 !important;
    }
    .b-t-0 {
        border-bottom: 0 !important;
    }

</style>
@endsection


@section('page_scripts')
<script src="js/ellk.js" type="text/javascript"></script>
@endsection
