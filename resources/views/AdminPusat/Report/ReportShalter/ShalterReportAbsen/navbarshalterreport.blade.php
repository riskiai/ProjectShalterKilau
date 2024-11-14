<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == null ? 'active' : '' }}" 
           href="{{ route('shalterAbsenReport') }}" style="color:#5a5a5a; font-weight:400;">
            Tutor Pendidikan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'quantitas' ? 'active' : '' }}" 
           href="{{ route('shalterAbsenReport', ['tab' => 'quantitas']) }}" style="color:#5a5a5a; font-weight:400;">
            Tutor Pekanan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'anak' ? 'active' : '' }}" 
           href="{{ route('shalterAbsenReport', ['tab' => 'anak']) }}" style="color:#5a5a5a; font-weight:400;">
            Anak
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'peringatan' ? 'active' : '' }}" 
           href="{{ route('shalterAbsenReport', ['tab' => 'peringatan']) }}" style="color:#5a5a5a; font-weight:400;">
            Peringatan Kehadiran Anak
        </a>
    </li>
</ul>
