@extends('layouts.index')
@section('content')
@php
    $rs1 = App\Models\Dokter::all();
    $rs2 = App\Models\Pasien::all();
    $rs3 = App\Models\Ruangan::all();
@endphp
    <h3>Form Rumah Sakit</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('rumah_sakit.store') }}"
            enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Rumah Sakit</label>
            <input type="text" name="nama_rs" value="{{ old('nama_rs') }}" class="form-control @error('nama_rs') is-invalid @enderror" autocomplete="off" />
            @error('nama_rs')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nama Dokter</label>
            <select class="form-control @error('iddokter') is-invalid @enderror" name="iddokter" />
            <option value="">-- Pilih Dokter --</option>
            @foreach ($rs1 as $d)
                <option value="{{ $d->id }}">{{ $d->nama }}</option>
            @endforeach
            </select>
            @error('iddokter')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nama Pasien</label>
            <select class="form-control @error('idpasien') is-invalid @enderror" name="idpasien" />
            <option value="">-- Pilih Pasien --</option>
            @foreach ($rs2 as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
            </select>
            @error('idpasien')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Ruangan</label><br/>
            @foreach ($rs3 as $r)
                <input type="radio" class="@error('idruangan') is-invalid @enderror" name="idruangan" 
                value="{{ $r->id }}"/> {{ $r->nama }} &nbsp;
            @endforeach
            @error('idruangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Alamat Rumah Sakit</label>
            <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" autocomplete="off" />
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Foto Rumah Sakit</label>
            <input type="file" name="foto" value="{{ old('foto') }}" class="form-control @error('foto') is-invalid @enderror"/>
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-danger" name="proses">Hapus</button>
    </form>
@endsection