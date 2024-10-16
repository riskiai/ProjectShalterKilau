@extends('AdminPusat.App.master')

@section('style')
    <style>
        /* Custom CSS jika diperlukan */
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
                                <h4 class="card-title">Data Bank</h4>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addBankModal">
                                    <i class="fa fa-plus"></i> Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="bank-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>No</th>
                                            <th>Nama Bank</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_bank as $bank)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $bank->nama_bank }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" class="btn btn-link btn-primary btn-lg edit-btn" 
                                                        data-id="{{ $bank->id_bank }}" 
                                                        data-nama_bank="{{ $bank->nama_bank }}" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editBankModal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link btn-danger delete-btn" 
                                                        data-id="{{ $bank->id_bank }}" 
                                                        data-nama_bank="{{ $bank->nama_bank }}" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#confirmDeleteModal">
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

        <!-- Modal for Add Bank -->
        <div class="modal fade" id="addBankModal" tabindex="-1" role="dialog" aria-labelledby="addBankModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('bank.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addBankModalLabel">Tambah Data Bank</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" name="nama_bank" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal for Edit Bank -->
        <div class="modal fade" id="editBankModal" tabindex="-1" role="dialog" aria-labelledby="editBankModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="editBankForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="current_page" id="current-page">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editBankModalLabel">Edit Data Bank</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_bank" id="edit-id">
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" name="nama_bank" id="edit-nama_bank" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal for Confirm Delete -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="deleteBankForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="current_page" id="current-page-delete">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus <strong id="delete-nama_bank"></strong>?</p>
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
        var table = $('#bank-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "drawCallback": function(settings) {
                $('.edit-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama_bank = $(this).data('nama_bank');

                    $('#edit-id').val(id);
                    $('#edit-nama_bank').val(nama_bank);
                    $('#current-page').val(table.page.info().page);

                    $('#editBankForm').attr('action', '/admin_pusat/settings/bank/update/' + id);
                });

                $('.delete-btn').on('click', function() {
                    let id = $(this).data('id');
                    let nama_bank = $(this).data('nama_bank');

                    $('#delete-nama_bank').text(nama_bank);
                    $('#current-page-delete').val(table.page.info().page);

                    $('#deleteBankForm').attr('action', '/admin_pusat/settings/bank/destroy/' + id);
                });
            }
        });

        @if(session('currentPage'))
            table.page({{ session('currentPage') }}).draw(false);
        @endif
    });
</script>
@endsection
