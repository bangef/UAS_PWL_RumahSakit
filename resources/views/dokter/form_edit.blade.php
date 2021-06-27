@extends('layouts.index')
@section('content')
    <h3>Form Edit Dokter</h3>
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('dokter.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama Dokter</label>
                <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control" autocomplete="off" maxlength="45" required/>
            </div>
            <div class="form-group">
                <label>Umur Dokter</label>
                <input type="number" name="umur" value="{{ $rs->umur }}" class="form-control" autocomplete="off" min="1" required/>
            </div>
            <div class="form-group">
                <label>Bidang Dokter</label>
                <input type="text" name="bidang" value="{{ $rs->bidang }}" class="form-control" autocomplete="off" maxlength="45" required/>
            </div>
            <div class="form-group">
                <label>Foto Dokter</label>
                <input type="text" name="foto" value="{{ $rs->foto }}" class="form-control" autocomplete="off"/>
            </div>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <a href="{{ url('/dokter') }}" class="btn btn-danger">Batal</a>
        </form>
    @endforeach
@endsection