@extends('template.template')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-13 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Welcome To</p>
                        <h1>Your Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table" id="keranjang" class="keranjangAll">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"><input type="checkbox" id="selectAll"></th>
                                    <th class="product-image">Produk</th>
                                    <th class="product-name">Nama Produk</th>
                                    <th class="product-price">Harga</th>
                                    <th class="product-quantity">Jumlah</th>
                                    <th class="product-disc">Diskon</th>
                                    <th class="product-totalharga">Total Harga</th>
                                    <th class="product-remove">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($keranjangs))
                                    @foreach ($keranjangs as $keranjang)
                                        <form action="{{ route('checkout.index') }}" method="GET">

                                            {{-- <input type="hidden" name="keranjang_id" value="{{ $keranjang->id }}"> --}}
                                            <input type="hidden" name="user_id" value="1">
                                            <input type="hidden" name="produk_id" value="{{ $keranjang->produk->id }}">
                                            <tr class="table-body-row">
                                                <td class="product-remove"> <input id="keranjang_id" class="keranjang_id" data-harga="{{ $keranjang->total_harga }}" type="checkbox"name="keranjang_id[]" value="{{ $keranjang->id }}"></td>
                                                <td class="product-image"><img src="{{ asset($keranjang->produk->image[0]->gambar_produk) }}" alt=""></td>
                                                <td class="product-name">{{ $keranjang->produk->name }}</td>
                                                <td class="product-price"> RP. {{ number_format($keranjang->produk->harga, 0, ',', '.') }}</td>
                                                <td class="product-quantity"><input type="number" min="0" name="jumlah" value="{{ $keranjang->jumlah }}" onkeypress="return hanyaAngka(event)"></td>
                                                <td class="product-disc">{{ $keranjang->produk->diskon }}</td>
                                                <td class="product-totalharga">RP. {{ number_format($keranjang->total_harga, 0, ',', '.') }}</td>
                                                <td>
                                                    <form action="{{ route('keranjang.destroy', $keranjang->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">X</button>
                                                    </form>
                                                </td>
                                            </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 order-details pull-right" style="margin-top: 20px">
                    <div class="section-title text-center">
                        <h4 class="title">Keranjangmu</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>JUMLAH</strong></div>
                            <div><strong>TOTAL HARGA</strong></div>
                        </div>
                        <div class="order-products">
                            <div class="order-col">
                                <div id="jumlah">0</div>
                                <div id="total_harga">0</div>
                            </div>
                        </div>
                    </div>


                    <button class="primary-btn order-submit pull-right" style="margin-top: 20px" type="submit">
                        Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $("#selectAll").click(function() {
            $('.keranjang_id').prop("checked", $(this).prop("checked"));

            var total_harga = 0;
            var jumlah = 0;
            $('.keranjang_id').each(function() {
                if ($(this).prop("checked") == true) {
                    jumlah++;
                    var keranjang = $(this).data('harga');
                    total_harga += parseInt(keranjang)
                };
            });
            $("#total_harga").html(total_harga);
            $("#jumlah").html(jumlah);


        });
        $('.keranjang_id').click(function() {
            var total_harga = 0;
            var jumlah = 0;
            $('.keranjang_id').each(function() {
                if ($(this).prop("checked") == true) {
                    jumlah++;
                    var keranjang = $(this).data('harga');
                    total_harga += parseInt(keranjang)
                };
            });
            $("#total_harga").html(total_harga);
            $("#jumlah").html(jumlah);
        });
    });
</script>
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>
