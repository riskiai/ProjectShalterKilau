<div class="col-md-12">
    <h4 class="card-title">Data Wali</h4>
    @if($keluarga->wali)
        <table class="table table-borderless table-data-wali">
            <tbody>
                <tr>
                    <td >NIK Wali</td>
                    <td class="value">: {{ !empty($keluarga->wali->nik_wali) ? $keluarga->wali->nik_wali : '-' }}</td>
                </tr>
                <tr>
                    <td >Nama Wali</td>
                    <td class="value">: {{ !empty($keluarga->wali->nama_wali) ? $keluarga->wali->nama_wali : '-' }}</td>
                </tr>
                <tr>
                    <td >Agama</td>
                    <td class="value">: {{ !empty($keluarga->wali->agama) ? $keluarga->wali->agama : '-' }}</td>
                </tr>
                <tr>
                    <td >Tempat Lahir</td>
                    <td class="value">: {{ !empty($keluarga->wali->tempat_lahir) ? $keluarga->wali->tempat_lahir : '-' }}</td>
                </tr>
                <tr>
                    <td >Tanggal Lahir</td>
                    <td class="value">: {{ !empty($keluarga->wali->tanggal_lahir) ? \Carbon\Carbon::parse($keluarga->wali->tanggal_lahir)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <td >Alamat</td>
                    <td class="value">: {{ !empty($keluarga->wali->alamat) ? $keluarga->wali->alamat : '-' }}</td>
                </tr>
                <tr>
                    <td >Provinsi</td>
                    <td class="value">: {{ !empty($keluarga->wali->provinsi) ? $keluarga->wali->provinsi->nama : '-' }}</td>
                </tr>
                <tr>
                    <td >Kabupaten</td>
                    <td class="value">: {{ !empty($keluarga->wali->kabupaten) ? $keluarga->wali->kabupaten->nama : '-' }}</td>
                </tr>
                <tr>
                    <td >Kecamatan</td>
                    <td class="value">: {{ !empty($keluarga->wali->kecamatan) ? $keluarga->wali->kecamatan->nama : '-' }}</td>
                </tr>
                <tr>
                    <td >Kelurahan</td>
                    <td class="value">: {{ !empty($keluarga->wali->kelurahan) ? $keluarga->wali->kelurahan->nama : '-' }}</td>
                </tr>
                <tr>
                    <td >Penghasilan Wali</td>
                    <td class="value">:
                        @if(!empty($keluarga->wali->penghasilan))
                            @switch($keluarga->wali->penghasilan)
                                @case('500000')
                                    Dibawah Rp.500.000,-
                                    @break
                                @case('1500000')
                                    Rp.500.000,- s/d Rp.1.500.000,-
                                    @break
                                @case('2500000')
                                    Rp.1.500.000,- s/d Rp.2.500.000,-
                                    @break
                                @case('3500000')
                                    Rp.2.500.000,- s/d Rp.3.500.000,-
                                    @break
                                @case('5000000')
                                    Rp.3.500.000,- s/d Rp.5.000.000,-
                                    @break
                                @case('7000000')
                                    Rp.5.000.000,- s/d Rp.7.000.000,-
                                    @break
                                @case('10000000')
                                    Diatas Rp.10.000.000,-
                                    @break
                                @default
                                    -
                            @endswitch
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td >Hubungan Kekerabatan</td>
                    <td class="value">: {{ !empty($keluarga->wali->hub_kerabat) ? $keluarga->wali->hub_kerabat : '-' }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Data wali belum tersedia.
        </div>
    @endif
</div>

<!-- Tambahkan CSS untuk mengatur jarak -->
<style>
    .table-data-wali {
        width: 100%;
    }
    .table-data-wali td.label {
        width: 100%; /* Sesuaikan persentase sesuai kebutuhan */
        font-weight: bold;
    }
    .table-data-wali td.value {
        width: 42%; /* Sesuaikan persentase sesuai kebutuhan */
    }
</style>
