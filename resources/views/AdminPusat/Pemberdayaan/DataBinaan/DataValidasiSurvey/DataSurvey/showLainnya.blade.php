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
    <span class="detail-label">Status Anak :</span>
    <span class="detail-value">{{ $survey->status_anak ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Biaya Pendidikan Anak/bulan :</span>
    <span class="detail-value">{{ $survey->biaya_pendidikan_perbulan ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Bantuan Rutin dari Lembaga Formal Lainnya :</span>
    <span class="detail-value">{{ $survey->bantuan_lembaga_formal_lain ?? '-' }}</span>
</div>

