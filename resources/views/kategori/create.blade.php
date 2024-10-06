@extends('layouts.app')
@section('header')
    {{ __('Create kategori') }}
@endsection
@section('content')
    <div class="py-6">
        <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" action="{{ route('kategori.store') }}" method="POST">
            @csrf
            @include('kategori.partials.kategori-form')
            @include('kategori.partials.kategori-aksi-form')
        </form>
    </div>
@endsection
