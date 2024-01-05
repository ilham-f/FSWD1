@extends('layouts.main')

@section('content')
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">
        <div class="d-flex">
            <i class="bi bi-plus-square me-2"></i>
            Tambah Karyawan
        </div>
    </button>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No. Induk</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Tanggal Bergabung</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
                <tr>
                    <th scope="row">{{ $karyawan->no_induk }}</th>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->alamat }}</td>
                    <td>{{ $karyawan->tgl_lahir }}</td>
                    <td>{{ $karyawan->tgl_bergabung }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                data-bs-target="#ubah{{ $karyawan->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#hapus{{ $karyawan->id }}">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/tambah-karyawan" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Karyawan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">No. Induk</label>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="no_induk">
                        </div>
                        <label for="">Nama</label>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="nama">
                        </div>
                        <label for="">Alamat</label>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="alamat">
                        </div>
                        <label for="">Tanggal Lahir</label>
                        <div class="mb-3">
                            <input class="form-control" type="date" name="tgl_lahir">
                        </div>
                        <label for="">Tanggal Bergabung</label>
                        <div class="mb-3">
                            <input class="form-control" type="date" name="tgl_bergabung">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Ubah -->
    @foreach ($karyawans as $karyawan)
        <div class="modal fade" id="ubah{{ $karyawan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/ubah-karyawan/{{ $karyawan->id }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Karyawan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="">No. Induk</label>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="no_induk"
                                    value="{{ $karyawan->no_induk }}" readonly>
                            </div>
                            <label for="">Nama</label>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="nama" value="{{ $karyawan->nama }}">
                            </div>
                            <label for="">Alamat</label>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="alamat"
                                    value="{{ $karyawan->alamat }}">
                            </div>
                            <label for="">Tanggal Lahir</label>
                            <div class="mb-3">
                                <input class="form-control" type="date" name="tgl_lahir"
                                    value="{{ $karyawan->tgl_lahir }}">
                            </div>
                            <label for="">Tanggal Bergabung</label>
                            <div class="mb-3">
                                <input class="form-control" type="date" name="tgl_bergabung"
                                    value="{{ $karyawan->tgl_bergabung }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Hapus -->
    @foreach ($karyawans as $karyawan)
        <div class="modal fade" id="hapus{{ $karyawan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/hapus-karyawan/{{ $karyawan->id }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <strong>Apakah anda yakin menghapus Karyawan bernama {{ $karyawan->nama }} dengan No. Induk
                                {{ $karyawan->no_induk }}?</strong>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
