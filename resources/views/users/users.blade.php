@extends('layouts.app')

@section('page_styles')
<style  type="text/css">

.b-t-0{
    border-bottom: 0 !important; 
}
.img-usr{
    width:20px;
    height: 20px;
    border-radius: 50%;
    object-fit: cover;
    object-position: center;
}

</style>
@endsection

@section('sub_header')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Users
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
                    Add New User
                </button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('content')
<div class="card-body">
    <table id="data_users_reguler" class="table" style="width:100%">
        <thead>
            <tr>
                <th class="b-t-0">#</th>
                <th class="b-t-0">NIP</th>
                <th class="b-t-0">Name</th>
                <th class="b-t-0">Email</th>
                <th class="b-t-0">Jabatan</th>
                <th class="b-t-0">Foto</th>
                <th class="b-t-0">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->jabatan}}</td>
                    <td><img src="{{ $item->foto }}" class="img-usr" alt="Cinque Terre"></td>
                    <td>
                        <div role="group" class="btn-group-sm btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-primary" data-toggle="modal" data-target="#modalSee">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-eye fa-w-20"></i>
                                </span>
                            </label>
                            <label class="btn btn-warning">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-edit fa-w-20"></i>
                                </span>
                            </label>
                            <label class="btn btn-danger">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-trash fa-w-20"></i>
                                </span>
                            </label>
                        </div>
                    </td>
                </tr>
            @endforeach

    </table>
</div>
@endsection

@section('modal')
<!-- Add modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="" class="kt-form" enctype="multipart/form-data" id="m_form_create">
                @csrf
                <div class="modal-body">

                    <div class="position-relative form-group"><label class="">Nama</label><input placeholder="Fullname"
                            type="text" class="form-control" name="fullname"></div>
                    <div class="position-relative form-group"><label class="">NIP</label><input placeholder="1111XXXX"
                            type="text" class="form-control" name="nip"></div>
                    <div class="position-relative form-group"><label class="">Email</label>
                        <input placeholder="email@mail.com" type="email" class="form-control" name="email">
                    </div>
                    <div class="position-relative form-group"><label class="">Password</label><input type="text"
                            class="form-control" name="password"></div>
                    <div class="position-relative form-group"><label>Jabatan</label><select class="form-control"
                            name="jabatan">
                            <option>Pilih Jabatan</option>
                            <option value="pegawai">Pegawai</option>
                            <option value="kasubag">KaSubBag</option>
                            <option value="sekretaris">Sekretaris</option>
                        </select></div>
                    <div class="position-relative form-group"><label for="exampleFile" class="">File</label><input
                            name="file" id="exampleFile" type="file" class="form-control-file">
                        <small class="form-text text-muted">Ukuran file maksimal 2mb</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="m_submit">Save changes</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- See modal -->
<div class="modal fade" id="modalSee" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Data Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative form-group"><label class="">Nama</label><input placeholder="Fullname"
                        type="text" class="form-control" disabled></div>
                <div class="position-relative form-group"><label class="">NIP</label><input placeholder="1111XXXX"
                        type="text" class="form-control" disabled></div>
                <div class="position-relative form-group"><label class="">Email</label>
                    <input placeholder="email@mail.com" type="email" class="form-control" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
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

@section('page_scripts')
<script src="js/users.js" type="text/javascript"></script>
@endsection
