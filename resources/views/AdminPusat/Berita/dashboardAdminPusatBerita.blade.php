@extends('AdminPusat.App.master')

@section('style')
  <style>
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
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">Dashboard Berita Admin Pusat</h3>
        </div>
      </div>
      <div class="row">
        <!-- Card Total Data Keuangan -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center">
                  <i class="fas fa-newspaper"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <h4>{{ $totalBerita }}</h4>
                  <p>Total Data Berita</p>
                </div>
              </div>
            </div>
            <div class="more-info">
              <a href="{{ route('databerita') }}">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
