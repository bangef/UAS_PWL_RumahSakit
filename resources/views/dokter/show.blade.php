@extends('layouts.index')
@section('content')
    <h3>Detail Data Dokter</h3>
    @foreach ($ar_dokter as $d)
        <div class="card" style="width: 22rem;">
            @php
            if(!empty($d->foto)) {
            @endphp
                <img src="{{ asset('images')}}/{{ $d->foto }}"/>
            @php
            } else {
            @endphp
                <img src="{{ asset('images')}}/no_picture.png"/>
            @php
            }
            @endphp
            <div class="card-body">
                <h5 class="card-title">{{ $d->nama }}</h5>
                <p class="card-text">
                    Umur Dokter : {{ $d->umur }}
                    <br/>Bidang Dokter : {{ $d->bidang }}
                </p>
                <a href="{{ url('/dokter') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    @endforeach
@endsection