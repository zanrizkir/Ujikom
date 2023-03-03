<!-- Modal-->
<div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">Tambah Data</h5>
          <button type="button" class="close r" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('riwayatProduk.store') }}" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
              @csrf
              <div class="row">
                  <div class="col mb-3">
                      <label class="form-label">Nama Produk</label>
                      <select name="produk_id"
                          class="form-control @error('produk_id') is-invalid @enderror" value="{{ old('produk_id') }}">
                          @foreach ($produk as $pro)
                              <option value="" hidden>Pilih Nama Produk</option>
                              <option value="{{ $pro->id }}">{{ $pro->name }}
                              </option>
                          @endforeach
                      </select>
                      @error('produk_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      
                  </div>
                  
              </div>
              <div class="row">
                  {{-- <div class="col-6 mb-0">
                      <label class="form-label">type</label>
                      <select name="type" class="form-control">
                          <option value="" hidden>Pilih Type</option>
                          <option value="masuk">masuk</option>
                          <option value="keluar">keluar</option>
                      </select>
                  </div> --}}
                  <div class="col mb-3">
                      <label class="form-label">qty</label>
                      <input type="number"  onkeypress="return hanyaAngka(event)"  name="qty" class="form-control mb-2" placeholder="qty" value="{{ old('qty') }}">
                  </div>
              </div>
              {{-- <div class="row">
                  <div class="col mb-3">
                      <label class="form-label">Note</label>
                      <input id="note" type="hidden" name="note" class="@error('note') is-invalid @enderror" >
                      <trix-editor input="note"></trix-editor>
                      @error('note')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div> --}}
              
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
      </form>
    </div>
  </div>
<!-- table -->

<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
  </script>