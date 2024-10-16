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
                                <h4 class="card-title">Data Level Anak Binaan</h4>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addLevelBinaanModal">
                                    <i class="fa fa-plus"></i> Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="level-binaan-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>No</th>
                                            <th>Level Anak Binaan</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_levelbinaan as $levelbinaan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $levelbinaan->nama_level_binaan }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" class="btn btn-link btn-primary btn-lg edit-btn" 
                                                        data-id="{{ $levelbinaan->id_level_anak_binaan }}" 
                                                        data-nama_level_binaan="{{ $levelbinaan->nama_level_binaan }}" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editLevelBinaanModal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link btn-danger delete-btn" 
                                                        data-id="{{ $levelbinaan->id_level_anak_binaan }}" 
                                                        data-nama_level_binaan="{{ $levelbinaan->nama_level_binaan }}" 
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

        <!-- Modal for Add Level Binaan -->
        <div class="modal fade" id="addLevelBinaanModal" tabindex="-1" role="dialog" aria-labelledby="addLevelBinaanModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('levelbinaan.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addLevelBinaanModalLabel">Tambah Data Level Anak Binaan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Level Binaan</label>
                                <input type="text" name="nama_level_binaan" class="form-control" required>
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

        <!-- Modal for Edit Level Binaan -->
        <div class="modal fade" id="editLevelBinaanModal" tabindex="-1" role="dialog" aria-labelledby="editLevelBinaanModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="editLevelBinaanForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="current_page" id="current-page">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLevelBinaanModalLabel">Edit Data Level Anak Binaan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_level_anak_binaan" id="edit-id">
                            <div class="form-group">
                                <label>Nama Level Binaan</label>
                                <input type="text" name="nama_level_binaan" id="edit-nama_level_binaan" class="form-control" required>
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
                    <form id="deleteLevelBinaanForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="current_page" id="current-page-delete">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus <strong id="delete-nama_level_binaan"></strong>?</p>
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
        // Inisialisasi DataTables dengan callback untuk pagination
        var table = $('#level-binaan-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "drawCallback": function(settings) {
                // Re-inisialisasi tombol untuk edit dan hapus ketika tabel digambar ulang
                $('.edit-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama_level_binaan = $(this).data('nama_level_binaan');

                    $('#edit-id').val(id);
                    $('#edit-nama_level_binaan').val(nama_level_binaan);
                    $('#current-page').val(table.page.info().page); // Simpan halaman saat ini

                    $('#editLevelBinaanForm').attr('action', '/admin_pusat/settings/level_anak_binaan/update/' + id);
                });

                $('.delete-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama_level_binaan = $(this).data('nama_level_binaan');

                    $('#delete-nama_level_binaan').text(nama_level_binaan);
                    $('#current-page-delete').val(table.page.info().page); // Simpan halaman saat ini

                    $('#deleteLevelBinaanForm').attr('action', '/admin_pusat/settings/level_anak_binaan/destroy/' + id);
                });
            }
        });

        // Kembali ke halaman sebelumnya setelah operasi
        @if(session('currentPage'))
            table.page({{ session('currentPage') }}).draw(false);
        @endif
    });
</script>
@endsection
