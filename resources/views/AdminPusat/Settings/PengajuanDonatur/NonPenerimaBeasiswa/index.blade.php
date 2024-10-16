@extends('AdminPusat.App.master')

@section('style')
<style>
    /* Add your custom styles here if necessary */
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
                            <h4 class="card-title">Data Pengejuan Donatur
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <!-- Form Filter -->
                        <form action="{{ route('pengajuan_donatur') }}" method="GET" id="filter-form">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Kacab</label>
                                    <select name="id_kacab" id="filter-kacab" class="form-control">
                                        <option value="">Pilih Kacab</option>
                                        {{-- Dummy data kacab --}}
                                        <option value="1">Kacab 1</option>
                                        <option value="2">Kacab 2</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Wilayah Binaan</label>
                                    <select name="id_wilbin" id="filter-wilbin" class="form-control">
                                        <option value="">Pilih Wilayah Binaan</option>
                                        {{-- Dummy data wilayah binaan --}}
                                        <option value="1">Wilayah 1</option>
                                        <option value="2">Wilayah 2</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Shelter</label>
                                    <select name="id_shelter" id="filter-shelter" class="form-control">
                                        <option value="">Pilih Shelter</option>
                                        {{-- Dummy data shelter --}}
                                        <option value="1">Shelter 1</option>
                                        <option value="2">Shelter 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12 d-flex">
                                    <button type="submit" class="btn btn-primary">Terapkan</button>
                                    <a href="{{ route('pengajuan_donatur') }}" class="btn btn-secondary ms-2">Reset</a>
                                </div>
                            </div>
                        </form>
                        <!-- End of Form Filter -->

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="penerima-table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="text" id="search-no" class="form-control" placeholder="Cari No"></th>
                                        <th><input type="text" id="search-nama" class="form-control" placeholder="Cari Nama"></th>
                                        <th><input type="text" id="search-agama" class="form-control" placeholder="Cari Agama"></th>
                                        <th><input type="text" id="search-status" class="form-control" placeholder="Cari Status CPB"></th>
                                        <th><input type="text" id="search-jk" class="form-control" placeholder="Cari JK"></th>
                                        <th><input type="text" id="search-anak_ke" class="form-control" placeholder="Cari Anak Ke"></th>
                                        <th><input type="text" id="search-survey" class="form-control" placeholder="Cari Hasil Survey"></th>
                                        <th><input type="text" id="search-donatur" class="form-control" placeholder="Cari Donatur"></th>
                                        <th><input type="text" id="search-action" class="form-control" placeholder="Cari Action"></th>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Agama</th>
                                        <th>Status CPB</th>
                                        <th>JK</th>
                                        <th>Anak Ke</th>
                                        <th>Hasil Survey</th>
                                        <th>Donatur</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_penerima_beasiswa_npb as $penerima)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $penerima['nama_lengkap'] }}</td>
                                        <td>{{ $penerima['agama'] }}</td>
                                        <td>{{ $penerima['status_cpb'] }}</td>
                                        <td>{{ $penerima['jk'] }}</td>
                                        <td>{{ $penerima['anak_ke'] }}</td>
                                        <td>{{ $penerima['hasil_survey'] }}</td>
                                        <td>{{ $penerima['donatur'] }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="" class="btn btn-link btn-primary btn-lg edit-btn">
                                                    <i class="fa fa-edit"></i> Pilih Donatur
                                                </a>
                                                <button type="button" class="btn btn-link btn-danger delete-btn" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#confirmDeleteModal"
                                                    data-id="{{ $penerima['id'] }}"
                                                    data-nama="{{ $penerima['nama_lengkap'] }}">
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
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="deletePenerimaForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="current_page" id="current-page-delete">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus <strong id="delete-nama_penerima"></strong>?</p>
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
        var table = $('#penerima-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false, 
            "columnDefs": [
                { "width": "10%", "targets": 0 },  // No
                { "width": "15%", "targets": 1 }, // Nama Lengkap
                { "width": "10%", "targets": 2 }, // Agama
                { "width": "10%", "targets": 3 }, // Status CPB
                { "width": "10%", "targets": 4 }, // JK
                { "width": "10%", "targets": 5 }, // Anak Ke
                { "width": "10%", "targets": 6 }, // Hasil Survey
                { "width": "15%", "targets": 7 }, // Donatur
                { "width": "20%", "targets": 8 }  // Aksi
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
                $('.delete-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama = $(this).data('nama');
                    $('#delete-nama_penerima').text(nama);
                    $('#current-page-delete').val(table.page.info().page);
                    $('#deletePenerimaForm').attr('action', '/admin_pusat/settings/penerima_beasiswa/' + id);
                });

                $('.edit-btn').on('click', function() {
                    let id = $(this).data('id');
                    let currentPage = table.page.info().page;
                    window.location.href = '/admin_pusat/settings/penerima_beasiswa/' + id + '/edit?current_page=' + currentPage;
                });
            }
        });

        @if(session('currentPage'))
            table.page({{ session('currentPage') }}).draw(false);
        @endif

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
