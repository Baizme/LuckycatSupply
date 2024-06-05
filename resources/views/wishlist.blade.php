<x-sidebar></x-sidebar>
<x-navbar></x-navbar>

<x-layout>
    <h2>Wishlist</h2>
    <div class="container mt-4" style="font-family: 'Arial', sans-serif">
        <div class="row promo-container" id="wishlistContainer">
            @foreach($wishlistItems as $item)
            <a href="{{ route('clickproduk.show', ['id_produk' => $item->product->id_produk]) }}" class="product-link">
                <div class="col-md-3 d-flex align-items-stretch mb-4 filter-item {{ strtolower($item->product->product_type) }}">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset($item->product->product_photo) }}" alt="{{ $item->product->product_name }}">
                        <div class="card-body">
                            <p class="card-title">{{ $item->product->product_name }}</p>
                            <p class="card-text">Ukuran: {{ $item->product->product_size }}</p>
                            <p class="card-tittle"><strong>Rp{{ number_format($item->product->price, 0, ',', '.') }}</strong></p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-layout>

<style>
    .promo-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: flex-start;
    }

    .col-md-3 {
        flex: 0 0 calc(25% - 20px);
        max-width: calc(25% - 20px);
        box-sizing: border-box;
        margin-right: 35px;
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

    .filter-item {
        display: flex;
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

    .card-title {
        font-size: 14px;
    }

    .card-text {
        font-size: 13px;
    }
</style>
