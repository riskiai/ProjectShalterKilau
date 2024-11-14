@extends('AdminPusat.App.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Absensi Anak</h4>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addModal">
                            <i class="fa fa-plus"></i> Tambah Data Absensi
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="absensi-anak-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_absensi as $absensi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $absensi->anak?->full_name ?? 'Data Anak Tidak Ditemukan' }}</td> <!-- Penanganan null -->
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="#" class="btn btn-link btn-primary btn-lg edit-btn"
                                                data-bs-toggle="modal" data-bs-target="#editModal"
                                                data-id="{{ $absensi->id_absen_user }}"
                                                data-anak="{{ $absensi->anak->id_anak ?? '' }}" 
                                                data-fullname="{{ $absensi->anak->full_name ?? 'Data Anak Tidak Ditemukan' }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-link btn-danger delete-btn"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                data-id="{{ $absensi->id_absen_user }}"
                                                data-anak="{{ $absensi->anak->full_name ?? 'Data Anak Tidak Ditemukan' }}">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="addForm" method="POST" action="{{ route('absen_anak.create') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Absensi Anak</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Pilih Anak</label>
                                    <select name="id_anak" id="addAnakSelect" class="form-control">
                                        @foreach ($available_anak as $anak)
                                            <option value="{{ $anak->id_anak }}">{{ $anak->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="editForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Absensi Anak</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Nama Absen Anak</label>
                                    <input type="text" id="currentAnak" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Ganti Absensi Anak</label>
                                    <select name="id_anak" id="anakSelect" class="form-control">
                                        @foreach ($available_anak as $anak)
                                            <option value="{{ $anak->id_anak }}">{{ $anak->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus absensi anak <strong id="delete-anak"></strong>?</p>
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
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#absensi-anak-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

        // Edit modal
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var anakId = button.data('anak');
            var anakFullName = button.data('fullname') || 'Data Anak Tidak Ditemukan';

            $('#editForm').attr('action', "{{ route('absen_anak.update', '') }}/" + id);
            $('#currentAnak').val(anakFullName); // Set current name in input
            $('#anakSelect').val(anakId);
        });

        // Delete modal
        $('.delete-btn').on('click', function() {
            let id = $(this).data('id');
            let anak = $(this).data('anak') || 'Data Anak Tidak Ditemukan';
            $('#delete-anak').text(anak);
            $('#deleteForm').attr('action', "{{ url('admin_pusat/settings/absensi_user_anak') }}/" + id);
        });
    });
</script>
@endsection
