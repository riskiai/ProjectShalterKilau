<div class="col-md-12">
    <h4 class="card-title">Data Keluarga Anak</h4>
    @if($anak->keluarga)
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>No. Kartu Keluarga</td>
                    <td>: {{ $anak->keluarga->no_kk ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Kepala Keluarga</td>
                    <td>: {{ $anak->keluarga->kepala_keluarga ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Ayah</td>
                    <td>: {{ $anak->keluarga->ayah->nama_ayah ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>: {{ $anak->keluarga->ibu->nama_ibu ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Wali</td>
                    <td>: {{ optional($anak->keluarga->wali)->nama_wali ? optional($anak->keluarga->wali)->nama_wali : '-' }}</td>
                </tr>                          
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Data keluarga anak belum tersedia.
        </div>
    @endif
</div>
