<ul class="nav nav-tabs">
    <li class="nav-item">
        {{-- Tab Keluarga --}}
        <a class="nav-link {{ request()->get('tab', 'data-keluarga') == 'data-keluarga' ? 'active' : '' }}" 
           href="{{ route('surveykeluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-keluarga']) }}">
            Keluarga
        </a>
    </li>
    <li class="nav-item">
        {{-- Tab Ekonomi --}}
        <a class="nav-link {{ request()->get('tab') == 'data-ekonomi' ? 'active' : '' }}" 
           href="{{ route('surveykeluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-ekonomi']) }}">
            Ekonomi
        </a>
    </li>
    <li class="nav-item">
        {{-- Tab Asset --}}
        <a class="nav-link {{ request()->get('tab') == 'data-asset' ? 'active' : '' }}" 
           href="{{ route('surveykeluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-asset']) }}">
            Asset
        </a>
    </li>
    <li class="nav-item">
        {{-- Tab Kesehatan --}}
        <a class="nav-link {{ request()->get('tab') == 'data-kesehatan' ? 'active' : '' }}" 
           href="{{ route('surveykeluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-kesehatan']) }}">
            Kesehatan
        </a>
    </li>
    <li class="nav-item">
        {{-- Tab Ibadah & Sosial --}}
        <a class="nav-link {{ request()->get('tab') == 'data-ibadah' ? 'active' : '' }}" 
           href="{{ route('surveykeluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-ibadah']) }}">
            Ibadah & Sosial
        </a>
    </li>
    <li class="nav-item">
        {{-- Tab Lainnya --}}
        <a class="nav-link {{ request()->get('tab') == 'data-lainnya' ? 'active' : '' }}" 
           href="{{ route('surveykeluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-lainnya']) }}">
            Lainnya
        </a>
    </li>
    <li class="nav-item">
        {{-- Tab Data Survey --}}
        <a class="nav-link {{ request()->get('tab') == 'data-survey' ? 'active' : '' }}" 
           href="{{ route('surveykeluarga.show', ['id' => $keluarga->id_keluarga, 'tab' => 'data-survey']) }}">
            Data Survey
        </a>
    </li>
</ul>
