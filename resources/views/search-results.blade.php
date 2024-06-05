<!-- resources/views/search-results.blade.php -->

<x-layout>
    <!-- Notification for success message -->
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-4" style="font-family: 'Arial', sans-serif">
        <h2>Search Results for "{{ request('query') }}"</h2>
        <div class="row promo-container" id="productContainer">
            @forelse($products as $product)
                <a href="{{ route('clickproduk.show', ['id_produk' => $product->id_produk]) }}" class="product-link">
                    <div class="col-md-3 d-flex align-items-stretch mb-4 filter-item {{ strtolower($product->product_type) }}">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset($product->product_photo) }}" alt="{{ $product->product_name }}">
                            <div class="card-body">
                                <p class="card-title">{{ $product->product_name }}</p>
                                <p class="card-text">Ukuran: {{ $product->product_size }}</p>
                                <p class="card-title"><strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></p>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-center">No products found matching your query.</p>
            @endforelse
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
