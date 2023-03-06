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
                    <li><a href="{{ route('login') }}">Masuk</a></li>
                    <li><a href="{{ route('register') }}">Daftar</a></li>
                @else
                    <li>
                        <a class="" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                            <i class="fa fa-map-marker"></i>
                            <span>Keluar</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                    {{-- <li><a href="/pesanan"><i class="fa fa-user"></i>Pesanan</a></li>  --}}
                @endguest
            </ul>
            {{-- <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                <li><a href="/profile"><i class="fa fa-user"></i> My Account</a></li>
            </ul> --}}
        </div>
    </div>

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



                <!-- ACCOUNT -->
                <div class="col-md-9clearfix float-end">
                    <div class="header-ctn">
                        <!-- Cart -->
                        <div class="dropdown">
                            @guest
                                <!-- Button trigger modal -->
                                <a href="/keranjang" aria-expanded="false" onclick="notif()">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Keranjang</span>
                                @else
                                    <a href="/keranjang" aria-expanded="false">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Keranjang</span>
                                        @auth
                                            @php
                                                $keranjang1 = App\Models\Admin\Keranjang::where('status','keranjang')->where('user_id', auth()->user()->id)->count();
                                            @endphp
                                            <div class="qty">{{ $keranjang1 }}</div>
                                        @endauth
                                    </a>
                                @endguest

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
                <li class=" nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="/">Beranda</a></li>
                <li class=" nav-item {{ request()->is('produk') ? 'active' : '' }}"><a href="/produk">Produk</a>
                </li>
                {{-- <li class=" nav-item {{ request()->is('keranjang') ? 'active' : '' }}"><a
                        href="/keranjang">Keranjang</a></li> --}}
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function notif() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Anda Harus Login Terlebih Dahulu !',
        })
    }
</script>
