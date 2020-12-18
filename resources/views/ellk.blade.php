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
        <!-- <div class="page-title-actions">
            <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i>
            </button>
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Buttons
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-inbox"></i>
                                <span>
                                    Inbox
                                </span>
                                <div class="ml-auto badge badge-pill badge-secondary">86</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-book"></i>
                                <span>
                                    Book
                                </span>
                                <div class="ml-auto badge badge-pill badge-danger">5</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-picture"></i>
                                <span>
                                    Picture
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a disabled href="javascript:void(0);" class="nav-link disabled">
                                <i class="nav-link-icon lnr-file-empty"></i>
                                <span>
                                    File Disabled
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
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
