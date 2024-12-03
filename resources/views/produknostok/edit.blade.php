@extends('layouts.app')
@section('header')
    {{ __('Edit produknostok') }}
@endsection
@section('content')
    <div class="py-6">
        <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" action="{{ route('produknostok.update', $produknostok->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('produknostok.partials.produknostok-form')
            @include('produknostok.partials.produknostok-aksi-form')
        </form>
    </div>
@endsection
