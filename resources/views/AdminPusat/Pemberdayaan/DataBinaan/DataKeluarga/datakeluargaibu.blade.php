<div class="col-md-12">
    <h4 class="card-title">Data Ibu</h4>
    @if($keluarga->ibu)
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>NIK Ibu</td>
                    <td class="value">: {{ !empty($keluarga->ibu->nik_ibu ) ? $keluarga->ibu->nik_ibu : '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>: {{ $keluarga->ibu->nama_ibu ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>: {{ !empty($keluarga->ibu->agama) ? $keluarga->ibu->agama : '-' }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $keluarga->ibu->tempat_lahir ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ $keluarga->ibu->tanggal_lahir ? \Carbon\Carbon::parse($keluarga->ibu->tanggal_lahir)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td class="value">: {{ !empty($keluarga->ibu->alamat ) ? $keluarga->ibu->alamat: '-' }}</td>
                 
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>: {{ optional($keluarga->ibu->provinsi)->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>: {{ optional($keluarga->ibu->kabupaten)->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>: {{ optional($keluarga->ibu->kecamatan)->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>: {{ optional($keluarga->ibu->kelurahan)->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>:
                        @if(isset($keluarga->ibu->penghasilan))
                            @switch($keluarga->ibu->penghasilan)
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
                    <td>Tanggal Kematian</td>
                    <td>: {{ $keluarga->ibu->tanggal_kematian ? \Carbon\Carbon::parse($keluarga->ibu->tanggal_kematian)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <td>Penyebab Kematian</td>
                    <td>: {{ !empty($keluarga->ibu->penyebab_kematian) ? $keluarga->ibu->penyebab_kematian : '-' }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Data ibu belum tersedia.
        </div>
    @endif
</div>
