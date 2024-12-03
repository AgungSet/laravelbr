@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg py-4 space-y-4">
                <div class="flex flex-row justify-between px-4">
                    <div></div>
                    <a href="{{ route('produknostok.create') }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#d3b643] hover:bg-[#b39b38] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#bca93e] transition ease-in-out duration-150">
                        {{ __('Add Produk no stok') }}
                    </a>
                </div>


                <div class="w-full overflow-x-scroll align-middle">
                    <table class="min-w-full border divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Nama produk no stok</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">dibuat</span>
                                </th>

                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">harga</span>
                                </th>

                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Foto</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Edit/Hapus</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach ($produknostoks as $index => $produknostok)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $produknostok->nama_produknostok }}
                                    </td>

                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $produknostok->harga }}
                                    </td>
                                    {{-- Buat untuk relasi dengan kategori --}}
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ date('d M Y', strtotime($produknostok->created_at)) }}
                                    </td>
                                    <td>
                                        <img src="uploads/{{ $produknostok->foto }}" alt="{{ $produknostok->foto }}" width="100px" height="100px">
                                    </td>

                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{-- edit --}}
                                        <a href="{{ route('produknostok.edit', $produknostok) }}" title="Edit">
                                            <i class="fas fa-edit" style="font-size: 1.5em; color: gold;"></i>
                                        </a>


                                        <form action="{{ route('produknostok.destroy', $produknostok) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: none; border: none; cursor: pointer;">
                                                <i class="fas fa-trash" style="font-size: 1.2em; color: #6B7280;"></i>
                                            </button>
                                        </form>
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
