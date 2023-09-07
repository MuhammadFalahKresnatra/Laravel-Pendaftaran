@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pendaftar.update', $pendaftar->id) }}" method="post">
                @csrf
                @method('put')

                <div hidden class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" autocomplete="off" value="{{ old('nik') ?? $pendaftar->nik }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div hidden class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" autocomplete="off" value="{{ old('nisn') ?? $pendaftar->nisn }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" autocomplete="off" value="{{ old('nama') ?? $pendaftar->nama }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tempatlahir">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempatlahir') is-invalid @enderror" name="tempatlahir" id="tempatlahir" autocomplete="off" value="{{ old('tempatlahir') ?? $pendaftar->tempatlahir }}">
                    @error('tempatlahir')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tgllahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tgllahir') is-invalid @enderror" name="tgllahir" id="tgllahir" autocomplete="off" value="{{ old('tgllahir') ?? $pendaftar->tgllahir }}">
                    @error('tgllahir')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" autocomplete="off" value="{{ old('alamat') ?? $pendaftar->alamat }}">
                    @error('tgllahir')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jeniskelamin">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="inlineRadio1" value="Laki-Laki" {{ $pendaftar->jeniskelamin == "Laki-Laki" ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="inlineRadio2" value="Perempuan" {{ $pendaftar->jeniskelamin == "Perempuan" ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="agama">Agama</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="agama" id="inlineRadio3" value="Islam" {{ $pendaftar->agama == "Islam" ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadio3">Islam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="agama" id="inlineRadio4" value="Kristen Katolik" {{ $pendaftar->agama == "Kristen Katolik" ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadio4">Kristen Katolik</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="agama" id="inlineRadio5" value="Kristen Protestan" {{ $pendaftar->agama == "Kristen Protestan" ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadio5">Kristen Protestan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="agama" id="inlineRadio6" value="Hindu" {{ $pendaftar->agama == "Hindu" ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadio6">Hindu</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="agama" id="inlineRadio7" value="Buddha" {{ $pendaftar->agama == "Buddha" ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadio7">Buddha</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="agama" id="inlineRadio8" value="Konghucu" {{ $pendaftar->agama == "Konghucu" ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadio8">Konghucu</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autocomplete="off" value="{{ old('email') ?? $pendaftar->email }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telp">No. Telp</label>
                    <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" autocomplete="off" value="{{ old('telp') ?? $pendaftar->telp }}">
                    @error('telp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div hidden class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" id="kode" autocomplete="off" value="{{ old('kode') ?? $pendaftar->kode }}">
                    @error('kode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div hidden class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" id="status" autocomplete="off" value="{{ old('status') ?? $pendaftar->status }}">
                    @error('kode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sekolahasal">Sekolah Asal</label>
                    <input type="text" class="form-control @error('sekolahasal') is-invalid @enderror" name="sekolahasal" id="sekolahasal" autocomplete="off" value="{{ old('sekolahasal') ?? $pendaftar->sekolahasal }}">
                    @error('sekolahasal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('pendaftar.index') }}" class="btn btn-default">Kembali ke list</a>

            </form>
        </div>
    </div>

    <!-- End of Main Content -->
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush
