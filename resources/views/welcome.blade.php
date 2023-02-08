<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container my-5 p-4">
        <div class="table-responsive">
            <button class="btn btn-primary my-5 mx-5" id="tambah">Tambah</button>
            <table id="DataTableExample" class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Opsi</th>
                </thead>
            </table>
        </div>
        {{-- create --}}
        <div class="modal fade" tabindex="-1" id="theModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="theModalHeading"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="theForm" id="theForm" class="form-horizontal">
                            <div class="row my-2">
                                <div class="col-2">
                                    <label for="nama">Name</label>
                                </div>
                                <div class="col-10">
                                    <input type="text" id="nama" name="nama" class="form-control">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-2">
                                    <label for="email">Username</label>
                                </div>
                                <div class="col-10">
                                    <input type="text" id="username" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-2">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-10">
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end align-content-center">
                                <button type="submit" id="saveBtn" value="create"
                                    class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- delete --}}
        <div class="modal fade" tabindex="-1" id="theModalDelete" aria-labelledby="DeleteModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="theModalDeleteHeading"></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="userIdDelete" name="userIdDelete">
                    </div>
                    <center>
                        <h5>Anda Yakin Menghapus Ini ?</h5>
                    </center>
                    <button class="btn btn-danger my-3 mx-3" id="DeleteBtn">Delete</button>
                </div>
            </div>
        </div>
        {{-- update --}}
        <div class="modal fade" tabindex="-1" id="theModalUpdate" aria-labelledby="UpdateModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="" id="theModalUpdateHeading"></h5>
                    </div>
                    <div class="modal-body">
                        <form name="theFormUpdate" id="theFormUpdate">
                            <input type="hidden" name="userIdUpdate" id="userIdUpdate">
                            <div class="row my-3">
                                <div class="col-2">
                                    <label for="edit_name">Name</label>
                                </div>
                                <div class="col-10">
                                    <input type="text" name="edit_name" id="edit_name" class="form-control">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-2">
                                    <label for="edit_username">Username</label>
                                </div>
                                <div class="col-10">
                                    <input type="text" name="edit_username" id="edit_username" class="form-control">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-2">
                                    <label for="edit_password">Password</label>
                                </div>
                                <div class="col-10">
                                    <input type="password" name="edit_password" id="edit_password" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end align-content-center">
                                <button class="btn btn-primary" type="submit" id="saveBtnUpdate"
                                    value="update">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- --}}
        <script type="text/javascript">
            $(function(){
                        $.ajaxSetup({
                       headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                var table = $('#DataTableExample').DataTable({
                    processing: true,
                    serverSide: true,
                    paging: true,
                    ajax:"{{ route('admin.admin.index') }}",
                    columns:[
                    {
                        data:'DT_RowIndex',
                        name:'DT_RowIndex'
                    },{
                        data:'name',
                        name:'name',
                    },
                    {
                        data:'username',
                        name:'username'
                    },
                    {
                        data:'action',
                        name:'action'
                    }
                ]
                });
                $('#import').click(function(){
                    $('#importForm').trigger("reset");
                    $('#importModalHeading').html("Import Data");
                    $('#importModal').modal('show');
                });
                $('#tambah').click(function(){
                    $('#theForm').trigger('reset');
                    $('#saveBtn').val("save");
                    $('#theModalHeading').html("tambah data");
                    $('#theModal').modal('show');
                });
               $('body').on('click','.delete-data', function(){
                var id_user = $(this).data('id');
                $.get("{{route('admin.admin.index')}}"+ '/' + id_user + '', function(data){
                    $('#theModalDeleteHeading').html("Hapus Data");
                    $('#userIdDelete').val(data.id);
                    $('#theModalDelete').modal('show');
                });

               });
               $('body').on('click','.edit-data', function(){
                    var id_user = $(this).data('id');
                $.get("{{route('admin.admin.index')}}" + '/' + id_user + '', function(data){
                    $('#theModalUpdateHeading').html('Update Data');
                    $('#userIdUpdate').val(data.id);
                    $('#edit_name').val(data.name);
                    $('#edit_username').val(data.username);
                    $('#theModalUpdate').modal('show');
                });
               });

                $('#saveBtn').click(function(e){
                    e.preventDefault();
                    $(this).html('Simpan');
                    $.ajax({
                        data: $('#theForm').serialize(),
                        url: "{{ route('admin.admin.store') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            $('#theForm').trigger('reset');
                            $('#theModal').modal('hide');
                            table.draw();
                            swal.fire(
                                'Good job!',
                                'Data Saved',
                                'success'
                            );
                        },
                        error: function(data){
                            console.log('Error:', data);
                            $('#saveBtn').html('Simpan');
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Data Not Saved',
                            })
                        }
                    });
                });

                $('#DeleteBtn').click(function(e){
                    e.preventDefault();
                    $(this).html('Delete')
                    var id_User_Delete = $('#userIdDelete').val();
                    $.ajax({
                        url : "{{route('admin.admin.index')}}" + '/' + id_User_Delete + '',
                        type: "DELETE",
                        success: function(data){
                            $('#theModalDelete').modal('hide');
                            table.draw();
                            Swal.fire(
                                'Good job!',
                                'Data Saved',
                                'success'
                            )
                        },
                       error: function(data){
                            console.log('Erorr :',data);
                            $('#DeleteBtn').html('Delete');
                        }
                    });
                 });

                 $('#saveBtnUpdate').click(function(e){
                    e.preventDefault();
                    $(this).html('Update');
                    var id_upadate = $('#userIdUpdate').val();
                    $.ajax({
                        data: $('#theFormUpdate').serialize(),
                        url: "{{ route('admin.admin.index') }}" + '/' + id_upadate + '',
                        type: "PUT",
                        dataType: 'json',
                        success: function(data){
                            $('#theFormUpdate').trigger('reset');
                            $('#theModalUpdate').modal('hide');
                            table.draw();
                            Swal.fire(
                            'Good job!',
                            'Data Updated',
                            'success'
                            )
                        },
                        error: function(data){
                            console.log('Error',data);
                            $('#saveBtnUpdate').html('Update');
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Data Not Updated',
                            })
                        }
                    });
                 });
            });
        </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>
