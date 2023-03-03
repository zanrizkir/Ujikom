{{-- <div class="modal fade" id="varyModal{{ $tags->id }}" tabindex="-1" aria-hidden="true">
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
  </div>                         --}}
