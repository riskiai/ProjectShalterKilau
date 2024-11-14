@extends('AdminPusat.App.master')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Berita</h4>
                <a href="{{ route('berita.store') }}" class="btn btn-primary float-end"><i class="fa fa-plus"></i> Tambah Berita</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="berita-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Berita</th>
                                <th>Tanggal</th>
                                <th>Isi Konten</th>
                                <th>Foto 1</th>
                                <th>Foto 2</th>
                                <th>Foto 3</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_berita as $index => $berita)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $berita->judul }}</td>
                                <td>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($berita->konten, 50, '...') }}</td>
                                <td>
                                    <img src="{{ $berita->foto ? asset('storage/' . $berita->foto) : asset('assets/img/noimage.jpg') }}" width="90">
                                </td>
                                <td>
                                    <img src="{{ $berita->foto2 ? asset('storage/' . $berita->foto2) : asset('assets/img/noimage.jpg') }}" width="90">
                                </td>
                                <td>
                                    <img src="{{ $berita->foto3 ? asset('storage/' . $berita->foto3) : asset('assets/img/noimage.jpg') }}" width="90">
                                </td>                                
                                <td>
                                    <div class="form-button-action">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('berita.edit', $berita->id_berita) }}" class="btn btn-link btn-primary btn-lg edit-btn" data-id="{{ $berita->id_berita }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
                                        <!-- Tombol Hapus -->
                                        <button type="button" class="btn btn-link btn-danger btn-lg delete-btn" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal" 
                                                data-id="{{ $berita->id_berita }}" 
                                                data-judul="{{ $berita->judul }}">
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
                            <p>Apakah Anda yakin ingin menghapus berita dengan judul <strong id="delete-judul"></strong>?</p>
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
        $('#berita-table').DataTable({
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
            let judul = $(this).data('judul') || 'Data Berita Tidak Ditemukan';
            $('#delete-judul').text(judul);

            // Update form action using route helper
            let actionUrl = `{{ route('berita.destroy', ':id') }}`.replace(':id', id);
            $('#deleteForm').attr('action', actionUrl);
        });
    });
</script>
@endsection
