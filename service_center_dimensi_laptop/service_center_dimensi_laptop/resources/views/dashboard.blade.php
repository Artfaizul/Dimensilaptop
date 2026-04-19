@extends('layout')

@section('content')
<div class="flex h-screen overflow-hidden bg-gray-100">
    {{-- SIDEBAR: Tetap sesuai aslimu --}}
    <aside class="w-52 bg-white shadow-md flex flex-col border-r text-gray-600">
        <div class="pt-6 pb-2 border-b border-gray-100 flex justify-center">
            <img src="{{ asset('img/logo-dimensi.png') }}" alt="Logo" class="h-28 w-auto object-contain">
        </div>

        <nav class="mt-2 px-2 space-y-1 flex-1 text-[11px] font-bold uppercase">
            <p class="px-2 py-1 text-gray-400">Home</p>
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 bg-blue-50 text-blue-600 rounded-lg shadow-sm border border-blue-100 transition-all">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 3v6h8V3h-8zm0 18h8v-10h-8v10zM3 21h8v-6H3v6zM3 3v10h8V3H3z"/>
                </svg>
                <span class="text-[11px] font-bold uppercase tracking-tight">Dashboard</span>
            </a>
            
            <p class="px-2 py-1 mt-2 text-gray-400">Pages</p>
            <a href="{{ route('stok-laptop') }}" class="flex items-center p-2 hover:bg-blue-50 rounded-md transition-all">
                <span class="mr-2">💻</span> Stok Laptop
            </a>

            <details class="group">
                <summary class="flex items-center justify-between p-2 hover:bg-blue-50 rounded-md cursor-pointer list-none transition-all">
                    <div class="flex items-center">
                        <span class="mr-2">⚙️</span> 
                        <span class="select-none">Sparepart</span>
                    </div>
                    <span class="text-[8px] transition-transform group-open:rotate-180">▼</span>
                </summary>
                <div class="ml-4 mt-1 space-y-1 border-l-2 border-blue-100 pl-2">
                    <a href="{{ route('sparepart.laptop') }}" class="flex items-center p-2 text-[9px] hover:text-blue-600 transition-colors">
                        • Sparepart Laptop
                    </a>
                    <a href="{{ route('sparepart.hp') }}" class="flex items-center p-2 text-[9px] hover:text-blue-600 transition-colors">
                        • Sparepart HP
                    </a>
                </div>
            </details>
            
            <a href="{{ route('admin.index') }}" class="flex items-center p-2 {{ request()->routeIs('admin.index') ? 'bg-blue-600 text-white' : 'hover:bg-blue-50' }} rounded-md transition-all">
                <span class="mr-2">👤</span> Admin
            </a>

            <div class="mt-4 pt-4 border-t border-gray-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2 p-2 text-red-600 hover:bg-red-50 rounded-md transition-colors group">
                        <span class="group-hover:scale-110 transition-transform">🚪</span>
                        <span>Logout System</span>
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- BANNER: Profil --}}
        <div class="bg-gradient-to-r from-blue-700 to-blue-500 h-28 rounded-b-[2rem] mx-4 mt-4 shadow-lg p-6 flex justify-between items-center text-white">
            <div>
                <h1 class="text-lg font-bold italic uppercase tracking-tighter">Hello DIMENSI LAPTOP</h1>
                <p class="text-[10px] opacity-80 uppercase tracking-widest">Selamat Datang di dimensi laptop</p>
            </div>

            <div class="flex items-center gap-2">
                <p class="text-[9px] font-bold uppercase tracking-tight">{{ auth()->user()->name }}</p>
                <div class="w-7 h-7 rounded-full bg-white flex items-center justify-center text-blue-700 text-[8px] font-bold overflow-hidden shadow-sm border border-white/50">
                    @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}" class="w-full h-full object-cover">
                    @else
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    @endif
                </div>
            </div>
        </div>

        {{-- AREA KONTEN --}}
        <div class="px-6 -mt-4 space-y-6 overflow-y-auto pb-8">
            
            {{-- BAGIAN 1: STATUS OPERASIONAL --}}
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Stok Sparepart Laptop</p>
                        <span class="bg-blue-50 p-2 rounded-lg text-xs"></span>
                    </div>
                    <p class="text-4xl font-black text-gray-800 tracking-tighter">2.648</p>
                    <div class="w-full bg-gray-100 h-1.5 rounded-full mt-5">
                        <div class="bg-blue-600 h-full w-[26%] rounded-full"></div>
                    </div>
                    <div class="flex justify-between items-center mt-3 text-[9px] font-bold uppercase">
                        <span class="text-green-600">● Normal</span>
                        <span class="text-gray-400">Maks: 9.870</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Stok Sparepart HP</p>
                        <span class="bg-amber-50 p-2 rounded-lg text-xs"></span>
                    </div>
                    <p class="text-4xl font-black text-gray-800 tracking-tighter">2.648</p>
                    <div class="w-full bg-gray-100 h-1.5 rounded-full mt-5">
                        <div class="bg-amber-500 h-full w-[26%] rounded-full"></div>
                    </div>
                    <div class="flex justify-between items-center mt-3 text-[9px] font-bold uppercase">
                        <span class="text-amber-600">● Perlu Restock</span>
                        <span class="text-gray-400">Maks: 9.870</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Stok Laptop Second</p>
                        <span class="bg-green-50 p-2 rounded-lg text-xs"></span>
                    </div>
                    <p class="text-4xl font-black text-gray-800 tracking-tighter">2.648</p>
                    <div class="w-full bg-gray-100 h-1.5 rounded-full mt-5">
                        <div class="bg-green-500 h-full w-[26%] rounded-full"></div>
                    </div>
                    <div class="flex justify-between items-center mt-3 text-[9px] font-bold uppercase">
                        <span class="text-green-600">● Normal</span>
                        <span class="text-gray-400">Maks: 9.870</span>
                    </div>
                </div>
            </div>

            {{-- BAGIAN 2: UTILISASI & KONDISI --}}
            <div class="grid grid-cols-2 gap-6">
                {{-- Utilisasi --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-6 px-1">Utilisasi Gudang</h3>
                    <div class="space-y-4">
                        @php $u = [['Laptop Baru', 72, 'bg-blue-600'], ['Laptop Second', 27, 'bg-green-500'], ['Sparepart Laptop', 45, 'bg-purple-600'], ['Sparepart HP', 61, 'bg-amber-600']]; @endphp
                        @foreach($u as $i)
                        <div class="flex items-center gap-3">
                            <span class="w-24 text-[9px] font-bold text-gray-400 uppercase">{{ $i[0] }}</span>
                            <div class="flex-1 h-2 bg-gray-100 rounded-full overflow-hidden">
                                <div class="{{ $i[2] }} h-full rounded-full" style="width: {{ $i[1] }}%"></div>
                            </div>
                            <span class="text-[10px] font-black text-gray-400">{{ $i[1] }}%</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Status Kondisi: FIXED SIZE & LAYOUT --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-6 px-1">Status Kondisi Unit</h3>
                    <div class="space-y-3 text-[11px] font-medium text-gray-700">
                        <div class="flex justify-between items-center border-b border-gray-50 pb-1.5 uppercase tracking-tighter">
                            <span class="truncate pr-2">Unit kondisi baik</span>
                            <span class="font-bold text-gray-900 whitespace-nowrap">1.842 <span class="inline-block w-2 h-2 bg-green-500 rounded-full ml-1"></span></span>
                        </div>
                        <div class="flex justify-between items-center border-b border-gray-50 pb-1.5 uppercase tracking-tighter">
                            <span class="truncate pr-2">Unit perlu servis</span>
                            <span class="font-bold text-gray-900 whitespace-nowrap">384 <span class="inline-block w-2 h-2 bg-amber-500 rounded-full ml-1"></span></span>
                        </div>
                        <div class="flex justify-between items-center border-b border-gray-50 pb-1.5 uppercase tracking-tighter">
                            <span class="truncate pr-2">Unit dalam servis</span>
                            <span class="font-bold text-gray-900 whitespace-nowrap">127 <span class="inline-block w-2 h-2 bg-orange-400 rounded-full ml-1"></span></span>
                        </div>
                        <div class="flex justify-between items-center border-b border-gray-50 pb-1.5 uppercase tracking-tighter">
                            <span class="truncate pr-2">Unit rusak berat</span>
                            <span class="font-bold text-gray-900 whitespace-nowrap">56 <span class="inline-block w-2 h-2 bg-red-500 rounded-full ml-1"></span></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- BAGIAN 3: TOTAL & KRITIS --}}
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Total Semua Unit</p>
                    <p class="text-5xl font-black text-gray-800 tracking-tighter mt-1">7.944</p>
                    <p class="text-[9px] text-gray-400 uppercase font-bold mt-2 text-green-600 italic">● Operasional Aktif</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 border-l-4 border-amber-500">
                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Dalam Proses Servis</p>
                    <p class="text-5xl font-black text-gray-800 tracking-tighter mt-1">127</p>
                    <p class="text-[9px] text-gray-400 uppercase font-bold mt-2 text-amber-600 italic">● Sedang Dikerjakan</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 border-l-4 border-red-500">
                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest text-red-500">Peringatan Stok Kritis</p>
                    <p class="text-5xl font-black text-red-600 tracking-tighter mt-1">3</p>
                    <p class="text-[9px] text-red-400 uppercase font-bold mt-2 italic">● Butuh Tindakan</p>
                </div>
            </div>

        </div>

        <footer class="mt-auto p-4 text-[9px] text-gray-400 border-t bg-white flex justify-between px-6">
            <span class="hover:text-blue-600 cursor-pointer transition-colors">© 2026 Dimensi Laptop</span>
        </footer>
    </div>
</div>
@endsection