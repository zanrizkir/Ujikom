@extends('admin.layouts.admin')

@section('content')

<div class="card-deck w-50 mx-auto">
    <div class="card shadow mb-4">

        <div class="card-body">
            <form action="{{ route('tag.update', $tag->id) }}" method="post">
                @csrf
                @method('put')
      
                <div class="form-group">
                    <label class="form-label">Nama tag</label>
                    <input  type="text" name="name"
                    class="form-control mb-2  @error('name') is-invalid @enderror" placeholder="Nama tag"
                    value="{{ $tag->name }}">
                </div>
                @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                <div class="text-right">
                    <a href="/admin/tag" class="btn btn-primary"><i class="fe fe-corner-up-left"></i></a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection