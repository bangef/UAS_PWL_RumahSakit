@extends('layouts.index')
@section('content')
    <h3>Form Dokter</h3>
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
    <form method="POST" action="{{ route('dokter.store') }}"
            enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Dokter</label>
            <input type="text" name="nama" placeholder="isi nama anda" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" maxlength="45" />
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Umur Dokter</label>
            <input type="number" name="umur" placeholder="isi umur anda" class="form-control @error('umur') is-invalid @enderror" autocomplete="off" min="1"/>
            @error('umur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Bidang Dokter</label>
            <input type="text" name="bidang" placeholder="isi bidang anda" class="form-control @error('bidang') is-invalid @enderror" autocomplete="off" maxlength="45" />
            @error('bidang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Foto Dokter</label>
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