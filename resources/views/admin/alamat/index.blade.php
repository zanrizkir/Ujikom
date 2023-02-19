@extends('admin.layouts.admin')

@section('content')

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Data Produk</h2>
      @include('sweetalert::alert')
      <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
          <div class="card shadow-lg">
            <div class="card-body">
              <div class="">
                <button type="button" class="btn mb-3 btn-primary" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo">Tambah Data</button>
                @include('admin.alamat.create')
              </div>
              <table class="table datatables table-bordered table-hover" id="dataTable">
                <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Nama Lengkap</th>
                    <th>Telpon</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Alamat Lengkap</th>
                    <th>Label</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($alamats))
                    @foreach ($alamats as $alamat)
                        <tr>
                            <td>
                                <div class="d-flex">
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                  {{ $alamat->user->name }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                  {{ $alamat->nama_lengkap }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                  {{ $alamat->telpon }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">        
                                  {{ $alamat->province->title }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                  {{ $alamat->city->title }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                  {{ $alamat->alamat }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    {{ $alamat->label }}
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('produk.destroy', $alamat->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('produk.show', $alamat->id) }}"
                                        class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                        data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                        title="Show Data">
                                        S
                                    </a> |
                                    <a href="{{ route('produk.edit', $alamat->id) }}"
                                        class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                        data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                        title="Edit Data">
                                        edit
                                    </a> |
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#defaultModal{{ $alamat->id }}"> Hapus </button>
                                    <div class="modal fade" id="defaultModal{{ $alamat->id }}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
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



@endsection