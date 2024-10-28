<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data postingan
        $posts = Post::all();

        // Mengembalikan view posts.index dengan data postingan
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Tampilkan form tambah postingan
        return view('posts.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
        ]);

        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Buat postingan baru yang terkait dengan user ini
        $user->posts()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        // Redirect ke halaman daftar postingan user dengan pesan sukses
        return redirect()->route('user.posts', $user->id)->with('success', 'Postingan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);

        // Jika postingan tidak ditemukan, kembali ke halaman lain dengan pesan error
        if (!$post) {
            return redirect('/posts')->with('error', 'Postingan tidak ditemukan');
        }

        // Mengembalikan view posts.show dengan data postingan
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mencari post berdasarkan ID
        $post = Post::find($id);

        // Jika post tidak ditemukan, tampilkan halaman 404
        if (!$post) {
            abort(404, 'Post tidak ditemukan');
        }

        // Mengembalikan view posts.edit dengan data post
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|min:5', // Judul minimal 5 karakter
            'content' => 'required', // Isi post tidak boleh kosong
        ]);

        // Mencari post berdasarkan ID
        $post = Post::find($id);

        // Jika post tidak ditemukan, tampilkan halaman 404
        if (!$post) {
            abort(404, 'Post tidak ditemukan');
        }

        // Mengupdate data post
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        // Redirect kembali ke halaman show atau daftar post dengan pesan sukses
        return redirect()->route('posts.show', $post->id)->with('success', 'Post berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
