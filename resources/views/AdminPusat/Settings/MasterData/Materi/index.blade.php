@extends('AdminPusat.App.master')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Materi</h4>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addMateriModal">
                                <i class="fa fa-plus"></i> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="materi-table" class="display table table-striped table-hover">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Nama Materi</th>
                                        <th>Nama Level Binaan</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materi_data as $materi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $materi->mata_pelajaran }}</td>
                                        <td>{{ $materi->nama_materi }}</td>
                                        <td>{{ $materi->levelAnakBinaan->nama_level_binaan ?? 'N/A' }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" class="btn btn-link btn-primary btn-lg edit-btn" 
                                                    data-id="{{ $materi->id_materi }}" 
                                                    data-id_level="{{ $materi->id_level_anak_binaan }}"
                                                    data-mata_pelajaran="{{ $materi->mata_pelajaran }}"
                                                    data-nama_materi="{{ $materi->nama_materi }}" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editMateriModal">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <button type="button" class="btn btn-link btn-danger delete-btn" 
                                                    data-id="{{ $materi->id_materi }}" 
                                                    data-nama_materi="{{ $materi->nama_materi }}" 
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

    <!-- Modal for Add Materi -->
    <div class="modal fade" id="addMateriModal" tabindex="-1" role="dialog" aria-labelledby="addMateriModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('materi.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMateriModalLabel">Tambah Data Materi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Level Binaan</label>
                            <select name="id_level_anak_binaan" class="form-control" required>
                                @foreach($levels as $level)
                                    <option value="{{ $level->id_level_anak_binaan }}">{{ $level->nama_level_binaan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input type="text" name="mata_pelajaran" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Materi</label>
                            <input type="text" name="nama_materi" class="form-control" required>
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

    <!-- Modal for Edit Materi -->
    <div class="modal fade" id="editMateriModal" tabindex="-1" role="dialog" aria-labelledby="editMateriModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editMateriForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="current_page" id="current-page">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMateriModalLabel">Edit Data Materi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Level Binaan</label>
                            <select name="id_level_anak_binaan" id="edit-id_level" class="form-control" required>
                                @foreach($levels as $level)
                                    <option value="{{ $level->id_level_anak_binaan }}">{{ $level->nama_level_binaan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input type="text" name="mata_pelajaran" id="edit-mata_pelajaran" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Materi</label>
                            <input type="text" name="nama_materi" id="edit-nama_materi" class="form-control" required>
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
                <form id="deleteMateriForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="current_page" id="current-page-delete">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus <strong id="delete-nama_materi"></strong>?</p>
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
        var table = $('#materi-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "drawCallback": function(settings) {
                $('.edit-btn').on('click', function() {
                    let id = $(this).data('id');
                    let id_level = $(this).data('id_level');
                    let mata_pelajaran = $(this).data('mata_pelajaran');
                    let nama_materi = $(this).data('nama_materi');

                    $('#edit-id_level').val(id_level);
                    $('#edit-mata_pelajaran').val(mata_pelajaran);
                    $('#edit-nama_materi').val(nama_materi);
                    $('#current-page').val(table.page.info().page);

                    $('#editMateriForm').attr('action', '/admin_pusat/settings/materi/update/' + id);
                });

                $('.delete-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama_materi = $(this).data('nama_materi');

                    $('#delete-nama_materi').text(nama_materi);
                    $('#current-page-delete').val(table.page.info().page);

                    $('#deleteMateriForm').attr('action', '/admin_pusat/settings/materi/destroy/' + id);
                });
            }
        });

        @if(session('currentPage'))
            table.page({{ session('currentPage') }}).draw(false);
        @endif
    });
</script>
@endsection
