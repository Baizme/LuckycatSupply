<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Custom CSS -->
    <link href="css/admin.css" rel="stylesheets" />

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <style>
        body {
         
        }

        .sidebar {
    height: 100%;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #1e1e1e;
    padding-top: 20px;
    color: white; /* Mengatur warna font menjadi putih */
}

.sidebar img {
    max-width: 100px; /* Merubah lebar logo */
    height: auto;
    display: block;
    margin: 0 auto;
}

.sidebar h3 {
    text-align: center;
    margin-top: 10px;
}

.sidebar-menu {
    padding: 20px 0;
}

.sidebar-menu a {
    display: block;
    padding: 12px 20px;
    color: white; /* Mengatur warna font menjadi putih */
}

.sidebar-menu a:hover {
    background-color: #7c43f8;
    text-decoration: none;
}

.content-navbar {
    background-color: #f8f9fa; /* Warna latar belakang navbar */
    padding: 10px;
}

/* Memperpanjang input search */
.form-inline .form-control {
    width: 400px; /* Sesuaikan lebarnya sesuai kebutuhan */
    border-color: #7c43f8; /* Ubah warna border */
}

/* Memperbesar icon profile */

/* Mengubah warna tombol pencarian */
.btn-outline-success {
    color: #7c43f8;
    border-color: #7c43f8;
}

        .container-dashboard {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
        }

        .info-box {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: #fff;
            font-weight: bold;
        }

        .info-box h4 {
            margin-bottom: 10px;
            color: #7c43f8;
            
        }

        .chart-container {
            margin-top: 50px;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 10px;
            font: 14px;
            color: #7c43f8;
        }

        .chart {
            height: 300px;
            width: 100%;
            color: #fff;
        }

        
    

    
    

   
    </style>
</head>

<body>
   
<!-- Sidebar -->
<div class="sidebar">
    <img src="{{ asset('images/luckycat_logo.jpg') }}" alt="Lucky Cat Logo" class="rounded-circle" />
    <h3 class="mt-2">Luckycat <span style="color: #7c43f8;">Supply</span></h3>

    <!-- Menambahkan teks "Luckycat Supply" -->
    <div class="sidebar-menu">
        <!-- Menambahkan ikon dan mengatur warna font menjadi putih -->
        <a href="/dashboard"><i class="fas fa-chart-line text-white mr-2"></i> Dashboard</a>
        <a href="/users"><i class="fas fa-users text-white mr-2"></i> Data User</a>
        <a href="/produk"><i class="fas fa-boxes text-white mr-2"></i> Data Produk</a>
        <a href="/transaksi"><i class="fas fa-money-bill-wave text-white mr-2"></i> Data Transaksi</a>
        <form method="POST" class="pt-4 mx-5" action="{{ route('logout') }}">
            @csrf

                <input type="submit" value="Logout" class="mr-2">
        </form>

    </div>
</div>

<main>
    <div class="content" style="margin-left: 250px; padding: 30px 20px">
        <h2>Welcome to Dashboard Admin</h2>
        
        <!-- Container for Info Boxes -->
        <div class="container-dashboard">
            <!-- Info Box: Total Omset -->
            <div class="info-box">
                <h4>Total Omset</h4>
                <p>$10,000</p>
            </div>

            <!-- Info Box: Total Penjualan -->
            <div class="info-box">
                <h4>Total Penjualan</h4>
                <p>500</p>
            </div>

            <!-- Info Box: Total Barang -->
            <div class="info-box">
                <h4>Total Barang</h4>
                <p>1000</p>
            </div>
        </div>

        <!-- Container for Chart -->
        <div class="chart-container">
            <h3>Tren Penjualan</h3>
            <!-- Chart Placeholder -->
            <canvas id="salesChart" class="chart"></canvas>
        </div>
    </div>
</main>

<!-- Bootstrap JS and other scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Data untuk grafik (contoh)
    var salesData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [{
            label: 'Penjualan',
            backgroundColor: 'rgba(124, 67, 248, 0.2)',
            borderColor: 'rgba(124, 67, 248, 1)',
            borderWidth: 2,
            data: [50, 70, 65, 80, 60, 75]
        }]
    };

    // Konfigurasi grafik
    var salesOptions = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Inisialisasi grafik
    var salesChart = new Chart(document.getElementById('salesChart'), {
        type: 'line',
        data: salesData,
        options: salesOptions
    });
</script>

</body>
</html>
