@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Edit Profil</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('member.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $member->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="nama_customer" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ old('nama_customer', $member->nama_customer) }}" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $member->username) }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $member->alamat) }}">
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">No. Hp</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $member->no_hp) }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
