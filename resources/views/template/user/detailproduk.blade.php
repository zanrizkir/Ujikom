@extends('template.template')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="/">Home</a></li>
                        <li><a
                                href="{{ url('produk') }}?kategori={{ $produk->kategori->id }}">{{ $produk->kategori->name }}</a>
                        </li>
                        <li class="active">{{ $produk->name }}</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        @foreach ($images as $image)
                            <div class="product-preview">
                                <img src="{{ asset($image->gambar_produk) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        @foreach ($images as $image)
                            <div class="product-preview">
                                <img src="{{ asset($image->gambar_produk) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    @include('sweetalert::alert')

                    <form action="{{ route('keranjang.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                        <input type="hidden" name="user_id" value="1">
                        <div class="product-details">
                            <h2 class="product-name">{{ $produk->name }}</h2>
                            <div>
                                {{-- <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div> --}}
                                {{-- <a class="review-link" href="#">10 Review(s) | Add your review</a> --}}
                            </div>
                            <div>
                                @if ($produk->diskon > 0)
                                    <?php
                                    $diskon = ($produk->diskon / 100) * $produk->harga;
                                    $harga = $produk->harga - $diskon;
                                    ?>
                                    <h5 class="product-price">Rp.
                                        {{ number_format($harga, 0, '.', '.') }} <del class="product-old-price">Rp.
                                            {{ number_format($produk->harga, 0, '.', '.') }}</del></h5>
                                @else
                                    <h4 class="product-price">Rp. {{ number_format($produk->harga, 0, '.', '.') }}
                                @endif
                                {{-- <h3 class="product-price">Rp. {{ number_format($produk->harga, 0, '.', '.') }}</h3> --}}
                                <span class="product-available">Stok :{{ $produk->stok }}</span>
                            </div>
                            <p>{!! $produk->deskripsi !!}</p>


                            <div class="add-to-cart">
                                <div class="qty-label">
                                    Jumlah
                                    <input type="number" name="jumlah" min="0"
                                        onkeypress="return hanyaAngka(event)" required>
                                </div>
                                @guest
                                    <!-- Button trigger modal -->
                                    <button type="button" class="add-to-cart-btn" onclick="notif()"><i
                                            class="fa fa-shopping-cart"></i>
                                        Keranjang
                                    </button>
                                    <!-- Modal -->
                                    
                                @else
                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i>
                                        Keranjang</button>
                                @endguest
                            </div>
                            <ul class="product-links">

                                <li>Kategori:</li>
                                {{-- @foreach ($kategoris as $kategori) --}}
                                <li><a href="#">{{ $produk->kategori->name }}</a>
                                </li>
                                {{-- @endforeach --}}
                            </ul>
                            <ul class="product-links">
                                <li>Tag:</li>
                                @foreach($tags as $tag)
                                    <li><a href="#">{{ $tag->tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </form>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->

                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    {{-- <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>

                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ asset('components/img/product01.png') }}" alt="">
                            <div class="product-label">
                                <span class="sale">-30%</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                        to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->

                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ asset('components/img/product02.png') }}" alt="">
                            <div class="product-label">
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                        to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->

                <div class="clearfix visible-sm visible-xs"></div>

                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ asset('components/img/product03.png') }}" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                        to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->

                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ asset('components/img/product04.png') }}" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add
                                        to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add
                                        to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div> --}}
    <!-- /Section -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->
@endsection
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
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>
