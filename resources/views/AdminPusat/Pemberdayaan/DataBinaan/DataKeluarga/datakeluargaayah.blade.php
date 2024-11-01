<div class="col-md-12">
    <h4 class="card-title">Data Ayah</h4>
    @if($keluarga->ayah)
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>NIK Ayah</td>
                    <td class="value">: {{ !empty($keluarga->ayah->nik_ayah) ? $keluarga->ayah->nik_ayah : '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Ayah</td>
                    <td>: {{ $keluarga->ayah->nama_ayah ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>: {{ !empty($keluarga->ayah->agama) ? $keluarga->ayah->agama : '-' }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $keluarga->ayah->tempat_lahir ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ $keluarga->ayah->tanggal_lahir ? \Carbon\Carbon::parse($keluarga->ayah->tanggal_lahir)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td class="value">: {{ !empty($keluarga->ayah->alamat) ? $keluarga->ayah->alamat: '-' }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>: {{ optional($keluarga->ayah->provinsi)->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>: {{ optional($keluarga->ayah->kabupaten)->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>: {{ optional($keluarga->ayah->kecamatan)->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>: {{ optional($keluarga->ayah->kelurahan)->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>:
                        @if(isset($keluarga->ayah->penghasilan))
                            @switch($keluarga->ayah->penghasilan)
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
                    <td>: {{ $keluarga->ayah->tanggal_kematian ? \Carbon\Carbon::parse($keluarga->ayah->tanggal_kematian)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <td>Penyebab Kematian</td>
                    <td>: {{ !empty($keluarga->ayah->penyebab_kematian) ? $keluarga->ayah->penyebab_kematian : '-' }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Data ayah belum tersedia.
        </div>
    @endif
</div>
