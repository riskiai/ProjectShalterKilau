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

<!-- Field Tambahan untuk Rekening dan Telepon -->
<div class="detail-field">
    <span class="detail-label">Rekening :</span>
    <span class="detail-value">{{ $keluarga->no_rek ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">a.n Rekening :</span>
    <span class="detail-value">{{ $keluarga->an_rek ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">No. Telepon :</span>
    <span class="detail-value">{{ $keluarga->no_telp ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">a.n Telepon :</span>
    <span class="detail-value">{{ $keluarga->an_tlp ?? '-' }}</span>
</div>
