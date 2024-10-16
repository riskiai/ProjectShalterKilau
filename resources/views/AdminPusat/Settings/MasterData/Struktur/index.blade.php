@extends('AdminPusat.App.master')

@section('style')
    <style>
        /* Custom CSS jika diperlukan */
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Struktur</h4>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addStrukturModal">
                                    <i class="fa fa-plus"></i> Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="struktur-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>No</th>
                                            <th>Jabatan</th>
                                            <th>Status</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_struktur as $struktur)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $struktur->struktur }}</td>
                                            <td>{{ ucfirst($struktur->status) }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" class="btn btn-link btn-primary btn-lg edit-btn" 
                                                        data-id="{{ $struktur->id_struktur }}" 
                                                        data-struktur="{{ $struktur->struktur }}" 
                                                        data-status="{{ $struktur->status }}" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editStrukturModal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link btn-danger delete-btn" 
                                                        data-id="{{ $struktur->id_struktur }}" 
                                                        data-struktur="{{ $struktur->struktur }}" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#confirmDeleteModal">
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

            <!-- Modal for Add Struktur -->
            <div class="modal fade" id="addStrukturModal" tabindex="-1" role="dialog" aria-labelledby="addStrukturModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('struktur.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="addStrukturModalLabel">Tambah Data Struktur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Struktur</label>
                                    <input type="text" name="struktur" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for Edit Struktur -->
            <div class="modal fade" id="editStrukturModal" tabindex="-1" role="dialog" aria-labelledby="editStrukturModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="editStrukturForm" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="current_page" id="current-page">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStrukturModalLabel">Edit Data Struktur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_struktur" id="edit-id">
                                <div class="form-group">
                                    <label>Struktur</label>
                                    <input type="text" name="struktur" id="edit-struktur" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="edit-status" class="form-control" required>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for Confirm Delete -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="deleteStrukturForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="current_page" id="current-page-delete">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus <strong id="delete-struktur"></strong>?</p>
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
        var table = $('#struktur-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "drawCallback": function(settings) {
                $('.edit-btn').on('click', function() {
                    let id = $(this).data('id');
                    let struktur = $(this).data('struktur');
                    let status = $(this).data('status');

                    $('#edit-id').val(id);
                    $('#edit-struktur').val(struktur);
                    $('#edit-status').val(status);
                    $('#current-page').val(table.page.info().page);

                    $('#editStrukturForm').attr('action', '/admin_pusat/settings/struktur/update/' + id);
                });

                $('.delete-btn').on('click', function() {
                    let id = $(this).data('id');
                    let struktur = $(this).data('struktur');

                    $('#delete-struktur').text(struktur);
                    $('#current-page-delete').val(table.page.info().page);

                    $('#deleteStrukturForm').attr('action', '/admin_pusat/settings/struktur/destroy/' + id);
                });
            }
        });

        @if(session('currentPage'))
            table.page({{ session('currentPage') }}).draw(false);
        @endif
    });
</script>
@endsection
