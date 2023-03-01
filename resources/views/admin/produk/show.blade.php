@extends('admin.layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-lg mb-4">
            <div class="card-header">
                <strong class="card-title">Data Produk</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <strong>Kategori</strong>
                                </td>
                                <td>{{ $produk->kategori->name }}</td>
                            </tr>
                            <tr>
                                    <td>
                                        <strong>Tag</strong>
                                    </td>
                                    <td>
                                        @foreach($tags as $tag)
                                        <ul>
                                            <li>
                                                {{ $tag->tag->name }}
                                                {{-- {{ dd($tag) }} --}}
                                            </li>
                                        </ul>
                                        @endforeach
                                    </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Nama Produk</strong>
                                </td>
                                <td> {{ $produk->name }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Harga Jual</strong>
                                </td>
                                <td>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th><strong> stok</strong></th>
                                <th> {{ number_format($produk->stok, 0, ',', '.') }}
                                    </strong></th>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Diskon</strong>
                                </td>
                                <td> {{ $produk->diskon }}</td>
                            </tr>
                        </tbody>
                        
                        {{-- </tfoot> --}}
                    </table>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <strong>Deskripsi </strong>
                        <div class="card mb-3">
                            <div class="card-body">
                                {!! $produk->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-lg mb-4">
            <div class="card-header">
                <strong class="card-title">Gambar Produk</strong>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    @foreach ($images as $img)
                        <div class="col-md-6 mb-4 col-lg-6">
                            <div class="card-group">
                                <div class="card shadow">
                                    <img src="{{ asset($img->gambar_produk) }}" class="card-img" style="height:200px ; width:210px ;" alt="...">

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-start">
    <a href="{{ url('/admin/produk') }}" class="btn btn-danger me-3"> Kembali</a>
</div>

@endsection