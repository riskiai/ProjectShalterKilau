@extends('AdminPusat.App.master')

@section('style')
<style>
    .report-container { padding: 20px; }
    .card-header { font-size: 20px; font-weight: bold; }
    .filter-section { padding: 15px; background-color: #f9f9f9; border-radius: 5px; margin-bottom: 20px; }
    .filter-section label { font-weight: bold; }
    .table-responsive { overflow-x: auto; }
    .table th, .table td { text-align: center; vertical-align: middle; }
</style>
@endsection

@section('content')
<div class="container report-container">
    <div class="page-inner">
        <div class="card">
            <div class="card-header">Laporan Surat Anak</div>
            <div class="card-body">
                <!-- Filter Section -->
                <div class="filter-section">
                    <form action="{{ route('shalterSuratAnakReport') }}" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option value="" disabled selected>--PILIH--</option>
                                        @foreach (range(date('Y'), 2000) as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kantor_cabang">Kantor Cabang</label>
                                    <select name="kantor_cabang" id="kantor_cabang" class="form-control">
                                        <option value="" disabled selected>--PILIH--</option>
                                        @foreach($kantorCabangOptions as $kacab)
                                            <option value="{{ $kacab->id_kacab }}">{{ $kacab->nama_kacab }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="wilayah_binaan">Wilayah Binaan</label>
                                    <select name="wilayah_binaan" id="wilayah_binaan" class="form-control">
                                        <option value="" disabled selected>--PILIH--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="" disabled selected>--PILIH--</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Table Section -->
                <div class="table-responsive mt-3">
                    <table id="report-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Shelter</th>
                                <th>Jumlah Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataShelter as $shelter)
                                <tr>
                                    <td>{{ $shelter->nama_shelter }}</td>
                                    <td>{{ $shelter->anak->sum(fn($anak) => $anak->suratAb->count()) }}</td>
                                    <td>
                                        <button class="btn btn-link btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#detailModal"
                                                onclick="loadSuratDetail({{ $shelter->id_shelter }})">
                                            <i class="fa fa-eye"></i>
                                        </button>
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

<!-- Modal untuk Detail Surat Anak -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Tabel Detail Shelter: Surat Anak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="surat-detail-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Anak</th>
                                <th>Pesan</th>
                                <th>Tanggal Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="surat-detail-body">
                            <!-- Isi detail surat akan dimuat di sini -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Tampilkan Gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Gambar Surat Anak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="imageModalSrc" src="" alt="Gambar Surat Anak" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<form id="deleteForm" action="{{ route('hapushalterSuratAnakReport') }}" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_surat" id="deleteFormInput">
</form>

@endsection

@section('scripts')
<script>
    // Pemuatan Wilayah Binaan berdasarkan Kantor Cabang
    $('#kantor_cabang').on('change', function() {
        var idKacab = $(this).val();
        $('#wilayah_binaan').empty().append('<option value="">Pilih Wilayah Binaan</option>');

        if (idKacab) {
            $.ajax({
                url: '/admin_pusat/settings/wilbin/' + idKacab,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(key, value) {
                        $('#wilayah_binaan').append('<option value="' + value.id_wilbin + '">' + value.nama_wilbin + '</option>');
                    });
                }
            });
        }
    });

    function loadSuratDetail(idShelter) {
        $('#surat-detail-body').empty();
        @foreach($dataShelter as $shelter)
            @foreach($shelter->anak as $anak)
                @foreach($anak->suratAb as $surat)
                    if (idShelter == {{ $shelter->id_shelter }}) {
                        $('#surat-detail-body').append(`
                            <tr>
                                <td>{{ $anak->full_name }}</td>
                                <td>{{ $surat->pesan }}</td>
                                <td>{{ $surat->tanggal }}</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-primary btn-lg" onclick="showImage('{{ asset($surat->foto) }}')">
                                        <i class="fa fa-eye"></i> 
                                    </button>
                                    <button type="button" class="btn btn-link btn-danger delete-btn" onclick="confirmDelete({{ $surat->id_surat }})">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        `);
                    }
                @endforeach
            @endforeach
        @endforeach
    }

    function showImage(imageUrl) {
        $('#imageModalSrc').attr('src', imageUrl);
        $('#imageModal').modal('show');
    }

    function confirmDelete(idSurat) {
        if (confirm('Apakah Anda yakin ingin menghapus surat ini?')) {
            $('#deleteFormInput').val(idSurat);
            $('#deleteForm').submit();
        }
    }

    $(document).ready(function() {
        $('#report-table').DataTable();
        $('#surat-detail-table').DataTable();
    });
</script>
@endsection
