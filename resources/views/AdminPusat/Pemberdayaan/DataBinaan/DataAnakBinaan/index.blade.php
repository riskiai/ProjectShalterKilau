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
                            <h4 class="card-title">Data Anak Binaan</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <!-- Form Filter -->
                        <form action="{{ route('AnakBinaan') }}" method="GET" id="filter-form">
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
                                    <a href="{{ route('AnakBinaan') }}" class="btn btn-secondary ms-2">Reset</a>
                                </div>
                            </div>
                        </form>
                        <!-- End of Form Filter -->

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="anak-binaan-table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="text" id="search-no" class="form-control" placeholder="Cari No"></th>
                                        <th><input type="text" id="search-nama" class="form-control" placeholder="Cari Nama"></th>
                                        <th><input type="text" id="search-agama" class="form-control" placeholder="Cari Agama"></th>
                                        <th><input type="text" id="search-jk" class="form-control" placeholder="Cari Jenis Kelamin"></th>
                                        <th><input type="text" id="search-kk" class="form-control" placeholder="Cari Kepala Keluarga"></th>
                                        <th><input type="text" id="search-status-binaan" class="form-control" placeholder="Cari Status Binaan"></th>
                                        <th><input type="text" id="search-action" class="form-control" placeholder="Cari Action"></th>
                                    </tr>
                                    <tr style="text-align:center;">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Agama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kepala Keluarga</th>
                                        <th>Status Binaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_anak as $anak)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $anak->full_name }}</td>
                                        <td>{{ $anak->agama }}</td>
                                        <td>{{ $anak->jenis_kelamin }}</td>
                                        <td>{{ $anak->keluarga->kepala_keluarga }}</td>
                                        <td>{{ $anak->jenis_anak_binaan ?? '-' }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <!-- Tombol Show (Tanda Mata) -->
                                                <a href="{{ route('AnakBinaan.show', $anak->id_anak) }}"
                                                    class="btn btn-link btn-info btn-lg">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <!-- Tombol Nonaktifkan/Aktifkan -->
                                                @if($anak->status_validasi == 'Aktif')
                                                 <!-- Tombol Nonaktifkan -->
                                                 <form action="{{ route('anak.nonactivasi', $anak->id_anak) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-link btn-danger btn-lg">
                                                        <i class="fa fa-times"></i> Non Aktifkan
                                                    </button>
                                                </form>
                                                @else
                                                <form action="" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-link btn-primary btn-lg">
                                                        <i class="fa fa-check"></i> Aktifkan
                                                    </button>
                                                </form>
                                                @endif

                                                <!-- Tombol Hapus -->
                                                <button type="button" class="btn btn-link btn-danger btn-lg delete-btn"
                                                    data-id="{{ $anak->id_anak }}" data-nama="{{ $anak->full_name }}">
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
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="deleteAnakForm" method="POST">
                @csrf
                @method('DELETE')
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
        var table = $('#anak-binaan-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "columnDefs": [
                { "width": "5%", "targets": 0 },  // No
                { "width": "20%", "targets": 1 }, // Nama
                { "width": "10%", "targets": 2 }, // Agama
                { "width": "10%", "targets": 3 }, // Jenis Kelamin
                { "width": "15%", "targets": 4 }, // Kepala Keluarga
                { "width": "10%", "targets": 5 }, // Status Binaan
                { "width": "15%", "targets": 6 }  // Action
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
            }
        });

        // Event handler untuk tombol hapus
        $('.delete-btn').on('click', function() {
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            $('#delete-nama_anak').text(nama);
            $('#deleteAnakForm').attr('action', '/admin_pusat/pemberdayaan/AnakBinaan/' + id);
            $('#confirmDeleteModal').modal('show');
        });

        // Filter dropdown dependencies
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
