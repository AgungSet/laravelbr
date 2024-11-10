@extends('umum.layouts.app')
@section('content')
    <div class="container text-center my-5" style="background-color: #f8f9fa; padding: 40px; border-radius: 10px;">
        <h1 style="font-family: 'Georgia', serif; font-size: 2.5em; color: #333;">
            SELAMAT DATANG DI MURIA BATIK KUDUS
        </h1>
        <p class="lead" style="font-size: 1.2em; color: #555;">
            Temukan koleksi batik terbaik Anda di Muria Batik Kudus.
        </p>
        <img src="{{ asset('img/bghome.png') }}" alt="Batik Kudus" class="img-fluid rounded" style="max-width: 80%; border: 3px solid #ddd;">
    </div>
@endsection
