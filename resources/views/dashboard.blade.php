@extends('layouts.main')

@section('content')
    {{-- @dd($first3karyawan) --}}
    <div class="page-heading">
        <h3>Statistik Karyawan</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>3 karyawan yang pertama kali bergabung</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    @foreach ($first3karyawan as $karyawan)
                                        <div class="col-3">
                                            <div class="d-flex align-items-center">
                                                <svg class="bi text-dark" width="32" height="32"
                                                    style="width:10px">
                                                    <use
                                                        xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                </svg>
                                                <h5 class="mb-0 ms-3">{{ $karyawan->nama }}</h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Karyawan yang telah mengambil cuti</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    {{-- @dd($cutiedKaryawan) --}}
                                    @foreach ($cutiedKaryawan as $cuti)
                                        <div class="col-3">
                                            <div class="d-flex align-items-center">
                                                <svg class="bi text-dark" width="32" height="32"
                                                    style="width:10px">
                                                    <use
                                                        xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                </svg>
                                                <h5 class="mb-0 ms-3">{{ $cuti->nama }}</h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Sisa Cuti Karyawan</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No. Induk</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col" class="text-center">Sisa Cuti</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @dd($sisaCuti[0]) --}}
                                        @foreach ($sisaCuti as $karyawan)
                                            <tr>
                                                <th scope="row">{{ $karyawan['no_induk'] }}</th>
                                                <td>{{ $karyawan['nama'] }}</td>
                                                <td class="text-center">{{ $karyawan['sisa_cuti'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
