@extends('layouts.app')
@section('header')
    {{ __('Edit pesanan') }}
@endsection
@section('content')
    <div class="py-6">
        <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('pesanan.partials.pesanan-form')
            @include('pesanan.partials.pesanan-aksi-form')
        </form>
    </div>
@endsection
