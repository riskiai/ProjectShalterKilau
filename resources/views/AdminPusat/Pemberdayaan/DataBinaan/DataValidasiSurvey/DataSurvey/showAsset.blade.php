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
    <span class="detail-label">Kepemilikan Rumah :</span>
    <span class="detail-value">{{ $survey->kepemilikan_rumah ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Kondisi Rumah Dinding :</span>
    <span class="detail-value">{{ $survey->kondisi_rumah_dinding ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Kondisi Rumah Lantai :</span>
    <span class="detail-value">{{ $survey->kondisi_rumah_lantai ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Kepemilikan Tanah :</span>
    <span class="detail-value">{{ $survey->kepemilikan_tanah ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Kepemilikan Kendaraan :</span>
    <span class="detail-value">{{ $survey->kepemilikan_kendaraan ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Kepemilikan Elektronik :</span>
    <span class="detail-value">{{ $survey->kepemilikan_elektronik ?? '-' }}</span>
</div>
