<!-- Table for Absensi Tutor Sepekan -->
<div class="table-responsive mt-3">
    <table id="report-table" class="table table-striped">
        <thead>
            <tr>
                <th>Shelter</th>
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
            @foreach ($data_shelter as $shelter)
                <tr>
                    <td>{{ $shelter->nama_shelter }}</td>
                    <td>{{ $shelter->januari ?? '0%' }}</td>
                    <td>{{ $shelter->februari ?? '0%' }}</td>
                    <td>{{ $shelter->maret ?? '0%' }}</td>
                    <td>{{ $shelter->april ?? '0%' }}</td>
                    <td>{{ $shelter->mei ?? '0%' }}</td>
                    <td>{{ $shelter->juni ?? '0%' }}</td>
                    <td>{{ $shelter->juli ?? '0%' }}</td>
                    <td>{{ $shelter->agustus ?? '0%' }}</td>
                    <td>{{ $shelter->september ?? '0%' }}</td>
                    <td>{{ $shelter->oktober ?? '0%' }}</td>
                    <td>{{ $shelter->november ?? '0%' }}</td>
                    <td>{{ $shelter->desember ?? '0%' }}</td>
                    <td>
                        <button class="btn btn-view"
                                onclick="showChartModal('{{ $shelter->nama_shelter }}')">Lihat</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal for Highcharts -->
<div class="modal fade" id="chartModal" tabindex="-1" aria-labelledby="chartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chartModalLabel">Grafik Absensi Shelter Tutor Sepekan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>

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

        function showChartModal(shelterName) {
            $('#chartModalLabel').text('Grafik Absensi Shelter: ' + shelterName);
            $('#chartModal').modal('show');

            // Example data for chart, replace this with actual data if available
            const dataHadir = [10, 15, 13, 18, 20, 25, 22, 17, 14, 19, 18, 16];
            const dataTidakHadir = [2, 3, 4, 3, 5, 2, 4, 3, 6, 2, 4, 5];

            Highcharts.chart('chartContainer', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Grafik Absensi Shelter'
                },
                subtitle: {
                    text: shelterName
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
                    data: dataHadir
                }, {
                    name: 'Data Tidak Hadir',
                    data: dataTidakHadir
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
                pdf.save('Grafik_Absensi_Shelter.pdf');
            });
        }
    </script>
@endsection
