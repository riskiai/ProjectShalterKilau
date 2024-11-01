@extends('AdminPusat.App.master')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Users</h4>
                            <a href="{{ route('usersall.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i> Tambah User
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="users-table" class="display table table-striped table-hover">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->level }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="#" class="btn btn-link btn-primary btn-lg edit-btn"
                                                    data-id="{{ $user->id_users }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-link btn-danger delete-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal"
                                                    data-id="{{ $user->id_users }}"
                                                    data-username="{{ $user->username }}">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
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

    <!-- Modal for Confirm Delete -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deleteUserForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="current_page" id="current-page-delete">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus user <strong id="delete-username"></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        var table = $('#users-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "drawCallback": function(settings) {
                $('.delete-btn').on('click', function() {
                    let id = $(this).data('id');
                    let username = $(this).data('username');
                    $('#delete-username').text(username);
                    $('#current-page-delete').val(table.page.info().page);
                    $('#deleteUserForm').attr('action', '/admin_pusat/settings/usersall/destroy/' + id);
                });

                $('.edit-btn').on('click', function() {
                    let id = $(this).data('id');
                    let currentPage = table.page.info().page;
                    window.location.href = '/admin_pusat/settings/usersall/' + id + '/edit?current_page=' + currentPage;
                });
            }
        });

        @if(session('currentPage'))
            table.page({{ session('currentPage') }}).draw(false);
        @endif
    });
</script>
@endsection
