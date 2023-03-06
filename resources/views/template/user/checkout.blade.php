@extends('template.template')


@section('content')
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-13 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Selamat Datang</p>
                        <h1>Pesan Sekarang</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            @include('sweetalert::alert')
            <div class="row">
                <div class="col-lg-7">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">

                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="section-title text-center">
                                        <h3 class="title">Data Diri</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <p><button type="button" class="add-to-cart-btn" data-toggle="modal"
                                                    data-target="#alamatModal">
                                                    Tambah Alamat
                                                </button></p>
                                            <div class="modal fade" id="alamatModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="alamatModalLabel">Alamat</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" style="padding: 50px">
                                                            <form action="{{ route('alamat.store') }}" method="POST">
                                                                @csrf
                                                                <div class="row">
                                                                    <input type="hidden" name="user_id" value="1">
                                                                    <div class="mb-3">
                                                                        <label for="example-palaceholder">Nama
                                                                            Lengkap</label>
                                                                        <input type="text" name="nama_lengkap"
                                                                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                                            placeholder="Nama Lengkap" value="">
                                                                        @error('nama_lengkap')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="example-palaceholder">Telepon</label>
                                                                        <input type="text" name="telpon"
                                                                            class="form-control @error('telpon') is-invalid @enderror"
                                                                            placeholder="Telpon" value="">
                                                                        @error('telpon')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="province_destination"
                                                                            class="form-label">Provinsi Tujuan</label>
                                                                        <select
                                                                            class="form-control @error('province_destination') is-invalid @enderror"
                                                                            name="province_id" id="province_destination">
                                                                            <option selected disabled>--Provinsi--</option>
                                                                            @foreach ($provinces as $province => $value)
                                                                                <option value="{{ $province }}">
                                                                                    {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('province_destination')
                                                                            <div id="province_destination"
                                                                                class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="city_destination"
                                                                            class="form-label">Kota
                                                                            Tujuan</label>
                                                                        <select
                                                                            class="form-control @error('city_destination') is-invalid @enderror"
                                                                            name="city_id" id="city_destination">
                                                                            <option selected disabled>--Kota--</option>
                                                                        </select>
                                                                        @error('city_destination')
                                                                            <div id="city_destination" class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="example-palaceholder">Alamat</label>
                                                                        <textarea name="alamat" cols="20" rows="3" class="form-control  @error('alamat') is-invalid @enderror"
                                                                            placeholder="alamat" value="{{ old('alamat') }}"></textarea>
                                                                        @error('alamat')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="label" class="form-label">Label alamat</label>
                                                                        <select class="form-control @error('label') is-invalid @enderror" name="label"id="">
                                                                            <option selected disabled>Label alamat</option>
                                                                            <option value="rumah">Rumah</option>
                                                                            <option value="kantor">Kantor</option>
                                                                        </select>
                                                                        @error('label')
                                                                            <div id="label" class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                    

                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route('checkout.store') }}" method="POST">
                                                @csrf <p><select name="alamat_id"
                                                        class="form-control @error('alamat_id') is-invalid @enderror"
                                                        required>
                                                        @foreach ($alamats as $alamat)
                                                            <option value="" hidden>Pilih alamat</option>
                                                            <option value="{{ $alamat->id }}">
                                                                {{ $alamat->nama_lengkap }}|
                                                                {{ $alamat->telpon }},
                                                                {{ $alamat->province->title }},
                                                                {{ $alamat->city->title }},
                                                                {{ $alamat->alamat }},
                                                                {{ $alamat->label }},
                                                            </option>
                                                        @endforeach
                                                    </select></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Shipping Address
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shipping-address-form">
                                            <p>Your shipping address form is here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Card Details
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-details">
                                            <p>Your card details goes here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                    </div>
                </div>

                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Pesanan</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUK</strong></div>
                            <div><strong>HARGA</strong></div>
                            <div><strong>JUMLAH</strong></div>
                        </div>


                        @if (count($keranjangs))
                            @foreach ($keranjangs as $keranjang)
                                <div class="order-products">
                                    <div class="order-col">
                                        <input type="hidden" name="user_id" value="1">
                                        <input type="hidden" name="keranjang_id" value="{{ $keranjang->id }}">
                                        {{-- <input type="hidden" name="kode_transaksi" value=""> --}}
                                        <div>{{ $keranjang->produk->name }}</div>
                                        <div> RP. {{ number_format($keranjang->produk->harga, 0, ',', '.') }}</div>
                                        <div>{{ $keranjang->jumlah }}</div>
                                    </div>
                                </div>
                                <div class="order-col">
                                    <div><strong>TOTAL</strong></div>
                                    <div><strong>
                                            RP.{{ number_format($keranjang->total_harga, 0, ',', '.') }}</strong>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    {{-- <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1">
                            <label for="payment-1">
                                <span></span>
                                Direct Bank Transfer
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-2">
                            <label for="payment-2">
                                <span></span>
                                Cheque Payment
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-3">
                            <label for="payment-3">
                                <span></span>
                                Paypal System
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="input-checkbox">
                        <input type="checkbox" id="terms">
                        <label for="terms">
                            <span></span>
                            I've read and accept the <a href="#">terms & conditions</a>
                        </label>
                    </div> --}}
                    <button type="submit" class="primary-btn order-submit">Pesan Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('select[name="province_id"]').on('change', function() {
            var provinceId = $(this).val();
            if (provinceId) {
                $.ajax({
                    url: '/getcity/' + provinceId,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="city_id"]').empty();
                        // console.log(data);
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append(
                                '<option value="' + key + '"> ' + value +
                                '</option>');
                        });
                    }
                });
            } else {
                $('select[name="city_id"]').empty();
            }
        });
    });
</script>