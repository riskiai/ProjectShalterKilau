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
                                <h4 class="card-title">Data Anak Binaan Non-Aktif
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table id="anak-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr style="text-align:center;">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Agama</th>
                                            <th>Tempat Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Anak Ke</th>
                                            <th>Kepala Keluarga</th>
                                            <th>Status Binaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_anak as $anak)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $anak->full_name }}</td>
                                                <td>{{ $anak->agama }}</td>
                                                <td>{{ $anak->tempat_lahir }}, {{ $anak->tanggal_lahir }}</td>
                                                <td>{{ $anak->jenis_kelamin }}</td>
                                                <td>{{ $anak->anak_ke }}</td>
                                                <td>{{ $anak->keluarga->kepala_keluarga }}</td>
                                                <td>{{ $anak->status_cpb ?? '-' }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <!-- Tombol Aktivasi -->
                                                        <form action="{{ route('anak.nonbinaanactivasi', $anak->id_anak) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-link btn-primary btn-lg"
                                                                style="text-decoration: none; border: none;">
                                                                <i class="fa fa-check"></i> Aktifkan
                                                            </button>
                                                        </form>

                                                        <!-- Tombol Tanda Mata -->
                                                        <a href="{{ route('nonAnakBinaan.show', $anak->id_anak) }}"
                                                            class="btn btn-link btn-info btn-lg">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <!-- Tombol Hapus -->
                                                        <button type="button"
                                                            class="btn btn-link btn-danger btn-lg delete-btn"
                                                            data-id="{{ $anak->id_anak }}"
                                                            data-nama="{{ $anak->full_name }}">
                                                            <i class="fa fa-trash"></i>
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
    </div>

    <!-- Modal for Confirm Delete -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deleteAnakForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="current_page" id="current-page-delete">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus <strong id="delete-nama_anak"></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            var table = $('#anak-table').DataTable({
                "pageLength": 10,
                "searching": true,
                "paging": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });

            // Event handler untuk tombol hapus
            $('.delete-btn').on('click', function() {
                let id = $(this).data('id');
                let nama = $(this).data('nama');

                // Set nama yang akan dihapus dan action pada form
                $('#delete-nama_anak').text(nama);
                $('#deleteAnakForm').attr('action', '/admin_pusat/pemberdayaan/NonAnakBinaan/' + id);

                // Tampilkan modal konfirmasi
                $('#confirmDeleteModal').modal('show');
            });
        });
    </script>
@endsection
