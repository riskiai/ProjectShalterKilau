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
                                <h4 class="card-title">Data Al-Quran</h4>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addAlQuranModal">
                                    <i class="fa fa-plus"></i> Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="al-quran-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>No</th>
                                            <th>Nama Surat</th>
                                            <th>Ayat</th>
                                            <th>Keterangan</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_alquran as $alquran)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $alquran->nama }}</td>
                                            <td>{{ $alquran->ayat }}</td>
                                            <td>{{ $alquran->keterangan }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" class="btn btn-link btn-primary btn-lg edit-btn" 
                                                        data-id="{{ $alquran->id_quran }}" 
                                                        data-nama="{{ $alquran->nama }}" 
                                                        data-ayat="{{ $alquran->ayat }}" 
                                                        data-keterangan="{{ $alquran->keterangan }}" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editAlQuranModal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link btn-danger delete-btn" 
                                                        data-id="{{ $alquran->id_quran }}" 
                                                        data-nama="{{ $alquran->nama }}" 
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

        <!-- Modal for Add Al-Quran -->
        <div class="modal fade" id="addAlQuranModal" tabindex="-1" role="dialog" aria-labelledby="addAlQuranModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('alquran.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addAlQuranModalLabel">Tambah Data Al-Quran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Surat</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ayat</label>
                                <input type="text" name="ayat" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control" required></textarea>
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

        <!-- Modal for Edit Al-Quran -->
        <div class="modal fade" id="editAlQuranModal" tabindex="-1" role="dialog" aria-labelledby="editAlQuranModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="editAlQuranForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="current_page" id="current-page">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAlQuranModalLabel">Edit Data Al-Quran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_quran" id="edit-id">
                            <div class="form-group">
                                <label>Nama Surat</label>
                                <input type="text" name="nama" id="edit-nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ayat</label>
                                <input type="text" name="ayat" id="edit-ayat" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" id="edit-keterangan" class="form-control" required></textarea>
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
                    <form id="deleteAlQuranForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="current_page" id="current-page-delete">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus <strong id="delete-nama"></strong>?</p>
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
        var table = $('#al-quran-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "drawCallback": function(settings) {
                // Re-inisialisasi tombol untuk edit dan hapus ketika tabel digambar ulang
                $('.edit-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama = $(this).data('nama');
                    let ayat = $(this).data('ayat');
                    let keterangan = $(this).data('keterangan');

                    $('#edit-id').val(id);
                    $('#edit-nama').val(nama);
                    $('#edit-ayat').val(ayat);
                    $('#edit-keterangan').val(keterangan);
                    $('#current-page').val(table.page.info().page); // Simpan halaman saat ini

                    $('#editAlQuranForm').attr('action', '/admin_pusat/settings/alquran/update/' + id);
                });

                $('.delete-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama = $(this).data('nama');

                    $('#delete-nama').text(nama);
                    $('#current-page-delete').val(table.page.info().page); // Simpan halaman saat ini

                    $('#deleteAlQuranForm').attr('action', '/admin_pusat/settings/alquran/destroy/' + id);
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
