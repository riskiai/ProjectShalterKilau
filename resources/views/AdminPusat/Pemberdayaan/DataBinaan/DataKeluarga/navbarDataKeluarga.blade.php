<ul class="nav nav-tabs">
    <li class="nav-item">
        {{-- Tambahin Kondisi Lagi jika ingin bordernya active  --}}
        <a class="nav-link {{ request()->get('tab', 'data-keluarga') == 'data-keluarga' ? 'active' : '' }}" 
           href="{{ route('Keluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-keluarga']) }}">
            Data Keluarga
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-ayah' ? 'active' : '' }}" 
           href="{{ route('Keluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-ayah']) }}">
            Data Ayah
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-ibu' ? 'active' : '' }}" 
           href="{{ route('Keluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-ibu']) }}">
            Data Ibu
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-wali' ? 'active' : '' }}" 
           href="{{ route('Keluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-wali']) }}">
            Data Wali
        </a>
    </li>
</ul>
