@extends('layouts.app')

@section('sub_header')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>ELLK
                <div class="page-title-subheading">This is an example dashboard created using
                    build-in elements and components.
                </div>
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
            <div class="modal-body">
                <form class="">
                    <div class="position-relative form-group"><label class="">Nama</label>
                        <input placeholder="{{ Auth::user()->name }}" type="text" class="form-control" disabled></div>
                    <div class="position-relative form-group" ><label class="">NIP</label>
                        <input placeholder="{{ Auth::user()->nip }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="position-relative form-group"><label class="">Jabatan</label>
                        <input placeholder="{{ Auth::user()->jabatan }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="position-relative form-group"><label class="">Tanggal Kegiatan</label>
                        <input value="{{ date('d-m-Y') }}" type="date"  class="form-control"> 
                    </div>
                    <div class="position-relative"><label>Jam</label></div>
                    <div class="form-group row">
                        <div class="col"> <input class="form-control" type="time" data-inputmask="'alias': 'time'"> </div>
                        <small class="m-t-3">s/d</small>
                        <div class="col"> <input class="form-control" type="time" data-inputmask="'alias': 'time'"> </div>
                    </div>
                    {{-- <div class="position-relative"> --}}
                        {{-- <small class="form-text text-muted">(contoh penulisan 08:00 - 12:00)</small> --}}
                    {{-- </div> --}}
                    <div class="position-relative form-group"><label class="text-area">Kegiatan</label>
                        <textarea rows="3" class="form-control"></textarea>
                    </div>
                    <div class="position-relative form-group"><label class="">Jenis Kegiatan</label>
                            <select name="jabatan" class="form-control @error('Jenis Kegiatan') is-invalid @enderror col-4">
                                <option value="utama">Utama</option>
                                <option value="pendukung">Pendukung</option>
                            </select>                    
                    </div>
                    <div class="position-relative form-group"><label class="">Keterangan</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
<div class="card-body">
    <h4 class="card-title ">Example</h4>
    <!---->
    <div class="table-responsive-md">
        <table style="width:100%" aria-colcount="3" class="table b-table">
            <tr>
                <th colspan="7">No</th>
                <th colspan="">Action</th>
            </tr>

            <!-- foreach  -->
            <div>
                <tr>
                    <td>1</td>
                    <td colspan="5"><b>Tnggal 1 Desember 2020</b></td>
                    <td>
                        <div class="badge badge-pill badge-secondary">Belum terverifikasi</div>
                    </td>
                    <td>
                        <div class="btn-group-vertical">
                            <button type="button" class="btn btn-success">Export Pdf</button>
                            <button type="button" class="btn btn-primary">Export Excel</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="b-0"></td>
                    <td>#</td>
                    <td>Jam</td>
                    <td>Waktu(Menit)</td>
                    <td>Kegiatan</td>
                    <td>Jenis</td>
                    <td>Hasil</td>
                </tr>
                <tr>
                    <td class="b-0"></td>
                    <td>1</td>
                    <td>10:00 - 11:00</td>
                    <td>60</td>
                    <td>
                        <li>Belajar 1</li>
                        <li>Belajar 2 Lorem ipsum sit amet mon door</li>
                        <li>Belajar 3</li>
                    </td>
                    <td>Learn</td>
                    <td>1 kegiatan</td>
                </tr>
                <tr>
                    <td class="b-0"></td>
                    <td>2</td>
                    <td>11:00 - 13:00</td>
                    <td>60</td>
                    <td>
                        <li>Belajar 1</li>
                        <li>Belajar 2 Lorem ipsum sit amet mon door</li>
                        <li>Belajar 3</li>
                    </td>
                    <td>Learn</td>
                    <td>3 kegiatan</td>
                </tr>
                <tr>
                    <td class="table-active" colspan="8"></td>
            </div>

            <div>
                <tr>
                    <td>2</td>
                    <td colspan="5"><b>Tnggal 1 Desember 2020</b></td>
                    <td>
                        <div class="badge badge-pill badge-secondary">Belum terverifikasi</div>
                    </td>
                    <td>

                        <div class="btn-group-vertical">
                            <button type="button" class="btn btn-success">Export Pdf</button>
                            <button type="button" class="btn btn-primary">Export Excel</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="b-0"></td>
                    <td>#</td>
                    <td>Jam</td>
                    <td>Waktu(Menit)</td>
                    <td>Kegiatan</td>
                    <td>Jenis</td>
                    <td>Hasil</td>
                </tr>
                <tr>
                    <td class="b-0"></td>
                    <td>2</td>
                    <td>10:00 - 11:00</td>
                    <td>60</td>
                    <td>
                        <li>Belajar 1</li>
                        <li>Belajar 2 Lorem ipsum sit amet mon door</li>
                        <li>Belajar 3</li>
                    </td>
                    <td>Learn</td>
                    <td>1 kegiatan</td>
                </tr>
                <tr>
                    <td class="b-0"></td>
                    <td>2</td>
                    <td>11:00 - 13:00</td>
                    <td>60</td>
                    <td>
                        <li>Belajar 1</li>
                        <li>Belajar 2 Lorem ipsum sit amet mon door</li>
                        <li>Belajar 3</li>
                    </td>
                    <td>Learn</td>
                    <td>3 kegiatan</td>
                </tr>
                <tr>
                    <td class="table-active" colspan="8"></td>
            </div>

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

</style>
@endsection
