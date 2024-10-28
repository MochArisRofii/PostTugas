{{-- resources/views/users/posts.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postingan oleh {{ $user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            padding: 10px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        li:last-child {
            border-bottom: none; /* Menghapus border untuk item terakhir */
        }
        a {
            text-decoration: none;
            color: #007BFF;
            transition: color 0.3s;
        }
        a:hover {
            color: #0056b3; /* Mengubah warna saat hover */
        }
        .no-posts {
            text-align: center;
            color: #777;
        }
        .back-link, .create-post-link, .edit-profile-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #007BFF;
            transition: color 0.3s;
        }
        .back-link:hover, .create-post-link:hover, .edit-profile-link:hover {
            color: #0056b3; /* Mengubah warna saat hover */
        }
        .create-post-link {
            margin-top: 30px; /* Jarak lebih jauh untuk tombol tambah postingan */
            font-weight: bold; /* Menebalkan teks */
        }
        .edit-profile-link {
            margin-top: 10px; /* Jarak untuk tombol edit profil */
            font-weight: bold; /* Menebalkan teks */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Postingan oleh {{ $user->name }}</h1>

        {{-- Tombol untuk membuat postingan baru --}}
        <a class="create-post-link" href="{{ route('user.posts.create', $user->id) }}">Buat Postingan Baru</a>

        {{-- Tombol untuk edit profil --}}
        <a class="edit-profile-link" href="{{ route('profiles.edit', $user->id) }}">Edit Profil Pengguna</a>

        @if ($posts->isEmpty())
            <p class="no-posts">User ini belum memiliki postingan.</p>
        @else
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ul>
        @endif

        <a class="back-link" href="{{ url('/users') }}">Kembali ke daftar pengguna</a>
    </div>
</body>
</html>
