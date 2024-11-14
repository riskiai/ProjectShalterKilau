@extends('AdminPusat.App.master')

@section('style')
    <style>
        /* Custom CSS if needed */
        .lihat-kelompok-btn {
            margin-bottom: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Kelompok Shelter</h4>
                        </div>
                        <div class="card-body">

                            <!-- Tabel Shelter -->
                            <div class="table-responsive">
                                <table id="shelter-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="text" id="search-no" class="form-control" placeholder="Cari No"></th>
                                            <th><input type="text" id="search-nama-kacab" class="form-control" placeholder="Cari Nama Kacab"></th>
                                            <th><input type="text" id="search-nama-wilbin" class="form-control" placeholder="Cari Nama Wilbin"></th>
                                            <th><input type="text" id="search-nama-shelter" class="form-control" placeholder="Cari Nama Shelter"></th>
                                            <th><input type="text" id="search-jumlah-kelompok" class="form-control" placeholder="Cari Jumlah Kelompok"></th>
                                            <th><input type="text" id="search-action" class="form-control" placeholder="Aksi"></th>
                                        </tr>
                                        <tr style="text-align:center;">
                                            <th>No</th>
                                            <th>Nama Kacab</th>
                                            <th>Nama Wilbin</th>
                                            <th>Nama Shelter</th>
                                            <th>Jumlah Kelompok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_shelters as $shelter)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $shelter->wilbin->kacab->nama_kacab ?? '-' }}</td>
                                                <td>{{ $shelter->wilbin->nama_wilbin ?? '-' }}</td>
                                                <td>{{ $shelter->nama_shelter }}</td>
                                                <td>{{ $shelter->kelompok->count() }}</td>
                                                <td>
                                                    <a href="{{ route('datakelompokshelter.show', $shelter->id_shelter) }}" 
                                                        class="btn btn-info btn-sm lihat-kelompok-btn">
                                                        <i class="fa fa-eye"></i> Lihat Kelompok
                                                     </a>                                                     
                                                </td>                                                                                              
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Akhir dari Tabel Shelter -->

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
            var table = $('#shelter-table').DataTable({
                "pageLength": 10,
                "searching": true,
                "paging": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "columnDefs": [
                    { "width": "5%", "targets": 0 },    // No
                    { "width": "20%", "targets": 1 },   // Nama Kacab
                    { "width": "20%", "targets": 2 },   // Nama Wilbin
                    { "width": "20%", "targets": 3 },   // Nama Shelter
                    { "width": "15%", "targets": 4 },   // Jumlah Kelompok
                    { "width": "15%", "targets": 5 }    // Aksi
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
        });
    </script>
@endsection
