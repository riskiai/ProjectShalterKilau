<style>
    .detail-field {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .detail-label {
        flex: 0 0 250px; /* Sesuaikan lebar label */
        font-weight: bold;
    }

    .detail-value {
        flex: 1;
        text-align: left;
    }
</style>

<div class="detail-field">
    <span class="detail-label">NIK Ayah :</span>
    <span class="detail-value">{{ !empty($ayah->nik_ayah) ? $ayah->nik_ayah : '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Nama Ayah :</span>
    <span class="detail-value">{{ !empty($ayah->nama_ayah) ? $ayah->nama_ayah : '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Agama Ayah :</span>
    <span class="detail-value">{{ !empty($ayah->agama) ? $ayah->agama : '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Status Ayah :</span>
    <span class="detail-value">
        {{ !empty($ayah->tanggal_kematian) ? 'Meninggal' : 'Hidup' }}
    </span>
</div>

<div class="detail-field">
    <span class="detail-label">Penghasilan Ayah :</span>
    <span class="detail-value">
        @if(empty($ayah->penghasilan))
            -
        @else
            @switch($ayah->penghasilan)
                @case('dibawah_500k')
                    Di bawah Rp.500.000,-
                    @break
                @case('500k_1500k')
                    Rp.500.000,- s/d Rp.1.500.000,-
                    @break
                @case('1500k_2500k')
                    Rp.1.500.000,- s/d Rp.2.500.000,-
                    @break
                @case('2500k_3500k')
                    Rp.2.500.000,- s/d Rp.3.500.000,-
                    @break
                @case('3500k_5000k')
                    Rp.3.500.000,- s/d Rp.5.000.000,-
                    @break
                @case('5000k_7000k')
                    Rp.5.000.000,- s/d Rp.7.000.000,-
                    @break
                @case('7000k_10000k')
                    Rp.7.000.000,- s/d Rp.10.000.000,-
                    @break
                @case('diatas_10000k')
                    Di atas Rp.10.000.000,-
                    @break
                @default
                    -
            @endswitch
        @endif
    </span>
</div>

<div class="detail-field">
    <span class="detail-label">Alamat Ayah :</span>
    <span class="detail-value">{{ !empty($ayah->alamat) ? $ayah->alamat : '-' }}</span>
</div>
