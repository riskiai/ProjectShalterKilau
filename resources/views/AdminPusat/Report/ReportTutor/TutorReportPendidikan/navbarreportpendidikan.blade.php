<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == null ? 'active' : '' }}" 
           href="{{ route('reportTutorPendidikan') }}" style="color:#5a5a5a; font-weight:400;">
            Persentase
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'quantitas' ? 'active' : '' }}" 
           href="{{ route('reportTutorPendidikan', ['tab' => 'quantitas']) }}" style="color:#5a5a5a; font-weight:400;">
            Quantitas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'bulanan' ? 'active' : '' }}" 
           href="{{ route('reportTutorPendidikan', ['tab' => 'bulanan']) }}" style="color:#5a5a5a; font-weight:400;">
            Bulanan
        </a>
    </li>
</ul>
