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
    <span class="detail-label">NIK Ibu :</span>
    <span class="detail-value">{{ $ibu->nik_ibu ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Nama Ibu :</span>
    <span class="detail-value">{{ $ibu->nama_ibu ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Agama Ibu :</span>
    <span class="detail-value">{{ $ibu->agama ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Status Ibu :</span>
    <span class="detail-value">
        {{ $ibu->tanggal_kematian ? 'Meninggal' : 'Hidup' }}
    </span>
</div>

<div class="detail-field">
    <span class="detail-label">Penghasilan Ibu :</span>
    <span class="detail-value">
        @if(empty($ibu->penghasilan))
            -
        @else
            @switch($ibu->penghasilan)
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
    <span class="detail-label">Alamat Ibu :</span>
    <span class="detail-value">{{ $ibu->alamat ?? '-' }}</span>
</div>
