@extends('template.template')

@section('content')
<div class="homepage-slider">
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Selamat Datang</p>
                            <h1>Selamat Berbelanja</h1>
                            <div class="hero-btns">
                                <a href="/produk" class="boxed-btn">Shop</a>
                                {{-- <a href="contact.html" class="bordered-btn">Contact Us</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Electro</p>
                            <h1>100% Produk Lengkap</h1>
                            <div class="hero-btns">
                                <a href="/produk" class="boxed-btn">Shop</a>
                                {{-- <a href="contact.html" class="bordered-btn">Contact Us</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-right">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Dapatkan Diskon Besar-Besaran</p>
                            <h1>Pada Bulan Ramadhan</h1>
                            <div class="hero-btns">
                                <a href="/produk" class="boxed-btn">Shop</a>
                                {{-- <a href="contact.html" class="bordered-btn">Contact Us</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">New Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            {{-- @foreach ($kategoris as $kategori)
                                <li>
                                    <a href="{{ url('/') }}?kategori={{ $kategori->id }}">{{ $kategori->name }}</a>
                                </li>
                            @endforeach --}}
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                @foreach ($produk as $data)
                                    <div class="col-md-4 col-xs-6">
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ asset($data->image[0]->gambar_produk) }}" style="height:200px ; width:265px ;" alt="">
                                                <div class="product-label">
                                                    <span class="sale">{{ $data->diskon }}%</span>
                                                    {{-- <span class="new">NEW</span> --}}
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $data->kategori->name }}</p>
                                                <h3 class="product-name"><a
                                                        href="/detailproduk/{{ $data->slug }}">{{ $data->name }}</a>
                                                </h3>
                                                <h4 class="product-price">Rp.
                                                    {{ number_format($data->harga, 0, '.', '.') }}</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick
                                                            view</span></button>
                                                </div>
                                            </div>
                                            {{-- <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a
                                                        href="/detailproduk/{{ $data->slug }}">Detail</a></button>
                                            </div> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div id="slick-nav-1" class="products-slick-nav"></div>
                    </div>
                    <!-- /tab -->
                </div>
            </div>
        </div>
        <!-- Products tab & slick -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->
</div>    <!-- /NEWSLETTER -->
@endsection
