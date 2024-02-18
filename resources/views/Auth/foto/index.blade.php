@extends('auth.layouts')
@section('link_text', 'Go to All dashboard')
@section('link', '/dashboard')
@section('link1', '/dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <a class="btn btn-success" href="{{ route('foto.create') }}"> + Add New Post</a>
        </div>
    </div>

</br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($fotos as $foto)
            <div class="col-lg-4 mb-4">
                <div class="card" style="white: 20rem;">
                    <!-- Added custom-card class -->
                    <a href="foto/{{ $foto->id }}">
                        <img src="/image/{{ $foto->image }}" class="card-img-top" alt="Image"
                            style="height: 150px; object-fit: cover;">
                    </a>
                    <a href="foto/{{ $foto->id }}" class="card-text btn btn-primary rounded-pill btn-sm text-white" >
                            Show Image</a>
                    <div class="card-body" style="background-color: white">
                        <h2 class="card-title fw-bold text-black">{{ $foto->category }}</h2>
                        <p class="text-black">{{ $foto->judul_foto }}</p>
                        <p class="text-black">{{ $foto->deskripsi_foto }}</p>
                        <p class="text-black">{{ $foto->tgl_unggah }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {!! $fotos->links() !!}


@endsection