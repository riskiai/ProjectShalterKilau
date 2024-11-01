<!-- Navbar di DataPengajuan/navbarPengajuan.blade.php -->
<ul class="nav nav-tabs" data-section="pengajuan">
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab', 'data-keluargapengajuan') == 'data-keluargapengajuan' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-keluargapengajuan']) }}">
            Keluarga
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-ekonomipengajuan' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-ekonomipengajuan']) }}">
            Ekonomi
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-ayahpengajuan' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-ayahpengajuan']) }}">
            Ayah
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-ibupengajuan' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-ibupengajuan']) }}">
            Ibu
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-walipengajuan' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-walipengajuan']) }}">
            Wali
        </a>
    </li>
</ul>
