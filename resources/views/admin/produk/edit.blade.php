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
                                class="form-control @error('kategori_id') is-invalid @enderror">
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
                            @error('kategori_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tag</label>
                            <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
                                @forelse($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $produk->tags->pluck('id')->toArray()) ? 'selected' : null }} >{{ $tag->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('tags')<span class="text-danger">{{ $message }}</span>@enderror
                        
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-password">Nama Produk</label>
                            <input type="text" name="name" class="form-control"  @error('name') is-invalid @enderror 
                            placeholder="Nama Produk" value="{{ $produk->name }}" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Hpp Produk</label>
                            <input type="number" min="1" name="hpp" class="form-control" @error('hpp') is-invalid @enderror
                            placeholder="Hpp Produk" value="{{ $produk->hpp }}">
                            @error('hpp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Harga Produk</label>
                            <input type="number" min="1" name="harga" class="form-control" @error('harga') is-invalid @enderror
                            placeholder="Harga Produk" value="{{ $produk->harga }}">
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Stock Produk</label>
                            <input type="number" min="1" name="stok"
                            class="form-control @error('stok') is-invalid @enderror" placeholder="stok Produk"
                            value="{{ $produk->stok }}">
                            @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Diskon Produk</label>
                            <div class="input-group mb-3">
                            <input type="number" min="0" name="diskon"
                                class="form-control @error('diskon') is-invalid @enderror"
                                placeholder="diskon Produk" value="{{ $produk->diskon }}">
                            <button class="btn btn-secondary mb-2" type="button">%</button>
                            @error('diskon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Deskripsi</label>
                            <input id="deskripsi" type="hidden" name="deskripsi" class="@error('deskripsi') is-invalid @enderror" >
                            <trix-editor input="deskripsi"></trix-editor>
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> <!-- /.col -->
                </div>
                <div class="d-flex float-end">
                    <div class="col">
                        <a href="/admin/produk" class="btn btn-primary">Kembali</a>
                        
                        <button type="submit" class="btn btn-primary">
                             Kirim
                        </button>
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
                    <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                        <div class="mb-3">
                            <label class="form-label">gambar produk</label>
                            
                              <input type="file" class="form-control-file @error('gambar_produk') is-invalid @enderror"
                                  name="gambar_produk[]" value="{{ old('gambar_produk') }}" multiple>
                              @error('gambar_produk')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            
                        </div>
                        <button type="submit" class="mb-3 btn btn-primary">
                            Kirim
                       </button>
                    </form>
                    <div class="row mb-3">
                        @foreach ($images as $img)
                            <div class="col-md-6 mb-3 col-lg-6">
                                <div class="card-group">
                                    <div class="card shadow">
                                        <img src="{{ asset($img->gambar_produk) }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                           <form action="{{ Route('image.destroy', $img->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#defaultModal{{ $img->id }}"> Hapus </button>
                                                <div class="modal fade" id="defaultModal{{ $img->id }}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title " id="defaultModalLabel">Apakah Anda Yakin</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                
                                                                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn mb-2 btn-primary">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.select2').select2({
        closeOnSelect: false
        });
    });
    </script>

@endsection