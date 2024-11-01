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
    <span class="detail-label">NIK Wali :</span>
    <span class="detail-value">{{ $wali->nik_wali ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Nama Wali :</span>
    <span class="detail-value">{{ $wali->nama_wali ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Agama Wali :</span>
    <span class="detail-value">{{ $wali->agama ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Status Hubungan :</span>
    <span class="detail-value">{{ $wali->hub_kerabat ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Penghasilan Wali :</span>
    <span class="detail-value">
        @if(empty($wali->penghasilan))
            -
        @else
            @php
                $penghasilan = (int) $wali->penghasilan;
            @endphp
            @if($penghasilan < 500000)
                Di bawah Rp.500.000,-
            @elseif($penghasilan >= 500000 && $penghasilan <= 1500000)
                Rp.500.000,- s/d Rp.1.500.000,-
            @elseif($penghasilan > 1500000 && $penghasilan <= 2500000)
                Rp.1.500.000,- s/d Rp.2.500.000,-
            @elseif($penghasilan > 2500000 && $penghasilan <= 3500000)
                Rp.2.500.000,- s/d Rp.3.500.000,-
            @elseif($penghasilan > 3500000 && $penghasilan <= 5000000)
                Rp.3.500.000,- s/d Rp.5.000.000,-
            @elseif($penghasilan > 5000000 && $penghasilan <= 7000000)
                Rp.5.000.000,- s/d Rp.7.000.000,-
            @elseif($penghasilan > 7000000 && $penghasilan <= 10000000)
                Rp.7.000.000,- s/d Rp.10.000.000,-
            @else
                Di atas Rp.10.000.000,-
            @endif
        @endif
    </span>
</div>

<div class="detail-field">
    <span class="detail-label">Alamat Wali :</span>
    <span class="detail-value">{{ $wali->alamat ?? '-' }}</span>
</div>
