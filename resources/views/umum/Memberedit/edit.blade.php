@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Member</h2>
        <form action="{{ route('member.update', $member->id_member) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" required>
            </div>

            <div class="form-group">
                <label for="name">Nama Customer</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $member->username }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $member->address }}" required>
            </div>

            <div class="form-group">
                <label for="phone">No. Hp</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $member->phone }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
