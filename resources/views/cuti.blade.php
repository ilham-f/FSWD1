@extends('layouts.main')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No. Induk</th>
                <th scope="col">Tanggal Cuti</th>
                <th scope="col">Lama Cuti</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cuties as $cuti)
                <tr>
                    <th scope="row">{{ $cuti->karyawan->no_induk }}</th>
                    <td>{{ $cuti->tgl_cuti }}</td>
                    <td>{{ $cuti->lama_cuti }}</td>
                    <td>{{ $cuti->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
