@extends('AdminPusat.App.master')

@section('style')
    <style>
        .btn-donatur {
            width: 100%;
            text-align: center;
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
                            <h4 class="card-title">Data Pengajuan Donatur NPB</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pengajuan_donatur_npb') }}" method="GET" id="filter-form">
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label>Kacab</label>
                                        <select name="id_kacab" id="filter-kacab" class="form-control">
                                            <option value="">Pilih Kacab</option>
                                            @foreach ($kacabs as $kacab)
                                                <option value="{{ $kacab->id_kacab }}"
                                                    {{ request()->id_kacab == $kacab->id_kacab ? 'selected' : '' }}>
                                                    {{ $kacab->nama_kacab }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Wilayah Binaan</label>
                                        <select name="id_wilbin" id="filter-wilbin" class="form-control">
                                            <option value="">Pilih Wilayah Binaan</option>
                                            @foreach ($wilbins as $wilbin)
                                                <option value="{{ $wilbin->id_wilbin }}"
                                                    {{ request()->id_wilbin == $wilbin->id_wilbin ? 'selected' : '' }}>
                                                    {{ $wilbin->nama_wilbin }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Shelter</label>
                                        <select name="id_shelter" id="filter-shelter" class="form-control">
                                            <option value="">Pilih Shelter</option>
                                            @foreach ($shelters as $shelter)
                                                <option value="{{ $shelter->id_shelter }}"
                                                    {{ request()->id_shelter == $shelter->id_shelter ? 'selected' : '' }}>
                                                    {{ $shelter->nama_shelter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-12 d-flex">
                                        <button type="submit" class="btn btn-primary">Terapkan</button>
                                        <a href="{{ route('pengajuan_donatur_npb') }}" class="btn btn-secondary ms-2">Reset</a>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table id="penerima-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="text" id="search-no" class="form-control" placeholder="Cari No"></th>
                                            <th><input type="text" id="search-nama" class="form-control" placeholder="Cari Nama"></th>
                                            <th><input type="text" id="search-agama" class="form-control" placeholder="Cari Agama"></th>
                                            <th><input type="text" id="search-status_cpb" class="form-control" placeholder="Cari Status"></th>
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
                                        @foreach ($data_penerima_beasiswa as $penerima)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $penerima['nama_lengkap'] }}</td>
                                                <td>{{ $penerima['agama'] }}</td>
                                                <td>{{ $penerima['status_cpb'] }}</td>
                                                <td>{{ $penerima['jk'] }}</td>
                                                <td>{{ $penerima['anak_ke'] }}</td>
                                                <td>
                                                    @if ($penerima['hasil_survey'] === 'Layak')
                                                        <span class="badge bg-success">Layak</span>
                                                    @else
                                                        <span class="badge bg-danger">Tidak Layak</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($penerima['donatur'] === 'Belum ada Donatur')
                                                        <button class="btn btn-danger btn-donatur" data-bs-toggle="modal"
                                                            data-bs-target="#donaturModal" data-id="{{ $penerima['id'] }}">
                                                            Belum ada Donatur
                                                        </button>
                                                    @else
                                                        <button class="btn btn-primary btn-donatur" data-bs-toggle="modal"
                                                            data-bs-target="#donaturModal" data-id="{{ $penerima['id'] }}">
                                                            {{ $penerima['donatur'] }}
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button class="btn btn-primary btn-donatur" data-bs-toggle="modal"
                                                            data-bs-target="#donaturModal" data-id="{{ $penerima['id'] }}">
                                                            Pilih Donatur
                                                        </button>
                                                        @if ($penerima['donatur'] !== 'Belum ada Donatur')
                                                            <button class="btn btn-danger delete-btn" data-bs-toggle="modal"
                                                                data-bs-target="#confirmDeleteModal"
                                                                data-id="{{ $penerima['id'] }}"
                                                                data-nama="{{ $penerima['nama_lengkap'] }}">
                                                                Hapus Donatur
                                                            </button>
                                                        @endif
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

        <!-- Modal Pilih Donatur -->
        <div class="modal fade" id="donaturModal" tabindex="-1" role="dialog" aria-labelledby="donaturModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="formPilihDonatur" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="donaturModalLabel">Pilih Donatur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Donatur</label>
                                <select name="id_donatur" class="form-control" required>
                                    <option value="">Pilih Donatur</option>
                                    @foreach ($donaturs as $donatur)
                                        <option value="{{ $donatur->id_donatur }}">{{ $donatur->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Pilih Donatur</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal for Confirm Delete -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="deleteDonaturForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus donatur dari <strong id="delete-nama"></strong>?</p>
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
            // Initialize DataTable with search per column
            var table = $('#penerima-table').DataTable({
                "pageLength": 10,
                "searching": true,
                "paging": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
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

            // Dynamic filters for Wilayah Binaan and Shelter
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

            // Confirm delete modal actions
            $('#confirmDeleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var idAnak = button.data('id');
                var namaAnak = button.data('nama');
                $('#delete-nama').text(namaAnak);
                $('#deleteDonaturForm').attr('action', '/admin_pusat/settings/pengajuan_donatur_npb/' + idAnak);
            });

            // Donatur selection modal action
            $('#donaturModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var idAnak = button.data('id');
                var formAction = "{{ route('pengajuan_donatur_npb.update', '') }}/" + idAnak;
                $('#formPilihDonatur').attr('action', formAction);
            });
        });
    </script>
@endsection
