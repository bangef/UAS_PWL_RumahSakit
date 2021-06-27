@extends('layouts.index')
@section('content')
    @foreach ($ar_rs as $rs)
        <div class="card" style="width: 19rem;">
            @php
            if(!empty($rs->foto)) {
            @endphp
                <img src="{{ asset('images')}}/{{ $rs->foto }}"/>
            @php
            } else {
            @endphp
                <img src="{{ asset('images')}}/no_picture.png"/>
            @php
            }
            @endphp
            <div class="card-body">
                <h5 class="card-title">{{ $rs->nama_rs }}</h5>
                <p class="card-text">
                    Dokter : {{ $rs->dok }}
                    <br/>Pasien : {{ $rs->ps }}
                    <br/>Ruangan : {{ $rs->rua }}
                    <br/>Alamat : {{ $rs->alamat }}
                </p>
                <a href="{{ url('/rumah_sakit') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    @endforeach
@endsection