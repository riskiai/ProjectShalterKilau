@extends('AdminPusat.App.master')

@section('style')
    <style>
        /* Custom CSS for uniform button width */
        .status-button {
            width: 120px;
            font-size: 14px;
            color: white;
        }

        .status-button:hover {
            color: white;
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
                            <h4 class="card-title">Validasi Data Survey Keluarga</h4>
                        </div>
                        <div class="card-body">
                            <!-- Survey Table -->
                            <div class="table-responsive">
                                <table id="survey-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="text" id="search-no" class="form-control" placeholder="Cari No"></th>
                                            <th><input type="text" id="search-nokk" class="form-control" placeholder="Cari No KK"></th>
                                            <th><input type="text" id="search-kepala-keluarga" class="form-control" placeholder="Cari Kepala Keluarga"></th>
                                            <th><input type="text" id="search-petugas" class="form-control" placeholder="Cari Petugas"></th>
                                            <th><input type="text" id="search-tanggal" class="form-control" placeholder="Cari Tanggal"></th>
                                            <th><input type="text" id="search-kelayakan" class="form-control" placeholder="Cari Kelayakan"></th>
                                            <th><input type="text" id="search-action" class="form-control" placeholder="Aksi"></th>
                                        </tr>
                                        <tr style="text-align:center;">
                                            <th>No</th>
                                            <th>No KK</th>
                                            <th>Kepala Keluarga</th>
                                            <th>Petugas Survey</th>
                                            <th>Tanggal Survey</th>
                                            <th>Kelayakan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_surveys as $survey)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $survey->keluarga->no_kk ?? '-' }}</td>
                                                <td>{{ $survey->keluarga->kepala_keluarga ?? '-' }}</td>
                                                <td>{{ $survey->petugas_survey }}</td>
                                                <td>{{ \Carbon\Carbon::parse($survey->created_at)->format('d F Y') }}</td>
                                                <td>
                                                    @if($survey->hasil_survey == 'Layak')
                                                        <button class="btn btn-success btn-sm status-button">Layak</button>
                                                    @elseif($survey->hasil_survey == 'Tidak Layak')
                                                        <button class="btn btn-danger btn-sm status-button">Tidak Layak</button>
                                                    @else
                                                        <button class="btn btn-warning btn-sm status-button" onclick="window.location='{{ route('validasisurveykeluarga.show', $survey->id_survey) }}'">
                                                            Tambah Kelayakan
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('surveykeluarga.show', ['id' => $survey->keluarga->id_keluarga ?? $survey->id_keluarga, 'tab' => 'data-keluarga']) }}" class="btn btn-link btn-primary btn-lg edit-btn">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-link btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id-keluarga="{{ $survey->keluarga->id_keluarga ?? $survey->id_keluarga }}" data-id-survey="{{ $survey->id_survey }}" data-nama="{{ $survey->keluarga->kepala_keluarga ?? '-' }}">
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
                    <form id="deleteSurveyForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus survey untuk <strong id="delete-nama_kepala_keluarga"></strong>?</p>
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
            // Initialize DataTable with individual column search
            var table = $('#survey-table').DataTable({
                "pageLength": 10,
                "searching": true,
                "paging": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "columnDefs": [
                    { "width": "5%", "targets": 0 },
                    { "width": "15%", "targets": 1 },
                    { "width": "20%", "targets": 2 },
                    { "width": "15%", "targets": 3 },
                    { "width": "15%", "targets": 4 },
                    { "width": "15%", "targets": 5 },
                    { "width": "15%", "targets": 6 }
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

            // Set action URL for delete button in modal
            $('.delete-btn').on('click', function() {
                let id_keluarga = $(this).data('id-keluarga');
                let id_survey = $(this).data('id-survey');
                let nama = $(this).data('nama');

                $('#delete-nama_kepala_keluarga').text(nama);
                $('#deleteSurveyForm').attr('action', '/admin_pusat/pemberdayaan/validasisurveykeluarga/' + id_keluarga + '/survey/' + id_survey);
            });
        });
    </script>
@endsection
