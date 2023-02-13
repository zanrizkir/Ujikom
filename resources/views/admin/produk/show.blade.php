@extends('admin.layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-6">
            @include('sweetalert::alert')
            <div class="card shadow-lg mb-4">
            <div class="card-header">
                <strong class="card-title">Data Produk</strong>
            </div>
            <form action="{{ route('produk.update',$produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label class="form-label">Name Kategori</label>
                            <select name="kategori_id" id="kategori"
                                class="form-control " disabled>
                                @foreach ($kategoris as $kategori)
                                    @if (old('kategori_id', $kategori->id) == $produk->kategori->id)
                                        <option value="{{ $kategori->id }}" selected>
                                            {{ $kategori->name }}</option>
                                    @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sub Kategori</label>

                        </div>
                        <div class="form-group mb-3">
                            <label for="example-password">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control"   
                            placeholder="Nama Produk" value="{{ $produk->nama_produk }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Hpp Produk</label>
                            <input type="number" name="hpp" class="form-control"
                            placeholder="Hpp Produk" value="{{ $produk->hpp }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Harga Produk</label>
                            <input type="number" name="harga" class="form-control" 
                            placeholder="Harga Produk" value="{{ $produk->harga }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Stock Produk</label>
                            <input type="number" name="stok"
                            class="form-control " placeholder="stok Produk"
                            value="{{ $produk->stok }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Diskon Produk</label>
                            <div class="input-group mb-3">
                            <input type="number" name="diskon"
                                class="form-control "
                                placeholder="diskon Produk" value="{{ $produk->diskon }}" disabled>
                            <button class="btn btn-secondary mb-2" type="button" disabled>%</button>
                            </div>
                        </div>
                        {!! $produk->deskripsi !!}
                        {{-- <div class="form-group mb-3">
                            <label for="example-palaceholder">Deskripsi</label>
                            <textarea name="deskripsi" cols="20" rows="5"
                                class="form-control  " placeholder="deskripsi"
                                value="{!! $produk->deskripsi !!}" disabled>{{ $produk->deskripsi }}</textarea>
                        </div> --}}
                        
                    </div> <!-- /.col -->
                </div>
                <div class="d-flex float-end">
                    <div class="col">
                        <a href="/admin/produk" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                </div>
            </form>
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
                            <div class="col-md-6 mb-3 col-lg-6">
                                <div class="card-group">
                                    <div class="card shadow">
                                        <img src="{{ asset($img->gambar_produk) }}" class="card-img-top" alt="...">
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>  


@endsection