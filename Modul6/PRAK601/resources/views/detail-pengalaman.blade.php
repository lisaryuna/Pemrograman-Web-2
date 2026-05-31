@extends('layout')

@section('content')
<div class="container py-5">
    <div class="card p-5 mx-auto" style="max-width: 800px;">
        
        <div class="text-center mb-5">
            <span class="badge bg-primary mb-3">{{ $detail->tanggal }}</span>
            <h2 class="fw-bold text-primary">{{ $detail->judul }}</h2>
        </div>

        <img src="{{ asset($detail->gambar) }}" class="card-img-top mb-5 rounded" alt="{{ $detail->judul }}" style="height: auto; width: 100%; object-fit: cover;">

        <div class="mb-5">
            <h5 class="fw-bold text-primary">Deskripsi Kegiatan</h5>
            <p class="text-secondary" style="line-height: 1.8;">{{ $detail->deskripsi }}</p>
        </div>
        
        <div class="mb-5">
            <h5 class="fw-bold text-primary">Kesan yang Dirasakan</h5>
            <div class="p-4 mt-2" style="background-color: rgba(192, 221, 218, 0.3); border-radius: 12px; border-left: 4px solid var(--old-copper);">
                <em class="text-secondary">"{{ $detail->kesan }}"</em>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('profil') }}" class="btn btn-outline-primary px-4">&larr; Kembali ke Profil</a>
        </div>
        
    </div>
</div>
@endsection