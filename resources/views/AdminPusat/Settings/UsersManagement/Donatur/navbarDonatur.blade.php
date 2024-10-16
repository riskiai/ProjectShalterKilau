<ul class="nav nav-tabs">
    <li class="nav-item">
        <!-- Tab untuk Informasi Personal -->
        <a class="nav-link {{ request()->get('tab') != 'anak-asuh' ? 'active' : '' }}" 
           href="{{ route('donatur.show', $donatur->id_donatur) }}">
           Informasi Personal
        </a>
    </li>
    <li class="nav-item">
        <!-- Tab untuk Informasi Anak Asuh -->
        <a class="nav-link {{ request()->get('tab') == 'anak-asuh' ? 'active' : '' }}" 
           href="{{ route('donatur.show', $donatur->id_donatur) }}?tab=anak-asuh">
           Informasi Anak Asuh
        </a>
    </li>
</ul>
