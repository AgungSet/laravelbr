@extends('layouts.app')
@section('header')
    {{ __('Create transaksi') }}
@endsection
@section('content')
    <div class="py-6">
        <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            @include('transaksi.partials.transaksi-form')
            @include('transaksi.partials.transaksi-aksi-form')
        </form>
    </div>
@endsection
