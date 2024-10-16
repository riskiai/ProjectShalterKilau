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
                            <h4 class="card-title">Data Admin Shelter</h4>
                            <a href="{{ route('admin_shelter.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <!-- Form Filter -->
                        <form action="{{ route('admin_shelter') }}" method="GET" id="filter-form">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Kacab</label>
                                    <select name="id_kacab" id="filter-kacab" class="form-control">
                                        <option value="">Pilih Kacab</option>
                                        @foreach($kacab as $kac)
                                            <option value="{{ $kac->id_kacab }}" {{ request()->id_kacab == $kac->id_kacab ? 'selected' : '' }}>
                                                {{ $kac->nama_kacab }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Wilayah Binaan</label>
                                    <select name="id_wilbin" id="filter-wilbin" class="form-control">
                                        <option value="">Pilih Wilayah Binaan</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Shelter</label>
                                    <select name="id_shelter" id="filter-shelter" class="form-control">
                                        <option value="">Pilih Shelter</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12 d-flex">
                                    <button type="submit" class="btn btn-primary">Terapkan</button>
                                    <a href="{{ route('admin_shelter') }}" class="btn btn-secondary ms-2">Reset</a>
                                </div>
                            </div>
                        </form>
                        <!-- End of Form Filter -->

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="admin_shelter-table" class="display table table-striped table-hover">
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
                                    @foreach($data_admin_shelter as $adminShelter)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $adminShelter->nama_lengkap }}</td>
                                        <td>{{ $adminShelter->user->email }}</td>
                                        <td>{{ $adminShelter->no_hp }}</td>
                                        <td>{{ $adminShelter->alamat_adm }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin_shelter.show', $adminShelter->id_admin_shelter) }}?current_page={{ request()->query('page', 1) }}" class="btn btn-link btn-primary btn-lg">
                                                    <i class="fa fa-eye"></i> 
                                                </a>
                                                <button type="button" class="btn btn-link btn-danger delete-btn" data-id="{{ $adminShelter->id_admin_shelter }}" data-nama="{{ $adminShelter->nama_lengkap }}">
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
        var table = $('#admin_shelter-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "stateSave": true,
            @if(session('currentPage'))
                "page": {{ session('currentPage') }}, // Set current page
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
                    $('#deleteForm').attr('action', '/admin_pusat/settings/admin_shelter/' + id);
                    $('#deleteModal').modal('show');
                });
            }
        });

        // Set pagination page after refresh
        @if(session('currentPage'))
            table.page({{ session('currentPage') }}).draw(false);
        @endif

        // Load Wilayah Binaan based on Kacab
        $('#filter-kacab').on('change', function() {
            var id_kacab = $(this).val();
            $('#filter-wilbin').empty().append('<option value="">Pilih Wilayah Binaan</option>');
            $('#filter-shelter').empty().append('<option value="">Pilih Shelter</option>');

            if (id_kacab) {
                $.ajax({
                    url: '/admin_pusat/settings/wilbin/' + id_kacab,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#filter-wilbin').append('<option value="' + value.id_wilbin + '">' + value.nama_wilbin + '</option>');
                        });
                    }
                });
            }
        });

        // Load Shelter based on Wilayah Binaan
        $('#filter-wilbin').on('change', function() {
            var id_wilbin = $(this).val();
            $('#filter-shelter').empty().append('<option value="">Pilih Shelter</option>');

            if (id_wilbin) {
                $.ajax({
                    url: '/admin_pusat/settings/shelter/' + id_wilbin,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#filter-shelter').append('<option value="' + value.id_shelter + '">' + value.nama_shelter + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
@endsection
