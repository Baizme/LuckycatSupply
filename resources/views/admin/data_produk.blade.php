<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
</head>
<body>
   
<!-- Sidebar -->
<div class="sidebar">
    <img src="images/luckycat_logo.jpg" alt="Lucky Cat Logo" class="rounded-circle" />
    <h3 class="mt-2">Luckycat <span style="color: #7c43f8;">Supply</span></h3>
    <div class="sidebar-menu">
        <a href="/admin/index"><i class="fas fa-chart-line text-white mr-2"></i> Dashboard</a>
        <a href="/users"><i class="fas fa-users text-white mr-2"></i> Data User</a>
        <a href="/products"><i class="fas fa-boxes text-white mr-2"></i> Data Produk</a>
        <a href="/transaksi"><i class="fas fa-money-bill-wave text-white mr-2"></i> Data Transaksi</a>
        <form method="POST" class="pt-4 mx-5" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="Logout" class="mr-2">
        </form>
    </div>
</div>

<main>
    <div class="content" style="margin-left: 250px; padding: 30px 20px">
        <h3>Data Produk</h3>
        <div class="mt-4">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">Add Product</button>
        </div>
        <div class="usertabel pt-2">
            <table id="produk" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID Produk</th>
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
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id_produk }}</td>
                        <td><img src="{{ $product->product_photo }}" alt="Product Photo" width="50"></td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_type }}</td>
                        <td>{{ $product->product_size }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->promo }}</td>
                        <td>
                            <!-- Add actions like edit/delete if needed -->
                            <div class="btn-group" role="group" aria-label="Product Actions">
                                <button class="btn btn-warning btn-sm mr-2" onclick="openEditModal({{ $product->id_produk }})">Edit</button>
                                <form action="{{ route('products.destroy', $product->id_produk) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
              
            </table>
        </div>
    </div>
</main>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="productPhoto">Choose Photo</label>
                        <input type="file" class="form-control-file" id="productPhoto" name="product_photo">
                    </div>
                    <div class="form-group">
                        <label for="productName">Nama Produk</label>
                        <input type="text" class="form-control" id="productName" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="productSize">Ukuran Produk</label>
                        <input type="text" class="form-control" id="productSize" name="product_size" required>
                    </div>
                    <div class="form-group">
                        <label for="productType">Jenis Barang</label>
                        <select class="form-control" id="productType" name="product_type" required>
                            <option value="sepatu">Sepatu</option>
                            <option value="aksesoris">Aksesoris</option>
                            <option value="baju">Baju</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Promo</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="promo" id="promoYes" value="yes" required>
                                <label class="form-check-label" for="promoYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="promo" id="promoNo" value="no" required>
                                <label class="form-check-label" for="promoNo">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Deskripsi</label>
                        <textarea class="form-control" id="productDescription" name="product_description" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editProductId" name="id_produk">
                    <div class="form-group">
                        <label for="editProductPhoto">Choose Photo</label>
                        <input type="file" class="form-control-file" id="editProductPhoto" name="product_photo">
                    </div>
                    <div class="form-group">
                        <label for="editProductName">Nama Produk</label>
                        <input type="text" class="form-control" id="editProductName" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductSize">Ukuran Produk</label>
                        <input type="text" class="form-control" id="editProductSize" name="product_size" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductType">Jenis Barang</label>
                        <select class="form-control" id="editProductType" name="product_type" required>
                            <option value="sepatu">Sepatu</option>
                            <option value="aksesoris">Aksesoris</option>
                            <option value="baju">Baju</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Promo</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="promo" id="editPromoYes" value="yes" required>
                                <label class="form-check-label" for="editPromoYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="promo" id="editPromoNo" value="no" required>
                                <label class="form-check-label" for="editPromoNo">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editPrice">Harga</label>
                        <input type="text" class="form-control" id="editPrice" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductDescription">Deskripsi</label>
                        <textarea class="form-control" id="editProductDescription" name="product_description" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#produk').DataTable();
    });

    $(document).ready(function() {
        // Check if the success message exists
        if ($('.alert-success').length) {
            // Show the success message with a delay
            $('.alert-success').delay(3000).fadeOut();
        }
    });
</script>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; bottom: 10px; right: 10px; z-index: 9999;">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
</script>

<script>
    function openEditModal(productId) {
        $.ajax({
            url: '/products/' + productId + '/edit',
            method: 'GET',
            success: function(data) {
                $('#editProductForm').attr('action', '/products/' + productId);  // Set the action URL
                $('#editProductId').val(data.id_produk);
                $('#editProductName').val(data.product_name);
                $('#editProductSize').val(data.product_size);
                $('#editProductType').val(data.product_type);
                $('input[name="promo"][value="' + data.promo + '"]').prop('checked', true);
                $('#editPrice').val(data.price);
                $('#editProductDescription').val(data.product_description);
                $('#editProductModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    }
</script>


</body>
</html>
