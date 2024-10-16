<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kilau App Shalter</title>
    <link rel="icon" href="{{ asset('assets/img/LogoKilau2.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        section {
            min-height: 100vh;
            padding: 0 9%;
        }

        .home {
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .home .bg {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.9); 
        }

        .main-content {
            display: block;
            justify-content: center;
            align-items: center;
        }

        .title {
            font-size: 33px;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.9); 
        }

        .subtitle {
            font-size: 33px;
            color: white;
            margin-top: -30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.9); 
        }

        .title-wrapper {
            position: absolute;
            top: 110px; 
            left: 50%;
            transform: translateX(-50%);
            font-size: 5rem;
            font-weight: bold;
            text-align: center;
            z-index: 1;
            background-color: rgba(0, 0, 0, 0); 
            border-radius: 10px;
            white-space: nowrap;
        }

        .outer-box {
            justify-content: center;
            display: flex;
            flex-direction: column;
            padding-top: 120px;
            border-radius: 10px;
        }

        .row {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .row.top-row {
            justify-content: space-between;
        }

        .colored-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s;
            width: 350px;
            margin: 0 10px;
        }

        .colored-box:hover {
            background-color: #6861CE;
            transform: scale(1.05);
        }

        .colored-box-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .colored-box a {
            text-decoration: none;
            color: inherit;
        }

        .colored-box i {
            font-size: 40px;
            margin-bottom: 10px;
            margin-top: 10px;
            color: black;
        }

        
        .colored-box:hover i {
            color: white;
        }

        .btn-link {
            text-decoration: none !important; 
            color: black;
            padding: 0;
        }

        .btn-link:hover {
            text-decoration: none !important; 
            color: black;
        }

        /* Style khusus tombol logout */
        .btn-logout {
            background: none;
            border: none;
            color: inherit;
            padding: 0;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .btn-logout i {
            font-size: 40px;
            margin-bottom: 10px;
            margin-top: 10px;
            color: black;
        }

        .btn-logout:hover i {
            color: black;
        }

        .footer {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }

    </style>

</head>
<body>
    <section class="home">
        <div class="title-wrapper">
            <h1 class="title">KILAU INFORMATION SYSTEM</h1>
            <h1 class="subtitle">KILAU INDONESIA</h1>
        </div>

        <div class="main-content">
            <div class="outer-box">
                <!-- Row pertama dengan 3 kotak -->
                <div class="row top-row">
                    <div class="colored-box">
                        <a href="{{ route('dashboardPemberdayaanCabang') }}">
                            <div class="colored-box-content">
                                <i class="bi bi-people-fill"></i>
                                <span class="box-text">Pemberdayaan</span>
                            </div>
                        </a>
                    </div>

                    <div class="colored-box">
                        <a href="{{ route('dashboardReportCabang') }}">
                            <div class="colored-box-content">
                                <i class="bi bi-database"></i>
                                <span class="box-text">Report</span>                    
                            </div>
                        </a>
                    </div>

                    <div class="colored-box">
                        <a href="{{ route('dashboardKeuanganCabang') }}">
                            <div class="colored-box-content">
                                <i class="bi bi-cash-stack"></i>
                                <span class="box-text">Keuangan</span>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Row kedua dengan 2 kotak di tengah -->
                <div class="row">
                    <div class="colored-box">
                        <a href="{{ route('dashboardSettingsCabang') }}">
                            <div class="colored-box-content">
                                <i class="bi bi-gear"></i>
                                <span class="box-text">Settings</span>
                            </div>
                        </a>
                    </div>

                    <div class="colored-box">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-logout">
                                <div class="colored-box-content">
                                    <i class="bi bi-box-arrow-left"></i>
                                    <span class="box-text" style="font-size: 15px;">Logout</span>
                                </div>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <img class="bg" src="{{ asset('assets/img/BG.jpg') }}">
    </section>

    <footer class="footer">
        <p>&copy; 2024 Kilau Information System. All rights reserved.</p>
    </footer>

    <!-- Core JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const coloredBoxes = document.querySelectorAll(".colored-box");

            coloredBoxes.forEach((box) => {
                box.addEventListener("click", function () {
                    // Hapus class "clicked" dari semua kotak sebelumnya
                    coloredBoxes.forEach((otherBox) => {
                        otherBox.classList.remove("clicked");
                    });

                    // Tambahkan class "clicked" pada kotak yang diklik
                    this.classList.add("clicked");
                });
            });
        });
    </script>

    @if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: "{{ $message }}",
        });
    </script>
    @endif
</body>
</html>
