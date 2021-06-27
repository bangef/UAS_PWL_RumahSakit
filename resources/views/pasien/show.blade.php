@extends('layouts.index')
@section('content')
    <h3>Detail Data Pasien</h3>
    @foreach ($ar_pasien as $p)
        <div class="card" style="width: 22rem;">
            @php
            if(!empty($p->foto)) {
            @endphp
                <img src="{{ asset('images')}}/{{ $p->foto }}"/>
            @php
            } else {
            @endphp
                <img src="{{ asset('images')}}/no_picture.png"/>
            @php
            }
            @endphp
            <div class="card-body">
                <h5 class="card-title">{{ $p->nama }}</h5>
                <p class="card-text">
                    Umur Pasien : {{ $p->umur }}
                    <br/>Keluhan Penyakit : {{ $p->penyakit }}
                </p>
                <a href="{{ url('/pasien') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    @endforeach
@endsection