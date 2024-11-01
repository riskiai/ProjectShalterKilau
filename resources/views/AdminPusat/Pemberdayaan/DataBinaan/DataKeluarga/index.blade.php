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
                                <h4 class="card-title">Data Keluarga</h4>
                            </div>
                        </div>
                        <div class="card-body">

                            <!-- Form Filter -->
                            <form action="{{ route('keluarga') }}" method="GET" id="filter-form">
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Kacab</label>
                                        <select name="id_kacab" id="filter-kacab" class="form-control">
                                            <option value="">Pilih Kacab</option>
                                            @foreach ($kacab as $kac)
                                                <option value="{{ $kac->id_kacab }}"
                                                    {{ request()->id_kacab == $kac->id_kacab ? 'selected' : '' }}>
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
                                        <a href="{{ route('keluarga') }}" class="btn btn-secondary ms-2">Reset</a>
                                    </div>
                                </div>
                            </form>
                            <!-- End of Form Filter -->

                            <!-- Table -->
                            <div class="table-responsive">
                                <table id="keluarga-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="text" id="search-no" class="form-control"
                                                    placeholder="Cari No"></th>
                                            <th><input type="text" id="search-nokk" class="form-control"
                                                    placeholder="Cari No KK"></th>
                                            <th><input type="text" id="search-kepala-keluarga" class="form-control"
                                                    placeholder="Cari Kepala Keluarga"></th>
                                            <th><input type="text" id="search-status-ortu" class="form-control"
                                                    placeholder="Cari Status Orang Tua"></th>
                                            <th><input type="text" id="search-kacab" class="form-control"
                                                    placeholder="Cari Kacab"></th>
                                            <th><input type="text" id="search-wilbin" class="form-control"
                                                    placeholder="Cari Wilbin"></th>
                                            <th><input type="text" id="search-shelter" class="form-control"
                                                    placeholder="Cari Shelter"></th>
                                            <th><input type="text" id="search-action" class="form-control"
                                                    placeholder="Aksi"></th>
                                        </tr>
                                        <tr style="text-align:center;">
                                            <th>No</th>
                                            <th>No KK</th>
                                            <th>Kepala Keluarga</th>
                                            <th>Status Orang Tua</th>
                                            <th>Kacab</th>
                                            <th>Wilayah Binaan</th>
                                            <th>Shelter</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_keluarga as $keluarga)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $keluarga->no_kk }}</td>
                                                <td>{{ $keluarga->kepala_keluarga }}</td>
                                                <td>{{ $keluarga->status_ortu }}</td>
                                                <td>{{ $keluarga->kacab->nama_kacab ?? '-' }}</td>
                                                <td>{{ $keluarga->wilbin->nama_wilbin ?? '-' }}</td>
                                                <td>{{ $keluarga->shelter->nama_shelter ?? '-' }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <!-- Tombol Show (Tanda Mata) -->
                                                        <a href="{{ route('Keluarga.show', ['id' => $keluarga->id_keluarga]) }}"
                                                            class="btn btn-link btn-info btn-lg">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <!-- Tombol Hapus -->
                                                        <button type="button"
                                                            class="btn btn-link btn-danger btn-lg delete-btn"
                                                            data-id="{{ $keluarga->id_keluarga }}"
                                                            data-nama="{{ $keluarga->kepala_keluarga }}">
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
            <form id="deleteKeluargaForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus <strong id="delete-nama_keluarga"></strong>?</p>
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
            var table = $('#keluarga-table').DataTable({
                "pageLength": 10,
                "searching": true,
                "paging": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "columnDefs": [{
                        "width": "5%",
                        "targets": 0
                    }, // No
                    {
                        "width": "15%",
                        "targets": 1
                    }, // No KK
                    {
                        "width": "20%",
                        "targets": 2
                    }, // Kepala Keluarga
                    {
                        "width": "15%",
                        "targets": 3
                    }, // Status Orang Tua
                    {
                        "width": "15%",
                        "targets": 4
                    }, // Kacab
                    {
                        "width": "15%",
                        "targets": 5
                    }, // Wilayah Binaan
                    {
                        "width": "10%",
                        "targets": 6
                    }, // Shelter
                    {
                        "width": "10%",
                        "targets": 7
                    } // Aksi
                ],
                initComplete: function() {
                    this.api().columns().every(function(index) {
                        var that = this;
                        $('input', $('thead tr:nth-child(1) th').eq(index)).on(
                            'keyup change clear',
                            function() {
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
                $('#delete-nama_keluarga').text(nama);
                $('#deleteKeluargaForm').attr('action', '/admin_pusat/pemberdayaan/keluarga/' + id);
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
                                $('#filter-wilbin').append('<option value="' + value
                                    .id_wilbin + '">' + value.nama_wilbin +
                                    '</option>');
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
                                $('#filter-shelter').append('<option value="' + value
                                    .id_shelter + '">' + value.nama_shelter +
                                    '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
