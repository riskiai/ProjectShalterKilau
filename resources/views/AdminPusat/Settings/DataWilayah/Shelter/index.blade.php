@extends('AdminPusat.App.master')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Shelter</h4>
                            <a href="{{ route('data_shalter.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="shelter-table" class="display table table-striped table-hover">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>No</th>
                                        <th>Nama Shelter</th>
                                        <th>Nama Koordinator</th>
                                        <th>No. Telepon</th>
                                        <th>Alamat</th>
                                        <th>Wilayah Binaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_shelter as $shelter)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $shelter->nama_shelter }}</td>
                                        <td>{{ $shelter->nama_kordinator }}</td>
                                        <td>{{ $shelter->no_telpon }}</td>
                                        <td>{{ $shelter->alamat }}</td>
                                        <td>{{ $shelter->wilbin->nama_wilbin ?? '-' }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                
                                                <a href="#" class="btn btn-link btn-primary btn-lg edit-btn"
                                                    data-id="{{ $shelter->id_shelter }}">
                                                    <i class="fa fa-edit"></i>
                                                 </a>
                                                <button type="button" class="btn btn-link btn-danger delete-btn" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#confirmDeleteModal"
                                                    data-id="{{ $shelter->id_shelter }}"
                                                    data-nama="{{ $shelter->nama_shelter }}">
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
                <form id="deleteShelterForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="current_page" id="current-page-delete">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus <strong id="delete-nama_shelter"></strong>?</p>
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
        var table = $('#shelter-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "drawCallback": function(settings) {
                $('.delete-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama = $(this).data('nama');
                    $('#delete-nama_shelter').text(nama);
                    $('#current-page-delete').val(table.page.info().page);
                    $('#deleteShelterForm').attr('action', '/admin_pusat/settings/data-shalter/' + id);
                });

                $('.edit-btn').on('click', function() {
                    let id = $(this).data('id');
                    let currentPage = table.page.info().page;
                    window.location.href = '/admin_pusat/settings/data-shalter/' + id + '/edit?current_page=' + currentPage;
                });
            }
        });

        @if(session('currentPage'))
            table.page({{ session('currentPage') }}).draw(false);
        @endif
    });
</script>

@endsection
