@extends('template.template')
@section('content')
    <form action="{{ route('alamat.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="mb-3">
                <label class="form-label">Name Pembeli</label>
                <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                    @foreach ($users as $user)
                        <option value="" hidden>Pengguna</option>
                        <option value="{{ $user->id }}">{{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="example-palaceholder">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror"
                    placeholder="Nama Lengkap" value="">
                @error('nama_lengkap')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="example-palaceholder">Telepon</label>
                <input type="text" name="telpon" class="form-control @error('telpon') is-invalid @enderror"
                    placeholder="Telpon" value="">
                @error('telpon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="province_destination" class="form-label">Provinsi Tujuan</label>
                <select class="form-select @error('province_destination') is-invalid @enderror" name="province_id"
                    id="province_destination">
                    <option selected disabled>--Provinsi--</option>
                    @foreach ($provinces as $province => $value)
                        <option value="{{ $province }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('province_destination')
                    <div id="province_destination" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="city_destination" class="form-label">Kota Tujuan</label>
                <select class="form-select @error('city_destination') is-invalid @enderror" name="city_id"
                    id="city_destination">
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
                <select class="form-select @error('label') is-invalid @enderror" name="label"id="">
                    <option selected disabled>--Kota--</option>
                    <option value="rumah">Rumah</option>
                    <option value="kantor">Kantor</option>
                </select>
                @error('label')
                    <div id="label" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex float-end">
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label"> Kirim </span>
                    </button>
                </div>
            </div>
        </div>
    </form>
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
@endsection