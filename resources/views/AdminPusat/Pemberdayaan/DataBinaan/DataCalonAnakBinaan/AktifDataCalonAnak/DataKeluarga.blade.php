<div class="col-md-12">
    <h4 class="card-title">Data Keluarga Anak</h4>
    @if($anak->keluarga)
        <table class="table table-borderless">
            <tbody>
                <!-- ID Keluarga tidak ditampilkan -->

                <tr>
                    <td>Kantor Cabang</td>
                    <td>: {{ optional($anak->keluarga->kacab)->nama_kacab ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Wilayah Binaan</td>
                    <td>: {{ optional($anak->keluarga->wilbin)->nama_wilbin ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Shelter</td>
                    <td>: {{ optional($anak->keluarga->shelter)->nama_shelter ?? '-' }}</td>
                </tr>
                <tr>
                    <td>No. Kartu Keluarga</td>
                    <td>: {{ optional($anak->keluarga)->no_kk ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Kepala Keluarga</td>
                    <td>: {{ optional($anak->keluarga)->kepala_keluarga ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Status Orang Tua</td>
                    <td>: {{ optional($anak->keluarga)->status_ortu ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Bank</td>
                    <td>: {{ optional($anak->keluarga->bank)->nama_bank ?? '-' }}</td>
                </tr>
                <tr>
                    <td>No. Rekening</td>
                    <td>: {{ optional($anak->keluarga)->no_rek ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Atas Nama Rekening</td>
                    <td>: {{ optional($anak->keluarga)->an_rek ?? '-' }}</td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td>: {{ optional($anak->keluarga)->no_telp ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Atas Nama Telepon</td>
                    <td>: {{ optional($anak->keluarga)->an_tlp ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Data keluarga anak belum tersedia.
        </div>
    @endif
</div>
