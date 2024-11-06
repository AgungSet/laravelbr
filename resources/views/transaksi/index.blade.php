@extends('layouts.app')
@section('content')
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
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Nama transaksi</span>
                                </th>
                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Created At</span>
                                </th>

                                <th class="bg-gray-50 px-6 py-3 text-left">
                                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach ($transaksis as $index => $transaksi)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $transaksi->tanggal }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $transaksi->nama_member }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $transaksi->nama_produk }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $transaksi->harga }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $transaksi->total }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ date('d M Y', strtotime($transaksi->created_at)) }}
                                    </td>

                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{-- edit --}}
                                        <a href="{{ route('transaksi.edit', $transaksi) }}"> {{ __('Edit') }}</a>
                                        <form action="{{ route('transaksi.destroy', $transaksi) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">{{ __('Delete') }}</button>
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
