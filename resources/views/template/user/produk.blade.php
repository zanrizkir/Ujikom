@extends('template.template')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                @include('template.includes.side')
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
                                        <img src="{{ asset($data->image[0]->gambar_produk) }}" alt="">
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
                                        <h4 class="product-price">Rp. {{ number_format($data->harga, 0, '.', '.') }}</h4>
                                        {{-- <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div> --}}
                                        {{-- <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span
                                                    class="tooltipp">quick
                                                    view</span></button>
                                        </div> --}}
                                    </div>
                                    <div class="add-to-cart">

                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a
                                                href="/detailproduk/{{ $data->slug }}">Detail</a></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /store products -->

                    <!
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

   
@endsection
