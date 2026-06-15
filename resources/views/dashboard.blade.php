@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="bi bi-speedometer2"></i> Dashboard</h1>
</div>

{{-- Statistik Buku --}}
<h5 class="mb-3"><i class="bi bi-book"></i> Statistik Buku</h5>
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Buku</h6>
                        <h2 class="mb-0">{{ $totalBuku }}</h2>
                    </div>
                    <i class="bi bi-book-fill text-primary" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Buku Tersedia</h6>
                        <h2 class="mb-0">{{ $bukuTersedia }}</h2>
                    </div>
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Buku Habis</h6>
                        <h2 class="mb-0">{{ $bukuHabis }}</h2>
                    </div>
                    <i class="bi bi-x-circle-fill text-danger" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

-- Statistik Anggota --
<h5 class="mb-3"><i class="bi bi-people"></i> Statistik Anggota</h5>
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Anggota</h6>
                        <h2 class="mb-0">{{ $totalAnggota }}</h2>
                    </div>
                    <i class="bi bi-people-fill text-success" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Anggota Aktif</h6>
                        <h2 class="mb-0">{{ $anggotaAktif }}</h2>
                    </div>
                    <i class="bi bi-person-check-fill text-primary" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-secondary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Anggota Nonaktif</h6>
                        <h2 class="mb-0">{{ $anggotaNonaktif }}</h2>
                    </div>
                    <i class="bi bi-person-x-fill text-secondary" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

-- 5 Buku & Anggota Terbaru --
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="mb-0"><i class="bi bi-clock-history"></i> 5 Buku Terbaru</h6>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($bukuTerbaru as $buku)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('buku.show', $buku->id) }}" class="text-decoration-none fw-bold">
                                {{ $buku->judul }}
                            </a>
                            <br>
                            <small class="text-muted">{{ $buku->pengarang }}</small>
                        </div>
                        <span class="badge bg-{{ $buku->stok > 0 ? 'success' : 'danger' }}">
                            {{ $buku->stok > 0 ? 'Tersedia' : 'Habis' }}
                        </span>
                    </li>
                @endforeach
            </ul>
            <div class="card-footer">
                <a href="{{ route('buku.index') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-arrow-right"></i> Lihat Semua Buku
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h6 class="mb-0"><i class="bi bi-clock-history"></i> 5 Anggota Terbaru</h6>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($anggotaTerbaru as $anggota)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('anggota.show', $anggota->id) }}" class="text-decoration-none fw-bold">
                                {{ $anggota->nama }}
                            </a>
                            <br>
                            <small class="text-muted">{{ $anggota->email }}</small>
                        </div>
                        <span class="badge bg-{{ $anggota->status == 'Aktif' ? 'success' : 'secondary' }}">
                            {{ $anggota->status }}
                        </span>
                    </li>
                @endforeach
            </ul>
            <div class="card-footer">
                <a href="{{ route('anggota.index') }}" class="btn btn-sm btn-success">
                    <i class="bi bi-arrow-right"></i> Lihat Semua Anggota
                </a>
            </div>
        </div>
    </div>
</div>

-- Quick Links --
<div class="card">
    <div class="card-header bg-dark text-white">
        <h6 class="mb-0"><i class="bi bi-lightning"></i> Quick Links</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('buku.index') }}" class="btn btn-outline-primary w-100 mb-2">
                    <i class="bi bi-book"></i> Daftar Buku
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('buku.create') }}" class="btn btn-outline-success w-100 mb-2">
                    <i class="bi bi-plus-circle"></i> Tambah Buku
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('anggota.index') }}" class="btn btn-outline-info w-100 mb-2">
                    <i class="bi bi-people"></i> Daftar Anggota
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('anggota.create') }}" class="btn btn-outline-warning w-100 mb-2">
                    <i class="bi bi-person-plus"></i> Tambah Anggota
                </a>
            </div>
        </div>
    </div>
</div>
@endsection