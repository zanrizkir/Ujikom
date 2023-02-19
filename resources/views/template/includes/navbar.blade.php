  <!-- HEADER -->
  <header>
      <!-- TOP HEADER -->
      <div id="top-header">
          <div class="container">
              <ul class="header-links pull-left">
                  {{-- <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li> --}}
                  {{-- <li><a href="#"><i class="fa fa-envelope"></i> email@email.com</a></li> --}}
                  {{-- <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li> --}}
              </ul>
              <ul class="header-links pull-right">
                  @guest
                      <li><a href="{{ route('login') }}">Login</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                  @else
                      <li>
                          <a class="" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                              <i class="fa fa-map-marker"></i>
                              <span>Logout</span>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </a>
                      </li>
                      <li><a href="/profile"><i class="fa fa-user"></i> My Account</a></li>
                  @endguest
              </ul>
              {{-- <ul class="header-links pull-right">
                  <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                  <li><a href="/profile"><i class="fa fa-user"></i> My Account</a></li>
              </ul> --}}
          </div>
      </div>
      <script>
          const logOut = document.getElementById('logOut');
          logOut.addEventListener('click', function() {
              Swal.fire({
                  title: 'Apa Anda Yakin?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#7066e0',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'keluar'
              }).then((result) => {
                  if (result.isConfirmed) {
                      $('#logOut').submit()
                  }
              });
          });
      </script>
      <!-- /TOP HEADER -->

      <!-- MAIN HEADER -->
      <div id="header">
          <!-- container -->
          <div class="container">
              <!-- row -->
              <div class="row">
                  <!-- LOGO -->
                  <div class="col-md-3">
                      <div class="header-logo">
                          <a href="#" class="logo">
                              <img src="{{ asset('components/img/logo.png') }}" alt="">
                          </a>
                      </div>
                  </div>
                  <!-- /LOGO -->

                  <!-- SEARCH BAR -->
                  <div class="col-md-6">
                      <div class="header-search">
                          <form>
                              <select class="input-select">
                                  <option value="0">All Categories</option>
                                  <option value="1">Category 01</option>
                                  <option value="1">Category 02</option>
                              </select>
                              <input class="input" placeholder="Search here">
                              <button class="search-btn">Search</button>
                          </form>
                      </div>
                  </div>
                  <!-- /SEARCH BAR -->

                  <!-- ACCOUNT -->
                  <div class="col-md-3 clearfix">
                      <div class="header-ctn">
                          <!-- Cart -->
                          <div class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                  <i class="fa fa-shopping-cart"></i>
                                  <span>Your Cart</span>
                                  <div class="qty">3</div>
                              </a>
                              {{-- <div class="cart-dropdown">
                                  <div class="cart-list">
                                      <div class="product-widget">
                                          <div class="product-img">
                                              <img src={{ asset('components//img/product01.png') }}" alt="">
                                          </div>
                                          <div class="product-body">
                                              <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                              <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                          </div>
                                          <button class="delete"><i class="fa fa-close"></i></button>
                                      </div>

                                      <div class="product-widget">
                                          <div class="product-img">
                                              <img src={{ asset('components//img/product02.png') }}" alt="">
                                          </div>
                                          <div class="product-body">
                                              <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                              <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                          </div>
                                          <button class="delete"><i class="fa fa-close"></i></button>
                                      </div>
                                  </div>
                                  <div class="cart-summary">
                                      <small>3 Item(s) selected</small>
                                      <h5>SUBTOTAL: $2940.00</h5>
                                  </div>
                                  <div class="cart-btns">
                                      <a href="#">View Cart</a>
                                      <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                  </div>
                              </div> --}}
                          </div>
                          <!-- /Cart -->

                          <!-- Menu Toogle -->
                          <div class="menu-toggle">
                              <a href="#">
                                  <i class="fa fa-bars"></i>
                                  <span>Menu</span>
                              </a>
                          </div>
                          <!-- /Menu Toogle -->
                      </div>
                  </div>
                  <!-- /ACCOUNT -->
              </div>
              <!-- row -->
          </div>
          <!-- container -->
      </div>
      <!-- /MAIN HEADER -->
  </header>
  <!-- /HEADER -->

  <!-- NAVIGATION -->
  <nav id="navigation">
      <!-- container -->
      <div class="container">
          <!-- responsive-nav -->
          <div id="responsive-nav">
              <!-- NAV -->
              <ul class="main-nav nav navbar-nav">
                  <li class=" nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                  <li class=" nav-item {{ request()->is('produk') ? 'active' : '' }}"><a href="/produk">Product</a>
                  </li>
                  <li class=" nav-item {{ request()->is('keranjang') ? 'active' : '' }}"><a
                          href="/keranjang">Keranjang</a></li>
                  {{-- <li><a href="#">Smartphones</a></li>
                  <li><a href="#">Cameras</a></li> --}}
              </ul>
              <!-- /NAV -->
          </div>
          <!-- /responsive-nav -->
      </div>
      <!-- /container -->
  </nav>
  <!-- /NAVIGATION -->
