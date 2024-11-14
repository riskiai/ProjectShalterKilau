<div class="table-responsive mt-3">
    <table id="peringatan-table" class="table table-striped">
        <thead>
            <tr>
                <th>Shelter</th>
                <th>Jumlah Peringatan</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_shelter as $shelter)
                <tr>
                    <td>{{ $shelter->nama_shelter }}</td>
                    <td>{{ $shelter->jumlah_peringatan ?? 0 }}</td> <!-- Default to 0 if no data available -->
                    <td>{{ $shelter->detail_peringatan ?? 'Tidak ada detail' }}</td> <!-- Display detail directly -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#peringatan-table').DataTable({
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
