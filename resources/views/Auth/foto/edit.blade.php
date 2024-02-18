@extends('Auth.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-Black text-center">
                <h2>Edit Data</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('foto.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row text-white">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-black">
                <strong>Judul Foto:</strong>
                <input type="text" name="judul_foto" value="{{ $foto->judul_foto }}" class="form-control"
                    placeholder="Judul Foto">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-black">
                <strong>Category</strong>
                <select name="album_id" id="album_id" class="form-select @error('album_id') is-invalid @enderror"
                    aria-label="Default select example">
                    @foreach ($albums as $album)
                    @if ($album->id == $foto->album_id)
                    <option value="{{ $album->id }}" selected>{{ $album->nama_album }}</option>
                    @else
                    <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="my-2">
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-black">
                <strong>Deskripsi Foto:</strong>
                <textarea class="form-control" style="height:150px" name="deskripsi_foto"
                    placeholder="Deskripsi Foto">{{ $foto->deskripsi_foto }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-black">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
                <br>
                <img src="/image/{{ $foto->image }}" width="300px">
                <br>
            </div>
        </div>
        <br>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-black">
                <strong>Tanggal Unggah:</strong>
                <br>
                <input type="date" name="tgl_unggah" value="{{ $foto->tgl_unggah }}" class="form-control"
                    placeholder="Tanggal Unggah">
            </div>
        </div>
    </div>
    <br>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary text-white">Submit</button>
    </div>
    <br>
</form>
@endsection