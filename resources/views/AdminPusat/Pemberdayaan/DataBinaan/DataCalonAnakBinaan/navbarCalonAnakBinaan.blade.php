<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') != 'anak-pendidikan' && request()->get('tab') != 'anak-keluarga' ? 'active' : '' }}" 
           href="{{ route('calonAnakBinaan.show', $anak->id_anak) }}">
            Data Anak
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'anak-pendidikan' ? 'active' : '' }}" 
           href="{{ route('calonAnakBinaan.show', ['id' => $anak->id_anak, 'tab' => 'anak-pendidikan']) }}">
           Data Pendidikan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'anak-keluarga' ? 'active' : '' }}" 
           href="{{ route('calonAnakBinaan.show', ['id' => $anak->id_anak, 'tab' => 'anak-keluarga']) }}">
           Data Keluarga
        </a>
    </li>
</ul>
