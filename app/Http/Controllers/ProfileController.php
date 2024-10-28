<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($userId)
    {
        // Mengambil User beserta Profile-nya
        $user = User::with('profile')->findOrFail($userId);
        
        // Mengembalikan view dengan data User
        return view('profiles.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($userId)
    {
        // Mengambil data pengguna berdasarkan ID
        $user = User::findOrFail($userId);
        
        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $userId)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'bio' => 'required|string|max:500',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15', // Atur batasan sesuai kebutuhan
        ]);

        // Mengambil user berdasarkan ID
        $user = User::with('profile')->findOrFail($userId);

        // Memperbarui informasi pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        // Memperbarui profil pengguna
        $user->profile->bio = $request->input('bio');
        $user->profile->location = $request->input('location');
        $user->profile->phone = $request->input('phone');
        $user->profile->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profiles.show', $userId)->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
