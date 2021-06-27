@extends('layouts.index')
@section('content')
    <h3>Form Pasien</h3>
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
    <form method="POST" action="{{ route('pasien.store') }}"
            enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" name="nama" placeholder="isi nama anda" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" maxlength="45" />
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Umur Pasien</label>
            <input type="number" name="umur" placeholder="isi umur anda" class="form-control @error('umur') is-invalid @enderror" autocomplete="off" min="1"/>
            @error('umur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Keluhan Penyakit</label>
            <input type="text" name="penyakit" placeholder="isi keluhan penyakit anda" class="form-control @error('penyakit') is-invalid @enderror" autocomplete="off" maxlength="45" />
            @error('penyakit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Foto Pasien</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"/>
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