<div class="col-md-12">
    <h4 class="card-title">Informasi Anak Asuh ({{ $anak_asuh_count ?? 0 }})</h4>
    @if(($anak_asuh_count ?? 0) == 0)
        <div class="alert alert-info">
            Donatur ini belum mempunyai anak asuh.
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anak_asuh_list ?? [] as $anak)
                    <tr>
                        <td>{{ $anak['nama'] }}</td>
                        <td>{{ $anak['umur'] }}</td>
                        <td>{{ $anak['kelas'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
