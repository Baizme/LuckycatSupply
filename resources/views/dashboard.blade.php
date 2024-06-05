<x-sidebar></x-sidebar>
<x-navbar></x-navbar>

<x-layout>
  <!-- Notification for success message -->
  @if(session('success'))
      <div class="alert alert-success text-center">
          {{ session('success') }}
      </div>
  @endif

  <!-- Carousel -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="max-width: 450px; margin: 0 auto;">
      <div class="carousel-inner rounded" style="width: 100%; height: 270px;"> <!-- Perbaikan di sini, pastikan width 100% -->
          <div class="carousel-item active">
              <img class="d-block w-100 h-100" src="images/promo_dsb2.jpeg" alt="First slide">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100 h-100" src="images/dsb_p.jpeg" alt="Second slide">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100 h-100" src="images/promo_dsb4.jpeg" alt="Third slide">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100 h-100" src="images/promo_dsb7.jpg" alt="fourth slide">
          </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>

  <!-- Filter buttons -->
  <div class="container mt-5 text-center" style="font-family: 'Poppins', sans-serif;">
    <button class="btn btn-custom-outline mx-1" onclick="filterItems('all', this)">All Items</button>
    @foreach($productTypes as $type)
        <button class="btn btn-custom-outline mx-1" onclick="filterItems('{{ strtolower($type) }}', this)">{{ ucfirst($type) }}</button>
    @endforeach
</div>


  <!-- Product container -->
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
                              <p class="card-title"><strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></p>
                          </div>
                      </div>
                  </div>
              </a>
          @endforeach
      </div>
  </div>
</x-layout>

<style>
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
        display: none;
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
    var defaultButton = document.querySelector('.btn-custom-outline');
    if (defaultButton) {
        filterItems('all', defaultButton);
    }
}

</script>