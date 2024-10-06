@extends('layouts.app')

@section('content')
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <strong class="kategori" title="Kategori">Kategori</strong>
        </div>
    </header>

    <div class="container">
        <h2>Form Input Kategori</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <label for="nomor">Nomor:</label>
            <input type="number" id="nomor" name="nomor" required>

            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" required>

            <button type="submit" class="btn btn-primary">Tambah Kategori</button>
        </form>

        <h3>Daftar Kategori</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->nomor }}</td>
                        <td>{{ $kategori->kategori }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
