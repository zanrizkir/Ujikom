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
        <form action="{{ route('alamat.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">User</label>
                        <select name="user_id"
                          class="form-control @error('user_id') is-invalid @enderror">
                        @foreach ($users as $user)
                            <option value="" hidden>Pilih User</option>
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>           
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap"
                        class="form-control mb-2  @error('nama_lengkap') is-invalid @enderror" placeholder="Nama Lengkap"
                        value="{{ old('nama_lengkap') }}">
                        @error('nama_lengkap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>           
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">No Telpon</label>
                        <input type="tel" pattern="^\d{4}-\d{4}-\d{4}$" name="telpon"
                        class="form-control mb-2  @error('telpon') is-invalid @enderror" placeholder="No Telpon"
                        value="{{ old('telpon') }}">
                        @error('telpon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>           
                </div>
              
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Name Provinsi</label>
                        <select name="province_id" id="province_destination"
                            class="form-control @error('province_destination') is-invalid @enderror">
                        @foreach ($provinces as $province => $value)
                            <option value="" hidden>Pilih Provinsi</option>
                            <option value="{{ $province }}">{{ $value }}</option>
                        @endforeach
                        </select>
                        @error('province_destination')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>           
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Nama Kota/Kabupaten</label>
                        <select class="form-control  @error('city_destination') is-invalid @enderror" name="city_id"
                        id="city_destination">
                            <option selected disabled>Kota</option>
                        </select>
                        @error('city_destination')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>           
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" cols="20" rows="3" class="form-control  @error('alamat') is-invalid @enderror"
                                placeholder="alamat" value="{{ old('alamat') }}"></textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Label Alamat</label>
                        <select name="label"
                            class="form-control @error('label') is-invalid @enderror">
                            <option value="" hidden>Pilih Label Alamat</option>
                            <option value="rumah">rumah</option>
                            <option value="kantor">kantor</option>
                        </select>
                        @error('label')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Kembali
                </button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>
</div>
<!-- table -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script>
   $(document).ready(function() {
      $('.select2').select2({
      closeOnSelect: false
      });
  });



<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('select[name="province_id"]').on('change', function() {
            var provinceId = $(this).val();
            if (provinceId) {
                $.ajax({
                    url: '/admin/getcity/' + provinceId,
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