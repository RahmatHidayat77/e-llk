@extends('layouts.app')

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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIP</th>
                <th scope="col">Content 1</th>
                <th scope="col">Content 2</th>
                <th scope="col">Content 3</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@content</td>

                <td>@content</td>
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
        </tbody>
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
            <div class="modal-body">
                <form class="">
                    <div class="position-relative form-group"><label class="">Nama</label><input placeholder="Fullname"
                            type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">NIP</label><input placeholder="1111XXXX"
                            type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Email</label>
                        <input placeholder="email@mail.com" type="email" class="form-control">
                    </div>
                    <div class="position-relative form-group"><label class="">Password</label><input type="password"
                            class="form-control"></div>
                    <div class="position-relative form-group"><label>Select</label><select class="form-control">
                            <option>Users</option>
                            <option>Super Admin</option>
                        </select></div>
                    <div class="position-relative form-group"><label for="exampleFile" class="">File</label><input
                            name="file" id="exampleFile" type="file" class="form-control-file">
                        <small class="form-text text-muted">Ukuran file maksimal 2mb</small>
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
