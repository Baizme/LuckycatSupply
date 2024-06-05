<x-sidebar></x-sidebar>
<x-navbar></x-navbar>

<x-layout>
    <h2 class="hot-sales-title">Hot Sales</h2>
    <div class="container mt-4" style="font-family: 'Arial', sans-serif">
        <div class="row promo-container" id="promoContainer">
            @foreach($promoProducts as $product)
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

.hot-sales-title {
        background-color: rgb(243, 71, 71);
        color: white;
        display: inline-block;
        padding: 10px 20px;
        border-radius: 15px;
        font-size: 24px;
    }


    .promo-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: flex-start; /* Ensure items start from the left */
    }

    .col-md-3 {
        flex: 0 0 calc(25% - 20px); /* Adjust to fit 4 items per row with spacing */
        max-width: calc(25% - 20px);
        box-sizing: border-box; /* Include padding and border in the element's total width and height */
        margin-right: 35px; /* Add vertical spacing between rows */
    }

    .btn-custom-outline {
        background-color: white;
        border-color: #7C43F8;
        color: #7C43F8;
    }

    .btn-custom-outline.active {
        background-color: #7C43F8;
        color: white;
    }

    .btn-custom-outline:hover {
        background-color: #5a32c6;
        border-color: #5a32c6;
        color: white;
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
        font-size: 14px; /* Ubah ukuran font sesuai kebutuhan */
    }

    .card-text {
        font-size: 13px; /* Ubah ukuran font sesuai kebutuhan */
    }
</style>

<script>
    function filterItems(category, element) {
        var items = document.querySelectorAll('.filter-item');
        var buttons = document.querySelectorAll('.btn-custom-outline');

        items.forEach(function(item) {
            if (category === 'all' || item.classList.contains(category)) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });

        buttons.forEach(function(button) {
            button.classList.remove('active');
        });

        element.classList.add('active');
    }

    window.onload = function() {
        filterItems('all', document.querySelector('.btn-custom-outline'));
    }
</script>
