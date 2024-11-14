@extends('AdminPusat.App.master')

@section('style')
  <style>
    .card-stats {
      background-color: #6861ce;
      color: white;
      border-radius: 10px;
      min-height: 150px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 15px;
      margin-bottom: 15px;
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
      margin-top: auto;
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

    .col-sm-6.col-md-3 {
      padding-bottom: 10px;
    }
  </style>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">Dashboard Report Anak</h3>
        </div>
      </div>
      <div class="row">
        <!-- Anak BCPB Aktif -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-user-check"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>120</h4>
                  <p>Anak BCPB Aktif</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="#">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Anak CPB Aktif -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-user-check"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>80</h4>
                  <p>Anak CPB Aktif</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="#">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Anak NPB Aktif -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-user-check"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>60</h4>
                  <p>Anak NPB Aktif</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="#">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Anak PB Aktif -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-user-check"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>90</h4>
                  <p>Anak PB Aktif</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="#">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Anak BCPB Tidak Aktif -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-user-times"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>15</h4>
                  <p>Anak BCPB Tidak Aktif</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="#">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Anak CPB Tidak Aktif -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-user-times"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>10</h4>
                  <p>Anak CPB Tidak Aktif</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="#">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Anak NPB Tidak Aktif -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-user-times"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>8</h4>
                  <p>Anak NPB Tidak Aktif</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="#">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Anak PB Tidak Aktif -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-user-times"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>12</h4>
                  <p>Anak PB Tidak Aktif</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="#">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
      </div>
    </div>
</div>
@endsection
