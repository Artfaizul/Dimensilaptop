@extends('layout')

@section('content')
<div class="flex h-screen overflow-hidden bg-gray-50">
    {{-- SIDEBAR: Font Kecil & Tipis Kembali --}}
    <aside class="w-64 bg-white flex flex-col border-r border-gray-100 shadow-sm">
        <div class="p-6 border-b border-gray-50 flex justify-center bg-white">
            <img src="{{ asset('img/logo-dimensi.png') }}" alt="Logo" class="h-16 w-auto">
        </div>

        <nav class="flex-1 px-4 mt-6 space-y-1">
            <p class="px-2 py-1 text-[10px] font-medium text-gray-400 uppercase tracking-widest">Home</p>
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 text-gray-500 hover:bg-blue-50 rounded-lg transition-all group">
                <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="text-xs font-semibold uppercase tracking-tight">Dashboard</span>
            </a>
            
            <p class="px-2 py-1 mt-4 text-[10px] font-medium text-gray-400 uppercase tracking-widest">Pages</p>
            <a href="{{ route('stok-laptop') }}" class="flex items-center gap-3 px-3 py-2 text-gray-500 hover:bg-blue-50 rounded-lg transition-all">
                <span class="text-sm">💻</span>
                <span class="text-xs font-semibold uppercase tracking-tight">Stok Laptop</span>
            </a>

            <details class="group">
                <summary class="flex items-center justify-between px-3 py-2 text-gray-500 hover:bg-blue-50 rounded-lg cursor-pointer list-none">
                    <div class="flex items-center gap-3">
                        <span class="text-sm">⚙️</span> 
                        <span class="text-xs font-semibold uppercase tracking-tight">Sparepart</span>
                    </div>
                    <span class="text-[10px] group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <div class="ml-4 mt-1 space-y-1 border-l border-gray-100 pl-4">
                    <a href="{{ route('sparepart.laptop') }}" class="block py-1.5 text-[11px] font-medium text-gray-400 hover:text-blue-600">• Laptop</a>
                    <a href="{{ route('sparepart.hp') }}" class="block py-1.5 text-[11px] font-medium text-gray-400 hover:text-blue-600">• Handphone</a>
                </div>
            </details>
            
            <p class="px-2 py-1 mt-4 text-[10px] font-medium text-gray-400 uppercase tracking-widest">Settings</p>
            <a href="{{ route('admin.index') }}" class="flex items-center gap-3 px-3 py-2 bg-blue-600 text-white rounded-lg shadow-md shadow-blue-100">
                <span class="text-sm">👤</span>
                <span class="text-xs font-semibold uppercase tracking-tight">Admin</span>
            </a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Header Biru Solid Khas Dimensi --}}
        <header class="h-14 bg-blue-600 flex items-center justify-end px-8 shadow-sm">
            <div class="flex items-center gap-3 text-white">
                <p class="text-[10px] font-bold uppercase tracking-wide">{{ auth()->user()->name }}</p>
                <div class="w-8 h-8 rounded-full border border-white/50 overflow-hidden bg-white shadow-sm">
                    <img src="{{ auth()->user()->avatar ? asset('storage/avatars/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name) }}" class="w-full h-full object-cover">
                </div>
            </div>
        </header>

        <div class="p-8 overflow-y-auto">
            {{-- Container Form Tetap Pakai Border Biru Atas Biar Sinkron --}}
            <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg border-t-4 border-blue-600 overflow-hidden">
                <div class="p-8">
                    <h2 class="text-sm font-bold text-gray-700 mb-6 uppercase tracking-tight border-b border-gray-50 pb-3">Profil Admin</h2>

                    <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        
                        <div class="grid grid-cols-12 gap-10">
                            {{-- Foto Profil --}}
                            <div class="col-span-4 flex flex-col items-center border-r border-gray-50 pr-10">
                                <div class="relative group">
                                    <div class="w-32 h-32 rounded-full border-4 border-blue-500 p-1 flex items-center justify-center bg-white shadow-md overflow-hidden">
                                        <img src="{{ auth()->user()->avatar ? asset('storage/avatars/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name) }}" 
                                             id="previewFoto" class="w-full h-full object-cover rounded-full">
                                    </div>
                                    <input type="file" name="avatar" id="inputFoto" class="hidden" accept="image/*">
                                    <button type="button" onclick="document.getElementById('inputFoto').click()" class="absolute bottom-1 right-1 bg-blue-600 text-white p-2 rounded-full border-2 border-white shadow-md hover:scale-110 transition-all">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </button>
                                </div>
                                <h3 class="mt-4 text-xs font-bold text-gray-700 uppercase">{{ auth()->user()->name }}</h3>
                                <p class="text-[9px] text-blue-500 font-bold uppercase tracking-widest">Administrator</p>
                            </div>

                            {{-- Form Lengkap (Tidak ada fitur yang dikurangin) --}}
                            <div class="col-span-8">
                                <div class="grid grid-cols-2 gap-x-6 gap-y-4">
                                    <div class="col-span-1">
                                        <label class="text-[10px] font-bold text-gray-400 uppercase mb-1 block">Nama Lengkap</label>
                                        <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full border border-gray-200 bg-gray-50/50 rounded-lg px-3 py-2 text-xs font-medium focus:border-blue-500 focus:bg-white outline-none transition-all">
                                    </div>
                                    <div class="col-span-1">
                                        <label class="text-[10px] font-bold text-gray-400 uppercase mb-1 block">Email Address</label>
                                        <input type="email" value="{{ auth()->user()->email }}" class="w-full border border-gray-100 bg-gray-100 rounded-lg px-3 py-2 text-xs font-medium text-gray-400 cursor-not-allowed" readonly>
                                    </div>
                                    <div>
                                        <label class="text-[10px] font-bold text-gray-400 uppercase mb-1 block">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" value="{{ auth()->user()->tanggal_lahir }}" class="w-full border border-gray-200 bg-gray-50/50 rounded-lg px-3 py-2 text-xs font-medium focus:border-blue-500 focus:bg-white outline-none">
                                    </div>
                                    <div>
                                        <label class="text-[10px] font-bold text-gray-400 uppercase mb-1 block">Nomor Telepon</label>
                                        <input type="text" name="no_telp" value="{{ auth()->user()->no_telp }}" class="w-full border border-gray-200 bg-gray-50/50 rounded-lg px-3 py-2 text-xs font-medium focus:border-blue-500 focus:bg-white outline-none">
                                    </div>
                                    <div class="col-span-2">
                                        <label class="text-[10px] font-bold text-gray-400 uppercase mb-1 block">Alamat Lengkap</label>
                                        <textarea name="alamat" rows="2" class="w-full border border-gray-200 bg-gray-50/50 rounded-lg px-3 py-2 text-xs font-medium focus:border-blue-500 focus:bg-white outline-none transition-all resize-none">{{ auth()->user()->alamat }}</textarea>
                                    </div>
                                    <div>
                                        <label class="text-[10px] font-bold text-gray-400 uppercase mb-1 block">Password Baru</label>
                                        <input type="password" name="password" placeholder="Kosongkan jika tidak diganti" class="w-full border border-gray-200 bg-gray-50/50 rounded-lg px-3 py-2 text-xs font-medium focus:border-blue-500 focus:bg-white outline-none">
                                    </div>
                                    <div>
                                        <label class="text-[10px] font-bold text-gray-400 uppercase mb-1 block">Status Akun</label>
                                        <select name="status" id="statusSelect" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs font-bold outline-none cursor-pointer">
                                            <option value="aktif" {{ auth()->user()->status == 'aktif' ? 'selected' : '' }}>● AKTIF</option>
                                            <option value="nonaktif" {{ auth()->user()->status == 'nonaktif' ? 'selected' : '' }}>○ TIDAK AKTIF</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="pt-6 flex justify-end gap-2 mt-6 border-t border-gray-50">
                                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg text-xs font-bold shadow-md hover:bg-blue-700 transition-all uppercase">Simpan Perubahan</button>
                                    <a href="{{ route('admin.index') }}" class="bg-gray-100 text-gray-400 px-6 py-2 rounded-lg text-xs font-bold hover:bg-gray-200 transition-all uppercase">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('inputFoto').onchange = evt => {
        const [file] = document.getElementById('inputFoto').files
        if (file) {
            document.getElementById('previewFoto').src = URL.createObjectURL(file)
        }
    }

    const statusSelect = document.getElementById('statusSelect');
    function updateStatusColor() {
        if (statusSelect.value === 'aktif') {
            statusSelect.style.color = '#16a34a'; // Green
        } else {
            statusSelect.style.color = '#dc2626'; // Red
        }
    }
    statusSelect.addEventListener('change', updateStatusColor);
    updateStatusColor(); 
</script>
@endsection