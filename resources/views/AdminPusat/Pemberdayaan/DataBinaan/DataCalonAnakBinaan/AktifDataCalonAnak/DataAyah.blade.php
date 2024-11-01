<div class="col-md-12">
    <h4 class="card-title">Data Ayah</h4>
    @if($anak->keluarga && $anak->keluarga->ayah)
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Status Ayah</td>
                    <td>: 
                        @if (optional($anak->keluarga->ayah)->tanggal_kematian)
                            <span class="badge badge-danger" style="background-color: red; color: white;">Meninggal</span>
                        @else
                            <span class="badge badge-primary" style="background-color: blue; color: white;">Hidup</span>
                        @endif
                    </td>
                </tr>
                
                @if (optional($anak->keluarga->ayah)->tanggal_kematian)
                    <tr>
                        <td>Tanggal Kematian</td>
                        <td>: {{ optional($anak->keluarga->ayah)->tanggal_kematian ? \Carbon\Carbon::parse($anak->keluarga->ayah->tanggal_kematian)->format('d-m-Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Penyebab Kematian</td>
                        <td>: {{ optional($anak->keluarga->ayah)->penyebab_kematian ?? '-' }}</td>
                    </tr>
                @endif
                <tr>
                    <td>NIK Ayah</td>
                    <td>: {{ optional($anak->keluarga->ayah)->nik_ayah  ? optional($anak->keluarga->ayah)->nik_ayah  : '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Ayah</td>
                    <td>: {{ optional($anak->keluarga->ayah)->nama_ayah ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>: {{ optional($anak->keluarga->ayah)->agama  ? optional($anak->keluarga->ayah)->agama  : '-' }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ optional($anak->keluarga->ayah)->tempat_lahir ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ optional($anak->keluarga->ayah)->alamat  ? optional($anak->keluarga->ayah)->alamat : '-' }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>: {{ optional($anak->keluarga->ayah)->penghasilan  ? optional($anak->keluarga->ayah)->penghasilan : '-' }}</td>
                </tr>
                
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Data ayah belum tersedia.
        </div>
    @endif
</div>
