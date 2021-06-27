@extends('layouts.index')
@section('content')
@php
    $ar_judul = ['No','Nama Pasien','Umur Pasien','Keluhan Penyakit','Foto Pasien','Action'];
    $no = 1;
@endphp
    <h3>Data Pasien</h3>
    <a class="btn btn-primary btn-md" href="{{ route('pasien.create') }}" role="button" title="klik untuk tambah data"><i class="fas fa-plus-circle"></i> Tambah</a>
    <table class="table table-striped mt-2">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ar_pasien as $p)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->umur }}</td>
                    <td>{{ $p->penyakit }}</td>
                    <td width="15%">
                        @php
                        if(!empty($p->foto)) {
                        @endphp
                            <img src="{{ asset('images')}}/{{ $p->foto }}" width="50%" />
                        @php
                        } else {
                        @endphp
                            <img src="{{ asset('images')}}/no_picture.png" width="50%" />
                        @php
                        }
                        @endphp
                    </td>
                    <td>
                        <form method="POST" action="{{ route('pasien.destroy',$p->id) }}">
                            @csrf
                            @method('delete')
                            <a class="btn btn-info" href="{{ route('pasien.show',$p->id) }}" title="klik untuk melihat secara detail"><i class="fas fa-info-circle"></i> Detail</a>
                            <a class="btn btn-warning" href="{{ route('pasien.edit',$p->id) }}" title="klik untuk mengedit data"><i class="fas fa-user-edit"></i> Edit</a>
                            <button class="btn btn-danger" onclick="return confirm('Data ini akan hilang, Anda yakin?')" title="klik untuk menghapus data"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection