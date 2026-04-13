@extends('layout')

@section('content')
<div class="flex h-screen overflow-hidden bg-gray-100">
    {{-- Sidebar --}}
    <aside class="w-52 bg-white shadow-md flex flex-col border-r text-gray-600">
        <div class="p-3 border-b flex justify-center">
            <img src="{{ asset('img/logo-dimensi.png') }}" alt="Logo" class="h-28 w-auto">
        </div>
        <nav class="mt-2 px-2 space-y-1 flex-1 text-[11px] font-bold uppercase">
            <p class="px-2 py-1 text-gray-400">Home</p>
           <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 bg-white text-gray-700 rounded-lg shadow-sm border border-gray-100 transition-all hover:bg-gray-50">
    
    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M13 3v6h8V3h-8zm0 18h8v-10h-8v10zM3 21h8v-6H3v6zM3 3v10h8V3H3z"/>
    </svg>

    <span class="text-[11px] font-bold uppercase tracking-tight">Dashboard</span>
</a>
            </a>
            
            <p class="px-2 py-1 mt-2 text-gray-400">Pages</p>
            
            <a href="{{ route('stok-laptop') }}" class="flex items-center p-2 hover:bg-blue-50 rounded-md transition-all">
                <span class="mr-2">💻</span> Stok Laptop
            </a>

            <details class="group" open>
                <summary class="flex items-center justify-between p-2 bg-blue-50 text-blue-600 rounded-md cursor-pointer list-none transition-all">
                    <div class="flex items-center">
                        <span class="mr-2">⚙️</span> 
                        <span class="select-none">Sparepart</span>
                    </div>
                    <span class="text-[8px] transition-transform group-open:rotate-180">▼</span>
                </summary>

                <div class="ml-4 mt-1 space-y-1 border-l-2 border-blue-600 pl-2">
                    <a href="{{ route('sparepart.laptop') }}" class="flex items-center p-2 text-[9px] hover:text-blue-600 transition-colors">
                        • Sparepart Laptop
                    </a>
                    <a href="{{ route('sparepart.hp') }}" class="flex items-center p-2 text-[9px] font-black text-blue-700 transition-colors">
                        • Sparepart HP
                    </a>
                </div>
            </details>
            
            <p class="px-2 py-1 mt-2 text-gray-400">Settings</p>
            <a href="{{ route('admin.index') }}" class="flex items-center p-2 hover:bg-blue-50 rounded-md transition-all">
                <span class="mr-2">👤</span> Admin
            </a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Header Biru --}}
        <div class="bg-gradient-to-r from-blue-700 to-blue-500 h-20 rounded-b-[2rem] mx-4 mt-2 shadow-lg p-5 flex justify-between items-center text-white">
            <h1 class="text-lg font-bold italic uppercase tracking-tighter">Input Stok Sparepart HP</h1>
            <div class="flex items-center gap-3">
                <div class="text-right leading-tight">
                    <p class="text-[10px] font-bold uppercase">{{ auth()->user()->name }}</p>
                </div>
                <div class="w-8 h-8 rounded-full bg-blue-400 border border-white flex items-center justify-center text-[10px] overflow-hidden">
                     <img src="{{ auth()->user()->avatar ? asset('storage/avatars/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name) }}" class="object-cover w-full h-full">
                </div>
            </div>
        </div>

        {{-- Area Form Utama --}}
        <div class="flex-1 flex flex-col items-center justify-start px-10 py-10 overflow-y-auto">
            
            <div class="bg-white w-full max-w-5xl p-12 rounded-3xl shadow-xl border border-gray-100">
                
                <form action="#" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    
                    <div class="grid grid-cols-5 items-center gap-x-12 gap-y-8">
                        
                        {{-- 1. Jenis Sparepart HP --}}
                        <label class="text-[12px] font-bold text-gray-600 uppercase col-span-2 text-right tracking-wider">Jenis Sparepart</label>
                        <div class="col-span-3">
                            <select name="jenis_sparepart" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm font-medium text-gray-700 focus:border-blue-400 focus:ring-0 outline-none cursor-pointer transition-all">
                                <option value="">Pilih Jenis Sparepart HP...</option>
                                <option value="LCD">LCD / Screen</option>
                                <option value="Baterai">Baterai HP</option>
                                <option value="Connector">Connector Charger</option>
                                <option value="Kamera">Modul Kamera</option>
                                <option value="Backdoor">Backdoor / Casing Belakang</option>
                                <option value="Fleksibel">Kabel Fleksibel (On/Off, Volume)</option>
                                <option value="Speaker">Speaker / Buzzer</option>
                            </select>
                        </div>

                        {{-- 2. Tipe HP / Spesifikasi --}}
                        <label class="text-[12px] font-bold text-gray-600 uppercase col-span-2 text-right tracking-wider">Tipe HP / Seri</label>
                        <div class="col-span-3">
                            <input type="text" name="nama_sparepart" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm font-medium text-gray-700 placeholder:text-gray-400 focus:border-blue-400 focus:ring-0 outline-none transition-all" placeholder="Contoh: iPhone 11, Samsung A52, Redmi Note 10 Pro">
                        </div>

                        {{-- 3. Update Foto --}}
                        <label class="text-[12px] font-bold text-gray-600 uppercase col-span-2 text-right tracking-wider">Update Foto</label>
                        <div class="col-span-3 flex items-center">
                            <input type="file" name="foto" id="inputFoto" class="hidden" accept="image/*">
                            <input type="text" id="placeholderFoto" class="flex-1 bg-gray-50 border border-gray-200 border-r-0 rounded-l-lg px-4 py-3 text-[12px] text-gray-500 outline-none" placeholder="Pilih Foto Sparepart..." readonly>
                            <button type="button" onclick="document.getElementById('inputFoto').click()" class="bg-blue-600 text-white px-8 py-3 rounded-r-lg text-[11px] font-bold uppercase hover:bg-blue-700 transition-all">Pilih ▼</button>
                        </div>

                        {{-- 4. Update Harga --}}
                        <label class="text-[12px] font-bold text-gray-600 uppercase col-span-2 text-right tracking-wider">Update Harga</label>
                        <div class="col-span-3">
                            <div class="relative flex items-center">
                                <span class="absolute left-4 text-sm font-bold text-blue-600">Rp</span>
                                <input type="number" name="harga" class="w-full bg-gray-50 border border-gray-200 rounded-lg pl-12 pr-4 py-3 text-sm font-bold text-blue-600 focus:border-blue-400 focus:ring-0 outline-none transition-all" placeholder="0">
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100 mt-10 mb-6">

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-center gap-4">
                        <button type="button" class="bg-blue-600 text-white px-10 py-3 rounded-xl text-[10px] font-bold uppercase shadow-md hover:bg-blue-700 transition-all">Edit</button>
                        <button type="submit" class="bg-blue-700 text-white px-10 py-3 rounded-xl text-[10px] font-bold uppercase shadow-md hover:bg-blue-800 transition-all">Simpan</button>
                        <button type="button" class="bg-blue-600 text-white px-10 py-3 rounded-xl text-[10px] font-bold uppercase shadow-md hover:bg-blue-700 transition-all">Tambah</button>
                        <button type="reset" class="bg-blue-500 text-white px-10 py-3 rounded-xl text-[10px] font-bold uppercase shadow-md hover:bg-gray-600 transition-all">Batal</button>
                    </div>
                </form>
            </div>
        </div>

        <footer class="p-3 text-[9px] text-gray-400 border-t bg-white flex justify-end">
            <div>© 2026 Dimensi Laptop</div>
        </footer>
    </div>
</div>

<script>
    document.getElementById('inputFoto').onchange = function() {
        if (this.files.length > 0) {
            document.getElementById('placeholderFoto').value = this.files[0].name;
        }
    };
</script>
@endsection