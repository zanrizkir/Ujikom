@extends('admin.layouts.admin')

@section('content')

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Data Tag</h2>
      @include('sweetalert::alert')
      <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
          <div class="card shadow-lg">
            <div class="card-body">
              <div class="text-left">
                <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo">Tambah Data</button>
                @include('admin.tag.create')
              </div>
              <table class="table datatables table-bordered table-hover" id="dataTable">
                <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($tag))
                    @foreach ($tag as $tags)
                        <tr>
                            <td>
                                <div class="d-flex">
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    {{ $tags->name }}
                                </div>
                            </td>
                            <td>
                              <div class="modal fade" id="varyModal{{ $tags->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Tag</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                        <div class="modal-body">
                                            <form action="{{ route('tag.update', $tags->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="col mb-3">
                                                    <label class="form-label">Nama
                                                        Kategori</label>
                                                    <input type="text" name="name"
                                                        class="form-control mb-2  @error('name') is-invalid @enderror" placeholder="Nama Kategori"
                                                        value="{{ $tags->name }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                              </div>                        
                            
                              <form action="{{ route('tag.destroy', $tags->id) }}" method="post">
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#varyModal{{ $tags->id }}"> edit </button>
                                    @csrf
                                    @method('delete')

                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#defaultModal{{ $tags->id }}"> Hapus </button>
                                    <div class="modal fade" id="defaultModal{{ $tags->id }}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel " aria-hidden="true">
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
                            </td>
                        </tr>
                    @endforeach
                  @endif

                </tbody>
              </table>
            </div>
          </div>
        </div> <!-- simple table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div>


@include('admin.tag.edit')

    

@endsection