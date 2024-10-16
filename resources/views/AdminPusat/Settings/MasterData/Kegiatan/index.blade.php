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
                                <h4 class="card-title">Data Kegiatan</h4>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addKegiatanModal">
                                    <i class="fa fa-plus"></i> Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="kegiatan-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>No</th>
                                            <th>Nama Kegiatan</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_kegiatan as $kegiatan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kegiatan->nama_kegiatan }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" class="btn btn-link btn-primary btn-lg edit-btn" 
                                                        data-id="{{ $kegiatan->id_kegiatan }}" 
                                                        data-nama_kegiatan="{{ $kegiatan->nama_kegiatan }}" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editKegiatanModal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link btn-danger delete-btn" 
                                                        data-id="{{ $kegiatan->id_kegiatan }}" 
                                                        data-nama_kegiatan="{{ $kegiatan->nama_kegiatan }}" 
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
        </div>

        <!-- Modal for Add Kegiatan -->
        <div class="modal fade" id="addKegiatanModal" tabindex="-1" role="dialog" aria-labelledby="addKegiatanModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('kegiatan.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addKegiatanModalLabel">Tambah Data Kegiatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control" required>
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

        <!-- Modal for Edit Kegiatan -->
        <div class="modal fade" id="editKegiatanModal" tabindex="-1" role="dialog" aria-labelledby="editKegiatanModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="editKegiatanForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="current_page" id="current-page">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editKegiatanModalLabel">Edit Data Kegiatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_kegiatan" id="edit-id">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" id="edit-nama_kegiatan" class="form-control" required>
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
                    <form id="deleteKegiatanForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="current_page" id="current-page-delete">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus <strong id="delete-nama_kegiatan"></strong>?</p>
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
        var table = $('#kegiatan-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "drawCallback": function(settings) {
                $('.edit-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama_kegiatan = $(this).data('nama_kegiatan');

                    $('#edit-id').val(id);
                    $('#edit-nama_kegiatan').val(nama_kegiatan);
                    $('#current-page').val(table.page.info().page);

                    $('#editKegiatanForm').attr('action', '/admin_pusat/settings/kegiatan/update/' + id);
                });

                $('.delete-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama_kegiatan = $(this).data('nama_kegiatan');

                    $('#delete-nama_kegiatan').text(nama_kegiatan);
                    $('#current-page-delete').val(table.page.info().page);

                    $('#deleteKegiatanForm').attr('action', '/admin_pusat/settings/kegiatan/destroy/' + id);
                });
            }
        });

        @if(session('currentPage'))
            table.page({{ session('currentPage') }}).draw(false);
        @endif
    });
</script>
@endsection
