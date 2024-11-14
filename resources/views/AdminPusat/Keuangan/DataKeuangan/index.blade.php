@extends('AdminPusat.App.master')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Keuangan Anak</h4>
                <a href="{{ route('keuangan.store') }}" class="btn btn-primary float-end"><i class="fa fa-plus"></i> Tambah Data Keuangan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="keuangan-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anak</th>
                                <th>Tingkat Sekolah</th>
                                <th>Kelas/Semester</th>
                                <th>Bimbel</th>
                                <th>Eskul dan Keagamaan</th>
                                <th>Laporan</th>
                                <th>Uang Tunai</th>
                                <th>Donasi</th>
                                <th>Subsidi Infak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_keuangan as $keuangan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $keuangan->anak?->full_name ?? 'Data Anak Tidak Ditemukan' }}</td>
                                <td>{{ $keuangan->tingkat_sekolah }}</td>
                                <td>{{ $keuangan->semester }}</td>
                                <td>Rp. {{ number_format($keuangan->bimbel, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($keuangan->eskul_dan_keagamaan, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($keuangan->laporan, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($keuangan->uang_tunai, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($keuangan->donasi, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($keuangan->subsidi_infak, 0, ',', '.') }}</td>
                                <td>
                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-link btn-danger btn-lg delete-btn"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal" 
                                            data-id="{{ $keuangan->id_keuangan }}" 
                                            data-anak="{{ $keuangan->anak->full_name ?? 'Data Anak Tidak Ditemukan' }}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus data keuangan untuk anak <strong id="delete-anak"></strong>?</p>
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
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#keuangan-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

        // Delete modal
        $('.delete-btn').on('click', function() {
            let id = $(this).data('id');
            let anak = $(this).data('anak') || 'Data Anak Tidak Ditemukan';
            $('#delete-anak').text(anak);

            // Update form action using route helper
            let actionUrl = `{{ route('keuangan.destroy', ':id') }}`.replace(':id', id);
            $('#deleteForm').attr('action', actionUrl);
        });
    });
</script>
@endsection
