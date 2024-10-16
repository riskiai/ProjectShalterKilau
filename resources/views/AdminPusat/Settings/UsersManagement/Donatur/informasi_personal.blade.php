<div class="col-md-6">
    <div class="detail-value">
        <strong>Nama Lengkap:</strong> {{ $donatur->nama_lengkap }}
    </div>
    <div class="detail-value">
        <strong>Email:</strong> {{ $donatur->user->email }}
    </div>
    <div class="detail-value">
        <strong>Status:</strong> {{ $donatur->user->status == 'aktif' ? 'Aktif' : 'Tidak Aktif' }}
    </div>
    <div class="detail-value">
        <strong>No HP:</strong> {{ $donatur->no_hp }}
    </div>
    <div class="detail-value">
        <strong>Bank:</strong> {{ $donatur->bank->nama_bank }}
    </div>
    <div class="detail-value">
        <strong>No Rekening:</strong> {{ $donatur->no_rekening }}
    </div>
</div>
<div class="col-md-6">
    <div class="detail-value">
        <strong>Diperuntukan:</strong> 
        @if($donatur->diperuntukan == 'Pengajuan Donatur (Calon Anak Non Beasiswa)')
            NPB
        @elseif($donatur->diperuntukan == 'Pengajuan Donatur (Calon Anak Penerima Beasiswa)')
            CPB
        @elseif($donatur->diperuntukan == 'Pengajuan Donatur CPB dan NPB')
            CPB dan NPB
        @endif
    </div>
    <div class="detail-value">
        <strong>Kantor Cabang:</strong> {{ $donatur->kacab->nama_kacab }}
    </div>
    <div class="detail-value">
        <strong>Wilayah Binaan:</strong> {{ $donatur->wilbin->nama_wilbin }}
    </div>
    <div class="detail-value">
        <strong>Shelter:</strong> {{ $donatur->shelter->nama_shelter }}
    </div>
    <div class="detail-value">
        <strong>Alamat:</strong> {{ $donatur->alamat }}
    </div>
</div>
