@extends('layouts.app')
@section('header')
    {{ __('Create produknostok') }}
@endsection
@section('content')
    <div class="py-6">
        <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" action="{{ route('produknostok.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('produknostok.partials.produknostok-form')
            @include('produknostok.partials.produknostok-aksi-form')
        </form>
    </div>
@endsection
