<div class="col-md-12">
    <h4 class="card-title">Data Ibu</h4>
    @if($anak->keluarga && $anak->keluarga->ibu)
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Status Ibu</td>
                    <td>: 
                        @if (optional($anak->keluarga->ibu)->tanggal_kematian)
                            <span class="badge badge-danger" style="background-color: red; color: white;">Meninggal</span>
                        @else
                            <span class="badge badge-primary" style="background-color: blue; color: white;">Hidup</span>
                        @endif
                    </td>
                </tr>

                @if (optional($anak->keluarga->ibu)->tanggal_kematian)
                    <tr>
                        <td>Tanggal Kematian</td>
                        <td>: {{ optional($anak->keluarga->ibu)->tanggal_kematian ? \Carbon\Carbon::parse($anak->keluarga->ibu->tanggal_kematian)->format('d-m-Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Penyebab Kematian</td>
                        <td>: {{ optional($anak->keluarga->ibu)->penyebab_kematian ?? '-' }}</td>
                    </tr>
                @endif
                <tr>
                    <td>NIK Ibu</td>
                    <td>: {{ optional($anak->keluarga->ibu)->nik_ibu   ? optional($anak->keluarga->ibu)->nik_ibu   : '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>: {{ optional($anak->keluarga->ibu)->nama_ibu ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>: {{ optional($anak->keluarga->ibu)->agama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ optional($anak->keluarga->ibu)->tempat_lahir ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ optional($anak->keluarga->ibu)->alamat ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>: {{ optional($anak->keluarga->ibu)->penghasilan ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Data ibu belum tersedia.
        </div>
    @endif
</div>
