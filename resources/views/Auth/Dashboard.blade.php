@extends('Auth.layouts')
@section('link_text', 'All Posts')
@section('link', '/foto')
@section('link1_text', 'All Albums')
@section('link1', '/album')
@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @else
                <div class="alert alert-success">
                    Selamat Datang di Dasboard
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="container">
        <div class="row">
            @foreach ($fotos as $foto)
            <div class="col-lg-4 mb-4">
                <div class="card" style="width: 20rem;">
                    <!-- Added custom-card class -->
                        <img src="/image/{{ $foto->image }}" class="card-img-top" alt="Image"
                            style="height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title fw-bold text-black">{{ $foto->category }}</h2>
                        <p class="text-black">{{ $foto->judul_foto }}</p>
                        <p class="text-black">{{ $foto->deskripsi_foto }}</p>
                        <p class="text-black">{{ $foto->tgl_unggah }}</p>
                        <form action="{{ route('foto.like', $foto->id) }}" method="POST">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center text-center">
                            <form action="{{ route('foto.like', $foto->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary like-btn">
                                    <i class="far fa-heart fa-2x"></i>
                                    <!-- Mengatur ukuran ikon hati menjadi dua kali lipat -->
                                    <span class="badge bg-light text-dark"
                                        style="font-size: 1.0em;">{{ $foto->likes()->count() }}</span>
                                </button>
                            </form>
                            <div>
                        <a href="comments/{{ $foto->id }}/show"><button class="btn btn-primary"  type="button"><i class="bi bi-chat"></i></button></a>
</div>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
<script src="{{ asset('template/js/script.js') }}"></script>

@endsection