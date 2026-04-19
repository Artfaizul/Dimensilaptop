<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function update(Request $request)
{
    $user = \App\Models\User::find(\Auth::id());

    $request->validate([
        'name' => 'required|string|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'tanggal_lahir' => 'nullable|date',
        'alamat' => 'nullable|string',
        'no_telp' => 'nullable|string|max:15',
    ]);

    // Proses Avatar tetap sama (abaikan jika tidak ada perubahan)
    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $filename = time() . '_' . $user->id . '.' . $avatar->getClientOriginalExtension();
        $avatar->storeAs('avatars', $filename, 'public');
        if ($user->avatar) {
            \Storage::disk('public')->delete('avatars/' . $user->avatar);
        }
        $user->avatar = $filename;
    }

    // Update data tambahan
    $user->name = $request->name;
    $user->tanggal_lahir = $request->tanggal_lahir;
    $user->alamat = $request->alamat;
    $user->no_telp = $request->no_telp;

    if ($request->filled('password')) {
        $user->password = \Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('admin.index')->with('success', 'Data berhasil ditambahkan!');
}
}