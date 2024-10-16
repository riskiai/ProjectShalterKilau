@extends('AdminPusat.App.master')

@section('style')
<style>
    /* .table-responsive {
        overflow-x: auto;
    }

  
    #tutor-table {
        table-layout: fixed;
        width: 100%;
    }

  
    #tutor-table th:nth-child(1), 
    #tutor-table td:nth-child(1) {
        width: 20%;
    }

    
    #tutor-table th:nth-child(2), 
    #tutor-table td:nth-child(2) {
        width: 30%;
    }

    
    #tutor-table th:nth-child(3), 
    #tutor-table td:nth-child(3) {
        width: 45%;
    }

   
    #tutor-table th:nth-child(4), 
    #tutor-table td:nth-child(4) {
        width: 25%;
    }

    
    #tutor-table th:nth-child(5), 
    #tutor-table td:nth-child(5) {
        width: 45%;
    }

  
    #tutor-table th:nth-child(6), 
    #tutor-table td:nth-child(6) {
        width: 35%;
    }

    
    #tutor-table th:nth-child(7), 
    #tutor-table td:nth-child(7) {
        width: 30%;
    }

   
    #tutor-table th:nth-child(8), 
    #tutor-table td:nth-child(8) {
        width: 30%;
    }

    
    #tutor-table th:nth-child(9), 
    #tutor-table td:nth-child(9) {
        width: 30%;
    }

 
    #tutor-table th:nth-child(10), 
    #tutor-table td:nth-child(10) {
        width: 25%;
    }

   
    #tutor-table th:nth-child(11), 
    #tutor-table td:nth-child(11) {
        width: 40%;
    } */
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
                            <h4 class="card-title">Data Tutor</h4>
                            <a href="{{ route('tutor.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <!-- Form Filter -->
                        <form action="{{ route('tutor') }}" method="GET" id="filter-form">
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
                                    <a href="{{ route('tutor') }}" class="btn btn-secondary ms-2">Reset</a>
                                </div>
                            </div>
                        </form>
                        <!-- End of Form Filter -->

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="tutor-table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="text" id="search-no" class="form-control" placeholder="Cari No"></th>
                                        <th><input type="text" id="search-nama" class="form-control" placeholder="Cari Nama"></th>
                                        <th><input type="text" id="search-pendidikan" class="form-control" placeholder="Cari Pendidikan"></th>
                                        <th><input type="text" id="search-email" class="form-control" placeholder="Cari Email"></th>
                                        <th><input type="text" id="search-no_hp" class="form-control" placeholder="Cari No HP"></th>
                                        <th><input type="text" id="search-alamat" class="form-control" placeholder="Cari Alamat"></th>
                                        <th><input type="text" id="search-wilbin" class="form-control" placeholder="Cari Wilayah Binaan"></th>
                                        <th><input type="text" id="search-shelter" class="form-control" placeholder="Cari Shelter"></th>
                                        <th><input type="text" id="search-mapel" class="form-control" placeholder="Cari Mapel"></th>
                                        <th><input type="text" id="search-foto" class="form-control" placeholder="Cari Foto"></th>
                                        <th><input type="text" id="search-action" class="form-control" placeholder="Cari Action"></th>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Pendidikan</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Wilayah Binaan</th>
                                        <th>Shelter</th>
                                        <th>Mapel</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_tutor as $tutor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tutor->nama }}</td>
                                        <td>{{ $tutor->pendidikan }}</td>
                                        <td>{{ $tutor->email }}</td>
                                        <td>{{ $tutor->no_hp }}</td>
                                        <td>{{ $tutor->alamat }}</td>
                                        <td>{{ $tutor->wilbin->nama_wilbin ?? '-' }}</td>
                                        <td>{{ $tutor->shelter->nama_shelter ?? '-' }}</td>
                                        <td>{{ $tutor->maple }}</td>
                                        <td>
                                            @if($tutor->foto)
                                                <img src="{{ asset('storage/' . $tutor->foto) }}" alt="Foto Tutor" width="100" height="100">
                                            @else
                                                <img src="{{ asset('images/default.png') }}" alt="Foto Default" width="50" height="50">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="#" class="btn btn-link btn-primary btn-lg edit-btn" data-id="{{ $tutor->id_tutor }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-link btn-danger delete-btn" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#confirmDeleteModal"
                                                    data-id="{{ $tutor->id_tutor }}"
                                                    data-nama="{{ $tutor->nama }}">
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
                <form id="deleteTutorForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="current_page" id="current-page-delete">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus <strong id="delete-nama_tutor"></strong>?</p>
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
        // DataTables init with individual column search and custom width
        var table = $('#tutor-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false, // Disable automatic column width calculation
            "columnDefs": [
                { "width": "10%", "targets": 0 },  // No
                { "width": "15%", "targets": 1 }, // Nama
                { "width": "10%", "targets": 2 }, // Pendidikan
                { "width": "15%", "targets": 3 }, // Email
                { "width": "10%", "targets": 4 }, // No HP
                { "width": "20%", "targets": 5 }, // Alamat
                { "width": "10%", "targets": 6 }, // Wilayah Binaan
                { "width": "10%", "targets": 7 }, // Shelter
                { "width": "10%", "targets": 8 }, // Mapel
                { "width": "10%", "targets": 9 }, // Foto
                { "width": "10%", "targets": 10 }  // Action
            ],
            initComplete: function () {
                this.api().columns().every(function (index) {
                    var that = this;
                    $('input', $('thead tr:nth-child(1) th').eq(index)).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            "drawCallback": function(settings) {
                $('.delete-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama = $(this).data('nama');
                    $('#delete-nama_tutor').text(nama);
                    $('#current-page-delete').val(table.page.info().page);
                    $('#deleteTutorForm').attr('action', '/admin_pusat/settings/tutor/' + id);
                });

                $('.edit-btn').on('click', function() {
                    let id = $(this).data('id');
                    let currentPage = table.page.info().page;
                    window.location.href = '/admin_pusat/settings/tutor/' + id + '/edit?current_page=' + currentPage;
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
