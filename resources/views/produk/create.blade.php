@extends('layouts.app')
@section('header')
    {{ __('Create produk') }}
@endsection
@section('content')
    <div class="py-6">
        <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" action="{{ route('produk.store') }}" method="POST">
            @csrf
            @include('produk.partials.produk-form')
            @include('produk.partials.produk-aksi-form')
        </form>
    </div>
@endsection
