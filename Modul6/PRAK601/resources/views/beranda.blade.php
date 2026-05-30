@extends('layout')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    
    <div class="card p-5 text-center" style="max-width: 600px; width: 100%;">
        <div class="mb-4">
            <span class="badge px-3 py-2 mb-3 shadow-sm" style="background-color: var(--butter-yellow); color: var(--old-copper); font-size: 0.9rem;">
                Welcome to Web Praktikum
            </span>
            <h1 class="fw-bolder" style="color: var(--old-copper);">Halaman Beranda</h1>
            <p class="text-muted mt-3">
                Eksplorasi data dinamis menggunakan arsitektur MVC pada Laravel, dibalut dengan desain <em>Spring Aesthetic</em>.
            </p>
        </div>
        
        <div class="p-4 mb-4" style="background-color: rgba(192, 221, 218, 0.4); border-radius: 16px; border: 2px dashed var(--nebula);">
            <h3 class="fw-bold mb-1" style="color: var(--old-copper);">{{ $data['nama'] }}</h3>
            <h5 class="text-secondary mb-0">{{ $data['nim'] }}</h5>
        </div>
        
        <div>
            <a href="{{ route('profil') }}" class="btn btn-primary btn-lg px-5 shadow-sm">Lihat Profil Lengkap</a>
        </div>
    </div>

</div>
@endsection