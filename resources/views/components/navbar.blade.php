<nav class="navbar navbar-light bg-light content-navbar fixed-top" style="margin-left: 250px;">
  <div class="container-fluid">
      <!-- Form pencarian -->
      <form class="form-inline" action="{{ route('dashboard') }}" method="GET">
          <input class="form-control mr-2" type="search" name="query" placeholder="Search for products, categories, brands..." aria-label="Search" />
          <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>
      <!-- Profile (dengan menggunakan ikon saja) -->
      <a href="/profile" style="color: #1e1e1e;" class="mx-4"><i class="fas fa-user fa-xl"></i></a>
  </div>
</nav>
