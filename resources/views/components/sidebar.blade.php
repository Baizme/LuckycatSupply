<div class="sidebar">
    <img src="{{ asset('images/luckycat_logo.jpg') }}" alt="Lucky Cat Logo" class="rounded-circle" />
    <h3 class="mt-2">Luckycat <span style="color: #7c43f8;">Supply</span></h3>
    <!-- Menambahkan teks "Luckycat Supply" -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="sidebar-menu">
        <!-- Menambahkan ikon dan mengatur warna font menjadi putih -->
        <a href="/dashboard"><i class="fas fa-home text-white mr-2"></i> Home</a>
        <a href="/wishlist"><i class="fas fa-heart text-white mr-2"></i> Wishlist</a>
        <a href="/promo"><i class="fas fa-tags text-white mr-2"></i> Promo</a>
        <a href="/profile"><i class="fas fa-user text-white mr-2"></i> Profile</a>
        
        <!-- Carousel untuk gambar promosi -->
        <div id="promoCarousel" class="carousel slide" data-ride="carousel" style="max-width: 200px; min-height: 150px;">
            <div class="carousel-inner">
                <!-- Item Carousel 1 (Active) -->
                <div class="carousel-item active">
                    <a href="{{ url('/promo') }}" class="carousel-link">
                        <img src="{{ asset('images/promo.jpg') }}" class="d-block w-100" alt="Promo 1">
                    </a>
                </div>
                <!-- Item Carousel 2 -->
                <div class="carousel-item">
                    <a href="{{ url('/promo') }}" class="carousel-link">
                        <img src="{{ asset('images/promo2.jpeg') }}" class="d-block w-100" alt="Promo 2">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ url('/promo') }}" class="carousel-link">
                        <img src="{{ asset('images/promo4.jpg') }}" class="d-block w-100" alt="Promo 4">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ url('/promo') }}" class="carousel-link">
                        <img src="{{ asset('images/promo5.jpg') }}" class="d-block w-100" alt="Promo 5">
                    </a>
                </div>
            </div>
            <!-- Tombol Navigasi -->
            <a class="carousel-control-prev" href="#promoCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#promoCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <a href="/about"><i class="fas fa-info-circle text-white mr-2"></i> About</a>
        <form method="POST" class="pt-4 mx-5" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="Logout" class="mr-2" style="background-color: #7c43f8">
        </form>
    </div>
</div>

<!-- Tambahkan CSS khusus untuk mematikan efek hover pada carousel -->
<style>
    .carousel-link:hover {
        text-decoration: none;
    }

    .carousel-inner img:hover {
        opacity: 1;
        transform: none;
    }
</style>
