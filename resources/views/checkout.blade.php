<!-- resources/views/checkout.blade.php -->
<x-sidebar></x-sidebar>
<x-layout>
    <div class="checkout-page">
        <!-- Container Data Diri -->
        <div class="container" style="float: left; width: 800px; margin-bottom: 50px;">
            <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                    <h3>Data Diri</h3>
                    <form id="checkoutForm" action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_produk" value="{{ $product->id }}">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telepon</label>
                            <input type="tel" class="form-control" id="phone" name="no_hp" value="{{ Auth::user()->phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea class="form-control" id="address" name="alamat" rows="3" required>{{ Auth::user()->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="shipping">Jenis Pengiriman</label>
                            <select class="form-control" id="shipping" name="shipping" required>
                                <option value="jne">JNE</option>
                                <option value="jnt">JNT</option>
                                <option value="anteraja">Anteraja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pilih Pembayaran</label>
                            <div class="d-flex justify-content-start">
                                <!-- BCA -->
                                <label class="payment-option">
                                    <input type="radio" name="payment" value="bca" required>
                                    <img src="{{ asset('images/bca.png') }}" alt="BCA" class="img-fluid">
                                </label>
                                <!-- BNI -->
                                <label class="payment-option ml-3 mt-3">
                                    <input type="radio" name="payment" value="bni" required>
                                    <img src="{{ asset('images/bni.png') }}" alt="BNI" class="img-fluid">
                                </label>
                                <!-- Mandiri -->
                                <label class="payment-option ml-3 mt-3">
                                    <input type="radio" name="payment" value="mandiri" required>
                                    <img src="{{ asset('images/mandiri.png') }}" alt="Mandiri" class="img-fluid">
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="total_harga" value="{{ $product->price }}">
                    </form>
                </div>
            </div>
        </div>

        <!-- Container Detail Produk -->
        <div class="card" style="border-radius: 10px; width: 250px;">
            <div class="card-body">
                <h4>Ringkasan Belanja</h4>
                <div class="product-thumbnail">
                    <img src="{{ asset($product->product_photo) }}" alt="Product Image" class="product-image">
                </div>
                <h5 class="card-title">{{ $product->product_name }}</h5>
                <p class="card-text">{{ $product->product_description }}</p>
                <p class="card-text">Ukuran: {{ $product->product_size }}</p>
                <strong>Total Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</strong>
                <!-- Tombol Checkout -->
                <button id="checkoutButton" class="btn btn-primary mt-3" style="background-color: #7D42FE;">Checkout</button>
            </div>
        </div>

        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            // Menambahkan event listener untuk tombol checkout
            document.getElementById("checkoutButton").addEventListener("click", function() {
                // Menampilkan Sweet Alert
                Swal.fire({
                    title: 'Konfirmasi Checkout',
                    text: 'Apakah Anda yakin ingin melanjutkan proses checkout?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Lanjutkan!',
                    cancelButtonText: 'Batalkan'
                }).then((result) => {
                    // Jika pengguna mengklik Ya, maka form akan di-submit
                    if (result.isConfirmed) {
                        document.getElementById('checkoutForm').submit();
                    }
                });
            });
        </script>

        <!-- Add CSS to style the layout -->
        <style>
            .payment-option {
                cursor: pointer;
                position: relative;
                width: 80px; /* Ubah ukuran gambar di sini */
                margin-right: 120px;
            }
            .payment-option input[type="radio"] {
                display: none;
            }
            .payment-option img {
                border: 2px solid transparent;
                border-radius: 5px;
                transition: border 0.3s ease;
                width: 100%; /* Membuat gambar mengisi lebar container */
                height: auto; /* Menghindari gambar terlalu besar */
            }
            .payment-option input[type="radio"]:checked + img {
                border: 2px solid #7D42FE;
            }
            /* CSS */
            .product-thumbnail {
                width: 100px; /* Sesuaikan dengan ukuran yang Anda inginkan */
                height: auto;
                margin-bottom: 10px;
            }

            .product-thumbnail img {
                width: 100%;
                height: auto;
                border-radius: 5px;
            }
        </style>
    </div>
</x-layout>
