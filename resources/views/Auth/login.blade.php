@extends('Auth.Components.app')

@section('style')
    <style>
        /* Menyusun halaman login */
        .login-page {
            display: flex;
            height: 100vh;
            width: 100vw;
            background-color: #f8f9fa;
            overflow: hidden;
        }

        /* Gambar latar belakang dengan efek overlay */
        .login-background {
            flex: 1.5;
            background-image: url('{{ asset('assets/img/bgr.png') }}');
            background-size: cover;
            background-position: center;
            height: 100%;
            position: relative;
            /* filter: brightness(2); */
        }

        /* Overlay di atas gambar untuk shadow */
        .login-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background-color: rgba(0, 0, 0, 0.4);  */
        }

        /* Styling untuk teks overlay di atas gambar */
        .overlay-text {
            position: absolute;
            top: 80px; /* Posisikan teks di atas gambar */
            left: 50%;
            transform: translateX(-50%);
            color: #ffffff;
            font-size: 2rem; /* Sesuaikan ukuran font */
            font-weight: bold;
            text-align: center;
            z-index: 1; /* Pastikan teks berada di atas gambar */
            padding: 0.5rem 1rem;
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            white-space: nowrap;
        }

        /* Styling form login */
        .login-form {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background-color: rgba(255, 255, 255, 0.95);
            height: 100vh;
        }

        /* Styling untuk card login */
        .login-form .card {
            width: 100%;
            max-width: 700px; 
            height: auto;
            min-height: 80vh; 
            border-radius: 15px;
            padding: 3rem 2.5rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            margin-top: 5rem; 
        }

        /* Styling untuk logo */
        .login-logo {
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            background-color: white;
            padding: 10px;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); 
        }

        .login-logo img {
            height: 80px; /* Ukuran logo */
            width: 80px;
        }

        /* Font yang lebih tebal untuk judul */
        .card h3 {
            font-weight: bold;
            font-size: 1.75rem;
            color: #333;
            margin-bottom: 2rem;
            text-align: center;
        }

        /* Styling untuk form control dan input */
        .form-group label {
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            padding: 0.75rem;
            border-radius: 8px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #5e72e4;
        }

        /* Menata footer pada form login */
        .login-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2rem;
        }

        .login-footer p {
            margin-bottom: 0;
            font-size: 0.9rem;
            color: #777;
        }

        /* Styling untuk ukuran layar kecil */
        @media (max-width: 768px) {
            .login-background {
                display: none;
            }

            .login-page {
                justify-content: center;
            }

            .login-form {
                flex: 1;
                padding: 2rem;
                max-width: 100%;
            }

            .login-logo {
                top: -50px;
            }

            .login-logo img {
                height: 60px;
                width: 60px;
            }
        }

        /* Styling tambahan untuk layar yang lebih kecil */
        @media (max-width: 576px) {
            .login-form .card {
                padding: 1.5rem;
                max-width: 100%;
            }

            .login-footer p {
                font-size: 0.8rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="login-page">
        <div class="login-background">
            {{-- <div class="overlay-text">
                KILAU INDONESIA LEMBAGA KEMANUSIAAN
            </div> --}}
        </div>
        <div class="login-form">
            <div class="card">
                <!-- Menambahkan logo di atas -->
                <div class="login-logo">
                    <img src="{{ asset('assets/img/LogoKilau2.png') }}" alt="Kilau Logo">
                </div>

                <!-- Menebalkan teks Sign In -->
                <h3 class="text-center mt-5">Sign In</h3>
                
                <!-- Notifikasi error -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form untuk login -->
                <form action="{{ route('login-proses') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Alamat Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="showPassword">
                        <label class="form-check-label" for="showPassword">Show Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>                    
                </form>
                <div class="login-footer mt-4">
                    <p>© 2024 Kilau Indonesia. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Show/Hide password toggle
        const showPasswordCheckbox = document.getElementById('showPassword');
        const passwordInput = document.getElementById('password');

        showPasswordCheckbox.addEventListener('change', function () {
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
@endsection
