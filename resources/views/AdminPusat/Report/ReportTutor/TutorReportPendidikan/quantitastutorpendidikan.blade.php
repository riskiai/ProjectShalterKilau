<div class="table-responsive mt-3">
    <table id="quantitas-table" class="table table-striped">
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#quantitas-table').DataTable({
            "pageLength": 10,
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
@endsection
