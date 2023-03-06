@extends('template.template')
@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12 order-details pull-right" style="margin-top: 20px">
                    
                    <div class="order-summary text-center">
                        <span class="icon-check_circle display-3 text-success"></span>
                        <h2 class="display-3 text-black">Thank you!</h2>
                        <p class="lead mb-5">Produk Berahsil dipesan</p>
                        <p><a href="/produk" class="primary-btn order-submit">Kembali</a></p>
                    </div>


                    {{-- <button class="primary-btn order-submit pull-right" style="margin-top: 20px" type="submit">
                        Pesan</button>
                    </form> --}}
                </div>
                {{-- <div class="col-md-12 text-center">
                    <div class="card mb-3 mt-3">
                        <div class="card-body">
                            <span class="icon-check_circle display-3 text-success"></span>
                            <h2 class="display-3 text-black">Thank you!</h2>
                            <p class="lead mb-5">Produk Berahsil dipesan</p>
                            <p><a href="/produk" class="primary-btn order-submit">Kembali</a></p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection