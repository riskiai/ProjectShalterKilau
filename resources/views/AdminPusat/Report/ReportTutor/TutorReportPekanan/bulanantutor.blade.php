
<div class="table-responsive mt-3">
    <table id="bulan-table" class="table table-striped">
        <thead>
            <tr>
                <th>Nama Tutor</th>
                <th>Quantitas</th>
                <th>Persentase</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_tutor as $tutor)
                <tr>
                    <td>{{ $tutor->nama }}</td>
                    <td>0</td> <!-- Replace 0 with actual Quantitas value if available -->
                    <td>0%</td> <!-- Replace 0% with actual Persentase value if available -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#bulan-table').DataTable({
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
