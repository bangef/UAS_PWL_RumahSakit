@extends('layouts.index')
@section('content')
    <h3>Form Edit Pasien</h3>
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('pasien.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama Pasien</label>
                <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control" autocomplete="off" maxlength="45" required/>
            </div>
            <div class="form-group">
                <label>Umur Pasien</label>
                <input type="number" name="umur" value="{{ $rs->umur }}" class="form-control" autocomplete="off" min="1" required/>
            </div>
            <div class="form-group">
                <label>Keluhan Penyakit</label>
                <input type="text" name="penyakit" value="{{ $rs->penyakit }}" class="form-control" autocomplete="off" maxlength="45" required/>
            </div>
            <div class="form-group">
                <label>Foto Pasien</label>
                <input type="text" name="foto" value="{{ $rs->foto }}" class="form-control" autocomplete="off"/>
            </div>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <a href="{{ url('/pasien') }}" class="btn btn-danger">Batal</a>
        </form>
    @endforeach
@endsection