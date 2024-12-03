@extends('umum.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-black text-center" style="background-color: #ffc107;">
                        <h4>Edit Member</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('member.profile.update', $member) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $member->email) }}" required>
                            </div>

                            <!-- Nama Customer -->
                            <div class="mb-3">
                                <label for="nama_customer" class="form-label">Nama Customer</label>
                                <input type="text" name="nama_customer" id="nama_customer" class="form-control" value="{{ old('nama_customer', $member->nama_customer) }}" required>
                            </div>

                            <!-- Username -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $member->username) }}" required>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ingin diubah">
                            </div>

                            <!-- Alamat -->
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $member->alamat) }}</textarea>
                            </div>

                            <!-- No. Hp -->
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No. Hp</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $member->no_hp) }}" required>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="text-center">
                                <button type="submit" class="btn w-100" style="background-color: {{ auth()->check() ? '#ffc107' : '#007bff' }};
                                               color: {{ auth()->check() ? '#000' : '#fff' }};">
                                    Update Member
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
