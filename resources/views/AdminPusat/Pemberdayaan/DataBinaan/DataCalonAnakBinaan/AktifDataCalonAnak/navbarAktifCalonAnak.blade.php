<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab', 'data-anakaktivasi') == 'data-anakaktivasi' ? 'active' : '' }}" 
           href="{{ route('aktivasicalonAnakBinaan', ['id' => $anak->id_anak, 'tab' => 'data-anakaktivasi']) }}">
            Data Anak
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'anak-keluargaaktivasi' ? 'active' : '' }}" 
           href="{{ route('aktivasicalonAnakBinaan', ['id' => $anak->id_anak, 'tab' => 'anak-keluargaaktivasi']) }}">
            Data Keluarga
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'ayahaktivasi' ? 'active' : '' }}" 
           href="{{ route('aktivasicalonAnakBinaan', ['id' => $anak->id_anak, 'tab' => 'ayahaktivasi']) }}">
           Data Ayah
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'ibuaktivasi' ? 'active' : '' }}" 
           href="{{ route('aktivasicalonAnakBinaan', ['id' => $anak->id_anak, 'tab' => 'ibuaktivasi']) }}">
           Data Ibu
        </a>
    </li>
</ul>
