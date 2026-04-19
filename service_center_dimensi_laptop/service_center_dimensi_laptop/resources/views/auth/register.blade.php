@extends('layout')

@section('content')
<div class="h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-2xl border border-gray-100">
        <h2 class="text-center text-xl font-black italic uppercase tracking-tighter text-blue-700 mb-6">Create Account</h2>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-3 mb-6 rounded shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-red-500">⚠️</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-[10px] font-bold text-red-700 uppercase italic">
                            {{ $errors->first() }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-gray-100 border-none rounded-lg px-4 py-2 text-xs mt-1 focus:ring-2 focus:ring-blue-500" placeholder="" required>
            </div>

            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-100 border-none rounded-lg px-4 py-2 text-xs mt-1 focus:ring-2 focus:ring-blue-500" placeholder="" required>
            </div>

            <div>
                <label class="text-[10px] font-bold text-gray-500 uppercase">Password</label>
                <input type="password" name="password" class="w-full bg-gray-100 border-none rounded-lg px-4 py-2 text-xs mt-1 focus:ring-2 focus:ring-blue-500" placeholder="" required>
                <p class="text-[8px] text-gray-400 mt-1 italic">*Gunakan password yang kuat ya !</p>
            </div>
            
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg text-xs uppercase shadow-md hover:bg-blue-700 transition mt-4">
                Register Now
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-[10px] text-gray-400 uppercase font-bold">Sudah punya akun?</p>
            <a href="{{ route('login') }}" class="text-[10px] text-blue-600 font-black uppercase hover:underline">Masuk di Sini</a>
        </div>
    </div>
</div>
@endsection