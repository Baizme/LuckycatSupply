<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Transaksi</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet" />

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    
</head>

<body>
   
<!-- Sidebar -->
<div class="sidebar">
    <img src="images/luckycat_logo.jpg" alt="Lucky Cat Logo" class="rounded-circle" />
    <h3 class="mt-2">Luckycat <span style="color: #7c43f8;">Supply</span></h3>

    <!-- Menambahkan teks "Luckycat Supply" -->
    <div class="sidebar-menu">
        <!-- Menambahkan ikon dan mengatur warna font menjadi putih -->
        <a href="/admin/index"><i class="fas fa-chart-line text-white mr-2"></i> Dashboard</a>
        <a href="/users"><i class="fas fa-users text-white mr-2"></i> Data User</a>
        <a href="/produk"><i class="fas fa-boxes text-white mr-2"></i> Data Produk</a>
        <a href="/transaksi"><i class="fas fa-money-bill-wave text-white mr-2"></i> Data Transaksi</a>
        <form method="POST" class="pt-4 mx-5" action="{{ route('logout') }}">
            @csrf

                <input type="submit" value="Logout" class="mr-2">
        </form>    </div>
    </div>

    <main>
        <div class="content" style="margin-left: 250px; padding: 30px 20px">
            <h3>Data Transaksi</h3>
            
            <div class="usertabel pt-2">
                <table id="transaksi" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>Promo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2024-2-2</td>
                            <td>jepg</td>
                            <td>nike</td>
                            <td>abim12</td>
                            <td>0812111</td>
                            <td>1000000</td>
                            <td>ya</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        
                       
                    </tbody>
                    
                </table>
            </div>
        </div>
    </main>
    

    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#transaksi').DataTable();
        });
    </script>
</body>

</html>
