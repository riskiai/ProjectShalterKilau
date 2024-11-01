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
    <span class="detail-label">Sumber Air Bersih :</span>
    <span class="detail-value">{{ $survey->sumber_air_bersih ?? '-' }}</span>
</div>
<div class="detail-field">
    <span class="detail-label">Jamban dan Saluran Limbah :</span>
    <span class="detail-value">{{ $survey->jamban_limbah ?? '-' }}</span>
</div>
<div class="detail-field">
    <span class="detail-label">Tempat Pembuangan Sampah :</span>
    <span class="detail-value">{{ $survey->tempat_sampah ?? '-' }}</span>
</div>
<div class="detail-field">
    <span class="detail-label">Terdapat Perokok :</span>
    <span class="detail-value">{{ $survey->perokok ?? '-' }}</span>
</div>
<div class="detail-field">
    <span class="detail-label">Terdapat Konsumen Miras :</span>
    <span class="detail-value">{{ $survey->konsumen_miras ?? '-' }}</span>
</div>
<div class="detail-field">
    <span class="detail-label">Terdapat Persediaan Obat P3K :</span>
    <span class="detail-value">{{ $survey->persediaan_p3k ?? '-' }}</span>
</div>
<div class="detail-field">
    <span class="detail-label">Makan Buah dan Sayur Setiap Hari :</span>
    <span class="detail-value">{{ $survey->makan_buah_sayur ?? '-' }}</span>
</div>
