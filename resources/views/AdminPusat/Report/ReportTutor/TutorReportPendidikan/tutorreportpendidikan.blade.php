@extends('AdminPusat.App.master')

@section('style')
<style>
    .report-container {
        padding: 20px;
    }

    .card-header {
        font-size: 20px;
        font-weight: bold;
    }

    .filter-section {
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .filter-section label {
        font-weight: bold;
    }

    .filter-section .form-group {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .filter-section .form-group label {
        min-width: 120px;
        margin-right: 10px;
        text-align: left;
    }

    .filter-section .form-group .form-control {
        flex: 1;
    }

    /* Styling for navbar tabs */
    .nav-tabs {
        border-bottom: none;
    }

    .nav-tabs .nav-item {
        margin-bottom: -1px;
    }

    .nav-tabs .nav-link {
        color: #5a5a5a;
        font-size: 1.1rem;
        padding: 10px 20px;
        background-color: #ffffff;
    }

    .nav-tabs .nav-link.active {
        color: #5a5a5a;
        border-color: #5a5a5a;
        border-bottom-color: #ffffff;
        background-color: #f9f9f9;
        font-weight: bold;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table .month-header {
        font-weight: bold;
        background-color: #e9ecef;
    }

    .table .btn-view {
        background-color: #17a2b8;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="container report-container">
    <div class="page-inner">
        <div class="card">
            <div class="card-header">
                Laporan Kehadiran Tutor: Bimbingan Pendidikan
            </div>
            <div class="card-body">
                <!-- Filter Section -->
                <div class="filter-section">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option value="" disabled selected>--PILIH--</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kantor_cabang">Kantor Cabang</label>
                                    <select name="kantor_cabang" id="kantor_cabang" class="form-control">
                                        <option value="" disabled selected>--PILIH--</option>
                                        <option value="Cabang Indramayu">Cabang Indramayu</option>
                                        <option value="Cabang Sumedang">Cabang Sumedang</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="wilayah_binaan">Wilayah Binaan</label>
                                    <select name="wilayah_binaan" id="wilayah_binaan" class="form-control">
                                        <option value="" disabled selected>--PILIH--</option>
                                        <option value="Indramayu">Indramayu</option>
                                        <option value="Situraja">Situraja</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shelter">Shelter</label>
                                    <select name="shelter" id="shelter" class="form-control">
                                        <option value="" disabled selected>--PILIH--</option>
                                        <option value="Alhidayah">Alhidayah</option>
                                        <option value="Malaka">Malaka</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="" disabled selected>--PILIH--</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Tab Section -->
                @include('AdminPusat.Report.ReportTutor.TutorReportPendidikan.navbarreportpendidikan')

                <!-- Content Section -->
                @if (request()->get('tab') == 'quantitas')
                    @include('AdminPusat.Report.ReportTutor.TutorReportPendidikan.quantitastutorpendidikan')
                @elseif (request()->get('tab') == 'bulanan')
                    @include('AdminPusat.Report.ReportTutor.TutorReportPendidikan.bulanantutorpendidikan')
                @else
                    <!-- Default table for Persentase -->
                    <div class="table-responsive mt-3">
                        <table id="report-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th class="month-header">Januari</th>
                                    <th class="month-header">Februari</th>
                                    <th class="month-header">Maret</th>
                                    <th class="month-header">April</th>
                                    <th class="month-header">Mei</th>
                                    <th class="month-header">Juni</th>
                                    <th class="month-header">Juli</th>
                                    <th class="month-header">Agustus</th>
                                    <th class="month-header">September</th>
                                    <th class="month-header">Oktober</th>
                                    <th class="month-header">November</th>
                                    <th class="month-header">Desember</th>
                                    <th>Grafik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_tutor as $tutor)
                                    <tr>
                                        <td>{{ $tutor->nama }}</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td><button class="btn btn-view"
                                                onclick="showChartModal('{{ $tutor->nama }}')">Lihat</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal for Highcharts -->
<div class="modal fade" id="chartModal" tabindex="-1" aria-labelledby="chartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chartModalLabel">Grafik Absensi Tutor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Highcharts Library -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/offline-exporting.js"></script>

<!-- html2canvas and jsPDF for PDF Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

<script>
    $(document).ready(function() {
        $('#report-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });

    function showChartModal(tutorName) {
        $('#chartModalLabel').text('Grafik Absensi Tutor: ' + tutorName);
        $('#chartModal').modal('show');

        Highcharts.chart('chartContainer', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafik Absensi Tutor'
            },
            subtitle: {
                text: tutorName
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                title: {
                    text: 'Total Absensi'
                }
            },
            series: [{
                name: 'Data Hadir',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, 0]
            }, {
                name: 'Data Tidak Hadir',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, 0]
            }],
            exporting: {
                enabled: true,
                buttons: {
                    contextButton: {
                        menuItems: ['downloadPNG', 'downloadPDF']
                    }
                }
            }
        });
    }

    function exportChart() {
        const chartContainer = document.getElementById('chartContainer');

        html2canvas(chartContainer, {
            scale: 2,
            allowTaint: true,
            useCORS: true
        }).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jsPDF('landscape', 'mm', 'a4');
            const imgWidth = 280;
            const imgHeight = (canvas.height * imgWidth) / canvas.width;

            pdf.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight);
            pdf.save('Grafik_Absensi_Tutor.pdf');
        });
    }
</script>
@endsection
