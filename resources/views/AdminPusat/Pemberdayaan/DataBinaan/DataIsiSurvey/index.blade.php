@extends('AdminPusat.App.master')

@section('style')
    <style>
        /* Custom CSS if needed */
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
                                <h4 class="card-title">Data Keluarga untuk Survey</h4>
                            </div>
                        </div>
                        <div class="card-body">

                            <!-- Filter Form -->
                            <form action="{{ route('surveykeluarga') }}" method="GET" id="filter-form">
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Kacab</label>
                                        <select name="id_kacab" id="filter-kacab" class="form-control">
                                            <option value="">Pilih Kacab</option>
                                            @foreach ($kacab as $kac)
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
                                        <a href="{{ route('surveykeluarga') }}" class="btn btn-secondary ms-2">Reset</a>
                                    </div>
                                </div>
                            </form>
                            <!-- End of Filter Form -->

                            <!-- Survey Table -->
                            <div class="table-responsive">
                                <table id="survey-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="text" id="search-no" class="form-control" placeholder="Cari No"></th>
                                            <th><input type="text" id="search-nokk" class="form-control" placeholder="Cari No KK"></th>
                                            <th><input type="text" id="search-kepala-keluarga" class="form-control" placeholder="Cari Kepala Keluarga"></th>
                                            <th><input type="text" id="search-kacab" class="form-control" placeholder="Cari Kacab"></th>
                                            <th><input type="text" id="search-wilbin" class="form-control" placeholder="Cari Wilbin"></th>
                                            <th><input type="text" id="search-shelter" class="form-control" placeholder="Cari Shelter"></th>
                                            <th><input type="text" id="search-action" class="form-control" placeholder="Aksi"></th>
                                        </tr>
                                        <tr style="text-align:center;">
                                            <th>No</th>
                                            <th>No KK</th>
                                            <th>Kepala Keluarga</th>
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
                                                <td>{{ $keluarga->kacab->nama_kacab ?? '-' }}</td>
                                                <td>{{ $keluarga->wilbin->nama_wilbin ?? '-' }}</td>
                                                <td>{{ $keluarga->shelter->nama_shelter ?? '-' }}</td>
                                                <td>
                                                    <a href="{{ route('surveykeluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-keluarga']) }}" class="btn btn-success btn-sm">
                                                        <i class="fa fa-plus"></i> Isi Survey
                                                    </a>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End of Survey Table -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#survey-table').DataTable({
                "pageLength": 10,
                "searching": true,
                "paging": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "columnDefs": [
                    { "width": "5%", "targets": 0 },    // No
                    { "width": "15%", "targets": 1 },   // No KK
                    { "width": "20%", "targets": 2 },   // Kepala Keluarga
                    { "width": "15%", "targets": 3 },   // Kacab
                    { "width": "15%", "targets": 4 },   // Wilayah Binaan
                    { "width": "10%", "targets": 5 },   // Shelter
                    { "width": "10%", "targets": 6 }    // Aksi
                ],
                initComplete: function() {
                    this.api().columns().every(function(index) {
                        var that = this;
                        $('input', $('thead tr:nth-child(1) th').eq(index)).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
                }
            });

            // Populate Wilayah Binaan dropdown based on selected Kacab
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

            // Populate Shelter dropdown based on selected Wilayah Binaan
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
