@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="row">
        <div class="col-md-10 mb-3">
            <form  action="{{ route('search') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="q" class="form-control border-1 small hover:border-primary" placeholder="Cari Nama Pendaftar..." aria-label="Search" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2">
            <form action="{{ route('select') }}" method="get">
                <select class="form-control mb-3" name="status" onchange="this.form.submit()">
                    <option value="" selected disabled>Pilih Status</option>
                    <option value="0">Menunggu</option>
                    <option value="1">Disetujui</option>
                </select>
            </form>
        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Nama Lengkap</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendaftars as $pendaftar)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $pendaftar->email }}</td>
                    <td>{{ $pendaftar->nama }}</td>
                    @php
                            if($pendaftar->status == 0) {
                                $status = '<a href="'. route('pendaftar.show', $pendaftar->id) .'"><button class="btn btn-sm btn-warning">Menunggu</button></a>';
                            } else {
                                $status = '<a href="'. route('pendaftar.show', $pendaftar->id) .'"><button disabled class="btn btn-sm btn-success">Disetujui</button></a>';
                            }
                        @endphp
                    <td>{!! $status !!}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('pendaftar.edit', $pendaftar->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <form action="{{ route('pendaftar.destroy', $pendaftar->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger text-center">
                    Pendaftar tidak ditemukan!
                </div>
            @endforelse
        </tbody>
    </table>

    {{ $pendaftars->links() }}

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
