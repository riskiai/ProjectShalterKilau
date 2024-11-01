<!-- Navbar di DataSurvey/navbarSurvey.blade.php -->
<ul class="nav nav-tabs" data-section="survey">
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab', 'data-keluargasurvey') == 'data-keluargasurvey' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-keluargasurvey']) }}">
            Keluarga
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-ekonomisurvey' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-ekonomisurvey']) }}">
            Ekonomi
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-assetsurvey' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-assetsurvey']) }}">
            Asset
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-kesehatansurvey' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-kesehatansurvey']) }}">
            Kesehatan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-ibadahsurvey' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-ibadahsurvey']) }}">
            Ibadah & Sosial
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-lainnyasurvey' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-lainnyasurvey']) }}">
            Lainnya
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->get('tab') == 'data-survey' ? 'active' : '' }}" 
           href="{{ route('validasisurveykeluarga.show', ['id_survey' => $survey->id_survey, 'tab' => 'data-survey']) }}">
            Data Survey
        </a>
    </li>
</ul>
