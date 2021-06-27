@extends('layouts.index')
@section('content')
@php
    $rs1 = App\Models\Dokter::all();
    $rs2 = App\Models\Pasien::all();
    $rs3 = App\Models\Ruangan::all();
@endphp
    <h3>Form Edit Rumah Sakit</h3>
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('rumah_sakit.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama Rumah Sakit</label>
                <input type="text" name="nama_rs" value="{{ $rs->nama_rs }}" class="form-control" autocomplete="off"/>
            </div>
            <div class="form-group">
                <label>Nama Dokter</label>
                <select class="form-control" name="iddokter"/>
                <option value="">-- Pilih Dokter --</option>
                @foreach ($rs1 as $d)
                {{-- Edit Dokter --}}
                @php
                    $sel1 = ($d->id == $rs->iddokter) ? 'selected' : '';
                @endphp
                    <option value="{{ $d->id }}" {{ $sel1 }}>{{ $d->nama }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nama Pasien</label>
                <select class="form-control" name="idpasien"/>
                <option value="">-- Pilih Pasien --</option>
                @foreach ($rs2 as $p)
                {{-- Edit Pasien --}}
                @php
                    $sel2 = ($p->id == $rs->idpasien) ? 'selected' : '';
                @endphp
                    <option value="{{ $p->id }}" {{ $sel2 }}>{{ $p->nama }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Ruangan</label><br/>
                @foreach ($rs3 as $r)
                {{-- Edit Ruangan --}}
                @php
                    $cek = ($r->id == $rs->idruangan) ? 'checked' : '';
                @endphp
                    <input type="radio" name="idruangan" 
                    value="{{ $r->id }}" {{ $cek }} /> {{ $r->nama }} &nbsp;
                @endforeach
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="{{ $rs->alamat }}" class="form-control" autocomplete="off"/>
            </div>
        <div class="form-group">
                <label>Foto Rumah Sakit</label>
                <input type="text" name="foto" value="{{ $rs->foto }}" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <a href="{{ url('/rumah_sakit') }}" class="btn btn-danger">Batal</a>
        </form>
    @endforeach
@endsection