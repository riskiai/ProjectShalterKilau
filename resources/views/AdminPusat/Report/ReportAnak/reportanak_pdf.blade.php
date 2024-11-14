<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kehadiran Anak</title>
    <style>
        /* Styling sederhana untuk PDF */
        .report-container {
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .card-header {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table, .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <div class="card-header">
            Laporan Kehadiran Anak: Pendidikan
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Januari</th>
                    <th>Februari</th>
                    <th>Maret</th>
                    <th>April</th>
                    <th>Mei</th>
                    <th>Juni</th>
                    <th>Juli</th>
                    <th>Agustus</th>
                    <th>September</th>
                    <th>Oktober</th>
                    <th>November</th>
                    <th>Desember</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_anak as $anak)
                    <tr>
                        <td>{{ $anak->full_name }}</td>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
