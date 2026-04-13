@extends('layout')

@section('content')
<div class="h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-2xl border border-gray-100">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/logo-dimensi.png') }}" alt="Logo" class="h-12 w-auto">
        </div>
        
        <h2 class="text-center text-xl font-black italic uppercase tracking-tighter text-blue-700 mb-2">Login Admin</h2>
        <p class="text-center text-[10px] text-gray-400 uppercase mb-6">Dimensi Laptop & Handphone</p>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase">Email Address</label>
                <input type="email" name="email" class="w-full bg-gray-100 border-none rounded-lg px-4 py-2 text-xs mt-1 focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase">Password</label>
                <input type="password" name="password" class="w-full bg-gray-100 border-none rounded-lg px-4 py-2 text-xs mt-1 focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <button type="submit" class="w-full bg-gradient-to-r from-blue-700 to-blue-500 text-white font-bold py-2 rounded-lg text-xs uppercase shadow-lg hover:scale-105 transition-transform mt-4">
                Login Now
            </button>
        </form>
        
        <p class="text-center text-[10px] text-gray-400 mt-6">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 font-bold uppercase">Daftar di sini</a></p>
    </div>
</div>
@endsection
