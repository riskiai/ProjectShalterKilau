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
    <span class="detail-label">Solat 5 Waktu :</span>
    <span class="detail-value">{{ $survey->solat_lima_waktu ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Membaca Alquran :</span>
    <span class="detail-value">{{ $survey->membaca_alquran ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Majelis Taklim :</span>
    <span class="detail-value">{{ $survey->majelis_taklim ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Membaca Koran :</span>
    <span class="detail-value">{{ $survey->membaca_koran ?? '-' }}</span>
</div>

<div class="detail-field">
    <span class="detail-label">Pengurus Organisasi :</span>
    <span class="detail-value">{{ $survey->pengurus_organisasi ?? '-' }}</span>
</div>
