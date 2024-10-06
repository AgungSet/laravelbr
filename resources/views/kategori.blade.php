@extends('layouts.app')
@section('contents')
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($kategori) ? 'Form Edit Kategori' : 'Form Tambah Kategori' }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($kategori) ? route('kategori.tambah.update', $kategori->id) : route('kategori.tambah.simpan') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($kategori) ? $kategori->nama : '' }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('kategori.tambah') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no = 1)
                                @foreach ($kategori as $row)
                                    <tr>
                                        <th>{{ $no++ }}</th>
                                        <td>{{ $row->nama }}</td>
                                        <td>
                                            <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('kategori.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
