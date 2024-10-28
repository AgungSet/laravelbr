@extends('layouts.app')
@section('header')
    {{ __('Create member') }}
@endsection
@section('content')
    <div class="py-6">
        <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" action="{{ route('member.store') }}" method="POST">
            @csrf
            @include('member.partials.member-form')
            @include('member.partials.member-aksi-form')
        </form>
    </div>
@endsection
