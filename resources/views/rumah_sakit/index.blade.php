@extends('layouts.index')
@section('content')
@php
    $ar_judul = ['No','Nama Rumah Sakit','Dokter','Pasien','Ruangan','Alamat','Action'];
    $no = 1;
@endphp
    <h3>Data Rumah Sakit</h3>
    <a class="btn btn-primary btn-md" href="{{ route('rumah_sakit.create') }}" role="button" title="klik untuk tambah data"><i class="fas fa-plus-circle"></i> Tambah</a>
    <table class="table table-striped mt-2">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ar_rs as $rs)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $rs->nama_rs }}</td>
                    <td>{{ $rs->dok }}</td>
                    <td>{{ $rs->ps }}</td>
                    <td>{{ $rs->rua }}</td>
                    <td>{{ $rs->alamat }}</td>
                    <td>
                        <form method="POST" action="{{ route('rumah_sakit.destroy',$rs->id) }}">
                            @csrf
                            @method('delete')
                            <a class="btn btn-info" href="{{ route('rumah_sakit.show',$rs->id) }}" title="klik untuk melihat secara detail"><i class="fas fa-info-circle"></i></a>
                            <a class="btn btn-warning" href="{{ route('rumah_sakit.edit',$rs->id) }}" title="klik untuk mengedit data"><i class="fas fa-user-edit"></i></a>
                            <button class="btn btn-danger" onclick="return confirm('Data ini akan hilang, Anda yakin?')" title="klik untuk menghapus data"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection