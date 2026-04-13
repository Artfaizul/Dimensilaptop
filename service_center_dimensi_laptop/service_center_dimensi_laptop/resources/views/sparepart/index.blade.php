@extends('layout')

@section('content')
<div class="p-6">
    <div class="flex items-center mb-6">
        <form action="" method="get" class="flex-1 flex items-center">
            <input type="text" name="q" placeholder="pencarian....." value="{{ request('q') }}" class="w-full max-w-md px-4 py-2 rounded bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </form>
    </div>
    <div class="flex flex-wrap gap-2 mb-6">
        @foreach($kategoris as $kat)
            <a href="?kategori={{ $kat }}" class="px-4 py-2 rounded shadow-sm border @if(($kategori ?? 'SEMUA') == $kat) bg-blue-500 text-white @else bg-white text-gray-700 @endif">{{ $kat }}</a>
        @endforeach
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($spareparts as $sparepart)
        <div class="bg-gray-100 rounded-xl p-4 flex flex-col items-center shadow">
            <div class="w-full h-36 bg-gray-200 rounded mb-4 flex items-center justify-center overflow-hidden">
                @if($sparepart->gambar)
                    <img src="{{ asset($sparepart->gambar) }}" alt="{{ $sparepart->nama }}" class="object-cover h-full w-full" />
                @else
                    <span class="text-gray-400">No Image</span>
                @endif
            </div>
            <div class="w-full">
                <div class="font-bold text-lg mb-1">Rp {{ number_format($sparepart->harga,0,',','.') }}</div>
                <div class="font-semibold text-gray-800 leading-tight mb-1">{{ $sparepart->nama }}</div>
                <div class="text-gray-500 text-sm mb-2">{{ $sparepart->deskripsi }}</div>
                <div class="text-gray-400 text-sm">Stock <span class="font-bold">{{ $sparepart->stok }}</span></div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
