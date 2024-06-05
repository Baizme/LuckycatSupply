<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Ecommerce</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet" />

    <!-- Bootstrap JS -->
</head>
<style>
    .product-container {
        display: flex;
        justify-content: space-between;
        max-width: 800px;
        margin: 20px ;
        background-color: #fff; /* Background color agar box shadow terlihat */
        padding: 20px; /* Padding untuk memberikan ruang di dalam container */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Menambahkan box shadow */
        border-radius: 10px
    }

    .product-info {
        flex: 1;
        padding: 0 20px;
    }

    .product-image {
        max-width: 300px;
        margin-right: 20px;
    }

    .product-name {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .product-size {
        margin-bottom: 10px;
    }

    .product-description {
        margin-bottom: 20px;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #7C43F8;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        font-size: 16px;
    }
    .btn-wishlist {
        background-color: #f5f5f5;
        color: #7C43F8;
        margin-right: 10px;
    }
    .card {
        display: flex;
        flex-direction: column;
        border-radius: 15px;
        width: 100%; /* Tetapkan lebar 100% untuk mengisi lebar kontainer */
        max-width: 200px; /* Tetapkan lebar maksimum untuk menghindari pembesaran yang tidak diinginkan */
        min-width: 200px; /* Tetapkan lebar minimum untuk menjaga ukuran card tetap sama */
    }
    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-radius: 15px 15px 0 0; /* Terapkan border-radius hanya ke sisi atas */
    }
    .card-body {
        flex-grow: 1;
        border-radius: 0 0 15px 15px; /* Terapkan border-radius hanya ke sisi bawah */
    }
    .product-link {
        text-decoration: none; /* Menghapus garis bawah */
        color: inherit; /* Mewarisi warna teks dari induk */
    }
    .product-link:hover {
        text-decoration: none; /* Tetap menghapus garis bawah saat hover */
        color: inherit; /* Tetap menggunakan warna teks yang sama saat hover */
    }
    .product-link:hover .card-title,
    .product-link:hover .card-text {
        text-decoration: none; /* Tetap menghapus garis bawah saat hover */
    }
</style>

<body>
   
    <main>
        <div class="content" style="margin-left: 250px; padding: 80px 40px">
            <div class="product-container">
                <img src="{{ asset($product->product_photo) }}" alt="Product Image" class="product-image">
                <div class="product-info">
                    <h1 class="product-name">{{ $product->product_name }}</h1>
                    <p class="product-size">Ukuran: {{ $product->product_size }}</p>
                    <p class="product-description">{{ $product->product_description }}</p>
                    <p class="product-price"><strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></p>
                    <a href="#" class="btn btn-wishlist">Tambah ke Wishlist</a>
                    <a href="#" class="btn">Beli Sekarang</a>
                </div>
              </div>
        </div>
    </main>
    
<nav class="navbar navbar-light bg-light content-navbar fixed-top" style="margin-left: 250px">
  <div class="container-fluid">
      <!-- Form pencarian -->
      <form class="form-inline">
      <input class="form-control mr-2" type="search" placeholder="Search for products, categories, brands..." aria-label="Search" />
      <button  class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>
      <!-- Profile (dengan menggunakan ikon saja) -->
      <a href="/profile" style="color: #1e1e1e ;" class="mx-4"><i class="fas fa-user fa-xl ">   {{ Auth::user()->name }}</i></a>

  </div>
</nav>


    <!-- Sidebar -->
    <div class="sidebar">
    <img src="images/luckycat_logo.jpg" alt="Lucky Cat Logo" class="rounded-circle" />
    <h3 class="mt-2">Luckycat <span style="color: #7c43f8;">Supply</span></h3>

    <!-- Menambahkan teks "Luckycat Supply" -->
    <div class="sidebar-menu">
        <!-- Menambahkan ikon dan mengatur warna font menjadi putih -->
        <a href="/dashboard"><i class="fas fa-home text-white mr-2"></i> Home</a>
        <a href="/wishlist"><i class="fas fa-heart text-white mr-2"></i> Wishlist</a>
        <a href="/promo"><i class="fas fa-tags text-white mr-2"></i> Promo</a>
        <a href="/profile"><i class="fas fa-user text-white mr-2"></i> Profile</a>
        <img src="images/promo.jpg" alt="promo" class="rounded my-2" />
        <a href="/about"><i class="fas fa-info-circle text-white mr-2"></i> About</a>
        <form method="POST" class="pt-4 mx-5" action="{{ route('logout') }}">
            @csrf

                <input type="submit" value="Logout" class="mr-2">
        </form>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
