@extends('AdminPusat.App.master')

@section('style')
  <style>
    /* Menyelaraskan warna dan tampilan dashboard */
    .card-stats {
      background-color: #6861ce; /* Warna biru */
      color: white;
      border-radius: 10px;
      min-height: 150px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 15px;
    }

    .card-stats .icon-big {
      color: white;
      font-size: 50px;
    }

    .card-stats .numbers h4,
    .card-stats .numbers p {
      color: white;
      margin: 0;
    }

    .card-stats .numbers h4 {
      font-size: 30px;
    }

    .card-stats .more-info {
      margin-top: auto; /* Membuat tombol 'More Info' tetap di bawah */
      text-align: right;
    }

    .card-stats .more-info a {
      color: white;
      font-weight: bold;
      text-decoration: none;
    }

    .card-stats .more-info a:hover {
      text-decoration: underline;
    }

    /* Menjaga tampilan agar konsisten */
    .card .row.align-items-center {
      display: flex;
      align-items: center;
    }

    .col-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
    }

    .col-icon .icon-big {
      width: 70px;
      height: 70px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .col.col-stats {
      flex: 1;
    }

    /* Konsistensi lebar dan tinggi untuk tampilan responsive */
    .col-sm-6.col-md-3 {
      padding-bottom: 10px;
    }
  </style>
@endsection

@section('content')

<div class="container">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">Dashboard Settings Admin Pusat</h3>
        </div>
      </div>
      <div class="row">

         <!-- Card 1 -->
         <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-users"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>{{ $totalUsers }}</h4>
                  <p>All Users</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="{{ route('usersall') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

         <!-- Card 2 -->
         <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-user-tie"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>{{ $totalDonatur }}</h4>
                  <p>Donatur</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="{{ route('donatur') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

          <!-- Card 3 -->
          <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center">
                    <i class="fas fa-user-tie"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <h4>{{  $totalAdminShelter }}</h4>
                    <p>Admin Shelter</p>
                  </div>
                </div>
              </div>
              <div class="more-info">
                <a href="{{ route('admin_shelter') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

           <!-- Card 4 -->
           <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center">
                    <i class="fas fa-user-tie"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <h4>{{  $totalAdminCabang }}</h4>
                    <p>Admin Cabang</p>
                  </div>
                </div>
              </div>
              <div class="more-info">
                <a href="{{ route('admin_cabang') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Card 5 -->
          <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center">
                    <i class="fas fa-user-shield"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <h4>{{  $totalAdminPusat }}</h4>
                    <p>Admin Pusat</p>
                  </div>
                </div>
              </div>
              <div class="more-info">
                <a href="{{ route('admin_pusat') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Card 6 -->
          <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center">
                    <i class="fas fa-chalkboard-teacher"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <h4>{{  $totalTutor }}</h4>
                    <p>Tutor</p>
                  </div>
                </div>
              </div>
              <div class="more-info">
                <a href="{{ route('tutor') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

        <!-- Card 7 -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-building"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>{{  $totalCabang }}</h4>
                  <p>Kantor Cabang</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="{{ route('kantor_cabang') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Card 8 -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-map-marked-alt"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>{{  $totalWilbin }}</h4>
                  <p>Wilayah Binaan</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="{{ route('wilayah_binaan') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Card 9 -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-warehouse"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>{{ $totalShelter }}</h4>
                  <p>Shelter</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="{{ route('data_shalter') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Card 10 -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-book-open"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>{{ $totalQuran }}</h4>
                  <p>Al Qur'an</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="{{ route('alquran') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Card 11 -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-book-reader"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>{{ $totalMateri }}</h4>
                  <p>Materi</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="{{ route('materi') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

          <!-- Card 12 -->
          <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center">
                    <i class="fas fa-university"></i>

                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <h4>{{ $totalbank }}</h4>
                    <p>Bank</p>
                  </div>
                </div>
              </div>
              <div class="more-info">
                <a href="{{ route('bank') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

      </div>
    </div>
</div>

@endsection
