<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kilau App Shalter</title>
    <link
    rel="icon"
    href="{{ asset('assets/img/LogoKilau2.png') }}"
    type="image/x-icon"
    />
 
     <!-- CSS Files -->
     <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />
 
     <!-- CSS Just for demo purpose, don't include it in your project -->
     <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

     @yield('style')

</head>
<body>
   @yield('content')

</body>
   <!--   Core JS Files   -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
   <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
   <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

   <!-- jQuery Scrollbar -->
   <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

   @if ($message = Session::get('success'))
   <script>
       Swal.fire({
           icon: "success",
           title: "Berhasil",
           text: "{{ $message }}",
       });
   </script>
   @endif
   
   @yield('scripts')
   </script>
</html>