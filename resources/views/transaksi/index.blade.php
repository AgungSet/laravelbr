@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg py-4 space-y-4">
                <div class="flex flex-row justify-between px-4">
                    <div></div>
                    <a href="{{ route('transaksi.create') }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#d3b643] hover:bg-[#b39b38] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#bca93e] transition ease-in-out duration-150">
                        {{ __('Add transaksi') }}
                    </a>
                </div>
                <div class="w-full overflow-x-scroll align-middle">
                    <table class="min-w-full border divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Di Buat</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Nama Customer</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Total Harga</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Status</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach ($transaksis as $transaksi)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ date('d M Y', strtotime($transaksi->created_at)) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $transaksi->member->nama_customer }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $transaksi->total_harga_transaksi }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        <div class="flex space-x-2">
                                            {{-- Tombol Terbayar --}}
                                            <form action="{{ route('transaksi.updateterbayar', $transaksi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status menjadi Terbayar?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.3em;">
                                                    <i class="fas fa-circle" style="font-size: 1em; color: {{ $transaksi->status_transaksi === 'Terbayar' ? '#4CAF50' : '#6B7280' }};"></i>
                                                    <span style="font-size: 0.9em; color: {{ $transaksi->status_transaksi === 'Terbayar' ? '#4CAF50' : '#000' }};">Terbayar</span>
                                                </button>
                                            </form>

                                            {{-- Tombol Selesai --}}
                                            <form action="{{ route('transaksi.updateselesai', $transaksi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status menjadi Selesai?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.3em;">
                                                    <i class="fas fa-circle" style="font-size: 1em; color: {{ $transaksi->status_transaksi === 'Selesai' ? '#4CAF50' : '#6B7280' }};"></i>
                                                    <span style="font-size: 0.9em; color: {{ $transaksi->status_transaksi === 'Selesai' ? '#4CAF50' : '#000' }};">Selesai</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
