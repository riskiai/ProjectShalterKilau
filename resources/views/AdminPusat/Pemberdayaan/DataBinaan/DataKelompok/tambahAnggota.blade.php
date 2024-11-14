@extends('AdminPusat.App.master')

@section('style')
    <style>
        .container {
            margin-top: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        .card-header {
            background-color: #f1f1f1;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .form-control {
            color: #000 !important;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <!-- Form Tambah Anggota -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Anggota ke Kelompok: {{ $kelompok->nama_kelompok }}</h4>
                        </div>
                        <div class="card-body">
                            <form
                                action="{{ route('kelompok.createanakprosess', ['id_shelter' => $id_shelter, 'id_kelompok' => $kelompok->id_kelompok]) }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Anak Binaan</label>
                                    <select name="id_anak" class="form-control" required>
                                        <option value="">Pilih Anak Binaan</option>
                                        @if ($anakBinaan->isNotEmpty())
                                            @foreach ($anakBinaan as $anak)
                                                <option value="{{ $anak->id_anak }}">{{ $anak->full_name }}
                                                    ({{ $anak->status_cpb }})</option>
                                            @endforeach
                                        @else
                                            <option disabled>Data anak binaan tidak ditemukan</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Daftar Anggota -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Anggota di Kelompok: {{ $kelompok->nama_kelompok }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="anggota-table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anak</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($kelompok->anak as $index => $anak)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $anak->full_name }}</td>
                                                <td>
                                                    <button class="btn btn-delete btn-sm btn-confirm-delete"
                                                        data-id="{{ $anak->id_anak }}">Hapus</button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Tidak ada anggota dalam kelompok ini.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('datakelompokshelter.show', ['id' => $id_shelter]) }}"
                    class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#anggota-table').DataTable({
                "pageLength": 10,
                "searching": true,
                "paging": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "columnDefs": [{
                    "targets": 2,
                    "orderable": false
                }]
            });
        });

        $(document).on('click', '.btn-confirm-delete', function(e) {
            e.preventDefault();
            var anakId = $(this).data('id');
            var deleteUrl = "{{ route('kelompok.deleteanak', ':id_anak') }}".replace(':id_anak', anakId);

            console.log(deleteUrl); // Tambahkan ini untuk memverifikasi URL

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire(
                                    'Terhapus!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    'Data tidak dapat dihapus. Coba lagi.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText); // Cek respons error di konsol
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
@endsection
