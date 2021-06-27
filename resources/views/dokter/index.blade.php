@extends('layouts.index')
@section('content')
@php
    $ar_judul = ['No','Nama Dokter','Umur Dokter','Bidang Dokter','Foto','Action'];
    $no = 1;
@endphp
    <h3>Data Dokter</h3>
    <a class="btn btn-primary btn-md" href="{{ route('dokter.create') }}" role="button" title="klik untuk tambah data"><i class="fas fa-plus-circle"></i> Tambah</a>
    <!-- table -->
    <div class="jumbotron jumbotron-fluid bg-white">
    <div class="table-responsive-sm table-responsive-lg table-responsive-sm">
    	<table class="table-bordered table table-hover table-light text-center">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th scope="col">{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ar_dokter as $d)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->umur }}</td>
                    <td>{{ $d->bidang }}</td>
                    <td width="15%">
                        @php
                        if(!empty($d->foto)) {
                        @endphp
                            <img src="{{ asset('images')}}/{{ $d->foto }}" width="50%" />
                        @php
                        } else {
                        @endphp
                            <img src="{{ asset('images')}}/no_picture.png" width="50%" />
                        @php
                        }
                        @endphp
                    </td>
                    <td>
                        <form method="POST" action="{{ route('dokter.destroy',$d->id) }}">
                            @csrf
                            @method('delete')
                            <a class="text-primary px-3" href="{{ route('dokter.show',$d->id) }}" title="klik untuk melihat secara detail"><i class="fas fa-info-circle"></i> Detail</a>
                            <a class="text-primary px-3" href="{{ route('dokter.edit',$d->id) }}" title="klik untuk mengedit data"><i class="fas fa-user-edit"></i> Edit</a>
                            <a class="text-primary px-3" onclick="return confirm('Data ini akan hilang, Anda yakin?')" title="klik untuk menghapus data"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   </div>
   </div>
@endsection
