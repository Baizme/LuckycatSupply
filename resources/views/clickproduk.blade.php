<x-navbar></x-navbar>
<x-sidebar></x-sidebar>

<x-layout>
    <div class="product-container">
        <img src="{{ asset($product->product_photo) }}" alt="Product Image" class="product-image">
        <div class="product-info">
            <h1 class="product-name">{{ $product->product_name }}</h1>
            <p class="product-size">Ukuran: {{ $product->product_size }}</p>
            <p class="product-description">{{ $product->product_description }}</p>
            <p class="product-price"><strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></p>
            <a href="#" class="btn btn-wishlist" onclick="event.preventDefault(); document.getElementById('wishlist-form').submit();">
                <i class="fas fa-heart"></i> Add to Wishlist
            </a>
            <a href="{{ route('checkout.show', ['id_produk' => $product->id_produk]) }}" class="btn btn-primary">
                <i class="fas fa-shopping-cart"></i> Checkout
            </a>
            
            <form id="wishlist-form" action="{{ route('wishlist.add') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id_produk }}">
            </form>
        </div>
    </div>

    <div class="container mt-4" style="font-family: 'Arial', sans-serif">
        <div class="row promo-container" id="productContainer">
            @foreach($products as $product)
            <a href="{{ route('clickproduk.show', ['id_produk' => $product->id_produk]) }}" class="product-link">
                <div class="col-md-3 d-flex align-items-stretch mb-4 filter-item {{ strtolower($product->product_type) }}">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset($product->product_photo) }}" alt="{{ $product->product_name }}">
                        <div class="card-body">
                            <p class="card-title">{{ $product->product_name }}</p>
                            <p class="card-text">Ukuran: {{ $product->product_size }}</p>
                            <p class="card-tittle"><strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-layout>

<style>
    .product-container {
        display: flex;
        justify-content: space-between;
        max-width: 800px;
        margin: 20px;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .col-md-3 {
        flex: 0 0 calc(25% - 20px);
        max-width: calc(25% - 20px);
        box-sizing: border-box;
        margin-right: 45px;
        margin-top: 25px;
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
        background-color: #3b2c5c;
        color: white;
        margin-right: 10px;
        position: relative;
    }

    .card {
        display: flex;
        flex-direction: column;
        border-radius: 15px;
        width: 100%;
        max-width: 200px;
        min-width: 200px;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-radius: 15px 15px 0 0;
    }

    .card-body {
        flex-grow: 1;
        border-radius: 0 0 15px 15px;
    }

    .product-link {
        text-decoration: none;
        color: inherit;
    }

    .product-link:hover {
        text-decoration: none;
        color: inherit;
    }

    .product-link:hover .card-title,
    .product-link:hover .card-text {
        text-decoration: none;
    }
</style>

<script>
    @if(session('success'))
    Swal.fire({
        title: 'Success',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    @endif
</script>
