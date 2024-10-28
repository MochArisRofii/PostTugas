{{-- resources/views/users/index.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Users</title>
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
        .no-users {
            text-align: center;
            color: #777;
        }
        .profile-button {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .profile-button:hover {
            background-color: #0056b3; /* Mengubah warna tombol saat hover */
        }
        .posts-button {
            background-color: #28a745; /* Warna tombol untuk postingan */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
            margin-left: 10px; /* Spasi antara tombol */
        }
        .posts-button:hover {
            background-color: #218838; /* Mengubah warna tombol saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Users</h1>
        <a href="{{ route('posts.index') }}" class="posts-button">Lihat Semua Postingan</a>

        @if ($users->isEmpty())
            <p class="no-users">Tidak ada pengguna yang tersedia.</p>
        @else
            <ul>
                @foreach ($users as $user)
                    <li>
                        <span>{{ $user->name }}</span>
                        <div>
                            <!-- Link ke halaman posts milik user -->
                            <a href="{{ route('user.posts', $user->id) }}">Lihat Postingan</a>
                            <!-- Tombol untuk melihat profil pengguna -->
                            <a href="{{ route('profiles.show', $user->id) }}" class="profile-button">Lihat Profil</a>
                            <!-- Tombol untuk mengarahkan ke daftar postingan -->
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>
