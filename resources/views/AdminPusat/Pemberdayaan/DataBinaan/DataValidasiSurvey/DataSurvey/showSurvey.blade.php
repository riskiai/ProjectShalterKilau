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
    <span class="detail-label">Resume Diskripstif , Kondisi Calon Penerima Manfaat :</span>
    <span class="detail-value">{{ $survey->kondisi_penerima_manfaat ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Petugas Survey :</span>
    <span class="detail-value">{{ $survey->petugas_survey ?? '-' }}</span>
</div>
