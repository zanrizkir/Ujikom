@extends('template.template')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        @foreach ($kategoris as $kategori)
                            <div class="checkbox-filter">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-1">
                                    <label for="category-1">
                                        <span></span>
                                        <a href="{{ url('produk') }}?kategori={{ $kategori->id }}">{{ $kategori->name }}</a>
                                        <small>({{ $kategori->produk->count() }})</small>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="aside">
                        <h3 class="aside-title">Tag</h3>
                       {{-- @foreach ($tags as $tag)
                            <div class="checkbox-filter">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-1">
                                    <label for="category-1">
                                        <span></span>
                                        <a href="{{ url('produk') }}?tag={{ $tag->id }}">{{ $tag->name }}</a>
                                         <small>({{ $tag->produk->count() }})</small> 
                                    </label>
                                </div>
                            </div>
                        @endforeach--}}
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store products -->
                    <div class="row">
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
                                        @if ($data->diskon > 0)
                                            <?php
                                            $diskon = ($data->diskon / 100) * $data->harga;
                                            $harga = $data->harga - $diskon;
                                            ?>
                                            <h5 class="product-price">Rp.
                                                {{ number_format($harga, 0, '.', '.') }} <del class="product-old-price">Rp.
                                                    {{ number_format($data->harga, 0, '.', '.') }}</del></h5>
                                        @else
                                            <h4 class="product-price">Rp. {{ number_format($data->harga, 0, '.', '.') }}
                                        @endif
                                        </h4>
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
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
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
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    {{-- <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div> --}}
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        {{-- <p>Sign Up for the <strong>NEWSLETTER</strong></p>
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
                        </ul> --}}
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->
@endsection