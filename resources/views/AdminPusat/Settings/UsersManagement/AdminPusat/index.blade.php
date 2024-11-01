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
                            <h4 class="card-title">Data Admin Pusat</h4>
                            <a href="{{ route('admin_pusat.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="admin_pusat-table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="text" id="search-no" class="form-control" placeholder="Cari No"></th>
                                        <th><input type="text" id="search-nama" class="form-control" placeholder="Cari Nama"></th>
                                        <th><input type="text" id="search-email" class="form-control" placeholder="Cari Email"></th>
                                        <th><input type="text" id="search-no_hp" class="form-control" placeholder="Cari No HP"></th>
                                        <th><input type="text" id="search-alamat" class="form-control" placeholder="Cari Alamat"></th>
                                        <th><input type="text" id="search-action" class="form-control" placeholder="Cari Aksi"></th>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_admin_pusat as $adminPusat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $adminPusat->nama_lengkap }}</td>
                                        <td>{{ $adminPusat->user->email }}</td>
                                        <td>{{ $adminPusat->no_hp }}</td>
                                        <td>{{ $adminPusat->alamat }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin_pusat.show', $adminPusat->id_admin_pusat) }}?current_page={{ request()->query('page', 1) }}" class="btn btn-link btn-primary btn-lg">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-link btn-danger delete-btn" data-id="{{ $adminPusat->id_admin_pusat }}" data-nama="{{ $adminPusat->nama_lengkap }}">
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="current_page" id="current-page-delete">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
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
        var table = $('#admin_pusat-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "stateSave": true,
            @if(session('currentPage'))
                "page": {{ session('currentPage') }},
            @endif
            "columnDefs": [
                { "width": "5%", "targets": 0 },  // No
                { "width": "25%", "targets": 1 }, // Nama Lengkap
                { "width": "25%", "targets": 2 }, // Email
                { "width": "15%", "targets": 3 }, // No HP
                { "width": "20%", "targets": 4 }, // Alamat
                { "width": "10%", "targets": 5 }  // Aksi
            ],
            initComplete: function () {
                this.api().columns().every(function (index) {
                    var that = this;
                    $('input', $('thead tr:nth-child(1) th').eq(index)).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
            },
            "drawCallback": function(settings) {
                // Delete button event
                $('.delete-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama = $(this).data('nama');
                    let currentPage = table.page.info().page;

                    $('#delete-nama').text(nama);
                    $('#current-page-delete').val(currentPage);
                    $('#deleteForm').attr('action', '/admin_pusat/settings/admin_pusat/' + id);
                    $('#deleteModal').modal('show');
                });
            }
        });

        @if(session('currentPage'))
            table.page({{ session('currentPage') }}).draw(false);
        @endif
    });
</script>
@endsection
