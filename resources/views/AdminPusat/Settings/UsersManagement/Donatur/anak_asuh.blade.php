<style>
    /* Warna default hitam dan berubah menjadi biru saat hover */
    .link-anak {
        color: black;
        text-decoration: underline;
        transition: color 0.3s;
    }

    .link-anak:hover {
        color: blue; /* Warna berubah menjadi biru saat hover */
    }
</style>

<div class="col-md-12">
    <h4 class="card-title">Informasi Anak Asuh ({{ $anak_asuh_count ?? 0 }})</h4>
    @if(($anak_asuh_count ?? 0) == 0)
        <div class="alert alert-info">
            Donatur ini belum mempunyai anak asuh.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Tanggal Lahir</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anak_asuh_list ?? [] as $anak)
                    <tr>
                        <td>
                            <a href="{{ route('AnakBinaan.show', ['id' => $anak['id']]) }}" class="link-anak">
                                {{ $anak['nama'] }}
                            </a>
                        </td>                        
                        <td>{{ $anak['jenis_kelamin'] }}</td>
                        <td>{{ $anak['agama'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($anak['tanggal_lahir'])->format('d-m-Y') }}</td>
                        <td>{{ $anak['kelas'] ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
