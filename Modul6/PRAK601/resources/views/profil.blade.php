@extends('layout')

@section('content')
<div class="row py-5">
    <div class="col-md-4 mb-4">
        <div class="card p-4 text-center">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($profil['nama']) }}&size=300&background=FBE29D&color=775537" alt="Profil" class="rounded-circle mx-auto mb-3" style="width: 150px; height: 150px; object-fit: cover;">
            <h4 class="fw-bold text-primary">{{ $profil['nama'] }}</h4>
            <p class="text-muted mb-4">{{ $profil['nim'] }}</p>
            
            <div class="text-start">
                <p class="mb-2"><strong>Fakultas:</strong><br>{{ $profil['fakultas'] }}</p>
                <p class="mb-2"><strong>Prodi:</strong><br>{{ $profil['prodi'] }}</p>
                <p class="mb-2"><strong>Universitas:</strong><br>{{ $profil['universitas'] }}</p>
                <p class="mb-0"><strong>Skill:</strong><br>{{ $profil['skill'] }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <h3 class="fw-bold mb-4 text-primary">Pengalaman & Kegiatan</h3>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($pengalaman as $item)
            <div class="col">
                <div class="card h-100 overflow-hidden">
                    <img src="{{ $item->gambar }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="fw-bold text-primary">{{ $item->judul }}</h5>
                        <span class="badge bg-primary mb-3" style="width: fit-content;">{{ $item->tanggal }}</span>
                        <p class="text-secondary" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $item->deskripsi }}
                        </p>
                        <a href="{{ route('detailPengalaman', $item->id) }}" class="btn btn-outline-primary mt-auto">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection