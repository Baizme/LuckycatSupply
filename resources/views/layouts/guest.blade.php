<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .login-container {
              background-color: white;
              border-radius: 10px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              display: flex;
              align-items: center;
              max-width: 1000px; /* Lebar maksimum container */
              height: 500px; /* Tinggi tetap container */
              margin: 0 auto; /* Posisi tengah */
            }
      
            .login-form {
              flex: 1;
              padding: 20px;
              color: black;
              display: flex;
              flex-direction: column;
            }
      
            .login-image {
              max-width: 50%; /* Mengatur lebar maksimum gambar agar tidak melebihi lebar kontainer */
            }
      
            .logo-container {
              display: flex;
              align-items: center; /* Menyamakan vertikal */
            }
      
            .logo-small {
              max-width: 50px; /* Sesuaikan ukuran logo sesuai keinginan */
              margin-right: 10px; /* Beri jarak antara logo dan teks */
              border-radius: 50%;
            }
      
            .btn-primary {
              background-color: #7c43f8;
              border-color: #7c43f8;
              color: white;
            }
      
            .form-control {
              font-size: 14px; /* Sesuaikan ukuran font input sesuai kebutuhan */
            }
      
            .form-control::placeholder {
              font-size: 12px; /* Sesuaikan ukuran font placeholder sesuai kebutuhan */
            }
      
            .container {
              display: flex;
              justify-content: center; /* Posisikan container di tengah secara horizontal */
              align-items: center; /* Posisikan container di tengah secara vertikal */
              height: 100vh; /* Set tinggi container sesuai tinggi layar */
            }
          </style>
      
    </head>
    <body class="font-sans text-white-900 antialiased" style="background-color: #1e1e1e">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
            <div>
                <a href="/">
                   <img src="images/luckycat_logo.jpg" alt="logo_register" style="border-radius: 50%;max-width: 120px;
                   height: auto; padding-top:10px ">
                </a>
                <h1 class="mt-2 text-white font-semibold " >Luckycat <span style="color: #7c43f8;">Supply</span></h1>

            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
