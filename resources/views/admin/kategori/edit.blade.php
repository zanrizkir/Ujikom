<div class="modal fade" id="editModal{{ $kategori->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="col mb-3">
                        <label class="form-label">Nama
                            Kategori</label>
                        <input type="text" name="name"
                            class="form-control mb-2  @error('name') is-invalid @enderror" placeholder="Nama Kategori"
                            value="{{ $kategori->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>